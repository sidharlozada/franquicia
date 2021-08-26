<?php
	include("lib/librerias.php");
	
	$modulo = @$_REQUEST['modulo'];
	$clase = @$_REQUEST['clase'];
	$titulo = @$_REQUEST['titulo'];
	$campos = @$_REQUEST['campos'];
	$formulario =@$_REQUEST['formulario'];
	$id = @$_REQUEST['id'];
	$descripcion = @$_REQUEST['descripcion'];
	$tamano_pagina = @$_REQUEST['tamano_pagina'];
	$pagina = @$_REQUEST['pagina'];
	

	$tamano_pagina = empty($tamano_pagina) ?  5 : $tamano_pagina;
	if (!$pagina){
		$pagina = 1;
		$inicio = 0;
	}else{
		$inicio = ($pagina - 1) * $tamano_pagina;
	}

	switch ($modulo) {
		case 'modulo':

		$obj = new $clase;
		$resp = $obj->getall($conn, $descripcion, $inicio, $tamano_pagina); 
		$total = $obj->total; 
		$total_paginas = ceil($total / $tamano_pagina);
		$buscar['pag'] = $total_paginas;
		$buscar['tabla']='';
		$num = !empty($resp) ? count($resp) : 0;
		//die($num."ss");
		if(!$num){
			$buscar['tabla']='<tr><td colspan="5"><h3>Sin registros.</h3></td></tr>';
		}else{
			foreach($resp as $num => $r)
			{	$n = $num+1;
				$Color = ($num%2==0) ? "#FFFFFF" : "#EEEDED";
				
				$buscar['tabla'].='<tr style="background-color:'.$Color.'; border: 1px #E1DEDE solid;">';

				foreach ($campos as $key => $nom) {
					$campo = CreaCampo($r, $nom);
	        		$buscar['tabla'].='<td style="vertical-align:middle;cursor:pointer;" width="auto">'.$campo.'</td>';
	        	}

				$buscar['tabla'].='<td width="30px">
				<a name="btneditar" id="" class="buscar btn btn-primary " href="'.$formulario.'.php?'.$id.'='.$r->$id.'">
				<i class="fas fa-eye img-fluid " alt="Detalle" title="Consultar Registro"></i>
				</a>
				</td>
				</tr>';
			}
		}
		$buscar['cant_pagina'] ='Página <strong>'.$pagina.'</strong> de <strong>'.$total_paginas.'</strong>';
		$buscar['tabla'].='<script type="text/javascript">
		$("a.buscar").click(function() {

			const indexOfMark = this.href.indexOf("?");
			var params = "";
			if(indexOfMark>0){
				params = this.href.slice(indexOfMark,this.href.length);
			}
			
			$("#contBusq").show("swing");	
			$("#report").css("display", "none");
				$("#contenidoBusq").load("Forms\\\\'.$formulario.'.php"+params, function() {
					$(this).fadeIn();
				});
			return false;
		});

		$("#cerrar").click(function() {
			$("#contBusq").hide("linear");
			$("#report").css("display", "none");
		return false;													
		});
		</script>';
	//
	//var_dump($buscar);

	$json=new Services_JSON();
	echo $json->encode($buscar);


	break;

	case 'tablaCuerpo':
	$cantCol = count($titulo);
	$cuerpo['tabla']="";

	$cuerpo['tabla']='
	<div class="table-responsive">
	<table class="table table-light"  border="0">
         <tr>
         	<td colspan="'.$cantCol.'" style="padding: 0px;">
         		<table width="99%" border=0>
	        		<tr>
			            <td  align="left">
			               	<div class="row " style="width: 300px; padding-left:20px;">
			                  <label for="return1"><b> Mostrar:</b></label>
			                  <div class="col-sm-6">
			                     <select class="form-control input-min" style="padding: 0 0 0 10px" name="tamano_pagina" id="tamano_pagina" onchange="busca_popup(1);">
			                        <option value="5">5</option>
			                        <option value="10">10</option>
			                        <option value="25">25</option>
			                        <option value="50">50</option>
			                        <option value="100">100</option>
			                     </select>
			                  </div>
			                  <span id="return1"> Registros</span>
			               	</div>
			            </td>
			            <td align="right">
			               <div class="row mr-2" style=" width: auto; float: right;">
			                  <div class="col-sm-2" style="padding: 0px">
			                     <b>Buscar:</b>
			                  </div>
			                  <div class="col-sm-1" style="padding: 0px"></div>
			                  <div class="col-sm-8" style="padding: 0 0 0 15px">
			                     <input class="form-control input-min"  type="text" autocomplete="off" name="descripcion" id="descripcion" onkeyup="busca_popup(1);" >
			                  </div>
			               </div>
			            </td>
            		</tr>
            	</table>
            </td>
        </tr>
        <input type="hidden" name="pag_val" id="pag_val" value="1">
	         <tr align="left" class="table-dark" >'; 
	        foreach ($titulo as $key => $value) {
	        	$cuerpo['tabla'].='<th width="auto">'.$value.'</th>';
	        }
	    $cuerpo['tabla'].='</tr> 
	       <tbody id="muestraBusq" style="border: 1px #E1DEDE solid;">
	        </tbody>
	        <tr class="filas " >
	        	<td colspan="'.$cantCol.'" >
	        		<table width="99%" >
	        			<tr>
	        				<td id="cant_pagina" align="left"></td>  
				            <td align="right" >
				               <ul class="pagination  pagination-sm" id="pagination"></ul>
				           </td>
	        			</tr>
	        		</table>
	        	</td>
	        </tr>
	    </table>
		</div>';

	    $json=new Services_JSON();
		echo $json->encode($cuerpo);

	break;

	case 'contenedor':
		$container_reference = $_REQUEST['container_reference'];
		$status = new estatusContenedor;
		$resp = $status->getContenedor($conn, $id); 
		$buscar['tabla']='';
		$num = !empty($resp) ? count($resp) : 0;
		$contenedor = !empty($container_reference) ? "N° Contenedor: $container_reference":"";
		if(!$num){
			$buscar['tabla']='<tr><td colspan="5"><h3>Sin registros.</h3></td></tr>';
		}else{

			$buscar['tabla']='
			<div class="row" style="border-bottom: 1px solid #E1E0E0">
                           <div class="col-8"><b>TOTAL DE PRODUCTOS EN TODOS LOS CONTENEDORES</b></div>
                           <div class="col-4 monto"><b>'.$contenedor.'</b></div>
                           <div class="col-2">
                              <b>Código</b>
                           </div>
                           <div class="col-6">
                              <b>Descripción</b>
                           </div>
                           <div class="col-2">
                              <b>Presentación</b>
                           </div>
                           <div class="col-2">
                              <b>Total</b>
                           </div>
                        </div>
            ';

            if (is_array($resp) && count($resp)>0){
               foreach($resp as $obj)
               {
               	$buscar['tabla'].='
                  <div class="row" style="border-bottom: 1px solid #E1E0E0">
                           <div class="col-2">
                              '.$obj->code.'
                           </div>
                           <div class="col-6">
                             '. $obj->art_desc.'
                           </div>
                           <div class="col-2">
                              '.$obj->nameUnd.'
                           </div>
                           <div class="col-2 monto">
                              <span style="color: #1B7B4D"><b>'.number_format($obj->total, 0, ',', '.').'</b></span>
                           </div>
                        </div>
              
  				';
                
               }
            }
                
	
		}

	//
	//var_dump($buscar);

	$json=new Services_JSON();
	echo $json->encode($buscar);


	break;


	case 'detStatus':
		$container_reference = $_REQUEST['container_reference'];
		$status = new estatusContenedor;
		$resp = $status->getDetalleStatus($conn, $id); 
		$buscar['tabla']='';
		$num = !empty($resp) ? count($resp) : 0;

		if(!$num){
			$buscar['tabla']='<tr><td colspan="5"><h3>Sin registros.</h3></td></tr>';
		}else{

			$buscar['tabla']='
			<div class="row" style="border-bottom: 1px solid #E1E0E0">
                           <div class="col-8"><b>SEGUIMIENTO DE LOS MOVIMIENTOS DEL CONTAINER</b></div>
                           <div class="col-4 monto"><b>N° Contenedor: '.$container_reference.'</b></div>
                           <div class="col-1">
                              <b>N°</b>
                           </div>
                           <div class="col-3">
                              <b>Actualización</b>
                           </div>
                           <div class="col-8">
                              <b>Descripción</b>
                           </div>
                        </div>
            ';

            if (is_array($resp) && count($resp)>0){
            	$n =1;
               foreach($resp as $obj)
               {
               	$buscar['tabla'].='
                  <div class="row" style="border-bottom: 1px solid #E1E0E0">
                           <div class="col-1">
                              '.$n.'
                           </div>
                           <div class="col-3">
                             '.muestraFechaLarga($obj->updated).'
                           </div>
                           <div class="col-8">
                              '.$obj->description.'
                           </div>

                        </div>
              
  				';
                $n++;
               }
            }
                
	
		}

	//
	//var_dump($buscar);

	$json=new Services_JSON();
	echo $json->encode($buscar);


	break;



	default:
	# code...
	break;
}





?>