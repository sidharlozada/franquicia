<?php
  session_start();
   if(isset($_SESSION['id'])==false){
      header("location: index.php");
   }
   require_once 'lib/librerias.php';
   $ad_user_id = $_SESSION['id'];

//Reposicion de estatus de trabajador una vez finalizado sus vacaciones
$q = "SELECT system.active_employee_vacation()";
$rExec = $conn->Execute($q);

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" CONTENT="no-cache">

    <link rel="icon" href="img/favicon.png">
    <title><?=$titulo ?> Sistema</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/icheck-bootstrap/icheck-bootstrap.css">
    <link rel="stylesheet" href="css/alertify.css">
    <link href="js/grid/css/dhtmlXGrid.css" rel="stylesheet" media="screen">

    <link href="css/bootstrap-nav-tabs.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <style>
    .menu {
        color: #000;
        width: auto;
        min-width: 150px;
        position: absolute;
        background-color: #0b0784;
        font-style: bold;
        /*border:1px solid black;*/
        -moz-box-shadow: 0 0 5px #888;
        -webkit-box-shadow: 0 0 5px#888;
        box-shadow: 0 0 5px #888;
        z-index: 10000;
    }

    .menu ul {
        list-style: none;
        list-style-type: none;
    }

    .menu li {
        line-height: 25px;
        font-size: 14px;
        cursor: pointer;
    }
    </style>
</head>


