<?php 

include("lib/librerias.php");
$opcion =@$_REQUEST['opcion'];
$descripcion = @$_REQUEST['descripcion'];

empty($estatus) ? $estatus=0 : "";

$pagina = @$_REQUEST['pagina'];
$tamano_pagina = 20;
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
      <h5 class="modal-title" id="exampleModalLabel"><b>Vueltos Pendientes</b></h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
      </button>
   </div>

   <div class="modal-body"> 
      <div class="row">
         <div class="col-sm-12">
            <div class="inner-addon right-addon">
               <i class="fa fa-search"></i>
               <input class="form-control input-sm" type="text" name="descripcion2" id="descripcion2" placeholder='Busqueda' onkeyup="buscaPopup(<?=$pagina?>);">
            </div>
         </div>
      </div><br>
      <div class="row" style="margin-left: 1px; margin-right: 1px; border: 1px solid #E8E7E7; padding-top: 8px; padding-bottom: 8px; background-color: #2B4A8C; color: #FFFFFF;">
         <div class="col-sm-2">
            <b>NRO</b>
         </div>
         <div class="col-sm-2">
            <b>IDENTIFICACIÓN</b>
         </div>
         <div class="col-sm-5">
            <b>RAZÓN SOCIAL</b>
         </div>
         <div class="col-sm-2">
            <b>VUELTO BS</b>
         </div>
         <div class="col-sm-1">
            <b>$</b>
         </div>
      </div>
   </div>
   <?}?>    
   <?php
   $regProd = new cobro;
   $prod = $regProd->getVueltoPen($conn, $descripcion, $inicio, $tamano_pagina); 
   $total = $regProd->total; 
   ?>
   <div class="modal-body" style="padding: 10px"> 
      <div class="row">
         <div class="col-sm-12">
            <!--<table class="table table-condensed table-hover">-->
               <div id="muestra">
                  <?php
                  if (is_array($prod) && count($prod)>0){
                     foreach($prod as $productos)
                     {

                        ?>
                        <div class="row " style="cursor: pointer; padding-top: 8px; padding-bottom: 8px; margin-left: 1px; margin-right: 1px; border-bottom: 1px solid #E8E7E7; " data-dismiss="modal" aria-label="Close"  onclick="buscaDatosCliente(<?=$productos->customers_id?>,'<?=$productos->identificacion?>','<?=$productos->cliente?>','<?=$productos->charge_id?>','<?=$productos->nrodoc?>','<?=muestrafloat($productos->rate_amount)?>')" onmouseover="this.style.background='#EDEDED';" onmouseout="this.style.background='white';">
                           <div class="col-sm-2">
                              <?=$productos->nrodoc?>
                           </div>
                           <div class="col-sm-2">
                              <?=$productos->identificacion?>
                           </div>
                           <div class="col-sm-5">
                              <?=$productos->cliente?>
                           </div>
                           <div class="col-sm-2">
                              <?=muestrafloat($productos->vueltoP)?>
                           </div>
                           <div class="col-sm-1">
                              <?=muestrafloat($productos->vueltoP/$productos->rate_amount)?>
                           </div>
                        </div>
                        <?php

                     }
                  }else{?>
                     <h3>No se encontraron registros</h3> 
                     <?php
                  }

                  $total_paginas = ceil(@$total / $tamano_pagina);
                  ?>
                  <hr>
                  <div class="row filas">  
                     <div class="col-sm-12" align="center">
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
                     </div>
                  </div>
               </div>
            <!--</table>-->
         </div>
      </div>
   </div>

   <script type="text/javascript" language="javascript">

      function buscaPopup(nro){
         $(muestra).load("BuscaCobroXvuelto.php", {descripcion:$('#descripcion2').val(),codigo:$('#codigo2').val(),pagina:nro});
      }

      function registraCliente() {
         $('#contenidoModal').load("registro_cliente.php?Ident="+$('#codigo2').val(), function() {
            $(this).fadeIn();
         });
         return false;
      }

   </script>