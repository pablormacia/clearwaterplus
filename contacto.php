
<?php


if(isset($_POST['email'])) {

    //

    $email_to = "pablo-macia@live.com.ar";

    $email_subject = "Contacto desde el sitio Web Clear Water Plus";

    function died($error) {

        // mensajes de error

        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";

        echo "Detalle de los errores.<br /><br />";

        echo $error."<br /><br />";

        echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }


    $nombre = $_POST['nombre']; // requerido

    $tel = $_POST['tel']; // requerido

    $email = $_POST['email']; // requerido

    $consulta = $_POST['consulta']; // requerido

    $error_message = "";//Linea numero 52;



//Este es el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje:\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Nombre: ".clean_string($nombre)."\n";
    $email_message .= "Tel: ".clean_string($tel)."\n";
	$email_message .= "Email: ".clean_string($email)."\n";
 	$email_message .= "Mensaje: ".clean_string($consulta)."\n";


//Se crean los encabezados del correo

$headers = 'From: '.$email."\r\n".

'Reply-To: '.$email."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

ob_start();
  //header("refresh:4; url = index.html");

  $template='<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clear Water Plus | Consulta vía Web </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="shortcut icon" href="img/institucional/isotipo_color.png" type="image/png">
    <style>

        .main{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #18B8F7 ;
            height: 100vh;
            width: 100vw;
        }

        .main h1{
            margin:0;
            font-size: 2rem;
            color: #fff;
        }

        .main h5{
            color:#fff;
        }




    </style>
</head>
<body>
    <div class="main">
    <h1>¡Gracias por tu consulta, '.$_POST['nombre'].'!</h1>
    <h5>Nos pondremos en contacto a la brevedad</h5><br>
    <a class="waves-effect waves-light blue darken-3 btn" href="index.html">Volver<a>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>';


  print($template);

ob_end_flush();

}

?>
