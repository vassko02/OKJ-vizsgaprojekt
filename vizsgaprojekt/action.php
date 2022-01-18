<?php 
    if(($m=='contactus' || $m=='contactusREPORT') && isset($_POST['btn_send']))
  if($GuestObj->saveguestproblem($_POST) == 1){

     header('Location: index.php?m=contactusREPORT');
   
  }
  $hiba = 0;
  if ($m=='signin' && isset($_POST['login'])){
      if ($_POST['usernameperemail'] == '') {
          $hiba = 1;
        
      } else if ($_POST['loginpassword'] == '') {
          $hiba = 2;
         
      } else {
        $arr1 = str_split($_POST['usernameperemail']);
        $contains = false;
        foreach ($arr1 as $char) {
            if ($char == '@') {
                $contains = true;
            }
        }
          if ($contains == true) {
            $felhasznalo = $GuestObj->logincsekkemail($_POST['usernameperemail'],$_POST['loginpassword']);
            if ($felhasznalo === 0) {
                $hiba = 3;
       
            } 
          }
          else{
                
          $felhasznalo = $GuestObj->logincsekkusername($_POST['usernameperemail'],$_POST['loginpassword']);
          if ($felhasznalo === 0) {
              $hiba = 3;
       
          }
          }
      }

      if ($hiba == 0) {
          //nincs hiba -> minden oke
          $_SESSION['sid']=session_id();
          $_SESSION['uid'] = $felhasznalo['CustomerID'];
          $_SESSION['username'] =  $felhasznalo['UserName'];
          $_SESSION['loginemail'] = $felhasznalo['Email'];
          if (isset($_SESSION['loginemail']) && $_SESSION['loginemail'] == "admin@admin") {
              header('Location: index.php?m=admin');
          }
          else if ($_SESSION['loginemail']) {
            header('Location: index.php?m=home');
          }
          
      }
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