<body id="page-top">
    <div id="wrapper">
        <?php menuIzquierdoNew($conn,$_SESSION['id']); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id=" ">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar  static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal.php">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="#"></i>
                        </div>
                        <div class="breadcrumb justify-content-center" style="">
                            <div class="breadcrumb-item"><a href="principal.php">Inicio </a></div>
                            <div id="titulo" class="breadcrumb-item active"></div>
                            <div id="iconos"></div>
                        </div>
                    </a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto" style="display: flex;">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php
                                    $notificaciones = new notificacion;
                                    $notificacion = $notificaciones->getcount($conn, $ad_user_id);
                                    $resultado = $notificacion->count;
                                    

                      if($resultado>0){
                        ?>
                                <span id="noti" class="badge badge-danger badge-counter">
                                    <?php  
                        echo $notificacion->count;
                                    }
                                else{
                                     ?>
                                    <span id="noti" class="">
                                        <?php         
                                    }
                                    ?>
                                    </span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div id="" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notificaciones
                                </h6>
                                <!-- alerta de BD -->
                                <?php 
                                    for($i=0;$i<$resultado;$i++){
                                ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <?php 
                                     if($resultado>0){
                                        ?>
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-sms text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div id="noti1" class="small text-gray-500">
                                        </div>
                                        <?php 
                                        $q="select 
                                        count(anu.ad_notification_id), 
                                        anu.description 
                                        from 
                                        system.ad_notification_user anu 
                                        where
                                        anu.ad_user_id = $ad_user_id
                                        and
                                        anu.isactive = 'Y'
                                        and 
                                        anu.clicked = 'Y' 
                                        and 
                                        anu.date_visible = current_date 
                                        group by anu.description";
                                
                                        $r = $conn->Execute($q);
                                        //  die($q);
                                         while(!$r->EOF){
                                                $description[] = $r->fields['description']??'';
                                                $r->movenext();
                                            }
                                            echo $description[$i];
                                        }
                                        else{           
                                        ?>
                                        <script>
                                        $(document).ready(function() {
                                            $("#noti").text('');
                                        });
                                        </script>
                                        <?php  
                                     }
                                    ?>
                                    </div>
                                </a>
                                <?php  
                                     }
                                    ?>
                            <!-- Fin del Alerta con BD -->
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-chart-line text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div id="noti1" class="small text-gray-500">
                                        <?php
                      $ad_user_id = $_SESSION['id'];

                      $qmes = "select date_trunc('month', current_date)";
                      $rs2 = $conn->Execute($qmes);
                      $mes = $rs2->fields['date_trunc'];

                      $q = "SELECT 
                      SUM(aa.acumulate)
                      from 
                      system.as_activity aa 
                      where
                      aa.entry_date between '$mes' and current_date
                      and
                      aa.ad_user_id = 1
                      and 
                      aa.canceled = 0
                      and
                      aa.acumulate < 1000000
                      and 
                      aa.acumulate > 0";
                    //   die($q);
                      $rs = $conn->Execute($q);
                      ?>
                                    </div>
                                    A consumido un total de: <?php 
                    echo $rs->fields['sum'];                    
                    ?>
                                    minutos de lo
                                    permitido en el mes.
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-4">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-info text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div id="noti2" class="small text-gray-500">
                                        <?php
                      $ad_user_id = $_SESSION['id'];
                      $q = "SELECT 
                      ad2.name as nomb,
                      ad.maximum_minutes 
                      from 
                      system.as_departament ad,
                      system.ad_departament ad2,
                      system.ad_employee ae 
                      where
                      ae.ad_employee_id = $ad_user_id
                      and 
                      ad2.ad_departament_id = ad.ad_departament_id 
                      and
                      ae.ad_departament_id = ad2.ad_departament_id ";
                      $rs = $conn->Execute($q);
                      ?>
                                    </div>
                                    Para el departamento de: <?php echo $rs->fields['nomb'] ?> se a establecido
                                    un maximo de <?php echo $rs->fields['maximum_minutes']?> minutos al mes.
                                </div>
                            </a>

                            <a class="dropdown-item text-center small text-gray-500" href="">Alertas</a>
            </div>
            </li>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <button class="btn" data-toggle="modal" data-target="#logoutModal" style="color:#f03a3a;">
                <span class="mt-2" >
                    <i class="fa fa-power-off fa-1x" aria-hidden="true"></i>
                </span>
            </button>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img class="mr-2 img-profile rounded-circle" src="img/pictures/<?php
                        $employee = $_SESSION['nombre'];
                        $pic = explode(" ", $employee);
                        echo $pic[0]."_".$pic[1]?>.jpg">
                    <span class="pt-1 mr-2 d-none d-lg-inline text-dark small">

                        <b>Bienvenido</b>
                        </br>
                        <?=$_SESSION['nombre'];?>
                        </br>
                        <?
                $ad_user_id = $_SESSION['id'];
                $q = "SELECT 
                aa.as_activity_id ,
                aa.entry_date ,
                aa.entry_time 
                from 
                system.as_activity aa 
                where 
                aa.entry_date = current_date 
                and
                aa.ad_user_id = $ad_user_id
                order by aa.as_activity_id desc limit 1";
                //die($q);
                $rs = $conn->Execute($q);
                if(empty($rs->fields['as_activity_id'])){
                    session_destroy();
                    header("location: index.php");
                }
                $fecha = muestrafecha($rs->fields['entry_date']);
                $hora = $rs->fields['entry_time'];
                $h = explode(".", $hora);
                // echo substr($hora,0,5);
                echo "Ultima conexion: ".$fecha." a las ".$h[0]; 
                ?>
                    </span>

                </a>
            </li>
            </ul>
            </nav>
            <!-- End of Topbar -->
            <div id="cover-spin"></div>

            <div id="contenido" style="background-color: #fff">
                <?php
            if($ad_user_id==1 || $ad_user_id==44){
              include_once "estadisticassistemas.php"; 
            }else if($ad_user_id == 24){
                include_once "estadisticasfosa.php"; 
            }else if($ad_user_id == 123){
                include_once "estadisticasmercadeo.php";
            }else{
                include_once "modules/opciones_de_usuario/profile.php";
            }
            ?>
            </div>
            <br>
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white" style="">
            <div class="container my-auto ">
                <div class="copyright text-center  my-auto">
                    <span>Copyright &copy; <?php echo $_SESSION['licencia'];?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo para irse?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión
                    actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="exit.php">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/jquery.twbsPagination.js" type="text/javascript"></script>
    <script src="js/edit_area/edit_area_full.js" type="text/javascript"></script>
    <script src="js/funciones.js"></script>
    <script type="text/javascript" src="js/grid/js/dhtmlXCommon.js"></script>
    <script type="text/javascript" src="js/grid/js/dhtmlXGrid.js"></script>
    <script type="text/javascript" src="js/grid/js/dhtmlXGridCell.js"></script>


    <script type="text/javascript">
    window.setInterval(BlinkIt, 500);
    var color = "red";

    function BlinkIt() {
        var blink = document.getElementById("noti");
        color = (color == "#ffffff") ? "red" : "#ffffff";
        blink.style.color = color;
        blink.style.fontSize = '12px';
    }
    </script>



    <script>
    $(document).ready(function() {
        $("#alertsDropdown").click(function() {
            $("#noti").text('');
        });
    });
    </script>



    <script>
    document.oncontextmenu = function() {
        return false
    } //PARA INHABILITAR EL CLICK DERECHO
    const body = document.querySelector('body');

    body.onkeydown = function(e) {
        if (e.key == "F5") {
            window.location.href = "principal.php";
            return false;
        }
    };


    <?php buscaContenido($conn,$_SESSION['id']); ?>


    function openFullscreen(value) {

        var elem = document.getElementById(value);

        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Chrome, Safari and Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE/Edge */
            elem.msRequestFullscreen();
        }


        $('#maxScreen').attr('onclick', 'closeFullscreen()');
        //$('.navbar').css('margin-bottom', '20px');

    }

    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }

        $('#maxScreen').attr("onclick", "openFullscreen('contenido')");
        //$('.navbar').css('margin-bottom', '5px');
    }


    function cambiarClass(num) {

        if ($("#capa" + num).hasClass("fa-folder")) {
            $("#capa" + num).removeClass("fa-folder");
            $("#capa" + num).addClass("fa-folder-open");
            $("#capa" + num).css("color", "#5F7347");
        } else if ($("#capa" + num).hasClass("fa-folder-open")) {
            $("#capa" + num).removeClass("fa-folder-open");
            $("#capa" + num).addClass("fa-folder");
            $("#capa" + num).css("color", "#646562");
        }

    }
    </script>
    <!-- <script>
    function initFreshChat() {
        window.fcWidget.init({
            token: "e33bbf1f-4312-4f01-bdd9-025435da72a5",
            host: "https://wchat.freshchat.com"
        });
    }

    function initialize(i, t) {
        var e;
        i.getElementById(t) ? initFreshChat() : ((e = i.createElement("script")).id = t, e.async = !0, e.src =
            "https://wchat.freshchat.com/js/widget.js", e.onload = initFreshChat, i.head.appendChild(e))
    }

    function initiateCall() {
        initialize(document, "freshchat-js-sdk")
    }
    window.addEventListener ? window.addEventListener("load", initiateCall, !1) : window.attachEvent("load",
        initiateCall, !1);
    </script> -->

</body>

</html>