<?
include 'lib/librerias.php';

$cliente = new cliente;
$resp = $cliente->get($conn, $_REQUEST['customers_id']); 
$IDtasa = @$_REQUEST['rate_id'];
$total_venta = $_REQUEST['total_venta'];

//$montoD = (empty($_REQUEST['Monto_om'])) ? muestrafloat(guardafloat($total_venta)/$montoTasa) : $_REQUEST['Monto_om'];

if (empty($_REQUEST['Monto_om'])) {
	$montoD = muestrafloat(guardafloat($total_venta)/@$_REQUEST['monto']);
	$montoTasa = @$_REQUEST['monto'];
}else{
	$montoD = $_REQUEST['Monto_om']; //muestrafloat(guardafloat($total_venta)/$montoTasa);
	$montoTasa = guardafloat($total_venta)/guardafloat($_REQUEST['Monto_om']);	
}


?>
<style>
	.montos{ 
		font-size:20px;
		font-weight: bold;
		color: green;
	}
</style>

<div style="display:none" class="alert alert-success" role="alert" align="center" id="aviso"><strong><span id="resultado"></span></strong></div>
<div style="display:none"  class="alert alert-danger" role="alert" align="center" id="aviso3"><strong><span id="resultado3"></span></strong></div>
<div class="modal-header" style="cursor: move; background-color:#1f3075;">
	<b><h5 class="modal-title" id="exampleModalLabel" style="color:#fff;">Cobro Rápido</h5></b>
	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true" style="color:#fff;">×</span>
	</button>
