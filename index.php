<?php
session_start();
require_once 'lib/librerias.php';

$varusuario ="";
$varpassword ="";
if(empty($_SESSION['id'])){
  
   @$varusuario = strtolower($_REQUEST['txtuser']);
   @$varpassword = $_REQUEST['txtpass'];
   $varpassword=md5($varpassword);

$q = "SELECT 
u.ad_user_id , 
u.username , 
split_part(ae.name,' ',1) as firstname , 
split_part(ae.name2,' ',1) as lastname , 
u.ad_org_id , 
ae.ad_company_id, 
u.m_warehouse_id 
FROM 
system.ad_user u, 
system.ad_employee ae , 
system.ad_session s 
where 
password='$varpassword' 
and 
username='$varusuario' 
and 
ae.ad_employee_id = u.ad_user_id 
and 
s.ad_user_id = u.ad_user_id ";
// die($q);
$r = $conn->Execute($q);
//var_dump($r);
if(!empty($r->fields['ad_user_id'])){
  $_SESSION['id'] = $r->fields['ad_user_id'];
  $ad_user_id = $r->fields['ad_user_id'];
  $_SESSION['username'] = $r->fields['username'];
  $_SESSION['nombre'] = $r->fields['firstname']." ".$r->fields['lastname'];
  $_SESSION['ad_org_id'] = $r->fields['ad_org_id'];
  $_SESSION['ad_company_id'] = $r->fields['ad_company_id'];
  $ad_org_id =  $r->fields['ad_org_id'];
  $_SESSION['m_warehouse_id'] =  $r->fields['m_warehouse_id'];

  $estacion = gethostbyaddr($_SERVER['REMOTE_ADDR']);

  //   se valida que el usuario ya se haya conectado en el dia, para tomar en cuenta 
 //   los minutos acumulados
  $q_validar = "SELECT aa.as_activity_id 
  FROM 
  system.as_activity aa ,
  system.ad_user au 
  where
  aa.ad_user_id = au.ad_user_id
  AND
  aa.entry_date = CURRENT_DATE
  AND
  aa.canceled <> 2
  AND
  au.ad_user_id = '$ad_user_id'";
  // die($q);
  $rrs = $conn->Execute($q_validar);

  $marca = $rrs->fields['as_activity_id'];
  if(empty($marca)){
//   se extrae el acumulado de minutos al momento de ingresar en caso de que 
//  sea el primer ingreso del dia
  $q2 = "SELECT  
  coalesce(date_part('HOUR', current_timestamp::time - ad.entry_time::time)*60,0)+
  coalesce(date_part('MINUTES', current_timestamp::time - ad.entry_time::time),0) as minutos
  from
  system.as_departament ad,
  system.ad_user au,
  system.ad_employee ae
  where 
  ad.ad_departament_id = ae.ad_departament_id 
  and 
  au.ad_user_id = ae.ad_employee_id 
  and 
  ae.ad_employee_id = $ad_user_id";
//   die($q2);

  $acumulado = $conn->Execute($q2);
  $minutos = (int) $acumulado->fields['minutos'];
}else{
	$minutos = '1000000';
}
  
//  se inserta el registro en la tabla as_activity
//  con el acumulado si es la primera entrada del dia 
  $q_insert = "INSERT INTO system.as_activity 
  (ad_org_id,isactive,created,createdby,updated,updatedby,ad_user_id,entry_time,entry_date,
  acumulate,as_workstation_id,canceled,justify) 
  VALUES 
  ($ad_org_id,'Y',now(),$ad_user_id,now(),$ad_user_id,$ad_user_id,CURRENT_TIME,CURRENT_DATE,
  $minutos,'$estacion','0','')";
//   die($q_insert);
  $rs = $conn->Execute($q_insert);

  header('Location: principal.php');
}else{
   if(empty($varusuario)){
      $invalido = "";
   }else{
      $invalido = "Usuario o Contraseña Incorrecta";   
   }   
}

}else{
  header('Location: principal.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$titulo ?> - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="icon" href="img/favicon.png">
	<script type="text/javascript">


if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('./service-worker.js')
   .then(function() { console.log('Service Worker Registered'); });
}
</script>
<!--===============================================================================================-->
</head>
<body style="overflow:hidden;">
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/img-02.jpg'); background-size: cover;overflow-y: hidden;">
			<div class="wrap-login100 p-t-70 p-b-30">
				<form  method="post" class="login100-form validate-form">
					<div class="login100-form-avatar">
						<img src="img/Gulf_logo.PNG" alt="AVATAR" >
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						<?php echo  $_SESSION['licencia'];?>
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "El Usuario es Requerido">
						<input class="input100" type="text" name="txtuser" id="txtuser" placeholder="Usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "La Contraseña es Requerido">
						<input class="input100" type="password" name="txtpass" id="txtpass" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="form-group">
                      <div class=" small" style="color: #FF0000">
                        <?=$invalido?>
                      </div>
                    </div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Entrar
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
						<b>Centro de Gestion Administrativo</b>
						</a>
					</div>

					<!-- <div class="text-center w-full">
						<a class="txt1" href="#">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	 <!-- Bootstrap core JavaScript-->
	 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<script type="text/javascript">
   
      window.addEventListener("load", function() {

            // icono para mostrar contraseña
            showPassword = document.querySelector('.show-password');
            showPassword.addEventListener('click', () => {

                // elementos input de tipo clave
                password1 = document.querySelector('.password1');

                if ( password1.type === "text" ) {
                    password1.type = "password"

                    showPassword.classList.remove('fa-eye-slash');
                } else {
                    password1.type = "text"

                    showPassword.classList.toggle("fa-eye-slash");
                }

            })

        });


</script>

</body>
</html>