<?php
include 'lib/librerias.php';
$purchase_order_id = @$_REQUEST['purchase_order_id'];

$hide = "";
$orden_compra = new orden_compra;
if (!empty($purchase_order_id)) {

  $ord = $orden_compra->get($conn, $purchase_order_id);
  $hide = "d-none";
}

$save = "Guardar";
$disabled = "Anular";
$edit="";
if (empty($ord->purchase_order_id)) {
  $save = "Guardar";
  $edit="";
  $disabled = "Anular";
}else{
  $save = "Actualizar";
  $disabled = "Anular";
  $edit="Editar";
}
$rate_id = "";
$tasa = new tasas;
$montoTasa = $tasa->getTasaActual($conn, date("Y-m-d"), $rate_id);
?>

<link rel="stylesheet" href="css/jquery-ui.css">

<div class="card">
    <div class="card-header p-2">
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="tab" href="#producto">Datos Orden de Compra</a></li>
        </ul>
    </div>
    <div class="card-body login-card-body">
        <form method="post" name="orden_compra" id="orden_compra">
            <div class="tab-content">
                <div id="producto" class="tab-pane active" style="opacity: 1">
                    <div class="row">
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Número Documento
                                    <input type="text" class="inputForm" placeholder="" name="nrodoc" id="nrodoc"
                                        value="<?= @$ord->nrodoc; ?>" readonly="readonly">
                                </label>
                                <input type="hidden" name="purchase_order_id" id="purchase_order_id"
                                    value="<?= @$ord->purchase_order_id; ?>">
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Documento Referencia
                                    <input type="text" class="inputForm" placeholder="" name="reference_document"
                                        id="reference_document" value="<?= @$ord->reference_document; ?>"
                                        readonly="readonly">
                                </label>
                                <input type="hidden" name="reference_id" id="reference_id"
                                    value="<?= @$ord->reference_id; ?>">

                            </div>
                        </div>
                        <div class="col-sm-1" style="text-align: left;">

                            <i id="lupa" class="fa fa-search fa-2x find <?= $hide ?>"
                                style="border: 0px; padding: 0px; margin-top:  43px;background-color:transparent;"
                                onclick="consultaDocumentoRef()"></i>

                        </div>

                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Fecha
                                    <input type="date" class="inputForm" placeholder="" name="start_date"
                                        id="start_date" value="<?= muestrafecha1(@$ord->start_date); ?>">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Vence
                                    <input type="date" class="inputForm" placeholder="" name="end_date" id="end_date"
                                        value="<?= muestrafecha1(@$ord->end_date); ?>">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Estatus
                                    <?php
                  $q2 = "SELECT status_id id, name descripcion FROM system.status";
                  echo superCombo($conn, $q2, @$ord->status_id, 'status_id_view', 'status_id_view', 'width:100%', "", 'id', 'descripcion', '', '', 'disabled', 'SIN REGISTRAR', 'inputForm');
                  ?>
                                </label>
                                <input type="hidden" name="status_id" id="status_id"
                                    value="<?= @$ord->status_id?$ord->status_id:'0'; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Identificación
                                    <input type="text" class="inputForm" placeholder="" name="identification"
                                        id="identification" value="<?= @$ord->identificacion; ?>">
                                </label>
                                <input type="hidden" class="" placeholder="" name="customers_id" id="customers_id"
                                    value="<?= @$ord->customers_id; ?>">
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="input-group ">
                                <label>
                                    Razón Social
                                    <input type="text" class="inputForm" placeholder="" name="razonsocial"
                                        id="razonsocial" value="<?= @$ord->cliente; ?>">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-1" style="text-align: left;">

                            <i id="lupa" class="fa fa-search fa-2x find <?= $hide ?>"
                                style="border: 0px; padding: 0px; margin-top:  43px;background-color:transparent;"
                                onclick="consultaCliente()"></i>

                        </div>
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Número Control
                                    <input type="text" class="inputForm" placeholder="" name="num_control"
                                        id="num_control" value="<?= @$ord->num_control; ?>">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Tipo de Pago
                                    <?php
                  $q2 = "SELECT payment_condition_id id, name descripcion FROM system.payment_condition ";
                  $q2 .= "WHERE payment_condition_id IN (SELECT payment_condition_id FROM system.rate where isactive='Y') order by payment_condition_id";
                  echo superCombo($conn, $q2, @$ord->payment_condition_id, 'payment_condition_id', 'payment_condition_id', 'width:100%', "buscarTasa()", 'id', 'descripcion', '', '', '', '', 'inputForm');
                  ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 ">

                        </div>
                        <div class="col-sm-2 "></div>
                        <div class="col-sm-2 "></div>
                        <div class="col-sm-2 "></div>
                        <div class="col-sm-3 "></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 ">
                            <div class="input-group ">
                                <label>
                                    Comentario
                                    <input type="text" class="inputForm" placeholder="" name="description"
                                        id="description" value="<?= @$ord->description; ?>">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Moneda
                                    <?php
                  $q2 = "SELECT c_currency_id id, (description || ' - ' || cursymbol) descripcion FROM system.c_currency ORDER BY c_currency_id ASC";
                  echo superCombo($conn, $q2, @$ord->c_currency_id, 'c_currency_id', 'c_currency_id', 'width:100%', "buscarTasa()", 'id', 'descripcion', '', '', '', '', 'inputForm input-group');
                  ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                            <div class="input-group ">
                                <label>
                                    Tasa
                                    <input type="text" class="inputForm" placeholder="" name="rate" id="rate"
                                        value="<?= @$ord->rate; ?>" readonly="readonly">
                                </label>
                                <input type="hidden" name="rate_id" id="rate_id" value="<?= @$ord->rate_id; ?>"
                                    readonly="readonly">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-2 "></div>
                        <div class="col-sm-3 "></div>
                        <div class="col-sm-7 "></div>
                    </div>
                    <div class="row">
                        <div id="divgridbox" class="col-sm-9">
                            <div id="gridbox" style="height:300px;"></div>
                            <i title="Quitar Artículo" class="fa fa-trash iconFA" aria-hidden="true"
                                onclick="eliminar();"></i>
                        </div>

                        <div class="col-sm-3">
                            <table class="table_ table-hovser" border="0" width="100%">
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-sm-10">

                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cant. Productos</td>
                                    <td align="right" class="montos" id="product">0</td>
                                </tr>
                                <input type="hidden" name="product_cant" id="product_cant"
                                    value="<?= @$ord->product_cant; ?>">
                                <input type="hidden" name="art_cant" id="art_cant" value="<?= @$ord->art_cant; ?>">
                                <tr>
                                    <td>Cant. Artículos</td>
                                    <td align="right" class="montos" id="articulos">0</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="montos" id=""></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="montos" id=""></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Sub - Total</b>
                                    </td>
                                    <td align="right" class="montos">
                                        <?php
                    $subtotal = (!empty(@$ord->subtotal)) ? muestrafloat(@$ord->subtotal) : "0,00";
                    $iva = (!empty(@$ord->iva)) ? muestrafloat(@$ord->iva) : "0,00";
                    $total = (!empty(@$ord->total)) ? muestrafloat(@$ord->total) : "0,00";
                    ?>
                                        <input type="text" class="inputForm monto" placeholder="" name="subtotal"
                                            id="subtotal" value="<?= $subtotal ?>" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>I.V.A. %</b></td>
                                    <td align="right" class="montos">
                                        <input type="text" class="inputForm monto" placeholder="" name="iva" id="iva"
                                            value="<?= $iva ?>" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Total</b>
                                    </td>
                                    <td align="right" class="montos">
                                        <input type="text" class="inputForm monto" placeholder="" name="total"
                                            id="total" value="<?= $total ?>" readonly="readonly">
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <button onclick="savePurchaseOrder(); return false;"
                                class="btn btn-success btn-block btn-sm" id="btnSave" name="btnSave"
                                value="<?=$save?>">
                                <i class="fas fa-sync-alt"></i>
                                <?=$save?></button>

                            <!-- <button onclick="deletePurchaseOrder(); return false;"
                                class="btn btn-primary btn-block btn-sm" id="btnDelete" name="btnDelete"
                                value="<?=$disabled?>">
                                <i class="fas fa-trash"></i>
                                <?=$disabled?></button> -->
                        </td>

                        <td>&nbsp;</td>
                        <td colspan="2">
                            <div class="" align="center" id="aviso" style="display: none;font-weight: 700;"></div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <input type="hidden" name="form" id="form" value="savePurchaseOrder">
            <input type="hidden" name="btnSaveOrder" id="btnSaveOrder" value="<?= $save ?>">
            <input type="hidden" name="deletePurchaseOrder" id="deletePurchaseOrder" value="<?= $disabled ?>">
            <input type="hidden" name="idGridProductos" id="idGridProductos" value="">
            <input type="hidden" name="idGridTipoCobro" id="idGridTipoCobro" value="">
            <input type="hidden" name="rate_id_ord" id="rate_id_ord"
                value="<?= empty($ord->rate_id_ord) ? $montoTasa->rate_id : $ord->rate_id_ord ?>">
        </form>

    </div>
    <!-- /.login-card-body -->
