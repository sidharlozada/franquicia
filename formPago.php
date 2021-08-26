<?php
include 'lib/librerias.php';

@$payment_id = $_REQUEST['payment_id'];

$tipo = new pago;
if(!empty($payment_id)){
   $tp = $tipo->get($conn, $payment_id);

}

//$r = $conn->Execute($q);
$checked="";
(!empty($tp->payment_id)) ? $save ="Actualizar" : $save ="Guardar";
if(@$tp->isactive=="Y"){
   $checked ="checked";
}

?>
<br>
<div class="card">
   <div class="card-header p-2">
      <ul class="nav nav-pills">
         <li class="nav-item"><a class="nav-link active" href="#producto" data-toggle="tab">Pago</a>
         </li>
      </ul>
   </div><!-- /.card-header -->
   <div class="card-body">
      <div class="tab-content">
         <div class="active tab-pane" id="producto">
            <form method="post" name="pago" id="pago">
               <!-- <div class="tab-content"> -->
                  <!-- INICIO PRODUCTO -->
                  <div id="tasas" class="tab-pane  active">

                     <div class="row">
                        <div class="col-sm-2  mb-3">
                           <div class="input-group">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="payment_id"
                                 id="payment_id" value="<?=@$tp->payment_id;?>"
                                 readonly="readonly">
                                 <span>Código</span>
                              </label>
                           </div>
                        </div>
                        <div class="col-sm-3 ">
                           <div class="input-group ">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="nrodoc" id="nrodoc" value="<?=@$tp->nrodoc;?>" readonly>
                                 <span>Orden de Compra</span>
                              </label>
                              <input type="hidden" name="purchase_order_id" id="purchase_order_id" value="<?=@$tp->purchase_order_id;?>">

                           </div>
                        </div>

                        <div class="col-sm-1" style="text-align: left;">

                           <i id="lupa" class="fa fa-search fa-2x find <?=$hide?>" style="border: 0px; padding: 0px; margin-top:  15px;background-color:transparent;" onclick="buscaOrdenCompra()"></i>

                        </div>
                        <div class="col-sm-2 ">
                           <div class="input-group ">
                              <label>
                                 <input type="date" class="inputForm" placeholder="" name="start_date" id="start_date" value="<?=muestrafecha1(@$fact->start_date);?>" readonly>
                                 <span>Fecha Orden</span>
                              </label>
                           </div>
                        </div>
                        <div class="col-sm-2 ">
                           <div class="input-group ">
                              <label>
                                 <input type="date" class="inputForm" placeholder="" name="end_date" id="end_date" value="<?=muestrafecha1(@$fact->end_date);?>" >
                                 <span>Fecha</span>
                              </label>
                           </div>
                        </div>
                        <div class="col-sm-2 ">
                           <div class="input-group ">
                              <label>
                                 <?php 
                                 $q2 = "SELECT status_id id, name descripcion FROM system.status";
                                 echo superCombo($conn, $q2, @$fact->status_id, 'status_id_view','status_id_view','width:100%', "",'id','descripcion','','','disabled','SIN REGISTRAR','inputForm');

                                 ?>
                                 <span>Estatus</span>
                              </label>
                              <input type="hidden" name="status_id" id="status_id" value="<?=@$fact->status_id;?>">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-2 ">
                           <div class="input-group ">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="identification" id="identification" value="<?=@$fact->identificacion;?>" readonly>
                                 <span>Identificación</span>
                              </label>
                              <input type="hidden" class="" placeholder="" name="customers_id" id="customers_id" value="<?=@$fact->customers_id;?>" >
                           </div>
                        </div>
                        <div class="col-sm-4 ">
                           <div class="input-group ">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="razonsocial" id="razonsocial" value="<?=@$fact->cliente;?>" readonly>
                                 <span>Razón Social</span>
                              </label>
                           </div>
                        </div>

                        <div class="col-sm-6 mb-2">
                           <div class="input-group">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="description"
                                 id="description" value="<?=@$tp->description;?>" onkeyup="this.value = this.value.toUpperCase();">
                                 <span>Descripción </span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-2">
                           <div class="input-group">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="transaction_number"
                                 id="transaction_number" value="<?=@$tp->transaction_number;?>" onkeyup="this.value = this.value.toUpperCase();">
                                 <span>Numero Transacción </span>
                              </label>
                           </div>
                        </div>
                        <div class="col-3">
                           <div class="input-group">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="description_trans"
                                 id="description_trans" value="<?=@$tp->description_trans;?>" onkeyup="this.value = this.value.toUpperCase();">
                                 <span>Descripción Transacción </span>
                              </label>
                           </div>
                        </div>

                        <div class="col-1"></div>
                        <div class="col-2">
                           <div class="input-group">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="product_cant"
                                 id="product_cant" value="<?=@$tp->product_cant;?>" onkeyup="this.value = this.value.toUpperCase();" readonly>
                                 <span>Cant. productos</span>
                              </label>
                           </div>
                        </div>
                        <div class="col-2">
                           <div class="input-group">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="art_cant"
                                 id="art_cant" value="<?=@$tp->art_cant;?>" onkeyup="this.value = this.value.toUpperCase();" readonly>
                                 <span>Cant. Articulos</span>
                              </label>
                           </div>
                        </div>

                        <div class="col-2">
                           <div class="input-group">
                              <label>
                                 <input type="text" class="inputForm" placeholder="" name="total" id="total" value="<?=@$tp->total;?>" onkeyup="this.value = this.value.toUpperCase();" readonly>
                                 <span>Monto </span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <!-- </div> -->
                     <!-- <div class="row"> -->
                     </div>
                     <table>
                        <tbody>
                           <tr>
                              <td>
                                 <button onclick="validar(); return false;" class="btn btn-success btn-block btn-sm"
                                 name="btnsave" value="<?=$save?>"><?=$save?></button>
                              </td>
                              <td>&nbsp;</td>
                              <td colspan="2">
                                 <div class="" align="center" id="aviso" style="display: none;font-weight: 700;">
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <input type="hidden" name="form" id="form" value="pago">
                     <input type="hidden" name="btnsavepago" id="btnsavepago" value="<?=$save?>">
                  </div>
               </div>
            </form>

         </div>
      </div>
   </div>
   <!-- /.login-card-body -->
