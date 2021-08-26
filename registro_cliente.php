<?
include("lib/librerias.php");
?>
<style>

.table1 th,
.table1 td {
    /*border: none !important;*/
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 2px;
    padding-bottom: 0px;
    width: 100%;

}
</style>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><b>Registro de Clientes</b></h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<form name="RegistroClientes" id="RegistroClientes">
    <table class="table1 " border="0">
        <tr>
            <td>
                <div class="row">
                    <div class="col-sm-6">
                        <label>
                            Tipo Cliente
                            <?php 
                                  $q2 = "SELECT customers_type_id id, name descripcion FROM system.customers_type";
                                  echo superCombo($conn, $q2, @$prod->customers_type_id, 'customers_type_id','customers_type_id','width:100%', "",'id','descripcion','','','','','form-control input-group');
                                
                              ?>
                        </label>
                    </div>
                </div>
            </td>
            <td>
                <div class="">
                    <input onclick="cambio(this.value)" class="" type="radio" name="type_p" id="type_p_n" value="N">
                    <label for="type_p_n">
                        Natural
                    </label>
                </div>
            </td>
            <td>
                <div class="">
                    <input onclick="cambio(this.value)" class="" type="radio" name="type_p" id="type_p_j" value="J">
                    <label for="type_p_j">
                        Jurídico
                    </label>
                </div>
            </td>
            <td>
                <div class="">
                    <input onclick="cambio(this.value)" class="" type="radio" name="type_id" id="type_id_c" value="C">
                    <label for="type_id_c">
                        C.I.
                    </label>
                </div>
            </td>
            <td>
                <div class="">
                    <input onclick="cambio(this.value)" class="" type="radio" name="type_id" id="type_id_r" value="R">
                    <label for="type_id_r">
                        R.I.F.
                    </label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="row">
                    <div class="input-group col-sm-6">
                        <label>
                            Fecha Registro
                            <input type="date" class="form-control" placeholder="" name="created" id="created"
                                value="<?=muestrafecha1(@$r->fields['created']);?>" readonly="readonly">
                        </label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>

            <td>
                <div class="row">
                    <div class="input-group col-sm-2">
                        <label>
                            Letra
                            <?php 
                                  $q2 = "SELECT customers_initial_id id, name descripcion FROM system.customers_initial";
                                  echo superCombo($conn, $q2, @$prod->customers_initial_id, 'customers_initial_id','customers_initial_id','width:100%', "cambio2(this.value)",'id','descripcion','','','','','form-control input-group');
                                
                              ?>
                        </label>
                    </div>

                    <div class="input-group col-sm-4">
                        <label>
                            Identificación
                            <input class="form-control" placeholder="" type="text" name="identification"
                                id="identification" value="<?=CerosFaltantes($_GET['Ident'])?>">
                        </label>
                        <!-- <input class="" placeholder="" type="hidden" name="customers_id" id="customers_id"
                            value="<?=$_GET['customers_id']?>"> -->
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="row">
                    <div class="input-group col-sm-6">
                        <label>
                            Nombre
                            <input class="form-control" placeholder="" type="text" name="name" id="name"
                                onkeyup="this.value = this.value.toUpperCase();">
                        </label>
                    </div>
                    <div class="input-group  col-sm-6">
                        <label>
                            Apellido
                            <input class="form-control" placeholder="" type="text" name="lastname" id="lastname"
                                onkeyup="this.value = this.value.toUpperCase();">
                        </label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="row">
                    <div class="input-group col-sm-4">
                        <label>
                            Teléfono
                            <input class="form-control" placeholder="" type="text" name="telephone" id="telephone">
                        </label>
                    </div>

                    <div class="input-group col-sm-4">
                        <label>
                            Correo
                            <input class="form-control" placeholder="" type="text" name="email" id="email">
                        </label>
                    </div>

                    <div class="input-group col-sm-4">
                        <label>
                            Dirección
                            <textarea name="address" id="address" class="form-control" placeholder=""
                                onkeyup="this.value = this.value.toUpperCase();"></textarea>

                        </label>
                    </div>
                </div>

            </td>
        </tr>

        <tr>
            <td colspan="6" align="right">
                <input onclick="guardarClientes(); return false;" type="button" class="btn btn-success"
                    id="btnsavecliente" name="btnsavecliente" value="Guardar">
            </td>
        </tr>
    </table>
    <br>
    <input type="hidden" name="form" id="form" value="RegistroClientes">
    <input type="hidden" name="btnsavecliente" id="btnsavecliente" value="Guardar">
</form>
<script type="text/javascript" language="javascript">
$(document).ready(function() {

    cambio('N');
    cambio2('1');


    setTimeout(function() {
        $('#identificacion').focus();
    }, 700);


    $("#identificacion").keyup(function(event) {
        //alert(valor); 
        setTimeout(function() {
            $("#identificacion").val(CerosFaltantes($("#identificacion").val()));
        }, 50);
    });

});

function cambio(valor) {
    if (valor == 'N') {
        $("#customers_initial_id").val("1");
        $("#type_id_c").prop('checked', true);
    }
    if (valor == 'J') {
        $("#customers_initial_id").val("3");
        $("#type_id_r").prop('checked', true);
    }

    if (valor == 'C') {
        $("#customers_initial_id").val("1");
        $("#type_p_n").prop('checked', true);
    }
}

function cambio2(valor) {
    if (valor == '1' || valor == '1') {
        $("#type_p_n").prop('checked', true);
        $("#type_id_c").prop('checked', true);
    }
    if (valor == '3' || valor == '4') {
        $("#type_p_j").prop('checked', true);
        $("#type_id_r").prop('checked', true);
    }
}

function validar() {
    if (!$("#type_id_c").prop("checked") && !$("#type_id_r").prop("checked")) {
        alert("Debe Seleccionar un Tipo de Persona \"Natural\" o \"Juridico\"   ");
        $('#name').focus();
        return false;
    } else if ($('#name').val() == "") {
        alert("Debe agregar un name");
        $('#name').focus();
        return false;
    } else if ($('#lastname').val() == "") {
        alert("Ingrese un lastname");
        $('#lastname').focus();
        return false;
    } else if ($('#telephone').val() == "") {
        alert("Ingrese un telephone");
        $('#telephone').focus();
        return false;
    } else if ($('#address').val() == "") {
        alert("Ingrese una Dirección");
        $('#address').focus();
        return false;
    } else {
        return true;
    }
}

function guardarClientes() {
    var op = validar();
    if (op) {
        var parametros = new FormData($("#RegistroClientes")[0]);
        $.ajax({
            data: parametros,
            url: 'save.php',
            type: 'post',
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('#cover-spin').show(0);
            },
            complete: function(){
                $('#cover-spin').hide();   
            },
            success: function(response) { //Aqui se recibe la informacion si se guardo o no los registros
                var Json = JSON.parse(response);
                if (Json['op']) {
                    $('#DirModal').modal("hide");
                    $("#DirModal").css("display", "none");
                    $("#DirModal").css("background-color", "");
                    $(".modal-content").css("margin-top", "");
                    buscaIdentificacion(Json['identificacion']);
                    alertify.success(Json['msj']);
                } else{
                    alertify.alert(Json['msj']).set({title:TITULO_ALERT});
                }

            }
        });
    }

}
</script>