</div>


<br>
<!-- Dir Modal-->
<div class="modal fade " id="DirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px; cursor: pointer;">
        <div class="modal-content" id="move">

            <div id="contenidoModal"></div>

        </div>
    </div>
</div>

<script>
<?php
  if (empty($montoTasa->monto)) {
  ?>
$(document).ready(function() {
    if ($(".contenido_tasas").length > 0) {
        alertify.confirm(
            "No hay <b>\"Tasa Actual Cargada\"</b> para la Venta<br> Desea cargar la Tasa en este momento?.",
            function() {
                $("#titulo").html('Tasas');
                $('#contenido').load('tasas.php', function() {
                    $(this).fadeIn();
                });
            },
            function() {
                alertify.error('Sin tasa Actual');
            }).set({
            title: TITULO_ALERT
        });
    } else {
        alertify.alert("No hay <b>\"Tasa Actual Cargada\"</b> para la Venta<br> Consulte con un Administrador")
            .set({
                title: "Información"
            });
    }
});


<?php
  }
  ?>

<?php
  if (empty($ord->purchase_order_id)) {
  ?>
$("#btnDelete").hide();
<?php
  }
  ?>




var cantProd = new Array;
buildGridRegProduc();

function buildGridRegProduc() {
    //set grid parameters
    gridRProduc = new dhtmlXGridObject('gridbox');
    gridRProduc.selMultiRows = true;
    gridRProduc.setImagePath("js/grid/imgs/");
    gridRProduc.setHeader("Reg,Cód,Art,Alm,Cant,Und,Precio ,%Desc,I.V.A,Neto");
    gridRProduc.setInitWidthsP("7,9,23,5.5,7,7,14.9,9,7,14.9");
    gridRProduc.setColAlign("center,center,center,center,center,center,right,center,center,right");
    gridRProduc.setColTypes("coro,coro,ro,coro,ro,coro,ro,coro,coro,ro");
    gridRProduc.setColSorting("int,str,str,int,int,int,int,int,int,int");
    gridRProduc.setColumnColor("white,white,white,white,white,white,white,white,white,white");
    gridRProduc.rowsBufferOutSize = 0;
    gridRProduc.setMultiLine(false);
    gridRProduc.selmultirows = "true";
    gridRProduc.delim = ";";
    gridRProduc.setOnEditCellHandler(CantArticulos);

    <?php
    $iva = new productos;
    $alm = new almacen;

    $almacen = $alm->getAlmacenes($conn);
    $descuento = $iva->getDescuento($conn);
    $iva_ = $iva->get_iva($conn);

    ?>

    <?= combogrid($almacen, 3, 'm_warehouse_id', 'shorten', 'Seleccione', 'gridRProduc') ?>
    <?= combogrid($descuento, 7, 'id', 'shorten', 'Seleccione', 'gridRProduc') ?>
    <?= combogrid($iva_, 8, 'id', 'percent', 'Seleccione', 'gridRProduc') ?>

    <?php
    $q = "SELECT * FROM system.tax where tax_id =1";
    $r = $conn->execute($q);
    $tax_id = $r->fields['tax_id'];
    $percent = $r->fields['percent'];
    ?>

    gridRProduc.init();
}


