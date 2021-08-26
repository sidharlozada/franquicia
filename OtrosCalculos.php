<?php
session_start();
include("lib/librerias.php"); 
$JsonOp = new Services_JSON();
$json = new Services_JSON();
$JsonOp = $JsonOp->decode(str_replace("\\","",$_REQUEST['JsonEnv']));
$ad_user_id = $_SESSION['id'];

switch ($JsonOp->form){

   case "FechaNomina":
      //BUSCA LA FECHA DE LA NOMINA QUE SE VA A CALCULAR, SI NO HAY EN EL HISTORICO AGARRA LA FECHA POR DEFECTO
      //CUANDO SE CREO LA NOMINA
      
      $q = "SELECT * FROM system.ad_payroll_history WHERE ad_payroll_history_id = ";
      $q.= "(SELECT max(ad_payroll_history_id) FROM system.ad_payroll_history WHERE ad_payroll_id = $JsonOp->ad_payroll_id)";
      //die($q);
      $r = $conn->Execute($q);
      //FECHA INICIAL NOMINA NUEVA
      $q = "SELECT * FROM system.ad_payroll WHERE ad_payroll_id = $JsonOp->ad_payroll_id";
      //die($q);
      $r1 = $conn->Execute($q);

      $nomina = new nomina;

      $date_start = $r->EOF ? muestrafecha($r1->fields['date_start']) : FechaIni($r1->fields['ad_payroll_type_id'],"/",muestrafecha($r->fields['date_end']),1,0);
      $date_end = FechaFin($r1->fields['ad_payroll_type_id'],"/",$date_start,1,0,$conn,$JsonOp->ad_payroll_id);

      $nomina->date_start = ($JsonOp->ad_payroll_id==0) ? null : guardafecha($date_start);
      $nomina->date_end = ($JsonOp->ad_payroll_id==0) ? null : guardafecha($date_end);
        
      echo $json->encode($nomina);

   break;

   case "FechaNominaRev":
      //OBTIENE LA FECHA DE LA ULTIMA NOMINA "SELECCIONADA" QUE ESTE CERRADA, PARA SER REVERSADA
      $q = "SELECT * FROM system.ad_payroll_history WHERE ad_payroll_history_id = $JsonOp->ad_payroll_history_id";
      //die($q);
      $r = $conn->Execute($q);

      $nomina = new nomina;

      $nomina->date_start = $r->fields['date_start'];
      $nomina->date_end = $r->fields['date_end'];
        
      echo $json->encode($nomina);

   break;

   case 'CalculaNomina':
      //HACE EL CALCULO DE LA NOMINA SELECCINADA EN EL RANGO CORRESPONDIENTE
      if(!empty(@$JsonOp->ad_employee_id)){
         $q = "SELECT * FROM system.ad_employee a
         INNER JOIN system.ad_payroll_employee b on (b.ad_employee_id = a.ad_employee_id)
         WHERE a.ad_employee_id=$JsonOp->ad_employee_id AND b.ad_payroll_id=$JsonOp->ad_payroll_id AND a.isactive='Y' 
         ORDER BY a.name ";
      }else{
         $q = "SELECT * FROM system.ad_employee a
         INNER JOIN system.ad_payroll_employee b on (b.ad_employee_id = a.ad_employee_id)
         WHERE b.ad_payroll_id= $JsonOp->ad_payroll_id  AND a.isactive='Y' 
         ORDER BY a.name ";
      }
      //SELECCIONO LOS TRABAJADORES DE LA NOMINA A CALCULAR
      //die($q);
      $Trabajadores = $conn->Execute($q);

      //PARA NOMINA DE VACACIONES
      $q = "SELECT ad_payroll_id, vacation FROM system.ad_payroll WHERE ad_payroll_id = $JsonOp->ad_payroll_id";
      //die($q);
      $rVac = $conn->Execute($q);
      $vacation = $rVac->fields['vacation'];
      $NominaVacaciones = ($vacation==1) ? true : false;
      
      $nomina = new nomina;
      $Index = 0; $nro = 0; $op = 0;
      $FechaIni = $JsonOp->date_start;
      $FechaFin = $JsonOp->date_end;
      
      while (!$Trabajadores->EOF){

         $ad_employee_id = $Trabajadores->fields['ad_employee_id'];
         $nom_status_id = $Trabajadores->fields['nom_status_id'];
         $datein = $Trabajadores->fields['datein'];
         $dateout = $Trabajadores->fields['dateout'];
          
         $NoEnVacaciones = PeriodoVacValido($conn, $ad_employee_id ,$nom_status_id, $FechaIni, $FechaFin);

            if($NoEnVacaciones) {

               $q = "SELECT a.ad_concept_id ,c.description nomina, a.name concepto, d.symbol, a.formulate , a.formulate_cant  
                     FROM system.ad_concept a 
                     INNER JOIN system.ad_relation_pay_conc b ON (b.ad_concept_id = a.ad_concept_id) 
                     inner join system.ad_payroll c on (c.ad_payroll_id = b.ad_payroll_id )
                     inner join system.ad_concept_type d on (d.ad_concept_type_id = a.ad_concept_type_id )
                     WHERE b.ad_payroll_id=$JsonOp->ad_payroll_id AND a.isactive='Y' 
                     ORDER BY d.symbol DESC, a.default_days ASC ";
               //die($q);
               $Conceptos = $conn->Execute($q);
               /*if($Conceptos->EOF){
                   $TFC="-1C";
                   break;
               }*/
               //RECORRO TODOS LOS CONCEPTOS Y OBTENGO EL VALOR DE LA FORMULA

               while (!$Conceptos->EOF){

                  if($NominaVacaciones){

                     $q = "SELECT * FROM system.ad_vacation_prepare WHERE ad_employee_id = $ad_employee_id";
                     //die($q);
                        $rFVac = $conn->Execute($q);
                     if(!$rFVac->EOF){
                        $JsonOp->date_start = ($rFVac->fields['date_start']);
                        $JsonOp->date_end = ($rFVac->fields['date_end']);
                     }
                  }
                  
                  $deducciones = 0;
                  $asignacion = 0;
                  $valor = valorFormula($conn, $Conceptos->fields['formulate'], $ad_employee_id, $JsonOp->date_start, $JsonOp->date_end, $datein, $dateout);
                  $cant = valorFormula($conn, $Conceptos->fields['formulate_cant'], $ad_employee_id, $JsonOp->date_start, $JsonOp->date_end, $datein, $dateout);
                  
                  if($Conceptos->fields['symbol']==='+'){
                     $asignacion = $valor;
                  }else{
                     $deducciones = $valor;
                  }
                  
                  if($asignacion != 0 || $deducciones !=0){
                     $Calculo[$Index]['T'] = $ad_employee_id;
                     $Calculo[$Index]['C'] = $Conceptos->fields['ad_concept_id'];
                     $Calculo[$Index]['A'] = $asignacion; 
                     $Calculo[$Index]['D'] = $deducciones;  
                     $Calculo[$Index]['Des'] = $Conceptos->fields['concepto']; 
                     $Calculo[$Index]['cant'] = $cant; 

                     $Index++;
                  }
               
               $Conceptos->movenext();
               }   
            }
                 
         $Trabajadores->movenext();
      }


         $q = "SELECT * FROM system.ad_payroll_calculated  WHERE ad_payroll_id = $JsonOp->ad_payroll_id";
         $CNomina = $conn->Execute($q);
         //GUARDO O ACTUALIZO LA NOMINA CALCULADA
         if($CNomina->EOF){
            $q = "INSERT INTO system.ad_payroll_calculated (ad_org_id, created, createdby, ad_payroll_id,date_start,date_end,description, vacation) VALUES (1,now(),$ad_user_id, $JsonOp->ad_payroll_id,'$FechaIni','$FechaFin', '$JsonOp->descNomina', $vacation)";
            $RAux = $conn->Execute($q);

            $q = "SELECT ad_payroll_calculated_id FROM system.ad_payroll_calculated WHERE ad_payroll_id=$JsonOp->ad_payroll_id";
            $CNomina = $conn->Execute($q);
            $NominaCI=$CNomina->fields['ad_payroll_calculated_id'];
         }else{
            $q = "UPDATE system.ad_payroll_calculated SET date_start='$FechaIni', date_end='$FechaFin', description = '$JsonOp->descNomina', created = now(), vacation = $vacation 
                  WHERE ad_payroll_id = $JsonOp->ad_payroll_id";
            //die($q);
            $RAux = $conn->Execute($q);
            $NominaCI=$CNomina->fields['ad_payroll_calculated_id'];
         }
         //ELIMINO LOS CONCEPTOS CALCULADOS Y VUELVO A INGRESAR EL NUEVO CALCULO
         //die($NominaCI." - dd");
         if(empty(@$JsonOp->ad_employee_id)){
              $q = "DELETE FROM system.ad_payroll_calc_conc WHERE ad_payroll_calculated_id = $NominaCI";
          }else{
              $q = "DELETE FROM system.ad_payroll_calc_conc WHERE ad_payroll_calculated_id = $NominaCI AND ad_employee_id = $JsonOp->ad_employee_id ";
          }
          //die($q);
         $RAux = $conn->Execute($q);
          if(is_array($Calculo))
          foreach($Calculo AS $TCV ){

              $q = "INSERT INTO system.ad_payroll_calc_conc 
              (ad_payroll_calculated_id, ad_employee_id, ad_concept_id, assignment, deduction, description, quantity) 
              VALUES ($NominaCI, $TCV[T], $TCV[C], $TCV[A], $TCV[D], '$TCV[Des]', '$TCV[cant]')";
              //die($q);
              $RAux = $conn->Execute($q);

          }

          $resp = "OPERACION REALIZADA CON EXITO";

        //var_dump($Calculo);
        //$nomina->nombre = $asignacion;
        echo $json->encode($resp);
    break;

   case 'GuardaVariable':
         //GUARDO LAS VARIABLES CARGADAS EN LA PARTE DE REVISION DE NOMINA DONDE LE ASIGNO A CADA TRABAJADOR SU VALOR

         $nomina = new nomina;
         $resp = $nomina->addVariables($conn, $JsonOp);
         
         echo $json->encode($resp);
   break;

   case 'EliminaNomina':
      //ELIMINO UNA NOMINA QUE ESTE SOLAMENTE CALCULADA
      $q = "SELECT * FROM system.ad_payroll_calculated  WHERE ad_payroll_id = $JsonOp->ad_payroll_id ";
      //die($q);
      $CNomina = $conn->Execute($q);
         if(!empty($JsonOp->ad_employee_id) && !$CNomina->EOF){
         $q = "DELETE FROM system.ad_payroll_calc_conc WHERE ad_employee_id = '$JsonOp->ad_employee_id' 
               AND ad_payroll_calculated_id = '".$CNomina->fields['ad_payroll_calculated_id']."'";
         //die($q);
         $RAux = $conn->Execute($q);
         $resp = "CALCULO DEL EMPLEADO ELIMINADO";
      }elseif (empty($JsonOp->ad_employee_id) && !$CNomina->EOF) {
         $q = "DELETE FROM system.ad_payroll_calculated 
               WHERE ad_payroll_calculated_id = '".$CNomina->fields['ad_payroll_calculated_id']."'";
         $RAux = $conn->Execute($q);
         $resp = "CALCULO DE LA NOMINA ELIMINADA";
      }else{
         $resp = "NOMINA NO CALCULADA";
      }
      echo $json->encode($resp);
   break;

   case 'CerrarNomina':
      //PARA EL CIERRE DE LA NOMINA
      $ad_org_id = $_SESSION['ad_org_id'];
      $ad_user_id = $_SESSION['id'];
      //SELECCIONO LA NOMINA CALCULADA "CABECERA"
      $q = "SELECT * FROM system.ad_payroll_calculated  WHERE ad_payroll_calculated_id = $JsonOp->ad_payroll_calculated_id ";
      //die($q);
      $Nomina = $conn->Execute($q);
      //SELECCIONO LOS CONCEPTOS CALCULADOS
      $q = "SELECT * FROM system.ad_payroll_calc_conc  WHERE ad_payroll_calculated_id = $JsonOp->ad_payroll_calculated_id ";
      //die($q);
      $Concepto = $conn->Execute($q);
      //SELECCIONO LAS VARIABLES ASIGNADAS
      $q = "SELECT * FROM system.ad_relation_var_employee  WHERE ad_employee_id IN (select ad_employee_id from  system.ad_payroll_calc_conc  WHERE ad_payroll_calculated_id= $JsonOp->ad_payroll_calculated_id group by ad_employee_id) ";
     //die($q);
      $Variables = $conn->Execute($q);
      //SELECCIONO LOS EMPLEADOS EN NOMINA CALCULADA
      $q = "SELECT * FROM system.ad_employee  WHERE ad_employee_id IN (select ad_employee_id from  system.ad_payroll_calc_conc  WHERE ad_payroll_calculated_id= $JsonOp->ad_payroll_calculated_id group by ad_employee_id) ";
      //die($q);
      $Empleados = $conn->Execute($q);
      
      if (!$Concepto->EOF){
         //GUARDO LA NOMINA (CABECERA) EN EL HISTORICO
         $q ="INSERT INTO system.ad_payroll_history (ad_org_id, created, createdby, ad_payroll_id, date_start, date_end, description, vacation) ";
         $q.=" values ($ad_org_id , now(), $ad_user_id, '".$Nomina->fields['ad_payroll_id']."', '".$Nomina->fields['date_start']."', '".$Nomina->fields['date_end']."', '".$Nomina->fields['description']."', '".$Nomina->fields['vacation']."')";
         //die($q);
         $r1 = $conn->Execute($q);

         $ad_payroll_history_id = getLastID($conn,'system.ad_payroll_history','ad_payroll_history_id');
         //GUARDO LOS CONCEPTOS EN EL HISTORICO
         while(!$Concepto->EOF){

            $conceptos = new conceptos;
            $concep = $conceptos->get($conn, $Concepto->fields['ad_concept_id']);

            $q ="INSERT INTO system.ad_payroll_history_concept (ad_payroll_history_id, ad_employee_id, ad_concept_id, assignment, deduction, description, formulate, quantity)";
            $q.="values ($ad_payroll_history_id , '".$Concepto->fields['ad_employee_id']."', '".$Concepto->fields['ad_concept_id']."', '".$Concepto->fields['assignment']."', '".$Concepto->fields['deduction']."', '".$Concepto->fields['description']."', '". $concep->formulate."', '". $Concepto->fields['quantity']."')";
            //die($q);
            $r2 = $conn->Execute($q);

            $Concepto->movenext();
         }

         $q = "DELETE FROM system.ad_payroll_calculated WHERE ad_payroll_calculated_id = '$JsonOp->ad_payroll_calculated_id' ";
         $RAux = $conn->Execute($q);

         //GUARDO LAS VARIABLES EN EL HISTORICO
         while(!$Variables->EOF){

            $variables = new variables;
            $var = $variables->get($conn, $Variables->fields['ad_variables_id']);

            $q ="INSERT INTO system.ad_payroll_history_var (ad_payroll_history_id, ad_employee_id, ad_variables_id, value, description)";
            $q.="values ($ad_payroll_history_id , '".$Variables->fields['ad_employee_id']."', '".$Variables->fields['ad_variables_id']."', '".$Variables->fields['value']."', '".$var->name."')";
            //die($q);
            $r2 = $conn->Execute($q);

            if($r2){
               $q = "DELETE FROM system.ad_relation_var_employee WHERE ad_employee_id = '".$Variables->fields['ad_employee_id']."' AND ad_variables_id= '".$Variables->fields['ad_variables_id']."' ";
               $r = $conn->Execute($q);
            }

            $Variables->movenext();
         }
         //GUARDO LOS EMPLEADOS EN EL HISTORICO
         $Nominahist = new nomina;
         $nom = $Nominahist->addEmployeeHistory($conn, $ad_payroll_history_id, $ad_org_id, $Empleados, $_SESSION['id']);
         

         //PARA GUARDAR LAS RETENCIONES DE LA CAJA DE AHORRO
         if($Nomina->fields['vacation'] == 0){
            $ad_payroll_id = $Nomina->fields['ad_payroll_id'];
            $date_end = $Nomina->fields['date_end'];
            $cajaAhorro = new cajaAhorro;
            $ca = $cajaAhorro->addRetCA($conn, $ad_payroll_history_id, $ad_payroll_id, $date_end, $_SESSION['id']);
         }

         //PARA NOMINAS DE VACACIONES
         if($Nomina->fields['vacation']){
              $q = "SELECT * FROM system.ad_vacation_prepare ";
              $rPVac = $conn->Execute($q);
              while(!$rPVac->EOF){
                  $ad_employee_id = $rPVac->fields['ad_employee_id'];
                  $date_start = $rPVac->fields['date_start'];
                  $date_end = $rPVac->fields['date_end'];
                  $days = $rPVac->fields['days'];
                  $pending_days = $rPVac->fields['pending_days'];
                  $enjoyment = $rPVac->fields['enjoyment'];
                  $q = "SELECT * FROM system.ad_vacation WHERE ad_employee_id = $ad_employee_id";
                  $rV = $conn->Execute($q);
                  if($rV->EOF){
                      $q = "INSERT INTO system.ad_vacation(ad_employee_id, date_start_vac, date_end_vac, days_vac, pending_days_vac, enjoyment) 
                           VALUES ($ad_employee_id, '$date_start' ,'$date_end', $days, $pending_days, $enjoyment)";
                      $rExec = $conn->Execute($q);
                  }else{
                      $q = "UPDATE system.ad_vacation SET date_start_vac = '$date_start', date_end_vac = '$date_end', days_vac = $days, pending_days_vac = $pending_days, enjoyment = '$enjoyment' WHERE ad_employee_id=$ad_employee_id";
                      $rExec = $conn->Execute($q);
                  }
                  $q = "UPDATE system.ad_payroll_history_employee SET date_start_vac = '$date_start' , date_end_vac = '$date_end' WHERE ad_payroll_history_id = $ad_payroll_history_id AND ad_employee_id = $ad_employee_id";
                  $rExec = $conn->Execute($q);
                  $q = "DELETE FROM system.ad_payroll_employee WHERE ad_payroll_id = ".$Nomina->fields['ad_payroll_id']." AND ad_employee_id = $ad_employee_id";
                  $rExec = $conn->Execute($q);
                  if($enjoyment == '1'){//SI EL TRABAJADOR DISFRUTA LAS VACACIONES
                      $q = "UPDATE system.ad_employee SET nom_status_id = '2' WHERE ad_employee_id = $ad_employee_id";
                      $rExec = $conn->Execute($q);
                  }
                  $rPVac->movenext();
              }
              $q = "DELETE FROM system.ad_vacation_prepare";
              $rExec = $conn->Execute($q);
         }

         $resp = "NÓMINA CERRADA";
      }else{

         $resp = "NÓMINA NO CALCULADA";

      }
      echo $json->encode($resp);
   break;

   case 'ReversarNomina':
      
      $q ="SELECT * FROM system.ad_payroll_history_var WHERE ad_payroll_history_id='$JsonOp->ad_payroll_history_id'";
      $r = $conn->Execute($q);

      while(!$r->EOF){
         $nomina = new nomina;
         
         $nomina->ad_employee_id = $r->fields['ad_employee_id'];
         $nomina->ad_variables_id = $r->fields['ad_variables_id'];
         $nomina->valor = $r->fields['value'];

         $resp = $nomina->addVariables($conn, $nomina);


         $r->movenext();
      }
      
      $nom = new stdClass;
      try {
         $q = "DELETE FROM system.ad_savings_bank_det WHERE ad_payroll_history_id = '$JsonOp->ad_payroll_history_id' ";
         $resp = $conn->Execute($q);

         $q = "DELETE FROM system.ad_payroll_history WHERE ad_payroll_history_id = '$JsonOp->ad_payroll_history_id' ";
         $r = $conn->Execute($q);

         if($r){
            $nom->op = true;
            $nom->msj = "NÓMINA REVERSADA";
         }

      } catch (Exception $e) {
         $nom->op = false;
         $nom->msj =  "<b>ERROR REVERSANDO LA NÓMINA</b> <br>  ".$conn->ErrorMsg();
      }      
      
      echo $json->encode($nom);
   break;

   case 'NOMINAMERCANTIL.txt':

      $q = "SELECT ad_bank_id, bank, account_number FROM system.ad_bank WHERE ad_bank_id = $JsonOp->ad_bank_id";
      $rC = $conn->Execute($q);

      $Banco=$rC->fields['ad_bank_id'];
      $q = "SELECT sum(a.assignment - a.deduction) valor FROM system.ad_payroll_history_concept a
            WHERE a.ad_payroll_history_id = $JsonOp->ad_payroll_history_id ";
      //die($q);
      $rN = $conn->Execute($q);

      switch ($JsonOp->ad_bank_id) {

         case '2':
            
            $q = "SELECT sum(a.assignment - a.deduction) valor, b.identification, b.bank_account, b.email, c.name tipoident, b.ad_bank_id, concat(b.name2,' ', b.name) nombre 
                  FROM system.ad_payroll_history_concept a  
                  INNER JOIN system.ad_employee b ON (b.ad_employee_id = a.ad_employee_id)
                  INNER JOIN system.customers_initial c ON (c.customers_initial_id = b.customer_initial_id ) 
                  WHERE a.ad_payroll_history_id = $JsonOp->ad_payroll_history_id
                  GROUP BY b.identification, b.bank_account, b.email,c.name, b.ad_bank_id, b.name2, b.name 
                  ORDER BY b.identification ";
            //die($q);
            $r = $conn->Execute($q);
            $fp = fopen("NOMINAMERCANTIL.txt","w");

            //Inicio Cabecera
            $tipoRegCab = 1;
               $registro = $tipoRegCab; //Campo 1
            
            $IdentBanco = "BAMRVECA";
               $registro.= $IdentBanco; //Campo 2
               for($i=0;$i<(12-strlen($IdentBanco));$i++){
                  $registro.=" ";
               }

            $NroLote = "000000000000001";
               $registro.= $NroLote; //Campo 3
               for($i=0;$i<(15-strlen($NroLote));$i++){
                  $registro.=" ";
               }

            $tipoProd = "NOMIN";
               $registro.= $tipoProd; //Campo 4

            $tipoPago = "0000000222";
               
               for($i=0;$i<(10-strlen($tipoPago));$i++){
                  $registro.="0";
               }
               $registro.= $tipoPago; //Campo 5

            $TipoIdentEmpresa ="J";
               $registro.= $TipoIdentEmpresa; //Campo 6

            $RifEmpresa ="411938173";
               
               for($i=0;$i<(15-strlen($RifEmpresa));$i++){
                  $registro.="0";
               }
               $registro.= $RifEmpresa; //Campo 7

            $TotalTrabajadores = $r->RecordCount();
               for($i=0;$i<(8-strlen($TotalTrabajadores));$i++){
                  $registro.="0";
               }
            $registro.=$TotalTrabajadores; //Campo 8

            $MontoTotal = str_replace(".","",$rN->fields['valor']);
               for($i=0;$i<(17-strlen($MontoTotal));$i++){
                  $registro.="0";
               }
            $registro.=$MontoTotal; //Campo 9

            $FechaPago = str_replace("-","",date("Y-m-d"));
            $registro.= $FechaPago; //Campo 10

            

            $CuentaInstitucion = trim(str_replace(".","",str_replace("-","",$rC->fields['account_number'])));
            $registro.= $CuentaInstitucion; //Campo 11
            
            for($i = 0; $i < 7; $i++){//Valor fijo ceros
                  $registro.="0";//Campo 12
            }

            for($i = 0; $i < 8; $i++){//
                  $registro.="0";//Campo 13
            }

            for($i = 0; $i < 4; $i++){//
                  $registro.="0";//Campo 14
            }

            for($i = 0; $i < 8; $i++){//Varlo fijo: Ceros
                  $registro.="0";//Campo 15
            }

            for($i = 0; $i < 261; $i++){//Varlo fijo: Ceros
                  $registro.="0";//Campo 16
            }
            //Fin Cabecera

            fputs($fp,$registro);
            fwrite($fp,"\r\n");
            
            $total=1;
            $tipoRegDet = 2;

            foreach ($r as $key => $rv) {
               # code...
            //}

            //while(!$r->EOF){

               $registro = $tipoRegDet; //Campo 1

               $registro.= $rv['tipoident']; //Campo 2

               $cedula=str_replace(".","",$rv['identification']);
                  for($i=0;$i<(15-strlen($cedula));$i++){
                     $registro.="0";
                  }
               $registro.=$cedula; //Campo 3

               ($rv['ad_bank_id'] == $JsonOp->ad_bank_id) ? 
               $registro.= 1 //Campo 4
               :
               $registro.= 3; //Campo 4;

               for($i = 0; $i < 12; $i++){
                  $registro.="0"; //Campo 5
               }

               for($i = 0; $i < 30; $i++){
                  $registro.=" "; //Campo 6
               }

               $cuenta=trim(str_replace(".","",str_replace("-","",$rv['bank_account'])));
                  for($i=0;$i<(20-strlen($cuenta));$i++){
                     $registro.="0";
                  }
               $registro.=$cuenta; //Campo 7

               $monto=str_replace(".","",$rv['valor']);
                  for($i=0;$i<(17-strlen($monto));$i++){
                     $registro.="0";
                  }
               $registro.=$monto; //Campo 8

               $cedula=str_replace(".","",$rv['identification']);
               $registro.=$cedula; //Campo 9
               
                  for($i=0;$i<(16-strlen($cedula));$i++){
                     $registro.=" ";
                  }
               
               $tipoPago = "0000000222";
                  for($i=0;$i<(10-strlen($tipoPago));$i++){
                     $registro.="0";
                  }
               $registro.= $tipoPago; //Campo 10

               for($i = 0; $i < 3; $i++){
                  $registro.="0"; //Campo 11
               }

               $registro.= $rv['nombre']; //Campo 12
               for($i=0;$i<(60-strlen($rv['nombre']));$i++){
                     $registro.=" ";
                  }
               
               for($i = 0; $i < 15; $i++){
                  $registro.="0"; //Campo 13
               }

               $registro.= $rv['email']; //Campo 14
               for($i=0;$i<(50-strlen($rv['email']));$i++){
                     $registro.=" ";
                  }

               for($i = 0; $i < 4; $i++){
                  $registro.="0"; //Campo 15
               }

               for($i = 0; $i < 30; $i++){
                  $registro.=" "; //Campo 16
               }

               for($i = 0; $i < 80; $i++){
                  $registro.=" "; //Campo 17
               }

               for($i = 0; $i < 35; $i++){
                  $registro.="0"; //Campo 18
               }


               fputs($fp,trim($registro));
               fwrite($fp,"\r\n");
               /*if($key < $TotalTrabajadores-1){
                  //break;
                  fwrite($fp,"\r\n");
               }*/
               
               //$total++;
               //$r->movenext();
            }
            fclose($fp);


            $handle = fopen("NOMINAMERCANTIL.txt", "r");
            if ($handle){
                $text = "";
                while (!feof($handle)) {
                    $txt = trim(fgets($handle));
                    if(!empty($txt)){
                        $text .= $txt."\n";
                    }
                }
            }
            //
            fclose($handle);
            $handle = fopen("NOMINAMERCANTIL.txt", "w");
            fputs($handle,trim($text));
            fclose($handle);

            $nuevo = "NOMINAMERCANTIL_".$JsonOp->ad_payroll_history_id.".txt";
            copy($JsonOp->form, "txt/".$nuevo);
            
            $resp = new nomina;

            $resp->info = "TXT Generado";
            $resp->archivo = $nuevo;

            echo $json->encode($resp);

         break;

      }


   break;

   case "FAOV.txt":

      $Mes = strlen($JsonOp->ad_month_id)==1 ? ("0".$JsonOp->ad_month_id) : $JsonOp->ad_month_id;
      $Anio = $JsonOp->anio;
      $ad_company_id = $JsonOp->ad_company_id;

      $q ="SELECT b.name nac, replace(a.identification,'.','')::int AS identification, a.name nombres,  a.name2 ";
      $q.="apellidos, ((sum(c.deduction)/0.01)+a.social_benefits)::numeric(53,2) monto, a.datein, a.nom_status_id, ";
      $q.="CASE WHEN a.nom_status_id=3 THEN a.dateout ELSE null END dateout, a.ad_company_id ";
      $q.="FROM system.ad_employee a ";
      $q.="INNER JOIN system.customers_initial b ON (b.customers_initial_id = a.customer_initial_id) ";
      $q.="INNER JOIN system.ad_payroll_history_concept c ON (c.ad_employee_id = a.ad_employee_id) ";
      $q.="INNER JOIN system.ad_payroll_history d ON (d.ad_payroll_history_id = c.ad_payroll_history_id) ";
      $q.="WHERE c.ad_concept_id IN (12, 15, 29, 32) ";
      $q.="AND CASE WHEN c.ad_concept_id = '29' THEN to_char(d.date_start,'mm')='$Mes' ELSE to_char(d.date_end,'mm')='$Mes' END ";
      $q.="AND to_char(d.date_end,'yyyy')='$Anio' ";
      $q.= !empty($ad_company_id) ? "AND a.ad_company_id = $ad_company_id " : "";
      $q.="GROUP BY 1,2,3,4,6,7,8,9,a.social_benefits ";
      $q.="ORDER BY 3 ";
      //die($q);
            $r = $conn->Execute($q);
         //die("-".$r);
            $fp = fopen("FAOV.txt","w");
         //while(!$r->EOF){
         foreach ($r as $key => $txt) {
            
            $CedulaLetra= $txt['nac'];
            $CedulaNumero=str_replace(".","",$txt['identification']);
            $registro=$CedulaLetra.",".$CedulaNumero.",";
            $NombreAux=explode(" ",str_replace(".","",trim($txt['nombres'])),25);
            $ApellidoAux=explode(" ",str_replace(".","",trim($txt['apellidos'])),25);
            if(is_array($NombreAux) && (count($NombreAux)>1 || count($ApellidoAux)>1) ){
               $PrimerNombre= is_array($NombreAux) ? utf8_decode(@$NombreAux[0]) : utf8_decode($NombreAux);
               $SegundoNombre= is_array($NombreAux) ? utf8_decode(@$NombreAux[1]) : "";
               $PrimerApellido= is_array($ApellidoAux) ? utf8_decode(@$ApellidoAux[0]) : "";
               $SegundoApellido= is_array($ApellidoAux) ? utf8_decode(@$ApellidoAux[1]) : "";
               $registro.= $PrimerNombre.",".$SegundoNombre.",".$PrimerApellido.",".$SegundoApellido.",";
            }
            else{
               $PrimerNombre= is_array($NombreAux) ? utf8_decode(@$NombreAux[0]) : utf8_decode($NombreAux);
               $PrimerApellido= is_array($ApellidoAux) ? utf8_decode(@$ApellidoAux[0]) : "";
               $registro.= $PrimerNombre.",,".$PrimerApellido.",,";
            }
            $Monto= !empty($txt['monto']) ? $txt['monto'] : 0;
            
            $Monto=str_replace(".","",str_replace(",","",muestrafloat($Monto)));
            $registro.=$Monto.",";
            $FechaIngreso=explode("-",$txt['datein'],12);
            $registro.=$FechaIngreso[2].$FechaIngreso[1].$FechaIngreso[0].",";
            $FechaEgreso=explode("-",$txt['dateout'],12);
            if(!empty($txt['dateout']))
            if($FechaEgreso[1] <= $Mes && $FechaEgreso[0] <= $Anio)
               $registro.=($txt['nom_status_id'] == 3) ? $FechaEgreso[2].$FechaEgreso[1].$FechaEgreso[0]:'';
            fputs($fp,$registro);
            fwrite($fp,"\r\n");
            //$r->movenext();
         }
         fclose($fp);

         $nuevo = "N03214119381732899165".$Mes."".$Anio.".txt";
         copy($JsonOp->form, "txt/".$nuevo);

         $resp = new nomina;

         $resp->info = "TXT Generado";
         $resp->archivo = $nuevo;

         echo $json->encode($resp);

      break;

      case 'feriado':  //FERIADOS
         switch($JsonOp->Accion){
            case 0:{
               $q="SELECT * FROM system.ad_holidays WHERE date_start='$JsonOp->Fecha'";
               $r= $conn->Execute($q);
               if($r->EOF){
                  $q = "INSERT INTO system.ad_holidays (date_start) VALUES ('$JsonOp->Fecha')";
                  $RAux = $conn->Execute($q);
                  $Estatus=1;
               }else{
                  $q = "DELETE FROM system.ad_holidays WHERE date_start='$JsonOp->Fecha'";
                  $RAux = $conn->Execute($q);
                  $Estatus=2;
               }
               echo $Estatus;
               break;
            }
            case 1:{
               $q = "DELETE FROM system.ad_holidays WHERE to_char(date_start,'YYYY')='$JsonOp->Ano'";
               $RAux = $conn->Execute($q);
               echo true;
               break;
            }
            case 2:{
               for($Mes=1;$Mes<=12;$Mes++){
                  for($Dia=1;$Dia<=DiaFin($Mes);$Dia++){
                     if(date("l",mktime(0,0,0,$Mes,$Dia,$JsonOp->Ano))=="Saturday" || date("l",mktime(0,0,0,$Mes,$Dia,$JsonOp->Ano))=="Sunday"){
                        $Fecha=$JsonOp->Ano."-".$Mes."-".$Dia;
                        $q="SELECT * FROM system.ad_holidays WHERE date_start='$Fecha'";
                        $r= $conn->Execute($q);
                        if($r->EOF){
                           $q = "INSERT INTO system.ad_holidays (date_start) VALUES ('$Fecha')";
                           $RAux = $conn->Execute($q);
                        }
                     }
                  }
               }
               echo true;
               break;
            }
         }
         break;

         case 'preVacaciones':  //VACACIONES
            switch($JsonOp->Accion){
               case 0:{
                  $q = "SELECT a.value FROM system.ad_constant AS a WHERE a.ad_constant_id = 15 "; // Dias de Disfrute
                  //die($q);
                  $rD = $conn->Execute($q);
                  $DiasDisfrute= !$rD->EOF ? $rD->fields['value'] : 0;

                  $q = "SELECT a.ad_employee_id, (a.name || ' ' || a.name2)  empleado, a.datein  
                     FROM system.ad_employee a 
                     INNER JOIN system.ad_payroll_employee b ON (b.ad_employee_id = a.ad_employee_id)
                     WHERE a.nom_status_id ='1' AND b.ad_payroll_id ='$JsonOp->ad_payroll_id'
                     ORDER BY 2 ";
                  //die($q);
                  $rT = $conn->Execute($q);
                  $j=0;
                  $Resul = array();
                  while(!$rT->EOF){
                     $AnosAntiguedad=(strtotime(($JsonOp->date_start)) - strtotime($rT->fields['datein']))/31536000;
                     if($AnosAntiguedad>=1){ //AQUI
                        $DiasF=$DiasDisfrute;

                        if($AnosAntiguedad >=2)
                           $DiasF=$DiasDisfrute + (int)$AnosAntiguedad-1;

                        $Resul[$j]['CI']= $rT->fields['ad_employee_id'];
                        $Resul[$j]['N']= $rT->fields['empleado'];
                        $Resul[$j]['FI']= muestrafecha($rT->fields['datein']);
                        $Resul[$j]['FIV']= muestrafecha($JsonOp->date_start);
                        $Resul[$j]['FFV']= FechaFinVacaciones($conn,$JsonOp->date_start,$DiasF);
                        $Resul[$j]['DI']= $DiasF;
                        $j++;
                     }
                     $rT->movenext();
                  }

                  if(is_array($Resul)){
                     echo $json->encode($Resul);
                  }else{
                     echo 0;
                  }

                  break;
               }
               case 1:{
                  $q = "SELECT * FROM system.ad_payroll WHERE ad_payroll_id = $JsonOp->ad_payroll_id_vac";
                  //die($q);
                  $rC = $conn->Execute($q);
                  if(!$rC->EOF){
                     $ad_payroll_id = $rC->fields['ad_payroll_id'];
                     foreach($JsonOp->Trabajadores AS $Trabajador){
                        if($Trabajador[5]){
                           $q = "DELETE FROM system.ad_payroll_employee 
                                 WHERE ad_payroll_id=$ad_payroll_id AND ad_employee_id = $Trabajador[0]";
                           $rExec = $conn->Execute($q);
                           $q = "INSERT INTO system.ad_payroll_employee (created, createdby,ad_payroll_id,ad_employee_id) 
                                 VALUES (now(), $ad_user_id, $ad_payroll_id,$Trabajador[0])";
                                 //die($q);
                           $rExec = $conn->Execute($q);
                           $FechaIni=guardafecha($Trabajador[1]);
                           $FechaFin=guardafecha($Trabajador[2]);
                           $q = "DELETE FROM system.ad_vacation_prepare WHERE ad_employee_id=$Trabajador[0]";
                           $rExec = $conn->Execute($q);
                           $q = "INSERT INTO system.ad_vacation_prepare (ad_employee_id, date_start, date_end, days, pending_days, enjoyment) 
                                 VALUES ($Trabajador[0], '$FechaIni', '$FechaFin', $Trabajador[3], $Trabajador[4], '$Trabajador[6]')";
                           $rExec = $conn->Execute($q);
                        }else{
                           $q = "DELETE FROM system.ad_payroll_employee  
                                 WHERE ad_payroll_id=$ad_payroll_id AND ad_employee_id = $Trabajador[0]";
                           $rExec = $conn->Execute($q);
                           $q = "DELETE FROM system.ad_vacation_prepare 
                                 WHERE ad_employee_id=$Trabajador[0]";
                           $rExec = $conn->Execute($q);
                           $q = "SELECT * FROM system.ad_vacation WHERE ad_employee_id=$Trabajador[0]";
                           $rV = $conn->Execute($q);
                           if($rV->EOF){
                              $q = "INSERT INTO system.ad_vacation(ad_employee_id, pending_days_vac, enjoyment) 
                                    VALUES ($Trabajador[0],$Trabajador[4],'0')";
                              $rExec = $conn->Execute($q);
                           }else{
                              $q = "UPDATE system.ad_vacation SET pending_days_vac=$Trabajador[4], enjoyment='$Trabajador[6]' WHERE ad_employee_id=$Trabajador[0]";
                              $rExec = $conn->Execute($q);
                           }
                        }
                     }
                     echo true;
                  }else{
                     echo false;
                  }
                  break;
               }
               case 2:  {
                  $q = "SELECT a.ad_employee_id, (a.name || ' ' || a.name2)  empleado, a.datein, b.date_start,
                     b.date_end, b.days, b.pending_days, b.enjoyment 
                     FROM system.ad_employee a 
                     INNER JOIN system.ad_vacation_prepare b ON (b.ad_employee_id = a.ad_employee_id)
                     WHERE a.nom_status_id ='1' 
                     ORDER BY 2 ";
                     //die($q);
                  $rV = $conn->Execute($q);
                  $j=0;
                  $Resul = array();
                  while(!$rV->EOF){
                     $Resul[$j]['CI']= $rV->fields['ad_employee_id'];
                     $Resul[$j]['N']= $rV->fields['empleado'];
                     $Resul[$j]['FI']= muestrafecha($rV->fields['datein']);
                     $Resul[$j]['FIV']= muestrafecha($rV->fields['date_start']);
                     $Resul[$j]['FFV']= muestrafecha($rV->fields['date_end']);
                     $Resul[$j]['D']= $rV->fields['days'];
                     $Resul[$j]['DP']= $rV->fields['pending_days'];
                     $Resul[$j]['DIS']= $rV->fields['enjoyment'];
                     $j++;
                     $rV->movenext();
                  }
                  if(is_array($Resul)){
                     echo $json->encode($Resul);
                  }else{
                     echo 0;
                  }
               break;
               }
               case 3:{
                  echo FechaFinVacaciones($conn,guardafecha($JsonOp->FechaIni),$JsonOp->Dias);
                  break;
               }
               case 4:{
                  $Dias= intval((strtotime(guardafecha($JsonOp->FechaFin))-strtotime(guardafecha($JsonOp->FechaIni)))/86400);

                  $DiasTotal=$Dias+1;
                  $Fecha = guardafecha($JsonOp->FechaIni);
                  for($i=0;$i<$Dias;$i++){
                     $q = "SELECT * FROM system.ad_holidays WHERE date_start='$Fecha' ";
                     $rF = $conn->Execute($q);
                     if(!empty($rF->fields['date_start'])){
                        $DiasTotal--;
                     }
//                   echo "Fecha: ".$Fecha." Dias: ".$DiasTotal."Feriado=".$rF->EOF."\n";
                     $Fecha=guardafecha(FechaIni('0','-',$Fecha,2,0));

                  }//die("dias: ".$DiasTotal);
                  echo  $DiasTotal;
                  break;
               }
               case 5:{
                  for($Mes=1;$Mes<=12;$Mes++){
                     for($Dia=1;$Dia<=DiaFin($Mes);$Dia++){
                        if(date("l",mktime(0,0,0,$Mes,$Dia,$JsonOp->Ano))=="Saturday" || date("l",mktime(0,0,0,$Mes,$Dia,$JsonOp->Ano))=="Sunday"){
                           $Fecha=$JsonOp->Ano."-".$Mes."-".$Dia;
                           $q="SELECT * FROM system.ad_holidays WHERE date_start='$Fecha'";
                           $r= $conn->Execute($q);
                           if($r->EOF){
                              $q = "INSERT INTO system.ad_holidays (date_start) VALUES ('$Fecha')";
                              $RAux = $conn->Execute($q);
                           }
                        }
                     }
                  }
                  echo true;
                  break;
               }
            }
            break;
         
      

}

?>
