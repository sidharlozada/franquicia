
<?php
include 'lib/librerias.php';
?>

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                   
                </div>
            
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
                <div class="col-12">
                    <div class="card mb-4" style="">
                    <div class="form-check mt-2 mb-2">
                        <label class="form-check-label">
                            <!-- Nuevo Registro -->
                        </label>
                        <!-- <a name="" id="" class="btn btn-success" href="lanzareportes.php" role="button">
                            <i class="fas fa-plus img-fluid" alt="Detalle" title="Consultar Registro"></i>
                            Nuevo Registro
                        </a> -->
                        <a name="btneditar" id="" class="buscar btn btn-success" href="FormNomsemanal.php"><img id="logo" 
                        src="" class="img-fluid  material-tooltip-main" alt="" 
                        data-toggle="tooltip" data-html="true" data-placement="bottom" title="">
                        <i class="fas fa-plus img-fluid" alt="Detalle" title="Consultar Registro"></i>
                        Nuevo Registro
                    </a>
                    <!-- </div> -->
                    <!-- <div class="form-check"> -->
                        <label class="form-check-label p-4">
                        <!-- Reporte de Stock de Inventario -->
                        </label>
                        <!-- <a name="" id="" class="btn btn-danger" href="lanzareportes.php?modulo=reportealmacen.php" role="button">
                            <i class="fas fa-file-pdf img-fluid" alt="Detalle" title="Consultar Registro"></i>
                            Exportar Datos
                        </a> -->
                    <!-- </div> -->
                    </div>
                    </div>
                </div>
            </div>
        <div id="contBusq" style="display: none;">
            <button class="close" type="button" id="cerrar" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div id="contenidoBusq">

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <?php
                $q = "SELECT 
                n.ad_payroll_id,
                c.ad_company_id,
                c.name as empresa,
                tn.ad_payroll_type_id,
                tn.name as nomina,
                n.date_start,
                n.date_end
                from 
                system.ad_payroll n
                inner join system.ad_company c on c.ad_company_id  = n.ad_company_id 
                inner join system.ad_payroll_type tn on tn.ad_payroll_type_id = n.ad_payroll_type_id ";
                $r = $conn->Execute($q);
                    // die($q);
              ?>
                    <!-- /.card-header -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Empresa</th>
                                    <th>Tipo de Nomina</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Fin</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    while(!$r->EOF){
                    ?>
                                <tr>
                                    <td><?=$r->fields['ad_payroll_id'];?></td>
                                    <td><?=$r->fields['empresa'];?></td>
                                    <td><?=$r->fields['nomina'];?></td>
                                    <td><?=$r->fields['date_start'];?></td>
                                    <td><?=$r->fields['date_end'];?></td>
                                    <!-- <td><?=$r->fields['isactive'];?></td> -->
                                    <td>
                                        <a name="btneditar" id="" class="buscar btn btn-primary"
                                            href="FormNomsemanal.php?ad_payroll_id=<?=$r->fields['ad_payroll_id'];?>">
                                            <i class="fas fa-eye img-fluid" alt="Detalle"
                                                title="Consultar Registro"></i>
                                        </a>
                                        <!-- <?$r->fields['ad_position_id'];?> -->
                                    </td>
                                </tr>
                                <?php
                    $r->movenext();
                  }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
<!-- </div> -->
<!-- /.container-fluid -->

<script type="text/javascript">
$('a.buscar').click(function() {
    $('#contBusq').show("swing");
    $('#contenidoBusq').load(this.href, function() {
        $(this).fadeIn();
    });
    return false;
});

$('#cerrar').click(function() {
    $('#contBusq').hide('linear');
    return false;
});


/*
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});*/


$(function() {
    $('.material-tooltip-main').tooltip({
        template: '<div class="tooltip md-tooltip-main"> <div class = "tooltip-arrow md-arrow" > </div> <div class = "tooltip-inner md-inner-main" > </div> </div>'
    });
});
</script>
<!-- Script para normalizar la tabla -->
<script src="js/demo/datatables-demo.js"></script>