body.onkeydown = function(e) {
    if (e.key == "F2" && ($("#identification").is(':focus') || $("#razonsocial").is(':focus'))) {
        // alert("Identificacion");
        $('#DirModal').modal("show");
        $("#DirModal").css("display", "block");
        $("#DirModal").css("background-color", "#00000050");
        $(".modal-content").css("margin-top", "100px");
        $('#contenidoModal').load('buscaCliente.php?opcion=1', function() {
            $(this).fadeIn();
        });

        return false;
    } else if (e.key == "F2" && $("#codigo").is(':focus')) {
        consultaProd();
    }



    if (e.key == "Delete" && $("#status_id_view").val() == "0" && gridRProduc.getSelectedId() != null) {

        eliminar();
    }

    if (e.key == "F5") {
        window.location.href = "principal.php";
        return false;
    }


};

function eliminar() {

    if ($("#status_id_view").val() == "0" && gridRProduc.getSelectedId() != null) {
        alertify.confirm("¿Desea Eliminar el Articulo <b>" + gridRProduc.cells(gridRProduc.getSelectedId(), 2)
            .getValue() + "</b>?.",
            function() {
                gridRProduc.deleteRow(gridRProduc.getSelectedId());

                for (j = 0; j < gridRProduc.getRowsNum(); j++) {
                    gridRProduc.cells(gridRProduc.getRowId(j), 0).setValue(parseInt(j + 1));
                }
                total();
            },
            function() {
                alertify.error('No se elimino el Artículo');
            }).set('labels', {
            ok: 'Aceptar',
            cancel: 'Cancelar',
            title: "Información"
        });
    }
}

function consultaProd() {
    $('#DirModal').modal("show");
    $("#DirModal").css("display", "block");
    $("#DirModal").css("background-color", "#00000050");
    $(".modal-content").css("margin-top", "50px");
    $('#contenidoModal').load('buscaProductos.php?opcion=1', function() {
        $(this).fadeIn();
    });
    return false;
}

