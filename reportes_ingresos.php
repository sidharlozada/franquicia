<?
include 'lib/librerias.php';

$op = $_REQUEST ['op'];


switch ($op) {
    case 'resumen_ingresos':
        //$reporte = new RegistroVentas;
        $fechaInicio = $_REQUEST ['fechaInicio'];
        $fechaFinal = $_REQUEST ['fechaFinal'];
        $c_currency_id = $_REQUEST ['c_currency_id'];

        if($fechaInicio==$fechaFinal){
                $reporte['dh']='D&iacute;a '.muestrafecha($fechaInicio);
            }else{
                $reporte['dh'] ='Desde '.muestrafecha($fechaInicio).' - Hasta '.muestrafecha($fechaFinal);
            }

        $reporte['tabla']='
                <table style="color:black;" class="table table-striped tabla" border="0">
                    <tr>
                        <th style="text-align:center;" >C&oacute;digo</th>
                        <th style="text-align:center;" > Descripci&oacute;n</th>
                        <th style="text-align:center;" >Unidad</th>
                        <th style="text-align:center;" >Cantidad</th>
                        <th style="text-align:center;" >Total Litros</th>
                        <th style="text-align:center;" >Monto</th>
                    </tr>';
        $total=0;
        $iva = 0;
        $monto_ext = 0;
        $total_ltrs = 0;

        $factura = new facturacion;
        $fact = $factura->getResumen($conn,$fechaInicio,$fechaFinal,$c_currency_id);

        if(!empty($fact) && count($fact)>0)
        foreach ($fact as $r) { 
        //while(!$r->EOF){
         $reporte['tabla'].='
                    <tr>
                        <td style="font-size:small; mso-number-format: @ ">'.$r->codigo.'</td>
                        <td style="font-size:small">'.$r->descripcion.'</td>
                        <td style="font-size:small">'.$r->unidad.'</td>
                        <td style="font-size:small" align="center">'.$r->cantidad.'</td>
                        <td style="font-size:small" align="right">'.muestrafloat($r->litros).'</td>
                        <td style="font-size:small" align="right">'.muestrafloat($r->total).'</td>

                    </tr>';
        $total += $r->total;
        //$iva += $r->total*$r->percent;
        $monto_ext += $r->monto_ext;
        $iva += $r->monto_iva;
        $total_ltrs += $r->litros;
       // $r->movenext();
        }
        
        $num = !empty($fact) ? count($fact) : 0;       
        if(!$num){
            $reporte['tabla'].='</table><h2>Sin resultados.</h2>';
        }else{
            $reporte['tabla'].='
                        <tr><th colspan="" ></th></tr>
                        <tr>
                            <td colspan="5" align="right">
                                <b style="font-size:small">Sub-Total Ventas</b>
                            </td>
                            <td style="font-size:small" align="right"><b>Bs. '.number_format($total,2,',','.').'</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>Exento</b>
                            </td>
                            <td style="font-size:small" align="right"><b>Bs. '.number_format($monto_ext,2,',','.').'</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>IVA %</b>
                            </td>
                            <td style="font-size:small" align="right"><b>Bs. '.number_format($iva,2,',','.').'</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>Total Ventas</b>
                            </td>
                            <td style="font-size:small" align="right"><b>Bs. '.number_format($total+$iva,2,',','.').'</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>Total Litros</b>
                            </td>
                            <td style="font-size:small" align="right"><b>'.number_format($total_ltrs,2,',','.').'</b></td>
                        </tr>
                        </table>
                        <table border="0">
                        <tr>
                                
                            <td align="right"><a onclick="ImprimirPDF(\''.$fechaInicio.'\',\''.$fechaFinal.'\',1);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>

                              
                        </tr>';

         $reporte['tabla'].='</table>';


        }
            $json=new Services_JSON();
            echo (@$excell==1) ?  $reporte['dh']."".$reporte['tabla'] : $json->encode($reporte);
            
    break;
    
    case 'recibos':
            //$reporte = new RegistroVentas;
            $fechaInicio = $_REQUEST ['fechaInicio'];
            $fechaFinal = $_REQUEST ['fechaFinal'];
            //$estatus = $_REQUEST ['estatus'];
            $identificacion = $_REQUEST ['identificacion'];
            $c_currency_id = $_REQUEST['c_currency_id'];

            if($fechaInicio==$fechaFinal){
                    $reporte['dh']='D&iacute;a '.muestrafecha($fechaInicio);
                }else{
                    $reporte['dh'] ='Desde '.muestrafecha($fechaInicio).' - Hasta '.muestrafecha($fechaFinal);
                }

            $reporte['tabla']='
            <table style="color:black;" class="table table-striped tabla" border="0">
                        <tr>
                            <th style="text-align:center;">Nro</th>
                            <th style="text-align:center;">Fecha</th>
                            <th style="text-align:center;">Identificación</th>
                            <th style="text-align:center;">Cliente</th>
                            <th style="text-align:center;">Monto</th>
                            <th style="text-align:center;">Reporte</th>
                          
                        </tr>';
            $subtotal = 0;
            $iva = 0;
            $total=0;
            $monto_ext=0;
            $op = 0;
            $doc ="";


            $factura = new facturacion;
            $fact = $factura->getDetalle($conn,$fechaInicio,$fechaFinal,$identificacion,$c_currency_id);
            if(!empty($fact) && count($fact)>0)
            foreach ($fact as $r) { 
                $id = $r->id;
                $doc = substr($r->nrodoc,0, 3);
                $op = ($doc=='FAC') ? 1 :3;
             $reporte['tabla'].='<tr>';
               /* if($estatus==1){
                    $reporte['tabla'].='
                            <td align="center"><a onclick="if (confirm(\'Si presiona Aceptar se Anulara el Recibo\')){anular('.$id.'); return true;} else{return false;}" href="#" title="Anular">'.$r->fields['nrodoc'].'</a></td>';
                        }else{*/
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.$r->nrodoc.'</td>';
                //        }
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.muestrafecha($r->fecha).'</td>
                            <td style="font-size:small" align="center">'.$r->ident.'</td>
                            <td style="font-size:small" align="center">'.$r->cliente.'</td>
                            <td style="font-size:small" align="right">'.muestrafloat($r->monto).'</td>
                            <td style="font-size:small" align="center"><a onclick="Imprimir('.$id.','.$op.');" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>
                        </tr>';
            $subtotal += $r->monto;
            $monto_ext += ($r->percent==0) ? $r->monto : 0;
            $iva += $r->monto*$r->percent;
            
            }
            $total = $subtotal + $iva;
            $num = !empty($fact) ? count($fact) : 0;       
            if(!$num){
                $reporte['tabla'].='</table><h2>Sin resultados.</h2>';
            }else{
                $reporte['tabla'].='
                            <tr><th colspan="6" ></th></tr>
                            <tr>
                                <td style="font-size:small" colspan="5" align="right">
                                    <b>Sub - Total</b>
                                </td>
                                <td style="font-size:small" align="right"><b> '.number_format($subtotal,2,',','.').'</b></td>
                            </tr>
                            <tr>
                                <td style="font-size:small" colspan="5" align="right">
                                    <b>Exento</b>
                                </td>
                                <td style="font-size:small" align="right"><b> '.number_format($monto_ext,2,',','.').'</b></td>
                            </tr>
                            <tr>
                                <td style="font-size:small" colspan="5" align="right">
                                    <b>I.V.A. %</b>
                                </td>
                                <td style="font-size:small" align="right"><b> '.number_format($iva,2,',','.').'</b></td>
                            </tr>
                            <tr>
                                <td style="font-size:small" colspan="5" align="right">
                                    <b>Total</b>
                                </td>
                                <td style="font-size:small" align="right"><b> '.number_format($total,2,',','.').'</b></td>
                            </tr>
                            <tr>
                                
                                <td colspan="6" align="right"><a onclick="ImprimirPDF(\''.$fechaInicio.'\',\''.$fechaFinal.'\',2);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>
                                
                            </tr>
                        </table>';
            }
                $reporte['tabla'].='<input type="hidden" name="fec_ini" id="fec_ini" value="'.$fechaInicio.'" >';
                $reporte['tabla'].='<input type="hidden" name="fec_fin" id="fec_fin" value="'.$fechaFinal.'" >';
                
                $json=new Services_JSON();
                echo (@$excell==1) ?  $reporte['dh']."".$reporte['tabla'] : $json->encode($reporte);
                
        break;
        
        case 'utilidad':
            //$reporte = new RegistroVentas;
            $fechaInicio = $_REQUEST ['fechaInicio'];
            $fechaFinal = $_REQUEST ['fechaFinal'];
            //$estatus = $_REQUEST ['estatus'];
            //$identificacion = $_REQUEST ['identificacion'];
            $c_currency_id = $_REQUEST['c_currency_id'];

            if($fechaInicio==$fechaFinal){
                    $reporte['dh']='D&iacute;a '.muestrafecha($fechaInicio);
                }else{
                    $reporte['dh'] ='Desde '.muestrafecha($fechaInicio).' - Hasta '.muestrafecha($fechaFinal);
                }

            $reporte['tabla']='
            <table style="color:black;" class="table table-striped tabla" border="0">
                        <tr>
                            <th>Fecha</th>
                            <th>Venta</th>
                            <th>Costo</th>
                            <th>Utilidad</th>
                            <th>Egreso</th>
                        </tr>';
            $venta = 0;
            $costo = 0;
            $utilidad=0;
            $gastos =0;


            $factura = new facturacion;
            $fact = $factura->getUtilidad($conn,$fechaInicio,$fechaFinal,$c_currency_id);
            if(!empty($fact) && count($fact)>0)
            foreach ($fact as $r) { 
                //$id = $r->id;
                
             $reporte['tabla'].='<tr>';
               /* if($estatus==1){
                    $reporte['tabla'].='
                            <td align="center"><a onclick="if (confirm(\'Si presiona Aceptar se Anulara el Recibo\')){anular('.$id.'); return true;} else{return false;}" href="#" title="Anular">'.$r->fields['nrodoc'].'</a></td>';
                        }else{*/
                  //  $reporte['tabla'].='<td align="center">'.$r->nrodoc.'</td>';
                //        }
                    $reporte['tabla'].='<td align="center">'.muestrafecha($r->fecha).'</td>
                            <td align="center">'.muestrafloat($r->monto).'</td>
                            <td align="center">'.muestrafloat($r->cost_om).'</td>
                            <td align="right">'.muestrafloat($r->utilidad).'</td>
                            <td align="right">'.muestrafloat($r->gasto).'</td>
                            <!--<td align="center"><a onclick="Imprimir(1,1);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>
                            <td align="center"><a onclick="Imprimir(1,2);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>-->

                        </tr>';

            $venta += $r->monto;
            $costo += ($r->cost_om);
            $utilidad += ($r->utilidad);
            $gastos += $r->gasto;
            //$iva += $r->monto*$r->percent;
            
            }
            $balance = $utilidad-$gastos;
            $color = ($balance<0) ? "#990404" :"#1C5705";
            $num = !empty($fact) ? count($fact) : 0;       
            if(!$num){
                $reporte['tabla'].='</table><h2>Sin resultados.</h2>';
            }else{
                $reporte['tabla'].='
                            <tr><td colspan="5">&nbsp;</td>
                                <!--<td colspan="3" align="right">
                                    <b>Sub - Total</b>
                                </td>
                                <td align="right"><b> '.number_format(@$subtotal,2,',','.').'</b></td>-->
                            </tr>
                            <tr>
                                <td colspan="" align="right">
                                    <b>Total</b>
                                </td>
                                <td align="right"><b> '.number_format($venta,2,',','.').'</b></td>
                                <td align="right"><b> '.number_format($costo,2,',','.').'</b></td>
                                <td align="right"><b> '.number_format($utilidad,2,',','.').'</b></td>
                                <td align="right"><b> '.number_format($gastos,2,',','.').'</b></td>
                            </tr>
                            <tr><td colspan="5">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="4"  align="right"><b> Balance</b></td>
                                <td align="right"><span style="color: '.$color.'"><b> '.number_format($balance,2,',','.').'</b></span></td>
                            </tr>
                           <!-- <tr>
                                <td colspan="3" align="right">
                                    <b>Total</b>
                                </td>
                                <td align="right"><b> '.number_format(@$utilidad-$gastos,2,',','.').'</b></td>
                            </tr>
                            <tr>
                                
                                <td colspan="4" align="right"><a onclick="ImprimirPDF(\''.$fechaInicio.'\',\''.$fechaFinal.'\',2);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>
                                
                            </tr>-->

                        </table>';
            }
                $reporte['tabla'].='<input type="hidden" name="fec_ini" id="fec_ini" value="'.$fechaInicio.'" >';
                $reporte['tabla'].='<input type="hidden" name="fec_fin" id="fec_fin" value="'.$fechaFinal.'" >';
                
                $json=new Services_JSON();
                echo (@$excell==1) ?  $reporte['dh']."".$reporte['tabla'] : $json->encode($reporte);
                
        break;
        
        case 'resumen_cobros':
        //$reporte = new RegistroVentas;
        $fechaInicio = $_REQUEST ['fechaInicio'];
        $fechaFinal = $_REQUEST ['fechaFinal'];
        $c_currency_id = $_REQUEST ['c_currency_id'];

        if($fechaInicio==$fechaFinal){
                $reporte['dh']='D&iacute;a '.muestrafecha($fechaInicio);
            }else{
                $reporte['dh'] ='Desde '.muestrafecha($fechaInicio).' - Hasta '.muestrafecha($fechaFinal);
            }

        $reporte['tabla']='
        <table style="color:black;" class="table table-striped tabla" border="0">
                    <tr>
                        <th style="text-align:center;">C&oacute;digo</th>
                        <th style="text-align:center;">Descripci&oacute;n</th>
                        <th style="text-align:center;">Unidad</th>
                        <th style="text-align:center;">Cantidad</th>
                        <th style="text-align:center;">Total Litros</th>
                        <th style="text-align:center;">Monto</th>
                    </tr>';
        $total=0;
        $iva = 0;
        $total_ltrs = 0;
        $monto_ext = 0;

        $cobro = new cobro;
        $fact = $cobro->getResumen($conn,$fechaInicio,$fechaFinal,$c_currency_id);

        if(!empty($fact) && count($fact)>0)
        foreach ($fact as $r) { 
        //while(!$r->EOF){
         $reporte['tabla'].='
                    <tr>
                        <td style="font-size:small">'.$r->codigo.'</td>
                        <td style="font-size:small">'.$r->descripcion.'</td>
                        <td style="font-size:small">'.$r->unidad.'</td>
                        <td style="font-size:small" align="center">'.$r->cantidad.'</td>
                        <td style="font-size:small" align="right">'.muestrafloat($r->litros).'</td>
                        <td style="font-size:small" align="right">'.muestrafloat($r->total).'</td>

                    </tr>';
        $total += $r->total;
        //$iva += $r->total*$r->percent;
        $iva += $r->monto_iva;
        $total_ltrs += $r->litros;
        $monto_ext += $r->monto_ext;
       // $r->movenext();
        }
        
        $num = !empty($fact) ? count($fact) : 0;       
        if(!$num){
            $reporte['tabla'].='</table><h2>Sin resultados.</h2>';
        }else{
            $reporte['tabla'].='
                        <tr><th colspan="6" ></th></tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>Sub-Total Ventas</b>
                            </td>
                            <td style="font-size:small" align="right"><b>Bs. '.number_format($total,2,',','.').'</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>Exento</b>
                            </td>
                            <td style="font-size:small" align="right"><b>Bs. '.number_format($monto_ext,2,',','.').'</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>IVA %</b>
                            </td>
                            <td style="font-size:small" align="right"><b>Bs. '.number_format($iva,2,',','.').'</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>Total Ventas</b>
                            </td>
                            <td style="font-size:small" align="right"><b>Bs. '.number_format($total+$iva,2,',','.').'</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:small" colspan="5" align="right">
                                <b>Total Litros</b>
                            </td>
                            <td style="font-size:small" align="right"><b> '.number_format($total_ltrs,2,',','.').'</b></td>
                        </tr>
                        <tr style="font-size:small" align="center"><th colspan="6" >FORMA DE PAGO</th></tr>';

                $cob = $cobro->getFormaCobro($conn,$fechaInicio,$fechaFinal,$c_currency_id);

                if(!empty($cob) && count($cob)>0)
                foreach ($cob as $r) { 
                    $simbolo = $r->c_currency_id==3 ? " $" : " Bs";
                //while(!$r->EOF){
                 $reporte['tabla'].='

                    <tr>
                        <td style="font-size:small" colspan="5" align="right">'.$r->descripcion.'</td>
                        <td style="font-size:small" align="right">'.muestrafloat($r->total).' '.$simbolo.'</td>
                    </tr>';

                }


                $reporte['tabla'].='<tr style="font-size:small" align="center"><th colspan="6" >VUELTOS</th></tr>';
                $cob = $cobro->getVuelto($conn,$fechaInicio,$fechaFinal,$c_currency_id);

                if(!empty($cob) && count($cob)>0)
                foreach ($cob as $r) { 
                    $simbolo = $r->c_currency_id==3 ? " $" : " Bs";
                //while(!$r->EOF){
                 $reporte['tabla'].='

                    <tr>
                        <td style="font-size:small" colspan="5" align="right">'.$r->descripcion.'</td>
                        <td style="font-size:small" align="right">'.muestrafloat($r->total).' '.$simbolo.'</td>
                    </tr>';

                }

                    $reporte['tabla'].='    </table>
                        <table border="0">
                        <tr>
                                
                            <td align="right"><a onclick="ImprimirPDF(\''.$fechaInicio.'\',\''.$fechaFinal.'\',3);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>

                              
                        </tr>'
                        ;
               


         $reporte['tabla'].='</table>';


        }
            $json=new Services_JSON();
            echo (@$excell==1) ?  $reporte['dh']."".$reporte['tabla'] : $json->encode($reporte);
            
    break;

   
    case 'recibos_cobro':
            //$reporte = new RegistroVentas;
            $fechaInicio = $_REQUEST ['fechaInicio'];
            $fechaFinal = $_REQUEST ['fechaFinal'];
            //$estatus = $_REQUEST ['estatus'];
            $identificacion = $_REQUEST ['identificacion'];
            $c_currency_id = $_REQUEST['c_currency_id'];

            if($fechaInicio==$fechaFinal){
                    $reporte['dh']='D&iacute;a '.muestrafecha($fechaInicio);
                }else{
                    $reporte['dh'] ='Desde '.muestrafecha($fechaInicio).' - Hasta '.muestrafecha($fechaFinal);
                }

            $reporte['tabla']='
            <table style="color:black;" class="table table-striped tabla" border="0">
                        <tr>
                            <th style="text-align:center;">Nro Fact.</th>
                            <th style="text-align:center;">Nro Pago</th>
                            <th style="text-align:center;">Fecha Pago</th>
                            <th style="text-align:center;">Identificación</th>
                            <th style="text-align:center;">Cliente</th>
                            <th style="text-align:center;">Monto</th>
                            <th style="text-align:center;">Reporte</th>
                          
                        </tr>';
            $subtotal = 0;
            $iva = 0;
            $total=0;


            $cobro = new cobro;
            $fact = $cobro->getDetalle($conn,$fechaInicio,$fechaFinal,$identificacion,$c_currency_id);
            if(!empty($fact) && count($fact)>0)
            foreach ($fact as $r) { 
                $id = $r->id;
                
             $reporte['tabla'].='<tr>';
               /* if($estatus==1){
                    $reporte['tabla'].='
                            <td align="center"><a onclick="if (confirm(\'Si presiona Aceptar se Anulara el Recibo\')){anular('.$id.'); return true;} else{return false;}" href="#" title="Anular">'.$r->fields['nrodoc'].'</a></td>';
                        }else{*/
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.$r->nrodoc.'</td>';
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.$r->nropago.'</td>';
                //        }
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.muestrafecha($r->fecha).'</td>
                            <td style="font-size:small" align="center">'.$r->ident.'</td>
                            <td style="font-size:small" align="center">'.$r->cliente.'</td>
                            <td style="font-size:small" align="right">'.muestrafloat($r->amount).'</td>
                            <td style="font-size:small" align="center"><a onclick="Imprimir('.$id.',2);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>
                            

                        </tr>';
            $subtotal += $r->amount;
            //$iva += $r->monto*$r->percent;
            
            }
            //$total = $subtotal + $iva;
            $num = !empty($fact) ? count($fact) : 0;       
            if(!$num){
                $reporte['tabla'].='</table><h2>Sin resultados.</h2>';
            }else{
                $reporte['tabla'].='
                            <tr><th style="font-size:small" colspan="7" ></th></tr>
                            <tr>
                                <td style="font-size:small" colspan="6" align="right">
                                    <b>Total</b>
                                </td>
                                <td style="font-size:small" align="right"><b> '.number_format($subtotal,2,',','.').'</b></td>
                            </tr>
                            <tr style="font-size:small" align="center"><th colspan="7" >FORMA DE PAGO</th></tr>';
                       $cob = $cobro->getFormaCobro($conn,$fechaInicio,$fechaFinal,$c_currency_id);

                if(!empty($cob) && count($cob)>0)
                foreach ($cob as $r) { 
                    $simbolo = $r->c_currency_id==3 ? " $" : " Bs";
                //while(!$r->EOF){
                 $reporte['tabla'].='

                    <tr>
                        <td style="font-size:small" colspan="6" align="right">'.$r->descripcion.'</td>
                        <td style="font-size:small" align="right">'.muestrafloat($r->total).' '.$simbolo.'</td>
                    </tr>';

                }



                $reporte['tabla'].='<tr style="font-size:small" align="center"><th colspan="7" >VUELTOS</th></tr>';
                $cob = $cobro->getVuelto($conn,$fechaInicio,$fechaFinal,$c_currency_id);

                if(!empty($cob) && count($cob)>0)
                foreach ($cob as $r) { 
                    $simbolo = $r->c_currency_id==3 ? " $" : " Bs";
                //while(!$r->EOF){
                 $reporte['tabla'].='

                    <tr>
                        <td style="font-size:small" colspan="6" align="right">'.$r->descripcion.'</td>
                        <td style="font-size:small" align="right">'.muestrafloat($r->total).' '.$simbolo.'</td>
                    </tr>';

                }

                    $reporte['tabla'].='    </table>
                        <table border="0">
                        <tr>
                                
                            <td class="offset-11" align="right"><a onclick="ImprimirPDF(\''.$fechaInicio.'\',\''.$fechaFinal.'\',5);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>

                              
                        </tr>'
                        ;
               


         $reporte['tabla'].='</table>';
            }
                $reporte['tabla'].='<input type="hidden" name="fec_ini" id="fec_ini" value="'.$fechaInicio.'" >';
                $reporte['tabla'].='<input type="hidden" name="fec_fin" id="fec_fin" value="'.$fechaFinal.'" >';
                
                $json=new Services_JSON();
                echo (@$excell==1) ?  $reporte['dh']."".$reporte['tabla'] : $json->encode($reporte);
                
        break;

    
        case 'por_cobro':
            //$reporte = new RegistroVentas;
            $fechaInicio = $_REQUEST ['fechaInicio'];
            $fechaFinal = $_REQUEST ['fechaFinal'];
            //$estatus = $_REQUEST ['estatus'];
            $identificacion = $_REQUEST ['identificacion'];
            $c_currency_id = $_REQUEST['c_currency_id'];

            if($fechaInicio==$fechaFinal){
                    $reporte['dh']='D&iacute;a '.muestrafecha($fechaInicio);
                }else{
                    $reporte['dh'] ='Desde '.muestrafecha($fechaInicio).' - Hasta '.muestrafecha($fechaFinal);
                }

            $reporte['tabla']='
            <table style="color:black;" class="table table-striped tabla" border="0">
                        <tr>
                            <th style="text-align:center;">Nro</th>
                            <th style="text-align:center;">Fecha</th>
                            <th style="text-align:center;">Identificación</th>
                            <th style="text-align:center;">Cliente</th>
                            <th style="text-align:center;">Monto</th>
                            <th style="text-align:center;">Reporte</th>
                          
                        </tr>';
            $subtotal = 0;
            $iva = 0;
            $total=0;


            $factura = new facturacion;
            $fact = $factura->getPorCobrar($conn,$fechaInicio,$fechaFinal,$identificacion,$c_currency_id);
            if(!empty($fact) && count($fact)>0)
            foreach ($fact as $r) { 
                $id = $r->id;
                
             $reporte['tabla'].='<tr>';
               /* if($estatus==1){
                    $reporte['tabla'].='
                            <td align="center"><a onclick="if (confirm(\'Si presiona Aceptar se Anulara el Recibo\')){anular('.$id.'); return true;} else{return false;}" href="#" title="Anular">'.$r->fields['nrodoc'].'</a></td>';
                        }else{*/
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.$r->nrodoc.'</td>';
                //        }
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.muestrafecha($r->fecha).'</td>
                            <td style="font-size:small" align="center">'.$r->ident.'</td>
                            <td style="font-size:small" align="center">'.$r->cliente.'</td>
                            <td style="font-size:small" align="right">'.muestrafloat($r->monto).'</td>
                            <td style="font-size:small" align="center"><a onclick="Imprimir('.$id.',1);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>
                            

                        </tr>';
            $subtotal += $r->monto;
            $iva += $r->monto*$r->percent;
            
            }
            $total = $subtotal + $iva;
            $num = !empty($fact) ? count($fact) : 0;       
            if(!$num){
                $reporte['tabla'].='</table><h2>Sin resultados.</h2>';
            }else{
                $reporte['tabla'].='
                            <tr><th style="font-size:small" colspan="6" ></th></tr>
                            <tr>
                                <td style="font-size:small" colspan="5" align="right">
                                    <b>Sub - Total</b>
                                </td>
                                <td style="font-size:small" align="right"><b> '.number_format($subtotal,2,',','.').'</b></td>
                            </tr>
                            <tr>
                                <td style="font-size:small" colspan="5" align="right">
                                    <b>I.V.A. %</b>
                                </td>
                                <td style="font-size:small" align="right"><b> '.number_format($iva,2,',','.').'</b></td>
                            </tr>
                            <tr>
                                <td style="font-size:small" colspan="5" align="right">
                                    <b>Total</b>
                                </td>
                                <td style="font-size:small" align="right"><b> '.number_format($total,2,',','.').'</b></td>
                            </tr>
                            <tr>
                                
                                <td style="font-size:small" colspan="6" align="right"><a onclick="ImprimirPDF(\''.$fechaInicio.'\',\''.$fechaFinal.'\',4);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>
                                
                            </tr>
                        </table>';
            }
                $reporte['tabla'].='<input type="hidden" name="fec_ini" id="fec_ini" value="'.$fechaInicio.'" >';
                $reporte['tabla'].='<input type="hidden" name="fec_fin" id="fec_fin" value="'.$fechaFinal.'" >';
                
                $json=new Services_JSON();
                echo (@$excell==1) ?  $reporte['dh']."".$reporte['tabla'] : $json->encode($reporte);
                
        break;

        case 'cierre_cajas':

            $fechaInicio = $_REQUEST ['fechaInicio'];
            $fechaFinal = $_REQUEST ['fechaFinal'];
            $c_currency_id = $_REQUEST['c_currency_id'];

            if($fechaInicio==$fechaFinal){
                    $reporte['dh']='D&iacute;a '.muestrafecha($fechaInicio);
                }else{
                    $reporte['dh'] ='Desde '.muestrafecha($fechaInicio).' - Hasta '.muestrafecha($fechaFinal);
                }

            $reporte['tabla']='
            <table style="color:black;" class="table table-striped tabla" border="0">
                        <tr>
                            <th style="text-align:center;" >Descripción</th>
                            <th style="text-align:center;" >Usuario</th>
                            <th style="text-align:center;" >Fecha de Registro</th>
                            <th style="text-align:center;" >Reporte</th>
                            <th style="text-align:center;" >Reversar</th>
                        </tr>';

            $caja = new cajas;
            $obj = $caja->getCierres($conn,$fechaInicio,$fechaFinal,$c_currency_id);
            if(!empty($obj) && count($obj)>0){
                foreach ($obj as $r) { 
                    $id = $r->daily_closing_id;
                    
                    $reporte['tabla'].='<tr>';
                    $reporte['tabla'].='<td style="font-size:small" align="center">Cierre diario del día '.muestrafecha($r->start_date).'</td>';
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.$r->usuario.'</td>';
                    $reporte['tabla'].='<td style="font-size:small" align="center">'.muestrafecha($r->created).'</td>';
                    $reporte['tabla'].='<td style="font-size:small" align="center"><a onclick="Imprimir('.$id.',4);" href="#" ><i class="fa fa-print fa-2x" aria-hidden="true"></i></a></td>';
                    $reporte['tabla'].='<td style="font-size:small" align="center"><a onclick="Reversar('.$id.',\''.$r->start_date.'\',\'Reversar\');" href="#" ><i class="fa fa-undo" aria-hidden="true"></i></a></td>';
                    $reporte['tabla'].='</tr>';

             
                }

                    $reporte['tabla'].='<input type="hidden" name="fec_ini" id="fec_ini" value="'.$fechaInicio.'" >';
                    $reporte['tabla'].='<input type="hidden" name="fec_fin" id="fec_fin" value="'.$fechaFinal.'" >';
            }else{
                $reporte['tabla'].='</table><h2>Sin resultados.</h2>';
            }
                $json=new Services_JSON();
                echo (@$excell==1) ?  $reporte['dh']."".$reporte['tabla'] : $json->encode($reporte);
                
        break;



}

?>