</div>
<hr>
<br>
<!-- Dir Modal-->
<div class="modal fade " id="DirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document"  style="max-width:900px; cursor: pointer;">
      <div class="modal-content" id="move" >

         <div  id="contenidoModal"></div>

      </div>
   </div>
</div>
</body>

</html>
<script>
function save() { //Funcion para guardar los datos del formulario direccion

   var parametros = new FormData($("#pago")[0]);
   $.ajax({
      data: parametros,
      url: 'save.php',
      type: 'post',
      contentType: false,
      processData: false,
      cache: false,
      beforeSend: function() {
         $("#env").show();
      },
success: function(response) { //Aqui se recibe la informacion si se guardo o no los registros

   if (response == 1) {

      alertify.success("Estatus registrado con Éxito");
      $('#contBusq').hide("swing");
      $('#contenido').load("pago.php", function() {
         $(this).fadeIn();
      });
/*$('#almacen')[0].reset();
$('#direccion')[0].reset();*/

} else if (response == 2) {

   alertify.error("Error Registrando el Estatus");
} else if (response == 3) {

   alertify.success("Registro Actualizado con Éxito");
   $('#contBusq').hide("swing");
   $('#contenido').load("pago.php", function() {
      $(this).fadeIn();
   });
} else if (response == 4) {

   alertify.error("Error Actualizando registro");
} 


}
});
}


function validar() {

   description = mensaje("description");

   if (description) {
      $("#aviso").removeClass("alert-danger");
      $("#aviso").hide();
      save();
   } else {
      $("#aviso").show();
      $("#aviso").html("Faltan datos por llenar.");
      $("#aviso").addClass("alert-danger");
   }


}

