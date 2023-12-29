<?php 
namespace Alx\Portfoliapp\Entities;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class EmailSender {
    function __construct() {
        $this->transport = Transport::fromDsn("smtp://smtp.ionos.es:587");
        $this->transport->setUsername('portfoliapp@pfagot.com');
        $this->transport->setPassword('portfoliapp');
        //$this->transport = Transport::fromDsn("smtp://portfoliapp%40pfagot.com:portfoliapp@smtp.ionos.es:587");
        $this->mailer = new Mailer($this->transport);
    }

    public function sendConfirmationMail($name, $surname, $email, $token) {
        $email = (new Email())
            //->from('hello@portfoliapp.com')
            ->from('portfoliapp@pfagot.com')
            ->to($email)
            ->priority(Email::PRIORITY_HIGH)
            ->subject('Bienvenido a Portfoliapp!')
            ->text('Debes validar tu correo')
            ->html('<p>Haz click en el siguiente enlace para validar tu correo, tienes 24 horas!</p><br><a href="http://portfoliapp.com/registro/validar?token='.$token.'">VALIDA TU CORREO</a>');

        $this->mailer->send($email);
    }
}
?>