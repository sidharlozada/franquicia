<?php
session_start();//1960 LINEAS
include("lib/librerias.php");

switch (@$form = $_REQUEST['form']) {

    case "direccion"://REGISTRO DE LA DIRECCION QUE SE USA EN EL MODULO DE ALMACEN

        $direccion = new direccion;

        if ($_REQUEST['guardar'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $direccion->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $direccion->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "findaddress"://PARA BUSCAR LA DIRECCION QUE SE REGISTRA EN EL MODULO DE ALMACENES

        $direccion = new direccion;
        $c_location_id = $_REQUEST['c_location_id'];

        $resp = $direccion->get($conn, $c_location_id);//OBTIENE LA DIRECCION

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "almacen"://REGISTRO DE LOS ALMACENES

        $almacen = new almacen;

        if ($_REQUEST['btnsavealmacen'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $almacen->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $almacen->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "tipo_producto"://REGISTRO DE LOS TIPO DE PRODUCTOS

        $tipo = new tipo_producto;

        if ($_REQUEST['btnsavetproducto'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $tipo->add($conn,json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $tipo->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "unidades"://REGISTROS DE LAS UNIDADES DE MEDIDAS

        $unidades = new unidades;

        if ($_REQUEST['btnsaveunidades'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $unidades->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $unidades->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "categorias"://REGISTRO DE LAS CATEGORIAS

        $categorias = new categorias;

        if ($_REQUEST['btnsavecategorias'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $categorias->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $categorias->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "productos"://REGISTRO DE LOS PRODUCTOS Y COSTOS 

        $productos = new productos;

        $isactive = estatus(@$_REQUEST['isactive']);

        if ($_REQUEST['btnsaveproductos'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $productos->add($conn, json_encode($_REQUEST), $isactive, $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $productos->update($conn, json_encode($_REQUEST), $isactive, $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "carga_inventario"://CARGA EL INVENTAIO NUEVO AL SISTEMA

        $inventario = new carga_inventario;

        if ($_REQUEST['btnsaveinventario'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $inventario->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveinventario'] == "Actualizar") {//ACTULIZA LOS REGISTROS
            $resp = $inventario->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveinventario'] == "Aprobar") {//ARPUEBA LOS REGISTROS
            $resp = $inventario->approve($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveinventario'] == "Anular") {//ANULA LOS REGISTROS
            $resp = $inventario->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "ajusteInventario"://REGISTRO DEL AJUSTE DE INVENTARIO (RESTA DE INVENTARIO)

        $inventario = new ajusteInventario;

        if ($_REQUEST['btnsaveajusteInventario'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $inventario->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveajusteInventario'] == "Actualizar") {//ACTULIZA LOS REGISTROS
            $resp = $inventario->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveajusteInventario'] == "Aprobar") {//ARPUEBA LOS REGISTROS
            $resp = $inventario->approve($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveajusteInventario'] == "Anular") {//ANULA LOS REGISTROS
            $resp = $inventario->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "mov_inventario"://REGISTRO DE LOS MOVIMIENTOS DE LOS PRODUCTOS ENTRE LOS ALMANCENES EXISTENTES

        $movInv = new mov_inventario;

        if ($_REQUEST['btnsaveMovinventario'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $movInv->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveMovinventario'] == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $movInv->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveMovinventario'] == "Aprobar") {//APRUEBA LOS REGISTROS
            $resp = $movInv->approve($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveMovinventario'] == "Anular") {//ANULA LOS REGISTROS
            $resp = $movInv->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case 'buscaClienteIdent'://BUSCA LOS CLIENTES POR NUMERO DE CEDULA
        
        $Indet = $_REQUEST['Indet'];
        $cliente = new cliente;
        if (!empty($Indet)) {
            $client = $cliente->buscaClienteIdent($conn, $Indet);
            $json = new Services_JSON();
            echo $json->encode($client);
        }

    break;

    case "RegistroClientes":
        //REGISTRO DE CLIENTES DEL MODULO "CLIENTES" y DESDE EL MODAL DE LOS DIFERENTES MODULOS QUE REQUIERAN CLIENTES
        $cliente = new cliente;

        if ($_REQUEST['btnsavecliente'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $cliente->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTULIZA LOS REGISTROS
            $resp = $cliente->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "proveedor"://REGISTRO DE PROVEEDORES

        $proveedor = new proveedor;
    
        if ($_REQUEST['btnsaveproveedor'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $proveedor->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $proveedor->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "moneda"://REGISTRO DE LAS MONEDAS A UTILIZAR EN EL SISTEMA

        $moneda = new moneda;

        if ($_REQUEST['btnsavemoneda'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $moneda->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $moneda->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "tasas"://REGISTRO DIARIO DE LAS TASAS PARA EL CAMBIO DE BOLIVARES A DOLARES

        $tasa = new tasas;

        if ($_REQUEST['btnsavetasa'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $tasa->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $tasa->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "porcentaje_descuento"://REGISTRO DE LOS PORCENTAJES DE DESCUENTOS

        $descuento = new porcentaje_descuento;

        if ($_REQUEST['btnsaveporcentaje'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $descuento->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveporcentaje'] == "Actualizar") {//ACTULIZA LOS REGISTROS
            $resp = $descuento->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "iva"://REGISTRO DEL IMPUESTO AL VALOR AGREGADOR

        $iva = new iva;

        if ($_REQUEST['btnsaveiva'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $iva->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveiva'] == "Actualizar") {//ACTULIZA LOS REGISTROS
            $resp = $iva->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($iva);

    break;

    case "condicion_pago"://REGISTRO DE LAS CONDICIONES DE PAGO CONTADO, CREDITO O AL MAYOR

        $condPago = new condicion_pago;

        if ($_REQUEST['btnsavecondpago'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $condPago->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTULIZA LOS REGISTROS
            $resp = $condPago->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "cotizacion"://REGISTROS DE LAS COTIZACIONES 

        $fact = new cotizacion;

        if (trim($_REQUEST['btnsavecotizacion']) == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $fact->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if (trim($_REQUEST['btnsavecotizacion']) == "Actualizar") {//ACTULIZA LOS REGISTROS
            $resp = $fact->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsavecotizacion'] == "Aprobar") {//APRUEBA LOS REGISTROS
            $resp = $fact->approve($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if (trim($_REQUEST['btnsavecotizacion']) == "Anular") {//ANULA LOS REGISTROS
            $resp = $fact->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($fact);

    break;

    case "cerrar_caja"://CIERRE DIARIO DE CAJAS, PARA EL CUADRE DEL DIA
       
        $caja = new cajas;

        if (@$_REQUEST['btnsavecierre'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $caja->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        }else if (@$_REQUEST['btnsavecierre'] == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $caja->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }else if (@$_REQUEST['btnsavecierre'] == "Aprobar") {//APRUEBA LOS REGISTROS
            $resp = $caja->approve($conn, json_encode($_REQUEST), $_SESSION['id']);
        }else if (@$_REQUEST['btnsavecierre'] == "Eliminar") {//ELIMINA LOS REGISTROS
            $resp = $caja->delete($conn, json_encode($_REQUEST), $_SESSION['id']);
        }else if (@$_REQUEST['btnsavecierre'] == "Reversar") {//REVERSA LOS REGISTROS
            $resp = $caja->delete($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "pedido"://REGISTRO DE LOS PEDIDOS

        $fact = new pedido;

        if (trim($_REQUEST['btnsavepedido']) == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $fact->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if (trim($_REQUEST['btnsavepedido']) == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $fact->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsavepedido'] == "Aprobar") {//APRUEBA LOS REGISTROS
            $resp = $fact->approve($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if (trim($_REQUEST['btnsavepedido']) == "Anular") {//ANULAR LOS REGISTROS
            $resp = $fact->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "nota_entrega"://REGISTRO DE LAS NOTAS DE ENTREGAS

        $nota = new nota_entrega;

        if ($_REQUEST['btnsavenotaentrega'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $nota->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsavenotaentrega'] == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $nota->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsavenotaentrega'] == "Anular") {//ANULA LOS REGISTROS
            $resp = $nota->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "facturacion"://REGISTRO DE LAS FACTURAS

        $fact = new facturacion;

        if (trim($_REQUEST['btnsavefacturacion']) == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $fact->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if (trim($_REQUEST['btnsavefacturacion']) == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $fact->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if (trim($_REQUEST['btnsavefacturacion']) == "Anular") {//ANULA LOS REGISTROS
            $resp = $fact->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($fact);

    break;

    case 'FactCobroRapido'://REGISTRO DEL COBRO EN EL MISMO MODULO DE FACTURACION O NOTA DE ENTREGA

        $Cobro = new cobro;

        if ($_REQUEST['accion'] == "Registrar") {//GUARDA LOS REGISTROS            
            $resp = $Cobro->add($conn, json_encode($_REQUEST), $_SESSION['id']);                             
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case 'FactCobro'://REGISTRO DE LOS COBROS, NOTAS DE ENTREGA O FACTURAS PENDIENTES POR COBRAR

        $Cobro = new cobro;

        if (@$_REQUEST['accion'] == "Registrar") {//GUARDA LOS REGISTROS 
            $resp = $Cobro->addCobro($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsave'] == "Anular") {//ANULA LOS REGISTROS 
            $resp = $Cobro->anular($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case 'formRegistroCobro'://REGISTRO DEL VUELTO EN EL MODULO DE COBRO, O COBRO RAPIDO (FACTURACION - NOTA ENTRGA)

        $cobro = new cobro;
        
        $resp = $cobro->RegVuelto($conn, json_encode($_REQUEST), $_SESSION['id'], $_SESSION['ad_org_id']);

        $json = new Services_JSON();
        echo $json->encode($resp);
        
    break;

    case "pagocaja"://REGISTRO DE LOS VUELTOS EN EL CASO QUE NO SE HICIERON CUANDO SE CARGO EL COBRO

        $pago = new pagocaja;

        if ($_REQUEST['btnsavepago'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $pago->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $pago->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

     case "egresos"://REGISTRO DE LOS EGRESOS, PAGOS EVENTUALES

        $egresos = new egresos;

        if ($_REQUEST['btnsaveEgreso'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $egresos->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $egresos->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "empresas"://REGISTRO DE LAS EMPRESAS, PARA LA NOMINA

        $emp = new empresas;

        if ($_REQUEST['btnsaveempresas'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $emp->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $emp->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "departamentos"://REGISTROS DE LOS DEPARTAMENTOS QUE CONFORMAN LA EMPRESA, PARA LA NOMINA

        $dept = new departamentos;

        if ($_REQUEST['btnsavedepartamentos'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $dept->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $dept->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "cargos"://REGISTROS DE CARGOS DE LOS TRABAJADORES PARA LA NOMINA

        $carg = new cargos;

        if ($_REQUEST['btnsavecargos'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $carg->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $carg->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "trabajador"://REGISTRO DE LOS DATOS DE LOS TRABAJADORES

        $trab = new trabajador;

        if ($_REQUEST['btnsavetrabajador'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $trab->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $trab->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "tiponomina"://REGISTRO DE LOS TIPOS DE NOMINA

        $tnomina = new tiponomina;

        if ($_REQUEST['btnsavetiponomina'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $tnomina->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $tnomina->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "nomina"://REGISTRO DE LAS NOMINAS QUE SE VAN A USAR PARA LOS CALCULOS

        $nomina = new nomina;

        if ($_REQUEST['btnsavenomina'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $nomina->add($conn,json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $nomina->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "variables"://REGISTRO DE LA VARIABLES PARA LOS CALCULOS INDIVIDUALES DE LA NOMINA

        $var = new variables;

        if ($_REQUEST['btnsavevariables'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $var->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $var->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "constantes"://REGISTRO DE LAS CONSTANTES PARA LOS CALCULOS GENERALES DE LA NOMINA

        $cons = new constantes;

        if ($_REQUEST['btnsaveconstantes'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $cons->add($conn,json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $cons->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "conceptos"://REGISTRO DE LOS CONCEPTOS Y FORMULAS PARA EL CALCULO DE LAS DIFERENTES NOMINAS

        $concept = new conceptos;

        if ($_REQUEST['btnsaveconceptos'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $concept->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $concept->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "conceptos_prestamos"://CONCEPTOS PARA LOS DIFERENTES TIPOS DE PRESTAMOS

        $conceptos_prestamos = new conceptos_prestamos;

        if ($_REQUEST['btnsaveconceptos_prestamos'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $conceptos_prestamos->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $conceptos_prestamos->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "adeudos"://REGISTRO DE LA ASIGNACION DE LOS PRESTAMOS A LOS DIFERENTES TRABAJADORES

        $adeudos = new adeudos;

        if ($_REQUEST['btnsaveadeudos'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $adeudos->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS 
            $resp = $adeudos->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "prestamos"://REGISTRO DE LOS DEBITOS PARA LOS PRESTAMOS PENDIENTES POR COBRAR

        $adeudos = new adeudos;

        if ($_REQUEST['btnDebitar'] == "Debitar") {//GUARDA LOS REGISTROS 
            $resp = $adeudos->adddebit($conn,  json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS (EL ACTURALIZAR NO ESTA EN FUNCIONAMIENTO)
            $resp = $adeudos->updatedebit($conn,  json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case 'cajaahorro'://REGISTRO DE LA DEDUCCIONES DE CAJA DE AHORRO

        $caja = new cajaAhorro;
            
        if ($_REQUEST['btnsaveCajaAhorro'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $caja->add($conn, json_encode($_REQUEST), $_SESSION['id'],  $_SESSION['ad_org_id']);
        }else{//ACTUALIZA LOS REGISTROS 
            $resp = $caja->update($conn, json_encode($_REQUEST), $_SESSION['id'],  $_SESSION['ad_org_id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);
        
    break;

    case 'retiroAhorro'://REGISTRO DEL RETIRO DEL SALDO POSITIVO EN LA CAJA DE AHORRO

        $caja = new cajaAhorro;
            
             if ($_REQUEST['btnRetiroAhorro'] == "Guardar") {//GUARDA LOS REGISTROS 
                $resp = $caja->addRetiro($conn, json_encode($_REQUEST), $_SESSION['id']);
            }else if($_REQUEST['btnRetiroAhorro'] == "Eliminar"){//ACTUALIZA LOS REGISTROS METODO NO DESARROLADO
                $resp = $caja->eliminar($conn, json_encode($_REQUEST), $_SESSION['id']);
            }

        $json = new Services_JSON();
        echo $json->encode($resp);
        
    break;

    case "as_departamentos"://REGISTRO DE HORARIO CON LOS DEPARTAMENTOS

        $as_dep = new as_departamentos;

        if ($_REQUEST['btnsavedepartamentos'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $as_dep->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $as_dep->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "as_estaciones"://REGISTRO DE LAS ESTACIONES DE TRABAJO 

        $as_est = new as_estaciones;

        if ($_REQUEST['btnsaveestaciones'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $as_est->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $as_est->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "fosa"://REGISTRO DE LOS SERVICIOS REALIZADOS EN FOSA

        $fosa = new fosa;
        
        if ($_REQUEST['btnsaveservice'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $fosa->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $fosa->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "ticket"://REGISTRO DE LOS TICKETS DE TI

        $ticket = new ticket_ti;
        
        if ($_REQUEST['btnsaveticket'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $ticket->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $ticket->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "consulta"://REGISTRO DE LA INFORMACION DE LOS VEHICULOS

        $regmotor = new consulta_vehiculos;

        if ($_REQUEST['btnsaveconsulta'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $regmotor->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $regmotor->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "regmarcas"://REGISTRO DE LAS MARCAS DE LOS VEHICULOS

        $regmarcas = new regmarcas;

        if ($_REQUEST['btnsaveregmarcas'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $regmarcas->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $regmarcas->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

     break;

     case "regmodel":

        $regmarcas = new regmodel;//REGISTRO DE LOS MODELOS DE LOS VEHICULOS

        if ($_REQUEST['btnsaveregmodel'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $regmarcas->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $regmarcas->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "regmotor"://REGISTRO DE LOS MOTORES

        $regmotor = new regmotor;

        if ($_REQUEST['btnsaveregmotor'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $regmotor->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $regmotor->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "gestion_redes"://SEGUIMIENTO DE LOS CLIENTES (MERCADEO)

        $redes = new redes;

        if ($_REQUEST['btnsaveredes'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $redes->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $redes->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "encuestas"://REGISTRO  DE LOS TITULOS DE ENCUENTAS PARA LOS SEGUIMIENTOS DE LOS CLIENTES

        $emp = new encuestas;

        if ($_REQUEST['btnsaveencuestas'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $emp->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $emp->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "controlContenedor"://REGISTRO PARA LLEVAR EL CONTROL DE LOS CONTENEDORES QUE SE COMPRAN

        $fact = new controlContenedor;

        if (trim($_REQUEST['btnsavecontrolContenedor']) == "Guardar") {//GUARDA LOS REGISTROS 
            $fact->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if (trim($_REQUEST['btnsavecontrolContenedor']) == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $fact->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsavecontrolContenedor'] == "Aprobar") {//APRUEBA LOS REGISTROS
            $fact->approve($conn, json_encode($_REQUEST), $_SESSION['id']);     
        }else if(trim($_REQUEST['btnsavecontrolContenedor'])=="Procesar"){//PROCESA LOS REGISTROS
            $fact->process($conn, json_encode($_REQUEST),$_SESSION['id']);
        }else if(trim($_REQUEST['btnsavecontrolContenedor'])=="Anular"){//ANULA LOS REGISTROS
            $fact->cancel($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($fact);

    break;

    case "estatusContenedor"://REGISTRO DE LOS ESTATUS DE LOS CONTENEDORES, SEGUIMIENTOS.

        $tipo = new estatusContenedor;

        if ($_REQUEST['btnsaveecontenedor'] == "Guardar") {//GUARDA LOS REGISTROS 
            $resp = $tipo->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $tipo->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "modulos"://REGISTRO DE LOS DIFERENTES MODULOS QUE CONFORMAN EL SISTEMA

        $mod = new modulos;

        if ($_REQUEST['btnsavemodulos'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $mod->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $mod->update($conn,json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "operaciones"://REGISTRO DE LAS DIFERENTES OPERACIONES PARA EL MENU DEL SISTEMA

        $op = new operaciones;

        if ($_REQUEST['btnsaveoperaciones'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $op->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveoperaciones'] == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $op->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($op);

    break;

    case "usuarios"://REGISTRO DE LOS USUARIOS DEL SISTEMA

        $us = new usuarios;

        if ($_REQUEST['btnsaveusuarios'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $us->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveusuarios'] == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $us->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($us);

    break;

    case "perfiles"://REGISTRO DE LOS PERFILES DEL SISTEMA (EN DESARROLLO)

        $us = new perfiles;

        if ($_REQUEST['btnsaveperfiles'] == "Guardar") {//GUARDA LOS REGISTROS
            $resp = $us->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveperfiles'] == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $us->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($us);

    break;

    case "notificacion"://REGISTRO PARA LAS NOTIFICACIONES DE LOS USUARIOS

        $oc = new notificacion;

        if ($_REQUEST['btnsavenotificacion'] == "Guardar") {//GUARDA LOS REGISTRO
            $resp = $oc->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else {//ACTUALIZA LOS REGISTROS
            $resp = $oc->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "organizacion"://REGISTRO DE LOS DATOS DE LA ORGANIZACION

        $org = new organizacion;

        if ($_REQUEST['btnsaveorg'] == "Guardar") {//GUARDA LOS REGISTRO
            $resp = $org->add($conn, json_encode($_REQUEST), $_SESSION['id']);
        } else if ($_REQUEST['btnsaveorg'] == "Actualizar") {//ACTUALIZA LOS REGISTROS
            $resp = $org->update($conn, json_encode($_REQUEST), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($org);

    break;

case 'migracion'://PARA MANEJAR LAS ACTUALIZACIONES DE LA BD EN LAS FRANQUICIAS

        $migracion = new migracion;
        //json_encode($_REQUEST)
        if ($_REQUEST['opcion']=='CrearBD') {
            $resp = $migracion->addBD($conn);
        }else if ($_REQUEST['opcion']=='InsertEsquema') {
            $resp = $migracion->addEsquemas($ConDes);//$ConDes = Conexion a la BD Migracion
        }else if ($_REQUEST['opcion']=='Comparar') {
            $resp = $migracion->compareBD($conn, $ConDes);
        }else if ($_REQUEST['opcion']=='Ejecutar') {
            $resp = $migracion->addQuery($conn, json_encode($_REQUEST));
        }else if ($_REQUEST['opcion']=='ElminarDB') {
            $resp = $migracion->delBD($conn);
        }else if ($_REQUEST['opcion']=='addAllQuery') {
            $resp = $migracion->addAllQuery($conn);
        }/*else if ($_REQUEST['opcion']=='Exportar') {
            $resp = $migracion->Exportar($conn);
        }*/    

        $json = new Services_JSON();
        echo $json->encode($resp);
        
    break;

    case 'RelacionTN'://PARA REGISTRAR LA RELACION DE LOS EMPLEADOS Y LAS NOMINAS

        $nom = new nomina;
        $resp = $nom->RelacionEmpNom($conn, json_encode($_REQUEST), $_SESSION['id']);
                
    break;







    case 'busca_productos':
        $regProd = new productos;
        if ($_REQUEST['busca_por'] == "codigo") {
            $Productos = $regProd->getBycod($conn, $_REQUEST['codigo']);
            $rate_id = "";
            $tasa = new tasas;
            $montoTasa = $tasa->getTasaActual($conn, $_REQUEST['start_date'], $rate_id);

            $m_warehouse_id = !empty($_SESSION['m_warehouse_id']) ? $_SESSION['m_warehouse_id'] : 6;
            
            $m_warehouse_id = !empty($_REQUEST['m_warehouse_id']) ? $_REQUEST['m_warehouse_id'] : $m_warehouse_id;

            $respStock = $regProd->getStock($conn, $Productos->m_product_id, $m_warehouse_id);
            $Productos->stock = $respStock->stock;         

            $alm = new almacen;
            $almacen = $alm->get($conn, $m_warehouse_id);

            $Productos->m_warehouse_id = $almacen->m_warehouse_id;
            $Productos->shorten = $almacen->shorten;
            //die("monto tasa".$montoTasa);
            if (!empty($montoTasa->monto)) {
                if ($Productos->existencia != "2") {

                    $monto = $regProd->montoArt($conn, $_REQUEST['c_currency_id'], $_REQUEST['payment_condition_id']);

                    if ($monto->iso_code == "US") {
                        $Productos->monto = round((@$Productos->price_om * $monto->percent), 2);
                    } else {
                        $Productos->monto = round(((@$Productos->price_om * $montoTasa->monto) * $monto->percent), 2);
                    }
                }
            } else {
                $Productos->montoTasa = 0;
            }
        }
        //var_dump($Productos);
        $json = new Services_JSON();
        echo $json->encode($Productos);
        //echo json_encode($resultado);
    break;

    case 'cantidad_producto':

        $q = "SELECT stock FROM system.m_product_stock WHERE m_product_id='" . $_REQUEST['id'] . "' AND  m_warehouse_id='" . $_REQUEST['m_warehouse_id'] . "' ";
        //die($q);
        $r = $conn->Execute($q);
        /*
        $json=new Services_JSON();
        echo $json->encode($Productos);*/
        $stock = !empty($r->fields['stock']) ? $r->fields['stock'] : 0;
        echo $stock;
        break;

    case 'Verifica_almacen':

        if (!empty($_SESSION['m_warehouse_id'])) {
            echo $_SESSION['m_warehouse_id'];
        } else {
            echo $_REQUEST['m_warehouse_id'];
        }

    break;

    case "tasa":

        $c_currency_id = $_REQUEST['c_currency_id'];
        $payment_condition_id = $_REQUEST['payment_condition_id'];
        $start_date = $_REQUEST['start_date'];
        $rate_id = $_REQUEST['rate_id'];

        $Prod = new productos;

        /*$q = "SELECT monto, rate_id FROM system.rate WHERE c_currency_id = '$c_currency_id' AND payment_condition_id = '$payment_condition_id' AND isactive='Y' ";
        $q.= "and ('$start_date' between date_start and date_end ) ";*/

        $q = "SELECT rate_id , monto FROM system.rate ";
        $q .= "WHERE rate_id = (SELECT max(rate_id) FROM system.rate  ";
        $q .= "WHERE c_currency_id='$c_currency_id' and payment_condition_id='$payment_condition_id' ";
        $q .= "and ('$start_date' between date_start and date_end ) and isactive='Y'  ";
        $q .= (!empty($rate_id) && $c_currency_id == 3) ? "and rate_id = $rate_id) " : ") ";
        //die($q);
        $r = $conn->execute($q);

        if (!$r->EOF) {
            $Prod->monto = muestrafloat($r->fields['monto']);
            $Prod->rate_id = $r->fields['rate_id'];
        } else {
            $Prod = 0;
        }

        $json = new Services_JSON();
        echo $json->encode($Prod);


    break;

    case 'buscaMontoArt':
        $Prod = new productos;
        $monto = $Prod->montoArt($conn, $_REQUEST['c_currency_id'], $_REQUEST['payment_condition_id']);

        $rate_id = $_REQUEST['rate_id'];
        $tasa = new tasas;
        $montoTasa = $tasa->getTasaActual($conn, $_REQUEST['start_date'], $rate_id);

        $cond = new condicion_pago;
        //$q="SELECT rate FROM system.c_currency WHERE iso_code= 'US' AND isactive='Y' ";
        // $r2 = $conn->Execute($q);

        $JsonRec = new Services_JSON();
        $JsonRec = $JsonRec->decode(str_replace("\\", "", $_REQUEST['GridProd']));
        if (is_array($JsonRec->idGridProductos)) {
            $i = 0;
            foreach ($JsonRec->idGridProductos as $reg) {
                $m_product_id = $reg[1];
                $cantidad = guardafloat($reg[4]);
                $RowId = $reg[0];
                $Porc = ($reg[7] / 100);

                $q = "SELECT price_om FROM system.m_product_cost_price WHERE m_product_id = $m_product_id ";
                $r = $conn->Execute($q);

                $price_om = $r->fields['price_om'];

                if ($monto->iso_code == "US") {

                    $monto_art = round($cantidad * ($price_om), 2);
                    $monto_und = round(($r->fields['price_om']), 2);

                    $cond = $cond->calcCondPago($monto, $monto_art);
                    $montoPercent = $cond->monto;


                    $desc = ($Porc * ($monto_und + $montoPercent));
                    $regProd[$i]['monto_und'] = $monto_und + $montoPercent;
                    $regProd[$i]['monto'] = ($monto_art - ($desc*$cantidad)) + $montoPercent;
                    //die("Descuento: ".$regProd[$i]['monto']);
                } else {
                    //$monto_art = round($cantidad*(round(($price_om*$montoTasa->monto),2)*$monto->percent),2);
                    //$monto_und = round(round(($montoTasa->monto*$r->fields['price_om']),2)*$monto->percent,2);

                    $monto_art = round($cantidad * (round(($price_om * $montoTasa->monto), 2)), 2);
                    $monto_und = round(round(($montoTasa->monto * $r->fields['price_om']), 2), 2);

                    $cond = $cond->calcCondPago($monto, $monto_art);
                    $montoPercent = $cond->monto;


                    $desc = ($Porc * ($monto_und + $montoPercent));
                    $regProd[$i]['monto_und'] = $monto_und + $montoPercent;
                    $regProd[$i]['monto'] = ($monto_art - ($desc*$cantidad)) + $montoPercent;
                    //die("Descuento: ".$regProd[$i]['monto']);
                }
                $regProd[$i]['RowId'] = $RowId;
                $regProd[$i]['monto_percent'] = $monto->monto;
                $regProd[$i]['movement_type'] = $monto->movement_type;

                $i++;
            }
            $prod = new Services_JSON();
            $prod = is_array($regProd) ? $prod->encode($regProd) : false;
        }
        echo $prod;

    break;

    case 'fact_printed':

        $q = "UPDATE system.invoice  SET printed = 1 WHERE invoice_id='" . @$_REQUEST['invoice_id'] . "' ";
        $r = $conn->Execute($q);
        if ($r) {
            $fact = "Anular";
            $json = new Services_JSON();
            echo $json->encode($fact);
        }

    break;

    case 'nota_printed':

        $q = "UPDATE system.delivery_note  SET printed = 1 WHERE delivery_note_id='" . @$_REQUEST['delivery_note_id'] . "' ";
        $r = $conn->Execute($q);
        if ($r) {
            $fact = "Anular";
            $json = new Services_JSON();
            echo $json->encode($fact);
        }

    break;

    case 'MontoCondPago':

        $tasa = new tasas;

        $c_currency_id = $_REQUEST['c_currency_id'];
        $payment_condition_id = $_REQUEST['payment_condition_id'];
        $date_start = $_REQUEST['date_start'];

        $q = "SELECT * FROM system.payment_condition WHERE payment_condition_id='$payment_condition_id' ";
        $r = $conn->Execute($q);

        /* $q ="SELECT * FROM system.rate WHERE c_currency_id='$c_currency_id' and payment_condition_id='1' AND isactive='Y' ";
        $q.= "and ('$date_start' between date_start and date_end ) ";
        //die($q);
        $r1 = $conn->Execute($q);

        if ($r->fields['movement_type']=="+") {
             $tasa->monto = muestrafloat($r->fields['percent'] * $r1->fields['monto']);
             $tasa->percent = $r->fields['percent'];
        }else{
            $tasa->monto = muestrafloat($r1->fields['monto'] - (($r->fields['percent']-1) * $r1->fields['monto']));
             $tasa->percent = $r->fields['percent'];
        }*/
        $tasa->monto = muestrafloat($r->fields['percent']);
        $tasa->percent = $r->fields['percent'];

        $json = new Services_JSON();
        echo $json->encode($tasa);

    break;


    case 'setPermisos':
        $op = new operaciones;

        @$ad_user_id = $_REQUEST['ad_user_id'];
        @$ad_operations_id = $_REQUEST['ad_operations_id'];

        if (!empty($ad_operations_id) and !empty($ad_user_id)) {
            if ($op->has_permiso($conn, $ad_user_id, $ad_operations_id)) {
                $op->del_permiso($conn, $ad_user_id, $ad_operations_id);
                $resp = 1;
            } else {
                $op->add_permiso($conn, $ad_user_id, $ad_operations_id);
                $resp = 2;
            }
        }

        $json = new Services_JSON();
        echo $json->encode($resp);
    break;

    case 'buscaCobrosPendiente':
        $identificacion = $_REQUEST['identificacion'];
        $customers_id = $_REQUEST['customers_id'];

        //$fechaInicio = date("01/m/Y");
        // $fechaFinal = date("t/m/Y");


        $factura = new facturacion;
        $fact = $factura->getFactCobrar($conn, @$fechaInicio, @$fechaFinal, @$identificacion, @$c_currency_id);

        //var_dump($Productos);
        $json = new Services_JSON();
        echo $json->encode($fact);
        //echo json_encode($resultado);
    break;

    case 'buscaCobrosRealizados':
            $identificacion = $_REQUEST['identificacion'];
            $customers_id = $_REQUEST['customers_id'];
    
            //$fechaInicio = date("01/m/Y");
            // $fechaFinal = date("t/m/Y");
    
    
            $factura = new facturacion;
            $fact = $factura->getFactCobrar($conn, @$fechaInicio, @$fechaFinal, @$identificacion, @$c_currency_id);
    
            //var_dump($Productos);
            $json = new Services_JSON();
            echo $json->encode($fact);
            //echo json_encode($resultado);
    break;

    case 'CalculaMontoOtraMoneda':

        $idGridFact = $_REQUEST['idGridFact'];
        $monto = 0;
        $JsonRec = new Services_JSON();
        $JsonRec = $JsonRec->decode(str_replace("\\", "", $_REQUEST['idGridFact']));
        if (is_array($JsonRec->idGridFact)) {
            $tasa = new tasas;

            foreach ($JsonRec->idGridFact as $reg) {

                $montoTasa = $tasa->getTasaActual($conn, $reg[4], $reg[3]);
                $monto += guardafloat($reg[5]) / $montoTasa->monto;
                $monto_Tasa = $montoTasa->monto;
            }
            $cobro = new cobro;
            $cobro->monto = $monto;
            $cobro->monto_Tasa = $monto_Tasa;
        }
        //var_dump($Productos);
        $json = new Services_JSON();
        echo $json->encode($cobro);
        //echo json_encode($resultado);
    break;

    case 'setNominaConceptos':
        $op = new conceptos;

        @$ad_payroll_id = $_REQUEST['ad_payroll_id'];
        @$ad_concept_id = $_REQUEST['ad_concept_id'];

        if (!empty($ad_concept_id) and !empty($ad_payroll_id)) {
            if ($op->has_permiso($conn, $ad_payroll_id, $ad_concept_id)) {
                $op->del_permiso($conn, $ad_payroll_id, $ad_concept_id);
                $resp = 1;
            } else {
                $op->add_permiso($conn, $ad_payroll_id, $ad_concept_id);
                $resp = 2;
            }
        }

        $json = new Services_JSON();
        echo $json->encode($resp);
    break;

    case "as_trabajadores":

        $as_trab = new as_trabajador;
        if (empty(@$_REQUEST['isactive'])) {
            $isactive = 'N';
        } else {
            $isactive = $_REQUEST['isactive'];
        }
        if (empty(@$_REQUEST['isboss'])) {
            $isboss = 'N';
        } else {
            $isboss = $_REQUEST['isboss'];
        }

        if ($_REQUEST['btnsavetrabajadores'] == "Guardar") {
            $resp = $as_trab->add($conn, $_REQUEST['ad_org_id'], $_REQUEST['ad_employee_id'], $_REQUEST['as_workstation_id'], $isboss, $isactive, $_SESSION['id']);
        } else {
            $resp = $as_trab->update($conn, $_REQUEST['as_relation_emp_work_id'], $_REQUEST['ad_org_id'], $_REQUEST['ad_employee_id'], $_REQUEST['as_workstation_id'], $isboss, $isactive, $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "retardos":

        $ret = new as_retardos;
        $anulado = '1';

        if ($_REQUEST['btnsaveretardos'] == "Actualizar") {
            $resp = $ret->update($conn, $_REQUEST['txtcodigo'], $_REQUEST['txtjustificacion'], $anulado, $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;


    case "regventasmayor":

        $reg = new regventasmayor;

        if ($_REQUEST['btnsaveventasmayor'] == "Guardar") {
            $resp = $reg->add($conn, $_REQUEST['ad_org_id'], $_REQUEST['ad_employee_id'], $_REQUEST['fechaventa'], guardafloat($_REQUEST['monto']), $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "ultventasmayor":

        $ult = new ultventasmayor;

        if ($_REQUEST['btnsaveultventasmayor'] == "Actualizar") {
            $resp = $ult->update($conn, $_REQUEST['txtcodigo'], $_REQUEST['txtjustificacion']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "rate_show":

        $rate_show = new rate_show;

        if ($_REQUEST['btnsaverate_show'] == "Actualizar") {
            $resp = $rate_show->update($conn, $_REQUEST['ad_rate_show_id'], $_REQUEST['ad_org_id'], $_REQUEST['fechacot'], guardafloat($_REQUEST['monto']), $_REQUEST['ad_rate_show_type_id'], $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "contraseña":

        $contraseña = new contraseña;

        if (@$_REQUEST['btnsavecontraseña'] == "Actualizar") {
            $resp = $contraseña->update($conn, $_REQUEST['cod'], $_REQUEST['password_old'], $_REQUEST['password_new'], $_REQUEST['password_new2'], $_SESSION['id']);
        }
        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "videos":

        $videos = new videos;

        if (@$_REQUEST['btnsavevideos'] == "Guardar") {
            $resp = $videos->add($conn, $_REQUEST['name'], $_REQUEST['movie_tv_format_id'], $_REQUEST['hour_in'], $_REQUEST['hour_out'], $_REQUEST['uploadedFile'], $_SESSION['id']);
        }
        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "just_retardos":

        $just_retardos = new just_retard;

        if (@$_REQUEST['btnsavejust_retardos'] == "Actualizar") {
            $resp = $just_retardos->update($conn, $_REQUEST['start_date'], $_REQUEST['as_justify_op_id'], $_REQUEST['justificacion'], $_SESSION['id']);
        } else if ($_REQUEST['btnsavevalid_retardo'] == "Validar") {
            $resp = $just_retardos->update2($conn, $_REQUEST['as_activity_id'], $_REQUEST['as_justify_op_id'], $_REQUEST['mensaje'], $_SESSION['id']);
        }
        else if(@$_REQUEST['btnsavejust_retardos'] == "Anular"){
            $resp = $just_retardos->anular($conn, $_REQUEST['as_activity_id'], $_REQUEST['as_justify_op_id'], $_REQUEST['mensaje'], $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "cierre_retardos":

        $cierre_periodo = new cierre_periodo;

        if (@$_REQUEST['btnsavecierre_retardos'] == "Cerrar_Periodo") {
            $resp = $cierre_periodo->update($conn, $_REQUEST['start_date'], $_REQUEST['end_date'], $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "buscarStock":

        $m_warehouse_id = $_REQUEST['m_warehouse_id'];
        $m_product_id = $_REQUEST['m_product_id'];

        $Stock = new productos;
        $resp = $Stock->getStock($conn, $m_product_id, $m_warehouse_id);


        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "cotizacion_contenedor":

        $fact = new cotizacion_contenedor;

        if (trim($_REQUEST['btnsavecotizacion']) == "Guardar") {

            $fact->add($conn, $_REQUEST['nrodoc'], $_REQUEST['status_id'], $_REQUEST['start_date'], $_REQUEST['end_date'], $_REQUEST['payment_condition_id'], $_REQUEST['customers_id'], $_REQUEST['num_control'], $_REQUEST['description'], $_REQUEST['c_currency_id'], $_REQUEST['rate_id'], $_REQUEST['product_cant'], $_REQUEST['art_cant'], guardafloat($_REQUEST['subtotal']), guardafloat($_REQUEST['iva']), guardafloat($_REQUEST['total']), $_REQUEST['idGridProductos'], $_REQUEST['rate_id_fact'], $_SESSION['id']);

        } else if (trim($_REQUEST['btnsavecotizacion']) == "Actualizar") {

            $fact->update($conn, $_REQUEST['quotation_cont_id'], $_REQUEST['nrodoc'], $_REQUEST['status_id'], $_REQUEST['start_date'], $_REQUEST['end_date'], $_REQUEST['payment_condition_id'], $_REQUEST['customers_id'], $_REQUEST['num_control'], $_REQUEST['description'], $_REQUEST['c_currency_id'], $_REQUEST['rate_id'], $_REQUEST['product_cant'], $_REQUEST['art_cant'], guardafloat($_REQUEST['subtotal']), guardafloat($_REQUEST['iva']), guardafloat($_REQUEST['total']), $_REQUEST['idGridProductos'], $_REQUEST['rate_id_fact'], $_SESSION['id']);

        } else if ($_REQUEST['btnsavecotizacion'] == "Aprobar") {

            $fact->approve($conn, $_REQUEST['quotation_cont_id'], $_REQUEST['start_date'], $_REQUEST['end_date'], $_REQUEST['description'], $_REQUEST['product_cant'], $_REQUEST['art_cant'], guardafloat($_REQUEST['total']), $_REQUEST['idGridProductos'], $_SESSION['id']);

        } else if (trim($_REQUEST['btnsavecotizacion']) == "Anular") {

            $fact->cancel($conn, $_REQUEST['quotation_cont_id'], $_REQUEST['status_id'], $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($fact);

    break;

    case 'buscaDocumentoRef':
        $reference_id = $_REQUEST['reference_id'];
        $reference_document = $_REQUEST['reference_document'];
        $document_type = $_REQUEST['document_type'];

        $fact = new facturacion;
        $resp = $fact->buscaDocumentoRef($conn, $reference_id, $reference_document, $document_type);

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case 'buscaFacturaRef':
        $reference_id = $_REQUEST['reference_id'];

        $fact = new nota_credito;
        $resp = $fact->buscaFacturaRef($conn, $reference_id);

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "seguimiento_oc":

        $oc = new seguimiento_oc;
        if (empty(@$_REQUEST['isactive'])) {
            $isactive = 'N';
        } else {
            $isactive = $_REQUEST['isactive'];
        }
        if (empty(@$_REQUEST['in_house'])) {
            $in_house = 'N';
        } else {
            $in_house = $_REQUEST['in_house'];
        }

        if ($_REQUEST['btnsaveseguimiento_oc'] == "Guardar") {
            $resp = $oc->add($conn, $_REQUEST['ad_org_id'], $_REQUEST['ad_company_id'], $_REQUEST['client'], $_REQUEST['gb_payment_condition_id'], $_REQUEST['num_order'], $_REQUEST['ad_employee_id'], $_REQUEST['description'], $_REQUEST['quantity'], guardafloat($_REQUEST['amount']), $_REQUEST['provider'], $_REQUEST['date_of_purchase'], $_REQUEST['tracking'], $_REQUEST['gb_status_id'], $_REQUEST['estimated_date'], $_REQUEST['arrival_date'], $in_house, $isactive, $_SESSION['id']);
        } else {
            $resp = $oc->update($conn, $_REQUEST['gb_tracing_id'], $_REQUEST['ad_org_id'], $_REQUEST['ad_company_id'], $_REQUEST['client'], $_REQUEST['gb_payment_condition_id'], $_REQUEST['num_order'], $_REQUEST['ad_employee_id'], $_REQUEST['description'], $_REQUEST['quantity'], guardafloat($_REQUEST['amount']), $_REQUEST['provider'], $_REQUEST['date_of_purchase'], $_REQUEST['tracking'], $_REQUEST['gb_status_id'], $_REQUEST['estimated_date'], $_REQUEST['arrival_date'], $in_house, $isactive, $_SESSION['id']);
        }


        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "savePurchaseOrder":

        $orden = new orden_compra;
        $json = new Services_JSON();
        if (empty(@$_REQUEST['isactive'])) {
            $isactive = 'N';
        } else {
            $isactive = $_REQUEST['isactive'];
        }

        if ($_REQUEST['btnSaveOrder'] == "Guardar") {
            $resp = $orden->add(
                $conn,
                $_REQUEST['nrodoc'],
                $_REQUEST['status_id'],
                $_REQUEST['start_date'],
                $_REQUEST['end_date'],
                $_REQUEST['payment_condition_id'],
                $_REQUEST['customers_id'],
                $_REQUEST['num_control'],
                $_REQUEST['description'],
                $_REQUEST['c_currency_id'],
                $_REQUEST['rate_id'],
                $_REQUEST['product_cant'],
                $_REQUEST['art_cant'],
                guardafloat($_REQUEST['subtotal']),
                guardafloat($_REQUEST['iva']),
                guardafloat($_REQUEST['total']),
                $_REQUEST['idGridProductos'],
                $_REQUEST['rate_id_ord'],
                $_REQUEST['reference_document'],
                $_REQUEST['reference_id'],
                $_SESSION['id']
            );
            $json = new Services_JSON();
            echo $json->encode($resp);
            
        } else if($_REQUEST['btnSaveOrder'] == "Actualizar") {
            $resp = $orden->update(
                $conn,
                $_REQUEST['purchase_order_id'],
                $_REQUEST['nrodoc'],
                $_REQUEST['status_id'],
                $_REQUEST['start_date'],
                $_REQUEST['end_date'],
                $_REQUEST['payment_condition_id'],
                $_REQUEST['customers_id'],
                $_REQUEST['num_control'],
                $_REQUEST['description'],
                $_REQUEST['c_currency_id'],
                $_REQUEST['product_cant'],
                $_REQUEST['art_cant'],
                guardafloat($_REQUEST['subtotal']),
                guardafloat($_REQUEST['iva']),
                guardafloat($_REQUEST['total']),
                // $_REQUEST['idGridProductos'],
                $_REQUEST['rate_id_ord'],
                // $_REQUEST['reference_document'],
                // $_REQUEST['reference_id'],
                $_SESSION['id'],
                $_REQUEST['idGridProductos'],
                 $_REQUEST['reference_document'],
                $_REQUEST['reference_id']
            );
            $json = new Services_JSON();
            echo $json->encode($resp);
        }else if($_REQUEST['btnDelete'] == "Anular"){
            $resp = $orden->Anular(
                $conn,
                $_REQUEST['purchase_order_id'],
                $_REQUEST['nrodoc'],
                $_REQUEST['status_id'],
                $_REQUEST['start_date'],
                $_REQUEST['end_date'],
                $_REQUEST['payment_condition_id'],
                $_REQUEST['customers_id'],
                $_REQUEST['num_control'],
                $_REQUEST['description'],
                $_REQUEST['c_currency_id'],
                $_REQUEST['product_cant'],
                $_REQUEST['art_cant'],
                guardafloat($_REQUEST['subtotal']),
                guardafloat($_REQUEST['iva']),
                guardafloat($_REQUEST['total']),
                // $_REQUEST['idGridProductos'],
                $_REQUEST['rate_id_ord'],
                // $_REQUEST['reference_document'],
                // $_REQUEST['reference_id'],
                $_SESSION['id'],
                $_REQUEST['idGridProductos'],
                 $_REQUEST['reference_document'],
                $_REQUEST['reference_id']
            );
            $json = new Services_JSON();
            echo $json->encode($resp);
        }

    break;
       
    case 'buscaOrdenCompra':
        $purchase_order_id = $_REQUEST['purchase_order_id'];

        $ord = new orden_compra;
        $resp = $ord->get($conn, $purchase_order_id);

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case "pago":

        $pago = new pago;

        if ($_REQUEST['btnsavepago'] == "Guardar") {
            $resp = $pago->add($conn, $_REQUEST['nrodoc'], $_REQUEST['purchase_order_id'], $_REQUEST['start_date'], $_REQUEST['end_date'], $_REQUEST['status_id'], $_REQUEST['customers_id'], $_REQUEST['description'], $_REQUEST['transaction_number'], $_REQUEST['description_trans'], $_REQUEST['product_cant'], $_REQUEST['art_cant'], $_REQUEST['total'], $_SESSION['id']);
        } else {
            $resp = $pago->update($conn, $_REQUEST['payment_id'], $_REQUEST['nrodoc'], $_REQUEST['purchase_order_id'], $_REQUEST['start_date'], $_REQUEST['end_date'], $_REQUEST['status_id'], $_REQUEST['customers_id'], $_REQUEST['description'], $_REQUEST['transaction_number'], $_REQUEST['description_trans'], $_REQUEST['product_cant'], $_REQUEST['art_cant'], $_REQUEST['total'], $_SESSION['id']);
        }

        $json = new Services_JSON();
        echo $json->encode($resp);

    break;

    case 'SendMail':
        $ad_payroll_history_id = $_REQUEST['ad_payroll_history_id'];
        $ad_employee_id = @$_REQUEST['ad_employee_id'];

        $nom = new nomina;
        $Trabajador = $nom->getTrabajadorHistNomina($conn, $ad_payroll_history_id, $ad_employee_id);

        $json = new Services_JSON();
        echo $json->encode($Trabajador);
        
    break;


            

}