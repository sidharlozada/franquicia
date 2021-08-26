<?php
include 'lib/librerias.php';

@$fs_vehicle_model_id = $_REQUEST['fs_vehicle_model_id'];

$regmodel = new regmodel;
if(!empty($fs_vehicle_model_id)){
$regmodel = $regmodel->get($conn, $fs_vehicle_model_id);

}

//$r = $conn->Execute($q);
$checked="";
(!empty($regmodel->fs_vehicle_model_id)) ? $save ="Actualizar" : $save ="Guardar";
if(@$regmodel->isactive=="Y"){
  $checked ="checked";
}

?>
<link rel="stylesheet" href="css/jquery-ui.css">
<div style="display:none" class="alert alert-success" role="alert" align="center" id="aviso"><strong><span
            id="resultado"></span></strong></div>
<div style="display:none" class="alert alert-danger" role="alert" align="center" id="aviso3"><strong><span
            id="resultado3"></span></strong></div>
<div class="modal-header" style="cursor: move; background-color:#1f3075;">
    <b>
        <h5 class="modal-title" id="exampleModalLabel" style="color:#fff;">Registro de Modelos</h5>
    </b>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color:#fff;">×</span>
    </button>
</div>
<div class="card-body login-card-body">
    <form method="post" name="regmodel" id="regmodel">
        <div class="tab-content">
            <!-- INICIO PRODUCTO -->
            <div id="regmodel" class="tab-pane  active">
                <div class="row border border-grey"></div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="input-group">
                            <label>
                                Código
                                <input type="text" class="form-control" placeholder="" name="fs_vehicle_model_id"
                                    id="fs_vehicle_model_id" value="<?=@$regmodel->fs_vehicle_model_id;?>"
                                    readonly="readonly">
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label>
                                Organización
                                <?php 
                                    $q2 = "SELECT ad_org_id id, name descripcion FROM system.ad_org";
                                    echo superCombo($conn, $q2, @$regmodel->ad_org_id, 'ad_org_id','ad_org_id','width:100%', "",'id','descripcion','','','','','form-control input-group');
                      
                                 ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <label>
                                Fecha
                                <input type="date" class="form-control" placeholder="" name="created" id="created"
                                    value="<?=muestrafecha1(@$regmodel->created);?>" readonly="readonly">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row border border-grey mt-2"></div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label>
                                Marca
                                <?php 
                                    $q2 = "SELECT fs_vehicle_brand_id id, name descripcion FROM system.fs_vehicle_brand";
                                    echo superCombo($conn, $q2, @$regmodel->fs_vehicle_brand_id, 'fs_vehicle_brand_id','fs_vehicle_brand_id','width:100%', "",'id','descripcion','','','','','form-control input-group');
                      
                                 ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <label>
                                Nombre del Modelo
                                <input type="text" class="form-control" placeholder="" name="model" id="model"
                                    value="<?=@$regmodel->model;?>">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border border-grey mb-4"></div>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <button onclick="validar(); return false;" class="btn btn-primary btn-block btn-sm"
                                name="btnsave" value="<?=$save?>">
                                <i class="fas fa-sync-alt"></i>
                                <?=$save?></button>
                        </td>
                        <td>&nbsp;</td>
                        <td colspan="2">
                            <div class="" align="center" id="aviso" style="display: none;font-weight: 700;"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="form" id="form" value="regmodel">
            <input type="hidden" name="btnsaveregmodel" id="btnsaveregmodel" value="<?=$save?>">

        </div>
</div>
</form>

</div>
<!-- /.login-card-body -->
</div>

</body>

</html>
<script>
function save() { //Función para guardar los datos del formulario dirección

    var parametros = new FormData($("#regmodel")[0]);
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

                alertify.success("Modelo de Vehiculo Registrado con Éxito");
                $('#contBusq').hide("swing");
                $('#contenido').load("modules/gestion_de_servicios/regmodelos.php", function() {
                    $(this).fadeIn();

                    $('#DirModal').hide("swing");
                    $("#page-top").removeClass("modal-open");
                    $('.modal-backdrop').remove(".modal-backdrop");
                    $("#page-top").css("padding-right", "");
                    $("#page-top").removeAttr('style');
                });
                /*$('#almacen')[0].reset();
                $('#direccion')[0].reset();*/

            } else if (response == 2) {

                alertify.error("Error Registrando el Modelo del Vehiculo");
            } else if (response == 3) {

                alertify.success("Modelo Actualizado con Éxito");
                $('#contBusq').hide("swing");
                $('#contenido').load("modules/gestion_de_servicios/regmodelos.php", function() {
                    $(this).fadeIn();

                    $('#DirModal').hide("swing");
                    $("#page-top").removeClass("modal-open");
                    $('.modal-backdrop').remove(".modal-backdrop");
                    $("#page-top").css("padding-right", "");
                    $("#page-top").removeAttr('style');
                });
            } else if (response == 4) {

                alertify.error("Error Actualizando el Modelo");
            } else if (response == 5) {

                alertify.error("Ya existe un tasa para este rango de fecha");
            }


        }
    });
}


function validar() {

    c_currency_id = mensaje("c_currency_id");
    payment_condition_id = mensaje("payment_condition_id");
    vemonto = mensaje("vemonto");
    date_start = mensaje("date_start");
    date_end = mensaje("date_end");

    if (c_currency_id && payment_condition_id && vemonto && date_start && date_end) {
        $("#aviso").removeClass("alert-danger");
        $("#aviso").hide();
        save();
    } else {
        $("#aviso").show();
        $("#aviso").html("Faltan datos por llenar.");
        $("#aviso").addClass("alert-danger");
    }


}

$(document).ready(function() {
    $("#vemonto").keyup(function() {
        $("#monto").val($("#vemonto").val());
    });

});

function calculaMontoCondPago() {

    if ($("#payment_condition_id").val() == 1 || $("#payment_condition_id").val() == 0) {
        $("#vemonto").val(0);
        $("#monto").val(0);
        $("#percent").val(1);
        $("#vemonto").removeAttr("disabled");
        return false;
    }

    var parametros = {
        "payment_condition_id": $("#payment_condition_id").val(),
        "c_currency_id": $("#c_currency_id").val(),
        "date_start": $("#date_start").val(),
        "form": "MontoCondPago"
    };
    $.ajax({
        data: parametros,
        url: 'save.php',
        type: 'post',
        beforeSend: function() {},
        success: function(response) {
            if (response != 0) {
                var json = JSON.parse(response);
                $("#vemonto").attr('disabled', 'disabled');
                $("#vemonto").val(json['monto']);
                $("#monto").val(json['monto']);
                $("#percent").val(json['percent']);

            }
        }
    });
}
</script>