<?php 
if(($m=='contactus' || $m=='contactusREPORT') && isset($_POST['btn_send']))
  if($GuestObj->saveguestproblem($_POST) == 1){

     header('Location: index.php?m=contactusREPORT');
   
  }
  if ($m=='signin' && isset($_POST['btn_reg'])){

    $emailHibauzenet='';
    $usernamehibauzenet='';

    if ($GuestObj->eemailcsekk($_POST['email']) == 1){
        $emailHibauzenet='A megadott e-mail cím már regisztrálva van!';
    }
    if ($GuestObj-> usernamecsekk($_POST['username']) == 1){
        $usernamehibauzenet='A megadott username már regisztrálva van!';
    }
   
    $jelszohibauzenet=array();

    if (strlen($_POST['jelszo']) < 8) {
        $jelszohibauzenet[] = 'A jelszó hossza min. 8 karakter!';
    }

    if ( !preg_match("#[A-Z]+#",$_POST['jelszo']) ) {
        $jelszohibauzenet[] = 'A jelszónak tartalmaznia kell nagybetűt!';
    }
    if ( !preg_match("#[a-z]+#",$_POST['jelszo']) ) {
        $jelszohibauzenet[] = 'A jelszónak tartalmaznia kell kisbetűt!';
    }
    if ( !preg_match("#[0-9]+#",$_POST['jelszo']) ) {
        $jelszohibauzenet[] = 'A jelszónak tartalmaznia kell számot!';
    }
    if ($_POST['jelszo'] != $_POST['jelszoujra']) {
        $jelszohibauzenet[] = 'A két jelszó nem egyforma!';   
         }
    if ($emailHibauzenet =='' && count($jelszohibauzenet) == 0 && $usernamehibauzenet == '') {
        //nincs hiba
     
        if ($GuestObj->saveuser($_POST) ==1) {
         
                header('Location: index.php?m=regconfirmed');
        }
    }
}

  
  
   
?>