function consultaCliente() {
    $('#DirModal').modal("show");
    $("#DirModal").css("display", "block");
    $("#DirModal").css("background-color", "#00000050");
    $(".modal-content").css("margin-top", "50px");
    $('#contenidoModal').load('buscaCliente.php?opcion=1', function() {
        $(this).fadeIn();
    });
    return false;
}

function consultaDocumentoRef() {
    $('#DirModal').modal("show");
    $("#DirModal").css("display", "block");
    $("#DirModal").css("background-color", "#00000050");
    $(".modal-content").css("margin-top", "50px");
    $('#contenidoModal').load('buscaDocumentoRef.php?opcion=1&onlyCode=COT', function() {
        $(this).fadeIn();
    });
    return false;
}

/*  
$("#id").keyup(function (event) {
    //alert(valor); 
    setTimeout(function(){$("#id").val(CerosFaltantes($("#id").val()));}, 50);
});*/

setTimeout(function() {
    //alert($("#divgridbox").width());
    //$("#gridbox").width($("#divgridbox").width());
    $("#gridbox").width("100%");
}, 300);



$("#codigo").keypress(function(event) {
    if (event.which == 13) {
        //Buscaproducto($("#cod").val());
        //$('#productos').focus( );
        //$("#codigo").prop('disabled', true);
        setTimeout(function() {
            Buscaproducto($("#codigo").val());
        }, 300);
    }

});



function Buscaproducto(codigo) {
    var parametros = {
        "codigo": codigo,
        "c_currency_id": $("#c_currency_id").val(),
        "payment_condition_id": $("#payment_condition_id").val(),
        "start_date": $("#start_date").val(),
        "form": "busca_productos",
        "busca_por": "codigo"
    };
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        beforeSend: function() {},
        success: function(response) {

            var json = JSON.parse(response);

            if (json['existencia'] != 2 && json['montoTasa'] != 0) {
                var i = gridRProduc.getRowsNum();

                for (j = 0; j < i; j++) {
                    if (gridRProduc.getRowIndex(gridRProduc.getRowId(j)) != -1) {
                        if (gridRProduc.cells(gridRProduc.getRowId(j), 1).getValue() == json[
                                'm_product_id']) {
                            //alert("El Producto ya se Agrego");
                            CantArticulos(2, gridRProduc.getRowId(j), 4, 1);

                            return false;
                        }
                    }
                }

                //alert(json['stock']);
                if (json['stock'] > 0) {
                    //$("#codigo").val(json['codigo']);
                    //$("#disponible_").html(json['cantidad']);
                    i = i + 1;
                    id = generarCadena(4);
                    //alert(id);
                    almID = json['m_warehouse_id'];
                    almDesc = json['shorten'];
                    porcDesc = 1;
                    Desc = "0.00";
                    porc = <?= $percent ?>;
                    idname = <?= $tax_id ?>;
                    gridRProduc.getCombo(1).put(json['m_product_id'], json['cod']);
                    gridRProduc.getCombo(3).put(almID, almDesc);
                    gridRProduc.getCombo(5).put(json['c_uom_id'], json['uomsymbol']);
                    gridRProduc.getCombo(7).put(porcDesc, Desc);
                    gridRProduc.getCombo(8).put(idname, porc);
                    gridRProduc.addRow(id, i + ";" + json['m_product_id'] + ";" + json['name'] + ";" +
                        almID + ";" + 1 + ";" + json['c_uom_id'] + ";" + muestraFloat(json['monto']
                            .toFixed(2)) + ";" + porcDesc + ";" + idname + ";" + muestraFloat(json[
                            'monto'].toFixed(2)));

                    total();
                    if (json['stock'] <= 5) {
                        alertify.error("QUEDAN <b>" + json['stock'] + "</b> UNIDADES DE <b>" + json[
                            'name'] + "</b>").set({
                            title: "Mensaje"
                        });
                    }
                } else {
                    alertify.alert("NO HAY DISPONIBILIDAD DE <b>" + json['name'] + "</b>").set({
                        title: "Mensaje"
                    });
                }

            } else {
                if (json['existencia'] == 2) {
                    alertify.alert("Codigo no Existe").set({
                        title: "Mensaje"
                    });
                } else {
                    if ($(".contenido_tasas").length > 0) {
                        alertify.confirm(
                            "No hay <b>\"Tasa Actual Cargada\"</b> para la Venta<br> Desea cargar la Tasa en este momento?.",
                            function() {
                                $("#titulo").html('Tasas');
                                $('#contenido').load('tasas.php', function() {
                                    $(this).fadeIn();
                                });
                            },
                            function() {
                                alertify.error('Sin tasa Actual');
                            }).set({
                            title: "Información"
                        });
                    } else {
                        alertify.alert(
                            "No hay <b>\"Tasa Actual Cargada\"</b> para la Venta<br> Consulte con un Administrador"
                        ).set({
                            title: "Información"
                        });
                    }
                }

            }
            $("#codigo").prop('disabled', false);
        }
    });
}

