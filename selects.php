<?php
include("adodb/adodb.inc.php");
include("lib/librerias.php"); 


switch (@$_REQUEST['combo']){

  case "ciudades_sinpais":

    $ide = $_REQUEST['ide'];
    echo superCombo($conn, "SELECT ad_city_id id, name descripcion FROM system.ad_city WHERE ad_state_id = '$ide' ORDER BY name", '', 'ad_city_id', 'ad_city_id', 'width:100%', "",'id','descripcion','','','','Seleccione','form-control');
  break;


  case "ciudades":

    $ide = $_REQUEST['ide'];
    $idc = $_REQUEST['idc'];

    echo superCombo($conn, "SELECT ad_city_id id, name descripcion FROM system.ad_city WHERE ad_state_id = '$ide' ORDER BY name", $idc, 'ad_city_id', 'ad_city_id', 'width:100%', "",'id','descripcion','','','','Seleccione','form-control');
  break;

  case "estado":

    $idp = $_REQUEST['idp'];
    $ide = $_REQUEST['ide'];

    $q = "SELECT ad_state_id id, name descripcion FROM system.ad_state WHERE ad_country_id = '$idp' ";
    echo superCombo($conn, $q, $ide, 'ad_state_id','ad_state_id','width:100%', "traeCiudades(this.value,0);",'id','descripcion','','','','Seleccione','form-control input-group');
 
   break;
  
   case "padreOperaciones":
    $ad_modules_id = $_REQUEST['ad_modules_id'];
      @$ad_operations_id = $_REQUEST['ad_operations_id'];
      $op = new operaciones;

       $select = "<label>";
       $select.= "Pertenece A";
      $select.= superCombo($conn, $op->getCarpetas($conn, $ad_modules_id), $ad_operations_id, 'id_padre','id_padre','width:100%', "desactivaNivel1(this.value);",'id','descripcion','','','','Seleccione','form-control input-group');
      $select.= "<label>";

      echo $select;

      
   break;
  
   case "trabajadores":

    $ad_payroll_id = $_REQUEST['ad_payroll_id'];
    $ad_company_id = @$_REQUEST['ad_company_id'];

    $q ="SELECT a.ad_employee_id id, CONCAT(a.name,' ',a.name2) descripcion 
    FROM system.ad_employee a
    INNER JOIN system.ad_payroll_employee b on (b.ad_employee_id = a.ad_employee_id)
    WHERE b.ad_payroll_id = '$ad_payroll_id' AND a.ad_company_id='$ad_company_id' AND a.nom_status_id !=3 AND a.isactive ='Y' 
    ORDER BY a.name";
    $r = $conn->Execute($q);
    //die($q);

    $obj = new nomina;
    $obj->cant = $r->RecordCount();

    $obj->select = "<label>";
    $obj->select = "Trabajadores en Nómina";
    $obj->select.= superCombo($conn, $q, '', 'ad_employee_id','ad_employee_id','width:100%', "",'id','descripcion','','','multiple','','form-control input-group');
    $obj->select.= "<label>";

    $json=new Services_JSON();
    echo $json->encode($obj);
    //echo $obj;
      
    break;
  
   case "trabajadores2":

    $ad_payroll_id = $_REQUEST['ad_payroll_id'];
    $ad_payroll_id2 = $_REQUEST['ad_payroll_id2'];
    $ad_company_id = @$_REQUEST['ad_company_id'];

    $q ="SELECT a.ad_employee_id id, CONCAT(a.name,' ',a.name2) descripcion 
    FROM system.ad_employee a
    INNER JOIN system.ad_payroll_employee b on (b.ad_employee_id = a.ad_employee_id)
    WHERE b.ad_payroll_id = '$ad_payroll_id2' AND a.ad_company_id='$ad_company_id' AND a.nom_status_id !=3 AND a.isactive ='Y' 
    AND a.ad_employee_id NOT IN (SELECT ad_employee_id FROM system.ad_payroll_employee WHERE ad_payroll_id = $ad_payroll_id)
    ORDER BY a.name ";
    $r = $conn->Execute($q);
    //die($q);

    $obj = new nomina;
    $obj->cant = $r->RecordCount();

    $obj->select = "<label>";
    $obj->select = "Trabajadores Disponibles";
    $obj->select.= superCombo($conn, $q, '', 'ad_employee_id2','ad_employee_id2','width:100%', "",'id','descripcion','','','multiple','','form-control input-group');
    $obj->select.= "<label>";

    $json=new Services_JSON();
    echo $json->encode($obj);
    //echo $obj;
      
    break;
  
   case "historial_trabajadores":

    $ad_payroll_history_id = $_REQUEST['ad_payroll_history_id'];
 
    $q ="SELECT ad_employee_id id, CONCAT(name,' ',name2) descripcion FROM system.ad_payroll_history_employee WHERE ad_payroll_history_id = '$ad_payroll_history_id' ";
    $select = "<label>";
    $select.= "Trabajadores en Nómina";
    $select.= superCombo($conn, $q, '', 'ad_employee_id','ad_employee_id','width:100%', "",'id','descripcion','','','multiple','','form-control input-group');
    $select.= "<label>";

    echo $select;

      
    break;
  
   case "nomina":

    $ad_company_id = @$_REQUEST['ad_company_id'];
    $ad_payroll_id = @$_REQUEST['ad_payroll_id'];

    $q ="SELECT ad_payroll_id id, description descripcion FROM system.ad_payroll WHERE ad_company_id='$ad_company_id'  ORDER BY 2";
    //die($q);
    $select = "<label>";
    $select.= "Nómina";
    $select.= superCombo($conn, $q, "$ad_payroll_id", 'ad_payroll_id','ad_payroll_id','width:100%', "traeTrabajadores(this.value);",'id','descripcion','','','','Seleccione Nómina','form-control input-group');
    $select.= "<label>";

    echo $select;

      
    break;
  
   case "nomina2":

    $ad_company_id = @$_REQUEST['ad_company_id'];
    $ad_payroll_id = @$_REQUEST['ad_payroll_id'];

    $q ="SELECT ad_payroll_id id, description descripcion FROM system.ad_payroll WHERE ad_company_id='$ad_company_id'  ORDER BY 2";
    //die($q);
    $select = "<label>";
    $select.= "Nómina";
    $select.= superCombo($conn, $q, "$ad_payroll_id", 'ad_payroll_id2','ad_payroll_id2','width:100%', "traeTrabajadores2(this.value);",'id','descripcion','','','','Seleccione Nómina','form-control input-group');
    $select.= "<label>";

    echo $select;

      
    break;
  
   case "nomina_vac":

    $ad_company_id = @$_REQUEST['ad_company_id'];
    $ad_payroll_id = @$_REQUEST['ad_payroll_id'];

    $q ="SELECT ad_payroll_id id, description descripcion FROM system.ad_payroll 
        WHERE ad_company_id='$ad_company_id' AND vacation ='1'
        ORDER BY 2";
    //die($q);
    $select = "<label>";
    $select.= "Nómina Para Vacaciones: ";
    $select.= superCombo($conn, $q, "$ad_payroll_id", 'ad_payroll_id_vac','ad_payroll_id_vac','width:100%', "",'id','descripcion','','','','','form-control input-group');
    $select.= "<label>";

    echo $select;

      
    break;

    case "consulta_vehiculos":

      $fs_vehicle_brand_id = @$_REQUEST['fs_vehicle_brand_id'];
      $q ="SELECT fs_vehicle_model_id id, name descripcion FROM system.fs_vehicle_model WHERE fs_vehicle_brand_id='$fs_vehicle_brand_id' order by name";
      //die($q);
      
      $select = "<label>";
      $select.= "Modelo del Vehiculo";
      $select.= superCombo($conn, $q, 'fs_vehicle_model_id', 'fs_vehicle_model_id','fs_vehicle_model_id','width:100%', "TraeMotor(this.value);",'id','descripcion','','','','Seleccione Modelo','form-control input-group');
      $select.= "<label>";
  
      echo $select;
      break;

    case "consulta_vehiculos2":

      $fs_vehicle_model_id = @$_REQUEST['fs_vehicle_model_id'];
      $q ="SELECT fs_vehicle_motor_id id, name descripcion FROM system.fs_vehicle_motor WHERE fs_vehicle_model_id='$fs_vehicle_model_id'";
      //die($q);
      
      $select = "<label id ='lblmotor' name='lblmotor'>";
      $select.= "Motor del Vehiculo";
      $select.= superCombo($conn, $q, 'fs_vehicle_motor_id', 'fs_vehicle_motor_id','fs_vehicle_motor_id','width:100%', "TraeFiltros(this.value);",'id','descripcion','','','','Seleccione Motor','form-control input-group');
      $select.= "<label>";
  
      echo $select;
      break;

      case "consulta_vehiculos3":

        $fs_vehicle_motor_id = @$_REQUEST['fs_vehicle_motor_id'];
        $q ="SELECT fs_vehicle_liters_id id, filters descripcion, liters , thread FROM system.fs_vehicle_liters WHERE fs_vehicle_motor_id='$fs_vehicle_motor_id'";
        $r = $conn->Execute($q);
        //die($q);
      while(!$r->EOF){
          $descripcion = $r->fields['descripcion'];
          $liters = $r->fields['liters'];
          $thread = $r->fields['thread'];
          $fs_vehicle_motor_id = $r->fields['id'];
          $r->movenext();
        }
        
        if(empty($descripcion)){
          $descripcion = "";
        }
        if(empty($liters)){
          $liters = "";
        }
        if(empty($thread)){
          $thread = "";
        }
        
        $select = "<div class='col-sm-3'>";
        $select.= "<div class='input-group'>";
        $select.= "<label>";
        $select.= "Filtros del Vehiculo";
        $select.= "<input type='text' class='form-control' placeholder='' name='filters' id='filters' value='$descripcion'";
        $select.= "<label>";
        $select.= "</div>";
        $select.= "</div>";
        $select.= "<div class='col-sm-3'>";
        $select.= "<div class='input-group'>";
        $select.= "<label>";
        $select.= "Litros Requeridos";
        $select.= "<input type='text' class='form-control' placeholder='' name='liters' id='liters' value='$liters'";
        $select.= "<label>";
        $select.= "</div>";
        $select.= "</div>";
        $select.= "<div class='col-sm-3'>";
        $select.= "<div class='input-group'>";
        $select.= "<label>";
        $select.= "Rosca IN";
        $select.= "<input type='text' class='form-control' placeholder='' name='thread' id='thread' value='$thread'";
        $select.= "<label>";
        $select.= "</div>";
        $select.= "</div>";
        $select.= "</div>";
    
        echo $select;
        break;




      case "egresos":

        $created = @$_REQUEST['created'];
        $q ="select
        dc.daily_closing_id
        from system.daily_closing dc 
        where dc.start_date = current_date";
        $r = $conn->Execute($q);
        //die($q);
        if(!empty($r->fields['daily_closing_id'])){

        }else{
        $select = "<div class='col-sm-3'>";
        $select.= "<div class='input-group'>";
        $select.= "<label>";
        $select.= "Monedas";
        $q2 = "SELECT c_currency_id id, (description || ' - ' || cursymbol) descripcion FROM system.c_currency ORDER BY c_currency_id ASC";
        $select.= superCombo($conn, $q2, 'c_currency_id', 'c_currency_id','c_currency_id','width:100%', "",'id','descripcion','','','','','form-control input-group');
        $select.= "</label>";
        $select.= "</div>";
        $select.= "</div>";
        $select.= "<div class='col-sm-3'>";
        $select.= "<div class='input-group'>";
        $select.= "<label>";
        $select.= "Egresos";
        $q2 = "SELECT m_product_type_id id, name descripcion FROM system.m_product_type";
        $select.= superCombo($conn, $q2, 'm_product_type_id', 'm_product_type_id','m_product_type_id','width:100%', "",'id','descripcion','','','','','form-control input-group');
        $select.= "<label>";
        $select.= "</div>";
        $select.= "</div>";
        $select.= "<div class='col-sm-3'>";
        $select.= "<div class='input-group'>";
        $select.= "<label>";
        $select.= "Concepto del Egreso";
        $q2 = "SELECT expenses_concept_id id, name descripcion FROM system.expenses_concept WHERE expenses_concept_id <> 1";
        $select.= superCombo($conn, $q2, 'expenses_concept_id', 'expenses_concept_id','expenses_concept_id','width:100%', "",'id','descripcion','','','','','form-control input-group');
        $select.= "<label>";
        $select.= "</div>";
        $select.= "</div>";
        $select.= "<div class='col-sm-3'>";
        $select.= "<div class='input-group'>";
        $select.= "<label>";
        $select.= "Monto";
        $select.= "<input type='text' class='form-control' name='monto'
        id='monto' onkeypress='return(formatoNumero(this,event));' autocomplete='off' 
        value=''>";
        $select.= "<label>";
        $select.= "</div>";
        $select.= "</div>";
        $select.= "</div>";
    
        echo $select;
      }
        break;


   case "prestamo_trabajador":

    $ad_departament_id = @$_REQUEST['ad_departament_id'];
    $q ="SELECT ad_employee_id id, CONCAT(name,' ',name2) descripcion FROM system.ad_employee WHERE ad_departament_id='$ad_departament_id'  ORDER BY 2";
    //die($q);
    
    $select = "<label>";
    $select.= "Trabajador";
    $select.= superCombo($conn, $q, 'ad_employee_id', 'ad_employee_id','ad_employee_id','width:100%', "0",'id','descripcion','','','','','form-control input-group');
    $select.= "<label>";

    echo $select;
    break;

    case "debito_prestamo":

      $ad_concept_loans_id = $_REQUEST['ad_concept_loans_id'];
    
      $q ="SELECT ae.ad_employee_id id, 
      CONCAT(name,' ',name2) descripcion,
      COUNT(ae.ad_employee_id) 
      FROM system.ad_employee ae
      inner join system.ad_loans al on (al.ad_employee_id = ae.ad_employee_id )
      where 
      al.ad_concept_loans_id =  $ad_concept_loans_id 
      group by ae.ad_employee_id,ae.name,ae.name2 
      ORDER BY name";
      $r = $conn->Execute($q);
      //die($q);

      $obj = new adeudos;
      $obj->cant = $r->RecordCount();
      $obj->select = "<label>";
      $obj->select.= "Trabajadores";
      $obj->select.= superCombo($conn, $q, '', 'ad_employee_id','ad_employee_id','width:100%', "",'id','descripcion','','','multiple','','form-control input-group');
      $obj->select.= "<label>";
  
      $json=new Services_JSON();
      echo $json->encode($obj);
      //echo $obj;
        
      break;

   case "debito_prestamo3":

    $ad_employee_id = @$_REQUEST['ad_employee_id2'];
    $q ="select 
    al.ad_loans_id,
    acl.ad_concept_loans_id  as id,
    acl. name as descripcion
    from 
    system.ad_loans al
    inner join system.ad_employee ae on (ae.ad_employee_id = al.ad_employee_id)
    inner join system.ad_concept_loans acl on (acl.ad_concept_loans_id = al.ad_concept_loans_id)
    where 
    ae.ad_employee_id = $ad_employee_id";
    //die($q);
    
    $select = "<label>";
    $select.= "Conceptos";
    $select.= superCombo($conn, $q, 'ad_loans_id2', 'ad_loans_id2','ad_loans_id2','width:100%', "",'id','descripcion','','','','Seleccione','form-control input-group');
    $select.= "<label>";

    echo $select;
    break;

   case "debito_prestamo2":

    $ad_loans_id = @$_REQUEST['ad_loans_id'];
    $collection=array();
    $qvalidacion = "select 
    alh.debit_numbers as cuota 
    from system.ad_loans_history alh 
    where alh.ad_loans_id = $ad_loans_id";
    $rvalid = $conn->Execute($qvalidacion);
    if(!empty($rvalid->fields['cuota'])){
    
    $q ="select 
    alh.debit_numbers+1 as cuota, 
    alh.debit_numbers, 
    al.total,
    acl.loans_numbers,
    (al.total / acl.loans_numbers)as debit
    from system.ad_concept_loans acl 
    inner join system.ad_loans al on (al.ad_concept_loans_id = acl.ad_concept_loans_id)
    inner join system.ad_loans_history alh on (alh.ad_loans_id = al.ad_loans_id )
    where alh.ad_loans_id = $ad_loans_id
    order by alh.debit_numbers desc
    limit 1";
    //die($q);
    $r = $conn->Execute($q);

    if($r->fields['debit_numbers']>=$r->fields['loans_numbers']){
      $collection[0] = "PP";
    }else{

    $q2 = "select 
    (al.total - SUM(alh.debit)) as SUM
    from system.ad_loans_history alh 
    inner join system.ad_loans al on (al.ad_loans_id = alh.ad_loans_id)
    where alh.ad_loans_id = $ad_loans_id
    group by al.total ";

    $r2 = $conn->Execute($q2);

    $collection[0] = $r->fields['cuota'];
    $collection[1] = muestrafloat($r->fields['total']);
    $collection[2] = muestrafloat($r->fields['debit']);
    $collection[3] = muestrafloat($r2->fields['sum']);
    }
    }else{
    $q = "select 
    al.total,
    (al.total / acl.loans_numbers)as debit
    from system.ad_concept_loans acl 
    inner join system.ad_loans al on (al.ad_concept_loans_id = acl.ad_concept_loans_id)
    where al.ad_loans_id = $ad_loans_id
    limit 1";
    $r = $conn->Execute($q);
    
    $collection[0] = "1";
    $collection[1] = muestrafloat($r->fields['total']);
    $collection[2] = muestrafloat($r->fields['debit']);
    $collection[3] = muestrafloat($r->fields['total']);
    }

    $resp = $collection;
    
    $json = new Services_JSON();
    echo $json->encode($resp);

    break;

   case "cajas":

    $ad_user_id = @$_REQUEST['ad_user_id'];
    //$ad_payroll_id = @$_REQUEST['ad_payroll_id'];

    $q ="SELECT ad_user_id id, CONCAT(firstname,' ',lastname) descripcion FROM system.ad_user WHERE isactive='Y'  ORDER BY 2";
    //die($q);
    $select = "<label>";
    $select.= superCombo($conn, $q, $ad_user_id, 'ad_user_id','ad_user_id','width:100%', "",'id','descripcion','','','','Seleccione Usuario','form-control input-group');
    $select.= "<span>Usuarios</span>";
    $select.= "<label>";

    echo $select;

      
    break;
  
   case "historial_nomina":

    $ad_company_id = @$_REQUEST['ad_company_id'];
    
    $q = "SELECT max(b.ad_payroll_history_id) id, (a.description || ' ->' || to_char(b.date_start,'DD/MM/YYYY') || ' al ' || to_char(b.date_end ,'DD/MM/YYYY')) descripcion 
           from system.ad_payroll a
           inner join system.ad_payroll_history b on (b.ad_payroll_id = a.ad_payroll_id )
           inner join system.ad_company c on (c.ad_company_id = a.ad_company_id )
           WHERE c.ad_company_id = $ad_company_id AND a.ad_company_id = $ad_company_id
           group by 2,b.ad_payroll_history_id
           order by b.ad_payroll_history_id DESC ";
    //die($q);
    $select = "<label>";
    $select.= "Nóminas";
    $select.= superCombo($conn, $q, "", 'ad_payroll_history_id','ad_payroll_history_id','width:100%', "traeTrabajadores(this.value);",'id','descripcion','','','','Seleccione Nómina','form-control input-group');
    $select.= "<label>";

    echo $select;

      
    break;
  
   case "periodoCA":

    $ad_company_id = @$_REQUEST['ad_company_id'];
    
    $q = "SELECT max(b.ad_payroll_history_id) id, ('PERIODO ->' || to_char(b.date_start,'DD/MM/YYYY') || ' al ' || to_char(b.date_end ,'DD/MM/YYYY')) descripcion 
           FROM system.ad_payroll a
           INNER JOIN system.ad_payroll_history b on (b.ad_payroll_id = a.ad_payroll_id )
           INNER JOIN system.ad_company c on (c.ad_company_id = a.ad_company_id )
           INNER JOIN system.ad_savings_bank_det d on (d.ad_payroll_history_id = b.ad_payroll_history_id)
           WHERE c.ad_company_id = $ad_company_id AND a.ad_company_id = $ad_company_id
           GROUP BY 2,b.ad_payroll_history_id
           union
            SELECT max(b.ad_payroll_history_id) id, ('PERIODO ->' || to_char(b.date_start,'DD/MM/YYYY') || ' al ' || to_char(b.date_end ,'DD/MM/YYYY')) descripcion 
            FROM system.ad_payroll a 
            INNER JOIN system.ad_payroll_history b on (b.ad_payroll_id = a.ad_payroll_id )
            INNER JOIN system.ad_company c on (c.ad_company_id = a.ad_company_id ) 
            inner join system.ad_loans_history d on (d.ad_payroll_history_id = b.ad_payroll_history_id)
            WHERE c.ad_company_id = $ad_company_id AND a.ad_company_id = $ad_company_id and a.ad_payroll_type_id = 2
            GROUP BY 2,b.ad_payroll_history_id
            ORDER BY 1 DESC ";
    //die($q);
    $select = "<label>";
    $select.= "Periodo";
    $select.= superCombo($conn, $q, "", 'ad_payroll_history_id','ad_payroll_history_id','width:100%', "traeTrabajadoresCA(this.value);",'id','descripcion','','','','Seleccione Periodo','form-control input-group');
    $select.= "<label>";

    echo $select;

      
    break;
  
   case "periodoRetPrest":

    $ad_company_id = @$_REQUEST['ad_company_id'];
    
    $q = "SELECT max(b.ad_payroll_history_id) id, 
          ('PERIODO ->' || to_char(b.date_start,'DD/MM/YYYY') || ' al ' || to_char(b.date_end ,'DD/MM/YYYY')) descripcion
          FROM system.ad_payroll a 
          INNER JOIN system.ad_payroll_history b on (b.ad_payroll_id = a.ad_payroll_id ) 
          INNER JOIN system.ad_company c on (c.ad_company_id = a.ad_company_id ) 
          WHERE c.ad_company_id = $ad_company_id AND a.ad_company_id = $ad_company_id and a.ad_payroll_type_id = 2
          GROUP BY 2,b.ad_payroll_history_id
          ORDER BY b.ad_payroll_history_id DESC limit 2";
    //die($q);
    $select = "<label>";
    $select.= "Periodo Retencion CxC";
    $select.= superCombo($conn, $q, "", 'ad_payroll_history_id','ad_payroll_history_id','width:100%', "",'id','descripcion','','','','Seleccione Periodo','form-control input-group');
    $select.= "<label>";

    echo $select;

    break;
  
    case "trabajadoresRetCA":

      $ad_payroll_history_id = $_REQUEST['ad_payroll_history_id'];
   
      $q ="SELECT b.ad_employee_id id, CONCAT(b.name,' ',b.name2) descripcion 
          FROM system.ad_savings_bank a
          INNER JOIN system.ad_employee b on (b.ad_employee_id = a.ad_employee_id)
          INNER JOIN system.ad_savings_bank_det c on (c.ad_savings_bank_id = a.ad_savings_bank_id)
          WHERE c.ad_payroll_history_id = '$ad_payroll_history_id'  
          union
          select c.ad_employee_id id, CONCAT(c.name,' ',c.name2) descripcion
          from system.ad_loans a
          inner join system.ad_loans_history b on (b.ad_loans_id = a.ad_loans_id)
          INNER JOIN system.ad_employee c on (c.ad_employee_id = a.ad_employee_id)
          WHERE b.ad_payroll_history_id = '$ad_payroll_history_id' 
          group by 1,2
          ORDER BY 2";
      //die($q);
      $select = "<label>";
      $select.= "Trabajadores con Retencion";
      $select.= superCombo($conn, $q, '', 'ad_employee_id','ad_employee_id','width:100%', "",'id','descripcion','','','multiple','','form-control input-group');
      $select.= "<label>";

      echo $select;

        
    break;
  
    case "traeTraGralCA":

      $ad_company_id = $_REQUEST['ad_company_id'];
   
      $q ="SELECT a.ad_employee_id id, CONCAT(b.name,' ',b.name2) descripcion 
          FROM system.ad_savings_bank a
          INNER JOIN system.ad_employee b on (b.ad_employee_id = a.ad_employee_id)
          WHERE b.ad_company_id = '$ad_company_id'  
          ORDER BY 2";
      //die($q);
      $select = "<label>";
      $select.= "Trabajadores con Retencion";
      $select.= superCombo($conn, $q, '', 'ad_employee_id','ad_employee_id','width:100%', "",'id','descripcion','','','multiple','','form-control input-group');
      $select.= "<label>";

      echo $select;

        
    break;
  
    case "traeTraVac":

      $ad_company_id = $_REQUEST['ad_company_id'];
   
    $q = "SELECT max(b.ad_payroll_history_id) id, (a.description || ' ->' || to_char(b.date_start,'DD/MM/YYYY') || ' al ' || to_char(b.date_end ,'DD/MM/YYYY')) descripcion 
           from system.ad_payroll a
           inner join system.ad_payroll_history b on (b.ad_payroll_id = a.ad_payroll_id )
           inner join system.ad_company c on (c.ad_company_id = a.ad_company_id )
           WHERE c.ad_company_id = $ad_company_id AND a.ad_company_id = $ad_company_id AND b.vacation = 1
           group by 2,b.ad_payroll_history_id
           order by b.ad_payroll_history_id DESC ";
      //die($q);
      $select = "<label>";
      $select.= "Nóminas";
      $select.= superCombo($conn, $q, "", 'ad_payroll_history_id','ad_payroll_history_id','width:100%', "traeTrabajadores(this.value);",'id','descripcion','','','','Seleccione Nómina','form-control input-group');
      $select.= "<label>";

      echo $select;

        
    break;

   case "NominasPorCerrar":

     $q = "SELECT a.ad_payroll_calculated_id id, b.description || ' del ' || to_char(a.date_start,'DD/MM/YYYY') || ' al ' || to_char(a.date_end ,'DD/MM/YYYY') || ' -> '  || c.name descripcion  FROM system.ad_payroll_calculated a inner join system.ad_payroll b on (b.ad_payroll_id = a.ad_payroll_id )
          inner join system.ad_company c on (c.ad_company_id = b.ad_company_id )";
    //die($q);
    $select = "<label>";
    $select.= superCombo($conn, $q, "", 'ad_payroll_calculated_id','ad_payroll_calculated_id','width:100%', "",'id','descripcion','','','','Seleccione Nómina','inputForm input-group');
    $select.= "<span>Nóminas por Cerrar</span>";
    $select.= "<label>";

    echo $select;
     
    break;
  
   case "NominasAReversar":

     $q = " SELECT max(b.ad_payroll_history_id) id, (a.description || ' ->' || c.name) descripcion 
            from system.ad_payroll a
            inner join system.ad_payroll_history b on (b.ad_payroll_id = a.ad_payroll_id )
            inner join system.ad_company c on (c.ad_company_id = a.ad_company_id )
            group by 2,a.ad_payroll_id
            order by a.ad_payroll_id asc ";
    //die($q);
    $select = "<label>";
    $select.= superCombo($conn, $q, "", 'ad_payroll_history_id','ad_payroll_history_id','width:100%', "BuscaFechaNominaRev(this.value)",'id','descripcion','','','','Seleccione Nómina','inputForm input-group');
    $select.= "<span>Nóminas a Reversar</span>";
    $select.= "<label>";

    echo $select;
     
    break;

}

?>
