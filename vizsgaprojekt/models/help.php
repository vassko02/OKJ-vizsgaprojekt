<?php
    class Help extends Dbconnect{
       function writearray($array){
           echo '<pre>';
           print_r($array);
           echo '</pre>';
       }

    }
?>