function CantArticulos(stage, rowId, cellInd, cant) {
    id = gridRProduc.cells(rowId, 1).getValue();
    m_warehouse_id = gridRProduc.cells(rowId, 3).getValue();

    if (cant === undefined) {
        cantidad = gridRProduc.cells(rowId, 4).getValue();
    } else {
        cantidad = gridRProduc.cells(rowId, 4).getValue();
        cantidad = parseInt(cantidad) + parseInt(cant);
    }
    // monto = gridRProduc.cells(rowId,7).getValue();

    porc = gridRProduc.cells(rowId, 7).getText();
    desc = (parseFloat(porc) / 100) * usaFloat(gridRProduc.cells(rowId, 6).getValue());
    monto = (usaFloat(gridRProduc.cells(rowId, 6).getValue()) - desc.toFixed(2));


    if (stage == 2 && cellInd == 3) {
        var parametros = {
            "id": id,
            "m_warehouse_id": m_warehouse_id,
            "form": "Verifica_almacen"
        };
        $.ajax({
            data: parametros,
            url: 'save.php',
            type: 'post',
            beforeSend: function() {

            },
            success: function(response) {

                if (m_warehouse_id != parseInt(response.trim())) {
                    alertify.alert("NO TIENE PERMISO PARA USAR OTRO ALMACEN").set({
                        title: "Mensaje"
                    });

                    gridRProduc.cells(rowId, 3).setValue(parseInt(response.trim()));
                } else {
                    CantArticulos(stage, rowId, 4, 0);
                }
            }
        });
    }

    if (stage == 2 && cellInd == 4) {
        var parametros = {
            "id": id,
            "m_warehouse_id": m_warehouse_id,
            "form": "cantidad_producto"
        };
        $.ajax({
            data: parametros,
            url: 'save.php',
            type: 'post',
            beforeSend: function() {

            },
            success: function(response) {
                //var json = JSON.parse(response);

                if (cantidad > 0 || !isNaN(cantidad)) {
                    if (cantidad > parseInt(response.trim())) {

                        if (response.trim() == "" || response.trim() == 0) {
                            gridRProduc.deleteRow(gridRProduc.getSelectedId());
                        } else {
                            gridRProduc.cells(rowId, 4).setValue(parseInt(response.trim()));
                        }

                        alertify.alert("SOLO QUEDAN <b>" + response.trim() + "</b> UNIDADES DISPONIBLES")
                            .set({
                                title: "Mensaje"
                            });
                        gridRProduc.cells(rowId, 9).setValue(muestraFloat((response.trim() * monto).toFixed(
                            2)));
                    } else {

                        gridRProduc.cells(rowId, 9).setValue(muestraFloat((cantidad * monto).toFixed(2)));
                        gridRProduc.cells(rowId, 4).setValue(cantidad);
                    }
                }
            }
        });
    }

    if (stage == 2 && cellInd == 7) {
        gridRProduc.cells(rowId, 9).setValue(muestraFloat((cantidad * monto).toFixed(2)));
    }




    setTimeout(function() {
        total();
    }, 300);

}


function total() {
    var subtotal = 0;
    var art = 0;
    var iva = 0;
    var iva2 = 0;
    var total = 0;
    //gridRProduc.clearSelection();
    for (j = 0; j < gridRProduc.getRowsNum(); j++) {
        subtotal += usaFloat(gridRProduc.cells(gridRProduc.getRowId(j), 9).getValue());
        iva += usaFloat(gridRProduc.cells(gridRProduc.getRowId(j), 9).getValue()) * gridRProduc.cells(gridRProduc
            .getRowId(j), 8).getText();
        art += usaFloat(gridRProduc.cells(gridRProduc.getRowId(j), 4).getValue());

    }
    //iva = subtotal * (<?= $percent ?>);
    total = subtotal + iva;

    $("#product").html(gridRProduc.getRowsNum());
    $("#articulos").html(art);
    $("#product_cant").val(gridRProduc.getRowsNum());
    $("#art_cant").val(art);
    $("#subtotal").val(muestraFloat(subtotal.toFixed(2)));
    $("#iva").val(muestraFloat(iva.toFixed(2)));
    $("#total").val(muestraFloat(total.toFixed(2)));
    //$("#Total_venta").val(muestraFloat(total.toFixed(2)));
}




$("#identification").keypress(function(event) {
    if (event.key == 'Enter' && $("#identification").is(':focus')) {
        $("#identification").prop('disabled', true);
        if ($("#identification").val() == "") {
            alertify.alert("Ingrese Identificacion").set({
                title: "Mensaje"
            });
            $("#identification").prop('disabled', false);
            $("#identification").focus();
            return false;
        }
        setTimeout(function() {
            buscaIdentificacion($("#identification").val());
        }, 300);
    }

});

