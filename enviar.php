<?php
  // /**
  // * Requires the "PHP Email Form" library
  // * The "PHP Email Form" library is available only in the pro version of the template
  // * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  // * For more info and help: https://bootstrapmade.com/php-email-form/
  // */

  // // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'ruiz.nicolasign@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  // /*
  // $contact->smtp = array(
  //   'host' => 'example.com',
  //   'username' => 'example',
  //   'password' => 'pass',
  //   'port' => '587'
  // );
  // */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();
 
// $myemail = 'ruiz.nicolasign@gmail.com';
// $name = $_POST['name'];
// $email = $_POST['email'];
// $ad1 = $_FILES['file']['name'];
// $ad2 = $_FILES['fileop']['name'];
// $subject = $_POST['subject'];
// $message = $_POST['message'];

// $to = $myemail;
// $email_subject = "Nuevo mensaje: $subject";
// $email_body = "Haz recibido un nuevo mensaje. \n Nombre: $name \n Correo: $email \n Asunto: $subject \n Mensaje: \n $message \n Adjunto: $ad1 \n Adjunto2: $ad2";
// $headers = "From: $email";

// mail($to, $email_subject, $email_body, $headers);
// echo "El mensaje se ha enviado correctamente";
// ?>

// <?php

$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Mensaje = $_POST['Mensaje'];

$archivos = $_FILES['archivos'];
$nombre_archivos = $archivos['name'];
$ruta_archivos = $archivos['tmp_name'];


if ($Nombre=='' || $Email=='' || $Mensaje==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("archivosformulario/class.phpmailer.php");
    $mail = new PHPMailer();





    $mail->From     = $Email;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("ruiz.nicolasign@gmail.com"); // Dirección a la que llegaran los mensajes.
   
// Aquí van los datos que apareceran en el correo que reciba
    //adjuntamos un archivo 
        //adjuntamos un archivo
            
    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto";
    $mail->Body     =  "Nombre: $Nombre \n<br />".    
    "Email: $Email \n<br />".    
    "Mensaje: $Mensaje \n<br />";
      $i = 0;
    foreach ($ruta_archivos as $rutas_archivos) {
        $mail->AddAttachment($rutas_archivos,$nombre_archivos[$i]);
        $i++;
    }

    
    
    
    
    

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "ruiz.nicolasign@gmail.com";  // Correo Electrónico
    $mail->Password = "h5npucrvn98923"; // Contraseña
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
       if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
 ?>