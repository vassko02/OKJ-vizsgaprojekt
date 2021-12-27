<?php 
if(($m=='contactus' || $m=='contactusREPORT') && isset($_POST['btn_send']))
  if($GuestObj->saveguestproblem($_POST) == 1){

     header('Location: index.php?m=contactusREPORT');
   
  }

  
  
   
?>