function buscaDatosCliente(customers_id, identificacion, cliente) {

    $("#identification").val(identificacion);
    $("#customers_id").val(customers_id);
    $("#razonsocial").val(cliente);

}

function buscaIdentificacion(Indet) {
    var parametros = {
        "Indet": Indet,
        "form": "buscaClienteIdent"
    };
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        beforeSend: function() {},
        success: function(response) {
            $("#identification").prop('disabled', false);
            if (response != 0) {
                var json = JSON.parse(response);
                // var IdGridProduc = new Array;
                if (json) {
                    buscaDatosCliente(json['customers_id'], json['identificacion'], json['cliente']);
                } else {

                    $("#identification").val("");
                    $("#customers_id").val("");
                    $("#razonsocial").val("");

                    $('#DirModal').modal("show");
                    $("#DirModal").css("display", "block");
                    $("#DirModal").css("background-color", "#00000050");
                    $(".modal-content").css("margin-top", "100px");
                    $('#contenidoModal').load("registro_cliente.php?Ident=" + Indet, function() {
                        $(this).fadeIn();
                    });

                }
            }
        }
    });

}
//monto no aparace, ajuste los decimales, conciliar por montos 
buscarTasa();

function buscarTasa() {

    if ($("#payment_condition_id").val() != 1) {
        if ($("#c_currency_id").val() != 1) {
            rate_id = "";
        } else {
            rate_id = $("#rate_id_ord").val();
        }
    } else {
        rate_id = $("#rate_id_ord").val();
    }

    var parametros = {
        "c_currency_id": $("#c_currency_id").val(),
        "payment_condition_id": $("#payment_condition_id").val(),
        "start_date": $("#start_date").val(),
        "rate_id": rate_id,
        "form": "tasa"
    };
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        beforeSend: function() {},
        success: function(response) {
            if (response != 0) {
                var json = JSON.parse(response);
                $("#rate").val(json['monto']);
                $("#rate_id").val(json['rate_id']);

                var i = gridRProduc.getRowsNum();

                if (i > 0) {

                    GridProd = guardaProductos();
                    var parametros = {
                        /*"m_product_id" :m_product_id,
                        "cantidad" :cantidad,*/
                        "GridProd": GridProd,
                        "c_currency_id": $("#c_currency_id").val(),
                        "payment_condition_id": $("#payment_condition_id").val(),
                        "start_date": $("#start_date").val(),
                        "rate_id": rate_id,
                        "form": "buscaMontoArt"
                    };
                    $.ajax({
                        data: parametros,
                        url: 'save.php',
                        type: 'post',
                        beforeSend: function() {},
                        success: function(response) {
                            if (response != 0) {
                                var json = JSON.parse(response);
                                if (json) {
                                    for (i = 0; i < json.length; i++) {
                                        gridRProduc.cells(json[i]['RowId'], 6).setValue(
                                            muestraFloat(json[i]['monto_und'].toFixed(2)));
                                        gridRProduc.cells(json[i]['RowId'], 9).setValue(
                                            muestraFloat(json[i]['monto'].toFixed(2)));
                                    }
                                    total();
                                    GridProd = guardaProductos();

                                }
                            }
                        }
                    });

                } //if
            } else {
                if ($(".contenido_tasas").length > 0) {
                    alertify.confirm(
                        "No hay <b>\"Tasa Actual Cargada\"</b> para la Venta<br> Desea cargar la Tasa en este momento?.",
                        function() {
                            $("#titulo").html('Tasas');
                            $('#contenido').load('tasas.php', function() {
                                $(this).fadeIn();
                            });
                        },
                        function() {
                            alertify.error('Sin tasa Actual');
                        }).set({
                        title: "Información"
                    });
                } else {
                    alertify.alert(
                        "No hay <b>\"Tasa Actual Cargada\"</b> para la Venta<br> Consulte con un Administrador"
                    ).set({
                        title: "Información"
                    });
                }
            }
        }
    });
}


