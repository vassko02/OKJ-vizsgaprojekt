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
          <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
          <title>Reservation confirment</title>
        </head>
        <body>
          <div style="background-color: black; max-width: 600px; margin-left: auto; margin-right: auto; padding-bottom: 30px;">
            <img style="width: 100%;" src="http://diak.jedlik.eu/~PeacefulParadise/pictures/korulvagott_logo.png" alt="">
            <div style="text-align: center; width: 100%; color: #C5B358; background-color: black;">
              <h1 style="font-family: "Be Vietnam Pro", sans-serif; font-weight: normal;">Thanks you for your Reservation!</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultrices dolor non neque imperdiet, sed commodo ligula pretium. Sed quis ipsum vel orci hendrerit convallis. Sed cursus turpis non urna tristique, ut cursus elit tincidunt. Sed accumsan diam eu dui ornare, tincidunt accumsan metus finibus. Vestibulum sodales elementum lacinia. In ultrices congue velit, id sollicitudin nunc bibendum at. Nunc non tortor purus. Quisque sit amet consequat nibh, ac porttitor arcu. Duis blandit sem magna. Vestibulum tempus ex ac scelerisque efficitur. Ut molestie turpis id ante finibus, ut hendrerit est mattis. In rhoncus mauris arcu, id lacinia elit ornare quis. Pellentesque consectetur mi ac tellus accumsan, sed rhoncus urna cursus. Nullam porttitor mauris dolor, vel venenatis neque rhoncus ac. Donec imperdiet augue ligula, ut gravida nunc mattis a.</p>
            </div>
          </div>
          
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
