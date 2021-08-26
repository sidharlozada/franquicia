<?php
session_start();
include("lib/librerias.php"); 

$ad_payroll_history_id = $_REQUEST['ad_payroll_history_id'];
$ad_concept_loans_id = $_REQUEST['ad_concept_loans_id'];
$ad_employee_id = @$_REQUEST['ad_employee_id'];
$description = $_REQUEST['description'];
$date_debit = muestrafecha($_REQUEST['date_debit']);


$q = "SELECT a.*, c.name empresa, c.rif, c.picture
      FROM system.ad_payroll_history a
      INNER JOIN system.ad_payroll b on (b.ad_payroll_id = a.ad_payroll_id)
      INNER JOIN system.ad_company c on (c.ad_company_id = b.ad_company_id ) 
      WHERE a.ad_payroll_history_id = $ad_payroll_history_id";
$r = $conn->Execute($q);
$periodo = muestrafecha($r->fields['date_start'])." - ".muestrafecha($r->fields['date_end']);

"Debito por Concepto de ".$description."  ..:: GULF OIL VENEZUELA C.A ::..";
$nom = new adeudos;
$Trabajador = $nom->getTrabajadores($conn, $ad_concept_loans_id, $ad_employee_id);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" href="img/favicon.png">
    <title><?=$titulo?> Revisión de Prestamos</title>
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/alertify.css">
    <link rel="stylesheet" href="css/icheck-bootstrap/icheck-bootstrap.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body><br>
    <div class="divBusqueda">
        <div style="border: 2px #B2B1B1 solid">
            <nav class="navbar navbar-expand navbar-light bg-white topbar  static-top shadow">
                <div class="breadcrumb justify-content-center" style="">
                    <div class="breadcrumb-item">Deducción de Cuotas - Cuentas por Cobrar (Prestamos - Créditos). Periodo  <?=$periodo?></div>
                    <div id="titulo" class="breadcrumb-item active"></div>
                    <div id="iconos"></div>
                </div>
            </nav>

            <br>
            <div class="divBusqueda">
                <?php 
					$cont = 0;
					foreach ($Trabajador as $key => $value) {
						
					
				?>
                <div style="border: 1px #7A8EB450 solid; padding: 5px;  color: #fff; background-color: #606265;">
                    <div class="row">
                        <div class="col-2"><b>Departamento:</b></div>
                        <div class="col-3"><?=$value->departament?></div>
                    </div>
                    <div class="row">
                        <div class="col-2"><b>Trabajador:</b></div>
                        <div class="col-3"><?=$value->employee?></div>
                    </div>
                    <input type="hidden" name="tra_<?=$value->ad_employee_id?>" id="tra_<?=$value->ad_employee_id?>" value="<?=$value->ad_employee_id?>">
                    <input type="hidden" name="ad_payroll_history_id" id="ad_payroll_history_id" value="<?=$ad_payroll_history_id?>">
                </div>
                <div style="color: #000000; width: 100%; padding-right: 0.75rem; padding-left: 0.75rem;" >
                    <div class="row" >
                        <div class="col-10" >
                            <div class="row" style="border: 1px solid #337AB760; background-color: #CFCECE;">
                                <div class="col-2" style="border-right: 1px solid #337AB760;"><b>Fecha Prestamo</b></div>
                                <div class="col-2" style="border-right: 1px solid #337AB760;"><b>Concepto</b></div>
                                <div class="col-1 text-center" style="border-right: 1px solid #337AB760;"><b>Moneda</b></div>
                                <div class="col-2 monto" style="border-right: 1px solid #337AB760;"><b>Total</b></div>
                                <div class="col-1 monto" style="border-right: 1px solid #337AB760;"><b>Cuotas</b></div>
                                <div class="col-2 monto" style="border-right: 1px solid #337AB760;"><b>Monto Pendiente</b></div>
                                <div class="col-2 monto" style="border-right: 1px solid #337AB760;"><b>Cuota a Debitar</b></div>
                            </div>
                        </div>
                        <div class="col-2" >
                            <div class="row" style="border-top: 1px solid #337AB760; border-bottom: 1px solid #337AB760; background-color: #CFCECE;">
                                <div class="col-12" ><b>Teorico a Debitar</b></div>
                            </div>
                            
                        </div>
                    </div>
                    <?
                    $Prestamos = $nom->getPrestamos($conn, $value->ad_employee_id, $ad_concept_loans_id);
                    $totalP = 0;
                    foreach ($Prestamos as $key => $prest) {
                    ?>
                    <div class="row" style="border: 1px  solid #337AB730; ">
                        <div class="col-10" >
                            <?php
					

					$collection=array();
					$qvalidacion = "SELECT a.debit_numbers as cuota, ad_payroll_history_id 
					FROM system.ad_loans_history a
					WHERE a.ad_loans_id = $prest->ad_loans_id";
                    //die($qvalidacion);

					$rvalid = $conn->Execute($qvalidacion);

    				if(!empty($rvalid->fields['cuota'])){
    					
    					$q ="SELECT 
    					b.debit_numbers+1 as cuota, b.debit_numbers, a.total, a.loans_numbers, (a.total / a.loans_numbers) as debit
    					FROM  system.ad_loans a 
    					INNER JOIN system.ad_loans_history b on (b.ad_loans_id = a.ad_loans_id ) 
    					WHERE b.ad_loans_id = $prest->ad_loans_id
    					ORDER BY b.debit_numbers DESC
    					LIMIT 1";
    					//die($q);
    					$r = $conn->Execute($q);

    					/*if($r->fields['debit_numbers'] >= $r->fields['loans_numbers']){
    					   $collection[0] = "PP";
					    }else{*/

        					$q2 = "SELECT (b.total - SUM(a.debit)) as SUM, count(a.ad_loans_history_id) cant
        					FROM system.ad_loans_history a 
        					INNER JOIN system.ad_loans b on (b.ad_loans_id = a.ad_loans_id)
        					WHERE a.ad_loans_id = $prest->ad_loans_id
        					GROUP BY b.total ";
                            //die($q2);
        					$r2 = $conn->Execute($q2);

        					$collection[0] = $r->fields['cuota'];
        					$collection[1] = muestrafloat($r->fields['total']);
        					//$collection[2] = muestrafloat($r->fields['debit']);
                            $collection[2] = muestrafloat(($r2->fields['sum'])/($r->fields['loans_numbers']-$r->fields['debit_numbers']));
        					$collection[3] = muestrafloat($r2->fields['sum']);
                            $collection[4] = $r->fields['loans_numbers'];
					   // }
					}else{
    					$q = "SELECT a.total, (a.total / a.loans_numbers)as debit, a.loans_numbers 
                            FROM system.ad_loans a 
                            WHERE a.ad_loans_id = $prest->ad_loans_id";
                        //die($q);
    					$r = $conn->Execute($q);
    					
    					
    					$collection[0] = "1";
    					$collection[1] = muestrafloat($r->fields['total']);
    					$collection[2] = muestrafloat($r->fields['debit']);
    					$collection[3] = muestrafloat($r->fields['total']);
                        $collection[4] = $r->fields['loans_numbers'];
					}
					//foreach ($Trabajador as $key => $obj) {
					?>
                        <div class="row" >
                            <div class="col-2 " style="padding: 5px; border-right: 1px solid #337AB760;"><?=muestrafecha($prest->date_start)?></div>
                            <div class="col-2 " style="padding: 5px; border-right: 1px solid #337AB760;"><?=$prest->loans?></div>
                            <div class="col-1 text-center" style="padding: 5px; border-right: 1px solid #337AB760;"><?=$prest->cursymbol?></div>
                            <div class="col-2 monto" style="padding: 5px; border-right: 1px solid #337AB760;"><?=$prest->total?></div>
                            <div class="col-1 monto" style="padding: 5px; border-right: 1px solid #337AB760;"><?=$collection[4]?></div>
                            <div class="col-2 monto" style="padding: 5px; border-right: 1px solid #337AB760;"><?=$collection[3]?></div>
                            <div class="col-2 monto" style="padding: 5px; border-right: 1px solid #337AB760;"><?=$collection[0]?></div>
                        </div>
                            <?php
					//}
					?>
                        </div>
                        <div class="col-2" >
                            <?php	
							?>
                            <div class="row">
                                <div class="col-4" style="padding: 5px; "><!--<?=@$collection[2]?>--></div>
                                <div class="col-4" style="padding: 5px; "> 
                                    <input class="form-control" type="text" name="var_<?=$prest->ad_loans_id?>"
                                        id="var_<?=$prest->ad_loans_id?>" value="<?=@$collection[2]?>"
                                        onkeyup="variableG(<?=$value->ad_employee_id?>,<?=$prest->ad_loans_id?>,<?=$collection[0]?>,<?=$prest->ad_loans_id?>)"
                                         style="height: 25px">
                                    <input type="hidden" name="id_<?=$prest->ad_loans_id?>" id="id_<?=$prest->ad_loans_id?>" value="<?=$collection[2]?>">
                                    <input type="hidden" name="date_debit" id="date_debit"  value="<?=$date_debit?>">
                                </div>
                                <div class="col-2" style="padding: 5px; font-size: 1rem; color: #4775C8">

                                    <i onclick="Guardar(<?=$value->ad_employee_id?>,<?=$prest->ad_loans_id?>,<?=$collection[0]?>,<?=$prest->ad_loans_id?>)" class="fas fa-save"></i>

                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                $totalP += $prest->total;
                }
                ?>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="row">
                            <div class="col-3"><b> </b></div>
                            <div class="col-3 text-right"><b>Prestamo Total</b></div>
                            <div class="col-2 monto"><b><?=muestrafloat($totalP)?></b></div>
                            <div class="col-2 monto"><b> </b></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="col-6 monto"><b></b></div>
                    </div>
                </div>
                <br>
                <?php
                
				$cont++;
					}
				?>
                <hr>
                
                
                <div class="divBusqueda" style="display: none;">

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <hr>
                            <b>Resumen de Los Prestamos </b>
                            <hr>
                            <table width="100%">
                                <tr>
                                    <th>Descripción</th>
                                    <th class="monto">Asignación</th>
                                    <th class="monto">Deducción</th>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="monto"><b><?=muestrafloat(@$asignacion)?></b></td>
                                    <td class="monto"><b><?=muestrafloat(@$deduccion)?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="monto"><b>Total a Pagar</b></td>
                                    <td class="monto"><b><?=muestrafloat(@$asignacion-@$deduccion)?></b></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-3"></div>

                    </div>
                    <div class="row ">
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

function variableG(ad_employee_id, ad_loans_id, debit_numbers, ad_loans_id) {


    body.onkeydown = function(e) {
        if (e.key == "Enter") {
            Guardar(ad_employee_id, ad_loans_id, debit_numbers, ad_loans_id);
            return false;
        }
    };


}

function Guardar(ad_employee_id, ad_loans_id, debit_numbers,ad_loans_id) {

    variable = "#var_" + ad_loans_id;
    trabajador = "#tra_" + ad_employee_id;
    var  parametros = {
        "ad_employee_id": trabajador,
        "ad_loans_id": ad_loans_id,
        "debit_numbers": debit_numbers,
        "date_debit": $("#date_debit").val(),
        "ad_payroll_history_id": $("#ad_payroll_history_id").val(),
        "btnDebitar": "Debitar",
        "debit": $(variable).val(),
        "form": 'prestamos'
    };
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        beforeSend: function() {},
        success: function(response) {
            var json = JSON.parse(response);
            if (json['op']) {
                alertify.success(json['msj']);
            } else {

              alertify.alert(json['msj']).set({title:TITULO_ALERT});
           }
        }
    });
}
</script>