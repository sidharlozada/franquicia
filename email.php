<?php 

// Mostrar errores PHP (Desactivar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir la libreria PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$nombre =  "Sidhar";// $_REQUEST["nombre"];
$correo =   "sidharlozada@gmail.com";//$_REQUEST["correo"];
$telefono = "04124492825";//$_REQUEST["telefono"];
$asunto =   "Recibo de Pago";//$_REQUEST["asunto"];


    $message ="<b>Datos del Remitente </b> <br><br>";
    $message .="<b>Nombre y Apellido: </b> ". $nombre."<br>";
    $message .="<b>Correo de Contacto: </b> ". $correo."<br>";
    $message .="<b>Telefono: </b> ". $telefono."<br><br>";
    //$message .= $_REQUEST["editor1"];



$mail->From = "sidhar.lozada@gulfoilvzla.com";
$mail->FromName = "RRHH";
$mail->AddAddress ("$correo");
$mail->Subject = $asunto;
$mail->Body = $message;
$mail->IsHTML (true);


$mail->PluginDir = "";
$mail->Mailer = "smtp";

$mail->Host = "ssl://mail.gulfoilvzla.com";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "sidhar.lozada@gulfoilvzla.com";
$mail->Password = "16564760SL";

$mail->IsSMTP();

if(!$mail->Send()) {
        //echo 'Error: ' . $mail->ErrorInfo;
         $resp = 2;
}
else 
{      // echo 'Mail enviado!';
        $resp = 1;
}


     /*   $json=new Services_JSON();
        echo $json->encode($resp);*/


?>