<?php 
//error_reporting(E_NOTICE);
include("lib/librerias.php");
$opcion =@$_REQUEST['opcion'];
$descripcion = @$_REQUEST['descripcion'];
$codigo = @$_REQUEST['codigo'];
$cobrar = @$_REQUEST['cobrar'];
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
      <h5 class="modal-title" id="exampleModalLabel"><b>Clientes</b></h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>

    <div class="modal-body"> 
      <div class="row">
        <div class="col-sm-3">
          <div class="inner-addon right-addon">
            <i class="fa fa-search"></i>
           <input class="form-control input-sm" type="text" name="codigo2" id="codigo2" placeholder='Identificación' onkeyup="buscaPopup(<?=$pagina?>);">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="inner-addon right-addon">
            <i class="fa fa-search"></i>
            <input class="form-control input-sm" type="text" name="descripcion2" id="descripcion2" placeholder='Razón Social' onkeyup="buscaPopup(<?=$pagina?>);">
          </div>
        </div>
      </div><br>
      <div class="row" style="margin-left: 1px; margin-right: 1px; border: 1px solid #E8E7E7; padding-top: 8px; padding-bottom: 8px; background-color: #2B4A8C; color: #FFFFFF;">
        <div class="col-sm-3">
          <b>IDENTIFICACIÓN</b>
        </div>
        <div class="col-sm-9">
          <b>RAZÓN SOCIAL</b>
        </div>
      </div>
    </div>
<?}?>    
      <?php
          $regProd = new cliente;
          $prod = $regProd->get_all($conn, $descripcion, $codigo, $inicio, $tamano_pagina,$cobrar); 
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
                          <div class="row" style="cursor: pointer; pointer; padding-top: 8px; padding-bottom: 8px; margin-left: 1px; margin-right: 1px; border-bottom: 1px solid #E8E7E7; " data-dismiss="modal" aria-label="Close"  onclick="buscaDatosCliente(<?=$productos->customers_id?>,'<?=$productos->identificacion?>','<?=$productos->cliente?>')" onmouseover="this.style.background='#EDEDED';" onmouseout="this.style.background='white';">
                             <div class="col-sm-3">
                                <?=$productos->identificacion?>
                             </div>
                             <div class="col-sm-8">
                                <?=$productos->cliente?>
                             </div>
                          </div> 
                    <?php
                         
                       }
                     }else{?>
                      <h3>No se encontraron registros</h3> <a href="#" class="btn btn-primary" onclick="registraCliente()" >Registrar Cliente</a>
                     <?php
                      }

                       $total_paginas = ceil(@$total / $tamano_pagina);
                  ?>

                  <div class="row filas">  
                      <div colspan="7" align="center">
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


 <!--<div style="clear: both"></div>--> 

 <script type="text/javascript" language="javascript">

$(document).ready(function(){
  //setTimeout(function(){$("#codigo2").focus();}, 1000);

});


function buscaPopup(nro){
 // alert(nro);
 // setTimeout(function(){
  //$(muestra).load("updater_recargo_vehiculo.php?anio="+$('#anio2').val() + "&descripcion="+$('#descripcion2').val());
  $(muestra).load("buscaCliente.php", {descripcion:$('#descripcion2').val(),codigo:$('#codigo2').val(),pagina:nro});
 // }, 1000);

}

function registraCliente() {
  //$("a.registra_cliente").click(function(){
     $('#contenidoModal').load("registro_cliente.php?Ident="+$('#codigo2').val(), function() {
      $(this).fadeIn();
    });
    return false;
  //});
}

</script>