</div>
<form name="formRegistroCobro" id="formRegistroCobro">
	<div class="tab-content" style="padding: 15px">
		<div class="tab-pane active" style="opacity: 1">
			<div class="row" style="border-bottom: 1px #B1B1B1 solid; ">
				<div class="col-sm-7 ">
					<div class="row">
						<div class="col-sm-3 ">
							<b>C.I./R.I.F.: </b>
						</div>
						<div class="col-sm-9 ">
							<?=$resp->identificacion?>
						</div>
					</div>
					<div class="row  mb-3">
						<div class="col-sm-3 ">
							<b>Cliente:</b>
						</div>
						<div class="col-sm-9 ">
							<?=$resp->cliente?>
						</div>
					</div>
				</div>
				<div class="col-sm-5 ">
					<div class="row ">
						<div id="MontoPendienteD" title="Seleccionar Monto Completo" class="col-sm-12 " align="right" style="font-weight: bold;font-size: 1.5rem; cursor: pointer;" onclick="montoCompleto('montoD')">
							<?=$montoD?> $
							<input type="hidden" id="montoD" name="montoD" value="<?=$montoD?>">
							<input type="hidden" id="montoPend_D" name="montoPend_D" value="<?=$montoD?>">
						</div>
					</div>
					<div class="row ">
						<div id="MontoPendienteBs" title="Seleccionar Monto Completo" class="col-sm-12 montos" align="right" style="font-weight: bold;font-size: 1.5rem; cursor: pointer;" onclick="montoCompleto('total_venta')">
							<?=$total_venta?> Bs.
							<input type="hidden" id="total_venta" name="total_venta" value="<?=$total_venta?>">
							<input type="hidden" id="montoPend_Bs" name="montoPend_Bs" value="<?=$total_venta?>">
						</div>
					</div>
				</div>  	
			</div>
			<div id="DivTipoPago" class="row  mb-3" style="padding-top: 10px;">
				<div class="col-sm-7 ">
					<div class="row  mb-3">
						<div class="col-sm-6 ">
							<div class="input-group ">
								<label>
								Tipo de Pago
									<? 
									$q ="SELECT payment_type_id as id, name as descripcion FROM system.payment_type WHERE isactive='Y' ORDER BY payment_type_id ";
									echo superCombo($conn, $q,'2', 'payment_type', 'payment_type', 'width:100%', "",'id','descripcion','','','','','form-control');
									?>
								</label>
							</div>
						</div>
						<div class="col-sm-6 ">
							<div class="input-group ">
								<label>
								Monto
									<input class="form-control" type="text" id="monto_pago" name="monto_pago" placeholder=""  onkeypress="return(formatoNumero(this,event));"> 
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 ">
							<div class="panel-body">
								<div id="gridCobro" style="height:250px" class="" align="center"></div>
								<i title="Quitar Tipo de Pago" class="fa fa-trash iconFA" aria-hidden="true" onclick="eliminar_tpago();"></i>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 ">
							<div align="right" class="montos">
								<span id="monto_ing">0,00</span>
								<input type="hidden" name="monto_ing_" id="monto_ing_" value="0,00">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5 ">
					<div class="row  mb-3">
						<div class="col-sm-6 ">
							<div class="input-group " >
								<label>
								Referencia
									<input class="form-control" type="text" id="reference" name="reference" placeholder=""> 
								</label>
							</div>
						</div>
						<div class="col-sm-6 ">
							&nbsp;
						</div>
					</div>
					<div class="row  mb-3">
						<div class="col-sm-5 ">
							<b>Monto Pendiente $</b>
						</div>
						<div class="col-sm-7 ">
							<div title="Seleccionar Monto Pendiente" align="right" style="font-size:22px; font-weight: bold; color: red; cursor: pointer;" onclick="montoCompleto('monto_pend_d_')">
								<span id="monto_pend_d"><?=$montoD?></span>
								<input type="hidden" name="monto_pend_d_" id="monto_pend_d_" value="<?=$montoD?>">
							</div>
						</div>
					</div>
					<div class="row  mb-3">
						<div class="col-sm-5 ">
							<b>Monto Pendiente Bs</b>
						</div>
						<div class="col-sm-7 ">
							<div title="Seleccionar Monto Pendiente" align="right" style="font-size:22px; font-weight: bold; color: red; cursor: pointer;" onclick="montoCompleto('monto_pend_')">
								<span id="monto_pend"><?=$_REQUEST['total_venta']?></span>
								<input type="hidden" name="monto_pend_" id="monto_pend_" value="<?=$total_venta?>">
							</div>
						</div>
					</div>
					<br><br><br><br><br>
					<div class="row  mb-3">
						<div class="col-sm-6 ">
							<b>Calculadora $</b>
						</div>
						<div class="col-sm-6 ">
						<div align="right">
							  <input style="color: green; font-weight: bold; text-align: right; font-size:20px;" class="form-control" type="text" id="ing_dolares" name="ing_dolares" placeholder="0,00" onkeypress="return(formatoNumero(this,event));">
							</div>
						</div>
					</div>
					<div class="row  mb-3">
						<div class="col-sm-6 ">
							<b>Bolívares</b>
						</div>
						<div class="col-sm-6 ">
						<div align="right" class="montos">
								<input style="color: green; font-weight: bold; text-align: right; font-size:20px;" class="form-control" type="text" id="ing_bolivares" name="ing_bolivares" placeholder="0,00" onkeypress="return(formatoNumero(this,event));">

							</div>
						</div>
					</div>
				</div>

			</div>
			<div id="DivVuelto" style="display: none;">
				<div id="Campos" class="row">
					<div class="col-sm-3">
						<div class="input-group">
							<label>
								Caja
								<?php 
								$q2 = "SELECT ad_safe_box_id id, name descripcion FROM system.ad_safe_box";
								echo superCombo($conn, $q2, @$ord->ad_safe_box_id, 'ad_safe_box_id[]','ad_safe_box_id','width:100%', "",'id','descripcion','','','','','inputForm input-group');

								?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<label>
								Tipo de Pago
								<?php 
								$q2 = "SELECT payment_type_id id, name descripcion FROM system.payment_type";
								echo superCombo($conn, $q2, @$ord->document_type, 'payment_type_id[]','payment_type_id','width:100%', "",'id','descripcion','','','','','inputForm input-group');

								?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<label>
								Monto
								<input type="text" class="inputForm monto" placeholder="" name="vemonto[]"
								id="vemonto" value="<?=@muestrafloat(@$ord->total);?>"
								onkeypress="return(formatoNumero(this,event));" autocomplete="off">
							</label>
							<input type="hidden" name="monto[]" id="monto" value="<?=@muestrafloat(@$ord->total);?>">
						</div>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-2">
					<input onclick="registro(); return false;" type="button" class="btn btn-primary" id="guardarCobro" name="guardarCobro" value="Registrar">

					<input style="display: none;" onclick="GuardaVuelto(); return false;" type="button" class="btn btn-success" id="regVuelto" name="regVuelto" value="Registrar Vuelto">
				</div>
				<div class="col-3">
					<input style="display: none;" onclick="RegXpagar(); return false;" type="button" class="btn btn-danger" id="cxp" name="cxp" value="Crear Cuenta por Pagar">
				</div>
				<div class="col-3"></div>
				<div class="col-2 monto">
					<span id="btn_clone" style="cursor: pointer;display: none;"><i class="fa fa-plus" aria-hidden="true"></i></span>
				</div>
				<div class="col-2 monto">
					
					<span id="btn_delete" style="cursor: pointer;display: none;"><i class="fa fa-minus" aria-hidden="true"></i></span>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="montoTasa" id="montoTasa" value="<?=$montoTasa?>">