function guardaProductos() {

    var JsonAux, idGridProductos = new Array;
    // var json = JSON.parse($("#idGridProductos").val());
    gridRProduc.clearSelection();
    //alert(json);
    //alert('filas: ' + gridRProduc.getRowsNum());
    for (j = 0; j < gridRProduc.getRowsNum(); j++) {

        idGridProductos[j] = new Array;

        idGridProductos[j][0] = gridRProduc.getRowId(j); //RowId
        idGridProductos[j][1] = gridRProduc.cells(gridRProduc.getRowId(j), 1).getValue(); //m_product_id
        idGridProductos[j][2] = gridRProduc.cells(gridRProduc.getRowId(j), 2).getValue(); //descripcion articulo
        idGridProductos[j][3] = gridRProduc.cells(gridRProduc.getRowId(j), 3).getValue(); //almacen
        idGridProductos[j][4] = gridRProduc.cells(gridRProduc.getRowId(j), 4).getValue(); //cantidad
        idGridProductos[j][5] = gridRProduc.cells(gridRProduc.getRowId(j), 5).getValue(); //unidad
        idGridProductos[j][6] = usaFloat(gridRProduc.cells(gridRProduc.getRowId(j), 6).getValue()); //precio
        idGridProductos[j][7] = parseFloat(gridRProduc.cells(gridRProduc.getRowId(j), 7).getText()); //% descuento
        idGridProductos[j][8] = gridRProduc.cells(gridRProduc.getRowId(j), 8).getValue(); //id IVA
        idGridProductos[j][9] = usaFloat(gridRProduc.cells(gridRProduc.getRowId(j), 9).getValue()); //Neto
        idGridProductos[j][10] = gridRProduc.cells(gridRProduc.getRowId(j), 7).getValue(); //id % descuento
        idGridProductos[j][11] = gridRProduc.cells(gridRProduc.getRowId(j), 1).getText(); //Codigo producto


        for (var i = 0; i < cantProd.length; i++) {
            if (cantProd[i]['m_product_id'] == gridRProduc.cells(gridRProduc.getRowId(j), 1).getValue()) {
                idGridProductos[j][12] = cantProd[i]['cantidad'];
            }

        }

    }

    var JsonAux = {
        "idGridProductos": idGridProductos
    };
    $("#idGridProductos").val(JSON.stringify(JsonAux));

    console.log(JSON.stringify(JsonAux));
    /*     return JSON.stringify(JsonAux);
     */
}

<?php
  if (!empty($ord->GridProductos)) {

  ?>
setTimeout(function() {
    CargarGrid('<?= $ord->GridProductos ?>');
}, 400);

if ($('#report').css('display') == 'none') {
    $("#report").css("display", "inline");
}

<?php
  }
  ?>

function CargarGrid(GridProductos) {
    var JsonAux;
    gridRProduc.clearSelection();
    gridRProduc.clearAll();

    var Prod = JSON.parse(GridProductos);
    j = 0;
    for (i = 0; i < Prod.length; i++) {

        j = j + 1;
        id = generarCadena(4);
        //alert(id);
        gridRProduc.getCombo(1).put(Prod[i]['m_product_id'], Prod[i]['code']);
        gridRProduc.getCombo(3).put(Prod[i]['m_warehouse_id'], Prod[i]['shorten']);
        gridRProduc.getCombo(5).put(Prod[i]['c_uom_id'], Prod[i]['uomsymbol']);
        gridRProduc.getCombo(7).put(Prod[i]['discount_percent_id'], Prod[i]['discount_shorten']);
        gridRProduc.getCombo(8).put(Prod[i]['tax_id'], Prod[i]['percent']);
        gridRProduc.addRow(id, j + ";" + Prod[i]['m_product_id'] + ";" + Prod[i]['art_desc'] + ";" + Prod[i][
            'm_warehouse_id'
        ] + ";" + muestraFloat(Prod[i]['quantity']) + ";" + Prod[i]['c_uom_id'] + ";" + muestraFloat(Prod[i][
            'price'
        ]) + ";" + Prod[i]['discount_percent_id'] + ";" + Prod[i]['tax_id'] + ";" + muestraFloat(Prod[i][
            'total'
        ]));

        cantProd[i] = new Array;
        cantProd[i]['cantidad'] = Prod[i]['quantity'];
        cantProd[i]['m_product_id'] = Prod[i]['m_product_id'];
        cantProd[i]['update'] = 1;

        total();

    }


}


function printed(purchase_order_id) {
    var parametros = {
        "purchase_order_id": purchase_order_id,
        "form": "ord_printed"
    };
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        beforeSend: function() {

        },
        success: function(response) {

        }
    });
}


function guardaTipoCobro() {

    var JsonAux, idGridTipoCobro = new Array;
    gridCobro.clearSelection();

    for (j = 0; j < gridCobro.getRowsNum(); j++) {

        idGridTipoCobro[j] = new Array;
        idGridTipoCobro[j][0] = gridCobro.cells(gridCobro.getRowId(j), 0).getValue();
        idGridTipoCobro[j][1] = gridCobro.cells(gridCobro.getRowId(j), 1).getValue();
        idGridTipoCobro[j][2] = gridCobro.cells(gridCobro.getRowId(j), 2).getValue();
        idGridTipoCobro[j][3] = gridCobro.cells(gridCobro.getRowId(j), 3).getValue();

    }
    var JsonAux = {
        "idGridTipoCobro": idGridTipoCobro
    };
    $("#idGridTipoCobro").val(JSON.stringify(JsonAux));

}




