<?php


namespace moonconsultancy\Mail;


class Mail {
    private function sendMail($message, $receiver, $subject, $replyTo)
    {
        $headers = 'From: registration@moonconsultancy.nl' . "\r\n" .
            'Reply-To: '. $replyTo . "\r\n" .
            'X-Mailer: PHP/' . phpversion() . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($receiver, $subject, $message, $headers);
    }

    public function notifyRegistration($name, $mail)
    {
        echo "name: ".$name . " mail: " . $mail;
        $subject = "Nieuwe registratie: " . $name;
        $message = "
            <html>
            <head>
            <title>". $subject ."</title>
            </head>
            <body>
            <p>" . $name . " heeft zich geregistreerd. Klik <a href='" . $_SERVER['REQUEST_URI'] . "?page=4'>hier</a> om de inschrijvingen te bekijken</p>
            </body>
            </html>
        ";

        $this->sendMail($message, MAIL_DEFAULT, $subject, $mail);

        $subject = "Registratie bij Moonconsultancy.nl";
        $message = "
            <html>
            <head>
            <title>". $subject ."</title>
            </head>
            <body>
            <p>Bedankt voor het registreren bij Moonconsultancy.nl, " . $name . ". Uw registratie wordt zo snel mogelijk behandeld.</p>
            </body>
            </html>
        ";

        $this->sendMail($message, $mail, $subject, MAIL_DEFAULT);
    }
}