<input type="hidden" name="form" id="form" value="formRegistroCobro">
<input type="hidden" name="customers_id" id="customers_id" value="<?=$_REQUEST['customers_id']?>">

</form>
<script src="js/dragabble.js"></script>
<script type="text/javascript" language="javascript">

$(document).ready(function(){  

    $("#btn_clone").click(function(){  
        $("#Campos").clone().appendTo("#DivVuelto");  
    });  

   $("#btn_delete").on('click', function (){
  		$('#DivVuelto div#Campos:last').remove();
 	}); 


}); 



function RegXpagar() {

		$("#DivVuelto").slideUp(1000);
		$("#DivTipoPago").slideDown(1000);
		$("#guardarCobro").hide();
		$("#cxp").hide();
		$("#regVuelto").show();
}


function GuardaVuelto() {
	var parametros = new FormData($("#formRegistroCobro")[0]); 
   $.ajax({
      data:  parametros,
      url:   'save.php',
      type:  'post',
      contentType: false,
      processData:false,
      cache:false,
      beforeSend: function () {},
		success:  function (response) {
   		var Json = JSON.parse(response);
		   if(Json['op']){
		     	//registrarCobro();
		      	//$("#nrodoc").val(JsonAux['nrodoc']);
		      	alertify.success(Json['msj']);
			    $('#DirModal').hide("swing");
		        $("#page-top").removeClass("modal-open");
		        $('.modal-backdrop').remove(".modal-backdrop");
		        $("#page-top").css("padding-right", "");
		        $("#page-top").removeAttr('style');
		     
			}else{
				alertify.alert(Json['msj']).set({title:TITULO_ALERT});
			}

		}
	});
}

function registro(){
	registrarCobro();
	monto = usaFloat($("#monto_pend_d_").val());
	//alertify.alert("monto: "+$("#monto_pend_d_").val());
	
	if(monto < 0){

		$("#DivTipoPago").slideUp(1000);
		$("#DivVuelto").slideDown(1000);
		$("#guardarCobro").hide();
		//$("#atras").show();
		$("#btn_clone").show();
		$("#btn_delete").show();
		$("#regVuelto").show();
		$("#exampleModalLabel").html("Registro de Vuelto/Cuentas por Pagar");
		$("#MontoPendienteD").html($("#monto_pend_d_").val());
		$("#MontoPendienteBs").html($("#monto_pend_").val());
		$("#montoPend_D").val($("#monto_pend_d_").val());
		$("#montoPend_Bs").val($("#monto_pend_").val());

	}else{
		$('#DirModal').hide("swing");
        $("#page-top").removeClass("modal-open");
        $('.modal-backdrop').remove(".modal-backdrop");
        $("#page-top").css("padding-right", "");
        $("#page-top").removeAttr('style');

	}

		
}