function buscaDocumentoRef(reference_id, reference_document, document_type) {
    var parametros = {
        "reference_id": reference_id,
        "reference_document": reference_document,
        "document_type": document_type,
        "form": "buscaDocumentoRef"
    };
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        beforeSend: function() {},
        success: function(response) {

            if (response != 0) {
                var json = JSON.parse(response);

                if (json) {

                    buscaDatosCliente(json['customers_id'], json['identificacion'], json['cliente']);
                    $("#reference_document").val(json['document_type'] + "-" + json['nrodoc']);
                    $("#start_date").val(fechaCorta(json['start_date']));
                    $("#end_date").val(fechaCorta(json['end_date']));
                    $("#payment_condition_id").val(json['payment_condition_id']);
                    $("#description").val(json['description']);
                    $("#reference_id").val(reference_id);


                    CargarGridDocRef(json['GridProductos']);

                }
            }
        }
    });
}

function CargarGridDocRef(GridProductos) {
    var JsonAux;
    gridRProduc.clearSelection();
    gridRProduc.clearAll();

    var Prod = JSON.parse(GridProductos);
    j = 0;
    for (i = 0; i < Prod.length; i++) {

        j = j + 1;
        id = generarCadena(4);


        //alert(id);
        gridRProduc.getCombo(1).put(Prod[i]['m_product_id'], Prod[i]['code']);
        gridRProduc.getCombo(3).put(Prod[i]['m_warehouse_id'], Prod[i]['shorten']);
        gridRProduc.getCombo(5).put(Prod[i]['c_uom_id'], Prod[i]['uomsymbol']);
        gridRProduc.getCombo(7).put(Prod[i]['discount_percent_id'], Prod[i]['discount_shorten']);
        gridRProduc.getCombo(8).put(Prod[i]['tax_id'], Prod[i]['percent']);
        gridRProduc.addRow(id, j + ";" + Prod[i]['m_product_id'] + ";" + Prod[i]['art_desc'] + ";" + Prod[i][
            'm_warehouse_id'
        ] + ";" + muestraFloat(Prod[i]['quantity']) + ";" + Prod[i]['c_uom_id'] + ";" + muestraFloat(Prod[i][
            'price'
        ]) + ";" + Prod[i]['discount_percent_id'] + ";" + Prod[i]['tax_id'] + ";" + muestraFloat(Prod[i][
            'total'
        ]));

        cantProd[i] = new Array;
        cantProd[i]['cantidad'] = Prod[i]['quantity'];
        cantProd[i]['m_product_id'] = Prod[i]['m_product_id'];
        cantProd[i]['update'] = 1;


        total();

    }


}


function deletePurchaseOrder() {
  alert("asd");
  identification = mensaje("identification");
    razonsocial = mensaje("razonsocial");
    total1 = mensaje("total");
    start_date = mensaje("start_date");
    end_date = mensaje("end_date");
    guardaProductos();
    var parametros = new FormData($("#orden_compra")[0]);
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        processData: false,
        contentType: false,
        beforeSend: function() {},
        success: function(response) {
            // console.log(response);
            if (response == 1) {

                alertify.success("Orden de Compra Registrada con Éxito");
                $('#contBusq').hide("swing");
                $('#contenido').load("ord_compra.php", function() {
                    $(this).fadeIn();
                });

            } else if (response == 2) {

                alertify.error("Error Registrando la Orden de Compra");
            }
             else if (response == 3) {

                alertify.success("Se Actualizo la Orden de Compra");
                $('#contBusq').hide("swing");
                $('#contenido').load("ord_compra.php", function() {
                    $(this).fadeIn();
                  });
            
            } else if (response == 4) {
                alertify.error("Error Actualizando la Orden de Compra");
            }
        }
    });

}

function savePurchaseOrder() {
    identification = mensaje("identification");
    razonsocial = mensaje("razonsocial");
    total1 = mensaje("total");
    start_date = mensaje("start_date");
    end_date = mensaje("end_date");
    guardaProductos();
    var parametros = new FormData($("#orden_compra")[0]);
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        processData: false,
        contentType: false,
        beforeSend: function() {},
        success: function(response) {
            // console.log(response);
            if (response == 1) {

                alertify.success("Orden de Compra Registrada con Éxito");
                $('#contBusq').hide("swing");
                $('#contenido').load("ord_compra.php", function() {
                    $(this).fadeIn();
                });

            } else if (response == 2) {

                alertify.error("Error Registrando la Orden de Compra");
            }
             else if (response == 3) {

                alertify.success("Se Actualizo la Orden de Compra");
                $('#contBusq').hide("swing");
                $('#contenido').load("ord_compra.php", function() {
                    $(this).fadeIn();
                  });
            
            } else if (response == 4) {
                alertify.error("Error Actualizando la Orden de Compra");
            }
        }
    });
  }
</script>