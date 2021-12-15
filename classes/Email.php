<?php

namespace Classes;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{
    public $email;
    public $nombre;
    public $token;
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }



    public function enviarInstrucciones()
    {
        $correo = $this->email;
        try {
            //Crear objeto de email
            $mail = new PHPMailer();
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->Username = 'rosmeryalvarador@gmail.com';
            $mail->Password = 'RosmeryAlvaradoRobles';
            $mail->setFrom('rosmeryalvarador@gmail.com', 'UNASAM');
            $mail->addAddress($correo, 'Carlos Emilio');
            $mail->Subject = 'Restablece tu password';
            //set HTML 
            $mail->isHTML(TRUE);
            $mail->CharSet = "UTF-8";
            $contenido = "<html>";
            $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer tu password sigue el enlace para hacerlo</p>";
            $contenido .= "<p>Presiona aqui <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer password </a></p>";
            $contenido .= "<p>Si tu no solicitaste esta cuenta ignorala</p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;
            $mail->send();
        } catch (Exception $e) {
            echo "Hubo un error: {$mail->ErrorInfo}";
        }
    }
}
