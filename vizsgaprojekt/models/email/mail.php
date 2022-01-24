<?php
class mail extends Dbconnect
{
    function sendEmail()
    {
        // Multiple recipients
        $to = 'roncz.gabor1@gmail.com, kaldavai26@gmail.com'; // note the comma
        // Subject
        $subject = 'Reservation Confirment';
        // Message
        $message = '<html>
        <head>
          <title>Reservation confirment</title>
        </head>
        <body>
          <img style="width: 100%;" src="http://diak.jedlik.eu/~PeacefulParadise/pictures/korulvagott_logo.png" alt="">
        </body>
        </html>';

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        //$headers[] = 'To: David <kaldavai26@gmail.com>';
        $headers[] = 'From: Peaceful Paradise <peacefulparadise@diak.jedlik.eu>';
        $headers[] = 'Cc: peacefulparadiseofficial@gmail.com';
        $headers[] = 'Bcc: peacefulparadiseofficial@gmail.com';

        // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));
    }
}
