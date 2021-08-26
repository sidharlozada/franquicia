<?
include 'lib/librerias.php';
$start_date = $_REQUEST['start_date'];
$ad_user_id = $_REQUEST['ad_user_id'];
$daily_closing_id = @$_REQUEST['daily_closing_id'];
$detalle = @$_REQUEST['detalle'];

if(!empty($detalle)){
   $JsonRec = new Services_JSON();
   $cierre = json_decode($JsonRec->decode(str_replace("\\","",$detalle)));
   $boton = "Actualizar";
}else{
   $cajas = new cajas;
   $cierre = $cajas->getCierreCaja($conn, $start_date, $ad_user_id);
   $boton = "Guardar";
}


?>
<!-- Modal -->
<div class="modal-content">
   <div class="modal-header" >
      <h5 class="modal-title" id="exampleModalLabel" >Cuadre de Caja de día <?=muestrafecha($start_date)?></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true" style="color:#fff;" >&times;</span>
      </button>
   </div>
   <div class="modal-body">
      <form name="cerrar_caja" id="cerrar_caja">
         <div class="container">
            <div class="row">
               <div class="col-sm">
                  <div class="form-group">
                     <label for="" style="font-size: 16px; font-weight: bold;">
                        &nbsp;
                     </label>
                  </div>
               </div>
               <div class="col-sm">
                  <div class="form-group">
                     <label for="" style="font-size: 16px; font-weight: bold;">
                        Teorico
                     </label>
                  </div>
               </div>
               <!--<div class="col-sm">
                  <div class="form-group">
                     <label for="" style="font-size: 16px; font-weight: bold;">
                        Vuelto Fisico
                     </label>
                  </div>
               </div>-->
               <div class="col-sm">
                  <div class="form-group">
                     <label for="" style="font-size: 16px; font-weight: bold;">
                        Fisico
                     </label>
                  </div>
               </div>
               <div class="col-sm">
                  <div class="form-group">
                     <label for="" style="font-size: 16px; font-weight: bold;">
                        Diferencia
                     </label>
                  </div>
               </div>
            </div>
            <?php
            $id = 0;
            $autofocus = "autofocus";
            foreach ($cierre as $key => $obj) {//var_dump($obj);
               $id = $obj->id;
               ?>
               <div class="row">
                  <div class="col-sm">
                     <label class="mt-4" style="font-size: 20px; font-weight: bold; color:black;">
                        <?=@str_replace("_", " ", $obj->description)?>
                     </label>
                  </div>
                  <div class="col-sm">
                     <div class="form-group">
                        <?php 
                           if($obj->c_currency_id == '1'){
                              @$vuelto = $obj->vueltobsf;
                              $monto = ($boton=="Guardar") ? $obj->amount - @$vuelto : $obj->amount  ;
                           }else if($obj->c_currency_id == '3'){
                              @$vuelto = $obj->vueltodolares;
                              $monto =  ($boton=="Guardar") ? $obj->amount_om - @$vuelto : $obj->amount_om ;
                           }
                           
                           if(empty(@$obj->difference)){
                              $diffrence =  $monto*-1;
                           }else{
                              $diffrence = $obj->difference;
                           }
                        ?>
                        <input type="text" class="form-control monto" name="teorico[]" id="teorico_<?=$id?>" placeholder="" value="<?=@muestrafloat($monto);?>" readonly="readonly" style="font-size: 16px; font-weight: bold; color:green;">
                     </div>
                  </div>
                  <!--<div class="col-sm">
                     <div class="form-group">-->
                        <input type="hidden" class="form-control monto" name="vuelto[]" id="vuelto_<?=$id?>" value="<?=@muestrafloat($vuelto);?>"   >
                     <!--</div>
                  </div>-->
                  <div class="col-sm">
                     <div class="form-group">
                        <input <?=$autofocus?> type="text" class="form-control monto" name="fisico[]" id="fisico_<?=$id?>" aria-describedby="helpId" placeholder="" value="<?=@muestrafloat($obj->physical);?>"  style="font-size: 16px; font-weight: bold; color:black;" onkeypress="return(formatoNumero(this,event));" onkeyup="diferencia(<?=$id?>);"  tabindex="1"  >
                     </div>
                  </div>
                  <div class="col-sm">
                     <div class="form-group">
                        <input type="text" class="form-control monto" name="dif[]" id="dif_<?=$id?>" aria-describedby="helpId"
                        placeholder="" value="<?=@muestrafloat($diffrence);?>" readonly="readonly">
                     </div>
                  </div>
               </div>
               <input type="hidden" name="id[]" id="id_<?=$id?>" value="<?=$id?>" readonly="readonly">
               <input type="hidden" name="moneda[]" id="m_<?=$id?>" value="<?=$obj->c_currency_id?>" readonly="readonly">
               <?php
               $autofocus="";
            }
            ?>
         </div>
         <input type="hidden" name="form" id="form" value="cerrar_caja">
         <input type="hidden" name="btnsavecierre" id="btnsavecierre" value="<?=$boton?>">
         <input type="hidden" name="start_date" id="start_date" value="<?=$start_date?>">
         <input type="hidden" name="daily_closing_id" id="daily_closing_id" value="<?=$daily_closing_id?>">
         
      </form>
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="3">Cancelar</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="guardar()" tabindex="2">Guardar Cierre</button>
   </div>
</div>
</div>
</div>
<script>
   function diferencia(id) {

      dif =  usaFloat($("#fisico_"+id).val()) - usaFloat($("#teorico_"+id).val());

      if(isNaN(dif)){
         dif="0";
         $("#fisico_"+id).val("0,00");

         if(usaFloat($("#fisico_"+id).val())==0 && usaFloat($("#teorico_"+id).val())!=0){
         dif =  usaFloat($("#fisico_"+id).val()) - usaFloat($("#teorico_"+id).val());
         }
      }

      $("#dif_"+id).val(muestraFloat(dif));
      //console.log(dif);

   }




</script>