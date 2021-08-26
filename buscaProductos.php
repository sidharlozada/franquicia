<?php 
session_start();
include("lib/librerias.php");
$opcion =@$_REQUEST['opcion'];
$descripcion = @$_REQUEST['descripcion'];
$codigo = @$_REQUEST['codigo'];
empty($estatus) ? $estatus=0 : "";

$pagina = @$_REQUEST['pagina'];
$tamano_pagina = 10;
if (!$pagina)
{
  $pagina = 1;
  $inicio = 0;
}
else
  $inicio = ($pagina - 1) * $tamano_pagina;

?>

<? if($opcion=="1"){ ?>
  <script type="text/javascript">setTimeout(function(){$("#codigo2").focus();}, 650);</script>
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><b>Productos</b></h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>

    <div class="modal-body"> 
      <div class="row">
        <!--<div class="col-sm-3">
          <div class="inner-addon right-addon">
            <i class="fa fa-search"></i>
           <input class="inputForm input-sm" type="text" name="codigo2" id="codigo2" placeholder='Código' onkeyup="buscaPopup(<?=$pagina?>);">
          </div>
        </div>-->
        <div class="col-sm-12">
          <div class="inner-addon right-addon">
            <i class="fa fa-search"></i>
            <input class="form-control input-sm" type="text" name="descripcion2" id="descripcion2" placeholder='Descripción' onkeyup="buscaPopup(<?=$pagina?>);">
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-2">
          <b>CÓDIGO</b>
        </div>
        <div class="col-sm-3">
          <b>DESCRIPCIÓN</b>
        </div>
        <div class="col-sm-1 centrado">
          <b>DISP.</b>
        </div>
        <div class="col-sm-2 centrado">
          <b>UNIDAD</b>
        </div>
        <div class="col-sm-2 centrado">
          <b>PRECIO $</b>
        </div>
        <div class="col-sm-2 centrado">
          <b>PRECIO Bs.</b>
        </div>
      </div>
    </div>
<?}?>    
      <?php
          $regProd = new productos;
          $m_warehouse_id_in = @$_REQUEST['m_warehouse_id'];
          $prod = $regProd->getallxAlmacen($conn, $descripcion, $m_warehouse_id_in, $inicio, $tamano_pagina); 
          $total = $regProd->total; 
          $rate_id ="";
          
          $tasa = new tasas;
          $montoTasa = $tasa->getTasaActual($conn, date("Y-m-d"), $rate_id);
      ?>
      <div class="modal-body" style="padding: 5px"> 
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-condensed table-hover">
                  <tbody id="muestra">

                    <?php
                      $m_warehouse_id = $_SESSION['m_warehouse_id'];
                      $m_warehouse_id = !empty($_REQUEST['m_warehouse_id']) ? $_REQUEST['m_warehouse_id'] : $m_warehouse_id;
                      if (is_array($prod) && count($prod)>0){
                       foreach($prod as $productos)
                       {

                          $Stock = new productos;
                          $respStock = $Stock->getStock($conn, $productos->m_product_id, $m_warehouse_id);

                          $stock = (empty($respStock->stock)) ? 0 : $respStock->stock
                          ?>
                          <tr>
                      <td>
                          <div class="row" data-dismiss="modal" aria-label="Close"  onclick="Buscaproducto('<?=$productos->cod?>')">
        <div class="col-sm-2">
          <?=$productos->cod?>
        </div>
        <div class="col-sm-3">
          <?=$productos->name?>
        </div>
        <div class="col-sm-1 monto">
          <b><?=muestrafloat($stock)?></b>
        </div>
        <div class="col-sm-2 monto">
          <?=$productos->uomsymbol?>
        </div>
        <div class="col-sm-2 monto">
          <?=muestrafloat($productos->price_om)?>$
        </div>
        <div class="col-sm-2 monto">
          <?=(empty($montoTasa->monto)) ? muestrafloat(0) : muestrafloat($productos->price_om*$montoTasa->monto);?> Bs
        </div>
      </div>

</td></tr>
                    <?php
                         
                       }
                     }else{?>
                      <h3>No se encontraron registros</h3> <!--<a href="#" class="registra_cliente">Registrar Cliente</a>-->
                     <?php
                      }

                       $total_paginas = ceil(@$total / $tamano_pagina);
                  ?>

                  <tr class="filas">  
                      <td colspan="7" align="center">
                        <ul class="pagination  pagination-sm">
                        <? if($pagina=='1'){ 
                             echo '<li class="disabled"><a href="#">«</a></li>';
                        }else{
                              $pag = $pagina - 1;
                              echo '<li onclick="buscaPopup('.$pag.');"><a href="#">«</a></li>';
                        }?>

                          <?
                          for ($j=1; $j<=$total_paginas; $j++)
                          {
                            if ($j==$pagina)
                              echo '<li class="active"><a href="#">'.($j>1 ? '':'').$j.'<span class="sr-only actual"></span></a></li>';
                            else
                              echo '<li onclick="buscaPopup('.$j.');"><a href="#"><span style="cursor:pointer" >'.($j>1 ? '':'').$j.'</span></a></li>';
                          }
                          ?>
                          <? if($pagina==$total_paginas){ 
                              echo '<li class="disabled"><a href="#">»</a></li>';
                          }else{
                              $pag = $pagina + 1;
                              echo '<li onclick="buscaPopup('.$pag.');"><a href="#">»</a></li>';
                          }?>

                        </ul>
                        <br>
                        Pagina <strong><?=$pagina?></strong> de <strong><?=$total_paginas?></strong>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>


 <!--<div style="clear: both"></div>--> 

 <script type="text/javascript" language="javascript">

$(document).ready(function(){
  //setTimeout(function(){$("#codigo2").focus();}, 1000);

});


function buscaPopup(nro){
 // alert(nro);
 // setTimeout(function(){
  //$(muestra).load("updater_recargo_vehiculo.php?anio="+$('#anio2').val() + "&descripcion="+$('#descripcion2').val());
  $(muestra).load("buscaProductos.php", {descripcion:$('#descripcion2').val(),codigo:$('#codigo2').val(),pagina:nro});
 // }, 1000);

}

$(document).ready(function() {
  $("a.registra_cliente").click(function(){
     $('#contenidoModal').load("registro_cliente.php?Ident="+$('#codigo2').val(), function() {
      $(this).fadeIn();
    });
    return false;
  });
});

</script>