$( function() {
	$( "#move" ).draggable();
} );


buildgridCobro();
function buildgridCobro(){
//set grid parameters
gridCobro = new dhtmlXGridObject('gridCobro');
gridCobro.selMultiRows = true;
gridCobro.setImagePath("js/grid/imgs/");
gridCobro.setHeader("Tipo Pago,Referencia, Monto $, Monto Bs");
gridCobro.setInitWidthsP("20,25,28,28");
gridCobro.setColAlign("center,center,right,right");
gridCobro.setColTypes("coro,ro,ro,ro");
gridCobro.setColSorting("str,str,str,str");
gridCobro.setColumnColor("white,white,white,white");
gridCobro.rowsBufferOutSize = 0;
gridCobro.setMultiLine(false);
gridCobro.selmultirows="true";
gridCobro.delim = ";";
//gridCobro.setOnEditCellHandler(CantArticulos);
//gridCobro.setOnEnterPressedHandler(CantArticulos);
//INICIA GRID//
gridCobro.init();
}

setTimeout(function(){
	$("#gridCobro").width("100%");
}, 300);



$("#ing_dolares").keypress(function(event){
	total_p = usaFloat($("#ing_dolares").val()) * $("#montoTasa").val();
//alert(total_p.toFixed(3));
total_p = parseFloat(total_p.toFixed(3));
$("#ing_bolivares").val(muestraFloat(total_p.toFixed(2)));
});


$("#ing_bolivares").keypress(function(event){
	total_p = usaFloat($("#ing_bolivares").val()) / $("#montoTasa").val();
//alert(total_p.toFixed(3));
total_p = parseFloat(total_p.toFixed(3));
$("#ing_dolares").val(muestraFloat(total_p.toFixed(2)));
});


function montoCompleto(id) {


	if(id=="montoD"){
		gridCobro.clearAll();
		$("#monto_pend_").val($("#total_venta").val());
		$("#payment_type").val(7);
		AgregaMonto(7,$("#"+id).val(),"");
	}

	if(id=="total_venta"){
		gridCobro.clearAll();
		$("#monto_pend_").val($("#total_venta").val());
		$("#payment_type").val(2);
		AgregaMonto(2,$("#"+id).val(),"");
	}

	if(id=="monto_pend_" && $("#monto_pend_").val() != 0){
		$("#monto_pago").val($("#"+id).val());
	}

	if(id=="monto_pend_d_" && $("#monto_pend_d_").val() != 0){
		$("#monto_pago").val($("#"+id).val());
	}

}