function buscaOrdenCompra() {
   $('#DirModal').modal("show");
   $("#DirModal").css("display", "block");
   $("#DirModal").css("background-color", "#00000050");
   $(".modal-content").css("margin-top", "50px");
   $('#contenidoModal').load('buscaOrdenCompra.php?opcion=1', function() {
      $(this).fadeIn();
   });
   return false;
}


function buscaDatosCliente(customers_id,identificacion,cliente){

   $("#identification").val(identificacion);
   $("#customers_id").val(customers_id);
   $("#razonsocial").val(cliente);

}

function buscaDocumentoRef(purchase_order_id){
   var parametros = {
      "purchase_order_id" : purchase_order_id,
      "form" : "buscaOrdenCompra"
   };
   $.ajax({
      data:  parametros,
      url:   'save.php',
      type:  'post',
      beforeSend: function () { 
      },
      success:  function (response) {

         if (response != 0) {
            var json = JSON.parse(response);

//alert(json['cliente']);
//return false;
if(json){

   buscaDatosCliente(json['customers_id'],json['identificacion'],json['cliente']);
   $("#nrodoc").val(json['nrodoc']);
   $("#purchase_order_id").val(json['purchase_order_id']);
   $("#start_date").val(fechaCorta(json['start_date']));
   $("#art_cant").val(json['art_cant']);
   $("#product_cant").val(json['product_cant']);
   $("#total").val(muestraFloat(json['total']));
   $("#description").val(json['description']);


//CargarGridDocRef(json['GridProductos']);

}/*else{

$("#identification").val("");
$("#customers_id").val("");
$("#razonsocial").val("");

$('#DirModal').modal("show");
$("#DirModal").css("display", "block");
$("#DirModal").css("background-color", "#00000050");
$(".modal-content").css("margin-top", "100px");
$('#contenidoModal').load("registro_cliente.php?Ident="+Indet, function() {
$(this).fadeIn();
});

}*/
}
}
});

}
/*
function CargarGridDocRef(GridProductos){
var JsonAux;
  gridRProduc.clearSelection();
  gridRProduc.clearAll();

      var Prod = JSON.parse(GridProductos);
        j=0;
      for(i=0;i<Prod.length;i++){

      j = j+1;
      id = generarCadena(4);


        //alert(id);
      gridRProduc.getCombo(1).put(Prod[i]['m_product_id'],Prod[i]['code']);
      gridRProduc.getCombo(3).put(Prod[i]['m_warehouse_id'],Prod[i]['shorten']);
      gridRProduc.getCombo(5).put(Prod[i]['c_uom_id'],Prod[i]['uomsymbol']);
      gridRProduc.getCombo(7).put(Prod[i]['discount_percent_id'],Prod[i]['discount_shorten']);
      gridRProduc.getCombo(8).put(Prod[i]['tax_id'],Prod[i]['percent']);
      gridRProduc.addRow(id,j+";"+Prod[i]['m_product_id']+";"+Prod[i]['art_desc']+";"+Prod[i]['m_warehouse_id']+";"+ muestraFloat(Prod[i]['quantity']) +";"+Prod[i]['c_uom_id']+";"+ muestraFloat(Prod[i]['price']) +";"+ Prod[i]['discount_percent_id'] +";"+Prod[i]['tax_id']+";"+ muestraFloat(Prod[i]['total']));

      //gridRProduc.cells(id,4).setDisabled(true);
      //gridRProduc.disableCell(id,4,'true');
      cantProd[i] = new Array;
      cantProd[i]['cantidad'] = Prod[i]['quantity'];
      cantProd[i]['m_product_id'] = Prod[i]['m_product_id'];
      cantProd[i]['update'] = 1;
      
      //CantArticulos(2,id,4,0);

    total();

    }

  
}*/

</script>