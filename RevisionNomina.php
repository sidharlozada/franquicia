<?php
session_start();
include("lib/librerias.php"); 

$date_start = $_REQUEST['date_start'];
$date_end = $_REQUEST['date_end'];
$ad_payroll_id = $_REQUEST['ad_payroll_id'];
$descNomina = $_REQUEST['descNomina'];
$descEmpresa = $_REQUEST['descEmpresa'];

$desNomina = $descNomina." del ".muestrafecha($date_start)." al ".muestrafecha($date_end)."  ..:: $descEmpresa ::..";

$q = "SELECT  * FROM system.ad_payroll_calculated WHERE ad_payroll_id = $ad_payroll_id";
$r = $conn->Execute($q);

$ad_payroll_calculated_id = $r->fields['ad_payroll_calculated_id'];
$vacation = $r->fields['vacation'];

$nom = new nomina;
$Trabajador = $nom->getTrabajadorNomina($conn, $ad_payroll_id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="icon" href="img/favicon.png">
	<title><?=$titulo ?>  Revisión Nómina</title>
	<link href="css/sb-admin-2.css"  rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet">
 	<link rel="stylesheet" href="css/alertify.css">
  	<link rel="stylesheet" href="css/icheck-bootstrap/icheck-bootstrap.css">
  	 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body><br>
	<div class="divBusqueda"> 
		<div   style="border: 2px #B2B1B1 solid">
			<nav class="navbar navbar-expand navbar-light bg-white topbar  static-top shadow">
				<div  class="breadcrumb justify-content-center" style="">
					<div class="breadcrumb-item">Revisión de <?=$desNomina?></div>
					<div id="titulo" class="breadcrumb-item active"></div>
					<div id="iconos" ></div>
				</div>
			</nav>

			<br>
			<div class="divBusqueda">
				<?php 
					$cont = 0;
					foreach ($Trabajador as $key => $value) {
						
					
				?>
				<div style="border: 1px #7A8EB450 solid; padding: 5px;  color: #fff; background-color: #606265;">
					<div class="row" >
						<div class="col-2"><b>Departamento:</b></div>
						<div class="col-3"><?=$value->departamento?></div>
					</div>
					<div class="row">
						<div class="col-2"><b>Trabajador:</b></div>
						<div class="col-3"><?=$value->trabajador?></div>

						<div class="col-2"><b>Cargo:</b></div>						
						<div class="col-3"><?=$value->cargo?></div>
					</div>
					<div class="row">
						<div class="col-2"><b>Sueldo:</b></div>						
						<div class="col-3"><?=muestrafloat($value->salary)?></div>

						<div class="col-2"><b>Fecha de Ingreso:</b></div>
						<div class="col-2"><?=muestrafecha($value->datein)?></div>						
					</div>
					<?if($vacation == 1){
						$obj = $nom->getVacation($conn, $value->ad_employee_id);
						$salarioNormal = $nom->salarioNormal($conn, $value->ad_employee_id);
						?>
						<div class="row" >
							<div class="col-2"><b>Período Vacacional:</b></div>
							<div class="col-3"><?=muestrafecha($obj->FechaIniVac)?> al <?=muestrafecha($obj->FechaFinVac)?></div>
							
							<div class="col-2"><b>Salario Normal:</b></div>
							<div class="col-3"><?=muestrafloat($salarioNormal)?></div>
						</div>
					<?}else if($vacation==2){
						$salarioAcumulado = $nom->salarioAcumulado($conn, $value->ad_employee_id, $date_start, $date_end);
						?>
						<div class="row" >
							<div class="col-2"><b>Período:</b></div>
							<div class="col-3"><?=muestrafecha($date_start)?> al <?=muestrafecha($date_end)?></div>

							<div class="col-2"><b>Salario Acumulado:</b></div>
							<div class="col-3"><?=muestrafloat($salarioAcumulado)?></div>
						</div>
					<?}?>
					<input type="hidden" name="tra_<?=$value->ad_employee_id?>" id="tra_<?=$value->ad_employee_id?>" value="<?=$value->ad_employee_id?>">
				</div>
				<div style=" padding: 5px; color: #000000">
					<div class="row" >
						<div class="col-2"><b>Conceptos</b></div>
						<div class="col-1 text-center"><b>Cantidad</b></div>
						<div class="col-2 monto"><b>Asignación</b></div>
						<div class="col-2 monto"><b>Deducción</b></div>
						<div class="col-2 monto"><b>Variables</b></div>
					</div>
					<div class="row">
						<div class="col-8">
					<?php
					$Conceptos = $nom->getPayrollCalcConcep($conn, $ad_payroll_calculated_id, $value->ad_employee_id);
					$asignacion = 0;
					$deduccion = 0;
					foreach ($Conceptos as $key => $obj) {
					?>
						<div class="row " >
							<div class="col-3 "><?=$obj->description?></div>
							<div class="col-2 text-center"><?=$obj->quantity?></div>
							<div class="col-3 monto"><?=muestrafloat($obj->assignment)?></div>
							<div class="col-3 monto"><?=muestrafloat($obj->deduction)?></div>
						</div>
					<?php
					$asignacion += $obj->assignment;
					$deduccion += $obj->deduction;
					}
					?>
						</div>
						<div class="col-4" style="border: 1px #7A8EB450 solid; ">
							<?php	
								$variables = new variables;

								$var = $variables->getall($conn, '', 0, 0);

								if($asignacion !=0 || $deduccion!=0)
								foreach ($var as $key => $r) {

								$q ="SELECT * FROM system.ad_relation_var_employee WHERE ad_employee_id=$value->ad_employee_id AND ad_variables_id= $r->ad_variables_id";
								$r1 = $conn->Execute($q);

								$nro = ($r1->EOF) ? 0 : round($r1->fields['value'],0);
				
							?>
								<div class="row">
									<div class="col-7"><?=$r->name?></div>
									<div class="col-2">
										<input class="inputForm" type="text" name="var_<?=$r->ad_variables_id?>_<?=$value->ad_employee_id?>" id="var_<?=$r->ad_variables_id?>_<?=$value->ad_employee_id?>" value="<?=$nro?>" onkeyup="variableG(<?=$value->ad_employee_id?>,<?=$r->ad_variables_id?>)">
										<input type="hidden" name="id_<?=$r->ad_variables_id?>_<?=$value->ad_employee_id?>" id="id_<?=$r->ad_variables_id?>_<?=$value->ad_employee_id?>" value="<?=$r->ad_variables_id?>">
									</div>
									<div class="col-2" style="font-size: 1.2rem; color: #4775C8">
										
											<i onclick="GuardaVariable(<?=$value->ad_employee_id?>,<?=$r->ad_variables_id?>)" class="fas fa-save"></i>
										
									</div>
								 
								</div>
							<?php
								}
							?>
						</div>
					</div>
					<hr>
					<div class="row " >
						<div class="col-3"></div>
						<div class="col-2 monto"><b><?=muestrafloat($asignacion)?></b></div>
						<div class="col-2 monto"><b><?=muestrafloat($deduccion)?></b></div>
					</div>
					<div class="row " >
						<div class="col-3"></div>
						<div class="col-2 monto"><b>Total a Pagar</b></div>
						<div class="col-2 monto"><b><?=muestrafloat($asignacion - $deduccion)?></b></div>
					</div>
					
				</div>
				<br>
				<?php
				$cont++;
					}
				?>
				<hr>
				<div  class="divBusqueda" >
					
					<div class="row">
						<div class="col-3"></div>
						<div class="col-6">
							<hr>
							<b>Resumen de la Nómina </b>
							<hr>
							<table width="100%">
								<tr>
									<th>Descripción</th>	
									<th class="monto">Asignación</th>	
									<th class="monto">Deducción</th>	
								</tr>
								
							<?
								$resumen = $nom->getPayrollSummary($conn, $ad_payroll_calculated_id);
								$asignacion = 0;
								$deduccion = 0;
								foreach ($resumen as $key => $value) {
									$asignacion += $value->assignment_t;
									$deduccion += $value->deduction_t;
									?>
									<tr>
										<td><?=$value->description?></td>
										<td class="monto"><?=muestrafloat($value->assignment_t)?></td>
										<td class="monto"><?=muestrafloat($value->deduction_t)?></td>
									</tr>
									<?
								}
							?>
								<tr>
									<td colspan="3"><hr></td>
								</tr>
								<tr>
									<td></td>
									<td class="monto"><b><?=muestrafloat($asignacion)?></b></td>
									<td class="monto"><b><?=muestrafloat($deduccion)?></b></td>
								</tr>
								<tr>
									<td colspan="3"><hr></td>
								</tr>
								<tr>
									<td></td>
									<td class="monto"><b>Total a Pagar</b></td>
									<td class="monto"><b><?=muestrafloat($asignacion-$deduccion)?></b></td>
								</tr>
							</table>
						</div>
						<div class="col-3"></div>
						
					</div>
					<div class="row " >
						<div class="col-6"></div>
						<div class="col-2 monto"><b>Total Trabajadores</b></div>
						<div class="col-1 monto"><b><?=$cont?></b></div>
					</div>
				</div>
			</div>
			<br>

		</div>
	</div>
</body>
</html>
<script src="js/alertify.min.js"></script>
 <script src="js/jquery.min.js"></script>
<script type="text/javascript">
const body = document.querySelector('body');

   

function variableG(ad_employee_id,ad_variables_id) {
	

 body.onkeydown = function(e){
     if(e.key == "Enter"){
       GuardaVariable(ad_employee_id,ad_variables_id);
        return false;
      }
     };


}

function GuardaVariable(ad_employee_id,ad_variables_id){

	variable = "#var_"+ad_variables_id+"_"+ad_employee_id;
	var JsonAux;
   JsonAux={"ad_employee_id": ad_employee_id,
   			"valor":$(variable).val(),
   			"ad_variables_id":ad_variables_id,
   			"form":'GuardaVariable'
   		};
   var parametros = {
          "JsonEnv" : JSON.stringify(JsonAux)
  };
  $.ajax({
      data:  parametros,
      url:   'OtrosCalculos.php',
      type:  'post',
      beforeSend: function () {
      },
      success:  function (response) {
        var json = JSON.parse(response);
        alertify.success(json);
      }
  });
}



</script>