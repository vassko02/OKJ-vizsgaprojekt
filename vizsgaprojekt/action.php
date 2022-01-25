<?php 
    if(($request === $baseUrl . '/contactus' || $request === $baseUrl . '/contactusREPORT') && isset($_POST['btn_send']))
  if($GuestObj->saveguestproblem($_POST) == 1){

     header('Location: '.$baseUrl.'/contactusREPORT');
   
  }
  $hiba = 0;
  if ($request === $baseUrl . '/signin' && isset($_POST['login'])){
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
          $_SESSION['isadmin'] = $felhasznalo['IsAdmin'];
          
          if (isset($_SESSION['loginemail']) && $_SESSION['isadmin'] == 1) {
              header('Location: '.$baseUrl.'/admin');
          }
          else if ($_SESSION['loginemail']) {
            header('Location: '.$baseUrl.'/');
          }
          
      }
  }
 
  if ($request === $baseUrl . '/signin' && isset($_POST['btn_reg'])){

    $emailHibauzenet='';
    $usernamehibauzenet='';

    if ($GuestObj->eemailcsekk($_POST['email']) == 1){
        $emailHibauzenet='This email address is already used!';
    }
    if ($GuestObj-> usernamecsekk($_POST['username']) == 1){
        $usernamehibauzenet='This username address is already used!';
    }
   
    $jelszohibauzenet=array();

    if (strlen($_POST['jelszo']) < 8) {
        $jelszohibauzenet[] = 'The minimum lenght of the password is 8 characters!.';
    }

    if ( !preg_match("#[A-Z]+#",$_POST['jelszo']) ) {
        $jelszohibauzenet[] = 'The password has to contain an uppercase character!';
    }
    if ( !preg_match("#[a-z]+#",$_POST['jelszo']) ) {
        $jelszohibauzenet[] = 'The password has to contain a lowercase character!';
    }
    if ( !preg_match("#[0-9]+#",$_POST['jelszo']) ) {
        $jelszohibauzenet[] = 'The password has to contain a number character!';
    }
    if ($_POST['jelszo'] != $_POST['jelszoujra']) {
        $jelszohibauzenet[] = 'The two passwords are not the same!';   
         }
    if ($emailHibauzenet =='' && count($jelszohibauzenet) == 0 && $usernamehibauzenet == '') {
        //nincs hiba
     
        if ($GuestObj->saveuser($_POST) ==1) {
         
                header('Location: '.$baseUrl.'/signin/regconfirmed');
        }
    }
}

  
  
   
?>