function AgregaMonto(tipo_pago,monto,reference){


	$("#monto_pago").val("");
	$("#reference").val("");

	var op = $("#payment_type").val();
	var montoTasa = $("#montoTasa").val();
	var montoD = $("#montoD").val();
	var monto_om = 0;

	if(op=='7'|| op=='8'|| op=='9'){

		monto_om = monto;

		if(montoD == monto){
			monto = $("#total_venta").val();
		}else{
			monto = montoTasa * usaFloat(monto);
			monto = parseFloat(monto.toFixed(3))
			monto = muestraFloat(monto.toFixed(2));
		}

	}

/*if (usaFloat(monto) > usaFloat($('#monto_pend_').val())){
alertify.alert("<b>El Monto</b> Tiene que ser menor o Igual a <b>\""+$('#monto_pend_').val()+"\"</b> ").set({title:TITULO_ALERT});
$("#monto_pago").prop('disabled', false);
$("#reference").prop('disabled', false);
return false;
}*/

if(reference==""){reference="S/N";}

desc = $("#payment_type option:selected").text();
//alert(desc);
var	i = gridCobro.getRowsNum();

for(j=0;j<i;j++){
	if(gridCobro.getRowIndex(gridCobro.getRowId(j))!=-1){
		if (gridCobro.cells(gridCobro.getRowId(j),0).getValue() == tipo_pago){
			alert("El Tipo de Pago ya se Agrego");
			$("#monto_pago").prop('disabled', false);
			$("#monto_pago").val(monto);
			$("#reference").val(reference);
			return false;
		}
	}
}

i = generarCadena(4);
gridCobro.getCombo(0).put(tipo_pago,desc);
gridCobro.addRow(i,tipo_pago+";"+reference+";"+monto_om+";"+monto);

total_cobro();

$("#monto_pago").prop('disabled', false);
$("#reference").prop('disabled', false);


}

$(document).keydown(function(event){
	if(event.which==46){
//gridCobro.deleteRow(gridCobro.getSelectedId());
//total_cobro();
eliminar_tpago();
}
});

function eliminar_tpago(){


	alertify.confirm("¿Desea Eliminar la Forma de Pago <b>"+gridCobro.cells(gridCobro.getSelectedId(),0).getText()+"</b>?.",
		function(){
			gridCobro.deleteRow(gridCobro.getSelectedId());
			total_cobro();
		},
		function(){
			alertify.error('No se elimino la Forma de Pago');
		}).set({title:TITULO_ALERT},'labels', {ok:'Aceptar', cancel:'Cancelar'});

}





function total_cobro(){
	var total_ing = 0;
	var total_venta = $("#total_venta").val();
	var iva = 0;
	var total_p = 0;
//gridCobro.clearSelection();
for(j=0;j<gridCobro.getRowsNum();j++){
	total_ing +=  usaFloat(gridCobro.cells(gridCobro.getRowId(j),3).getValue()); 
}

monto_pend = usaFloat(total_venta) - total_ing;
monto_pend_d = (usaFloat(total_venta) - total_ing)/$("#montoTasa").val();;

$("#monto_ing").html(muestraFloat(total_ing.toFixed(2)));
$("#monto_ing_").val(muestraFloat(total_ing.toFixed(2)));
$("#monto_pend").html(muestraFloat(monto_pend.toFixed(2)));
$("#monto_pend_").val(muestraFloat(monto_pend.toFixed(2)));
$("#monto_pend_d").html(muestraFloat(monto_pend_d.toFixed(2)));
$("#monto_pend_d_").val(muestraFloat(monto_pend_d.toFixed(2)));

}

$("#monto_pago").keypress(function (event) {
	if(event.which==13){
		$("#monto_pago").prop('disabled', true);
		setTimeout(function(){AgregaMonto($("#payment_type").val(),$("#monto_pago").val(),$("#reference").val());}, 100);
	}

});

$("#reference").keypress(function (event) {
	if(event.which==13){
		$("#reference").prop('disabled', true);
		setTimeout(function(){AgregaMonto($("#payment_type").val(),$("#monto_pago").val(),$("#reference").val());}, 100);
	}

});

$("#payment_type").keypress(function (event) {
	if(event.which==13){
		$("#monto_pago").prop('disabled', true);
		setTimeout(function(){AgregaMonto($("#payment_type").val(),$("#monto_pago").val(),$("#reference").val());}, 100);
	}

});





function validar() {

//alert($('#total_venta').val() + ' - - - ' + $('#monto_ing_').val()); return false;
if (usaFloat($('#monto_ing_').val()) < usaFloat($('#total_venta').val())){
	alertify.alert("<b>Monto Pendiente por Agregar</b> ").set({title:TITULO_ALERT});
	return false;
}else{
	return true;
}
}




</script>
