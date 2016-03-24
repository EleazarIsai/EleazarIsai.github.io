<?php

// Define some constants
define( "RECIPIENT_NAME", "YOUR_NAME_HERE" );
define( "RECIPIENT_EMAIL", "YOUR_EMAIL_HERE" );
define( "EMAIL_SUBJECT", "$subject" );

// Read the form values
$success = false;
$senderName = isset( $_POST['EleazarVqz'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['EleazarVqz'] ) : "";
$senderEmail = isset( $_POST['eleazar.isai02@gmail.com'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['eleazar.isai02@gmail.com'] ) : "";
$subject = isset( $_POST['subject'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['subject'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $success = mail( $recipient, $subject , $message, $headers );
}

// Return an appropriate response to the browser
if ( isset($_GET["ajax"]) ) {
  echo $success ? "Éxito" : "Error";
} else {
?>
<html>
  <head>
    <title>Gracias!</title>
  </head>
  <body>
  <?php if ( $success ) echo "<p>¡Gracias por mandar tu mensaje! Me pondré en contacto con usted.</p>" ?>
  <?php if ( !$success ) echo "<p>Hubo un problema al enviar su mensaje. Por favor, inténtelo de nuevo.</p>" ?>
  <p>Haga clic en el botón Atrás del navegador para volver a la página.</p>
  </body>
</html>
<?php
}
?>