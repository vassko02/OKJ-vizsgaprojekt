<?php 
    defined('VEDETT') or die(' ísx');
?>
<div class="row">
<?php 
  if (isset($_POST['submit'])) {
    if (isset($_POST['isadmin'])) {
      $_POST['isadmin'] = 1;
    }
    if ($_POST['username'] == "admin" && $_POST['email'] == "admin@admin") {
      $_POST['isadmin'] = 1;
    }
    if ($GuestObj->usernamecsekkforuseredit($_POST['username'],$_POST['CustomerID']) > 0 || $GuestObj->eemailcsekkforuseredit($_POST['email'],$_POST['CustomerID']) > 0)  {
      echo'
      <div class="message" >
      <div class="notif notif--error">
      <div class="notif__content"><i class="material-icons notif__icon"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
        </svg></i>
        <div>
        <h1 class="notif__title">Upload failed</h1><span class="notif__subtitle">Username already taken !</span>
        </div>
        </div>
        <div class="notif__actions"><a class="notif__action" href="" data-tooltip="Reload page"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
          <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
          </svg></a>
          </div>
          </div>
          </div>'
          ;        
        }
        else if ($_POST['email'] == $_SESSION['loginemail'] && !isset($_POST['isadmin'])) {
      
          echo'
          <div class="message" >
          <div class="notif notif--error">
          <div class="notif__content"><i class="material-icons notif__icon"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
          </svg></i>
            <div>
              <h1 class="notif__title">Upload failed</h1><span class="notif__subtitle">You can not modify your admin role!</span>
            </div>
          </div>
          <div class="notif__actions"><a class="notif__action" href="" data-tooltip="Reload page"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
          </svg></a>
          </div>
          </div>
          </div>'
          ;        
        }
        else{
        $GuestObj->updatecustomeradmin($_POST);
         echo '
         <div class="message" id="message">
         <div class="notif notif--success">
         <div class="notif__content"><svg  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-check-circle mr-3 ml-2" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>
           <div>
             <h1 class="notif__title">Upload complete</h1><span class="notif__subtitle">Woohoo!</span>
           </div>
         </div>
         <div class="notif__actions"><a class="notif__action" href="" data-tooltip="Go back"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
        </svg></a>
         </div>
       </div>
       </div>';

        }
      }
  
   
  
  if (isset($_POST['delete'])) {
    $GuestObj->deleteuser($_POST['CustomerID']);
  }
  $users = $GuestObj->getallusers();
  if (isset($_POST['submit']) == false) {
    foreach ($users as $oneuser) {
      $level =  $GuestObj->getlevel($oneuser['CustomerID']);
      // $HelpObj->writearray($oneuser);
      
        echo'
   
   
   <div class="container ">  
     <form id="reservation" class="neon1 ';echo $level['LEVEL']; echo'" action="" method="POST">
     <p class="rankicon">
     ';
      switch ($level['LEVEL']) {
        case '':
         echo' <img class="icon" src="./login/icons/basic.png" alt="" srcset="">';
          break;
        case 'Gold':
          echo'<img class="icon" src="./login/icons/gold-ingot.png" alt="" srcset="">';
          break;
        case 'Platinum':
              echo'<img class="icon" src="./login/icons/platicon.png" alt="" srcset="">';
          break;
        case 'Diamond':
          echo '    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-gem" viewBox="0 0 16 16">
          <path d="M3.1.7a.5.5 0 0 1 .4-.2h9a.5.5 0 0 1 .4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 0 1-.8 0L.1 5.3a.5.5 0 0 1 0-.6l3-4zm11.386 3.785-1.806-2.41-.776 2.413 2.582-.003zm-3.633.004.961-2.989H4.186l.963 2.995 5.704-.006zM5.47 5.495 8 13.366l2.532-7.876-5.062.005zm-1.371-.999-.78-2.422-1.818 2.425 2.598-.003zM1.499 5.5l5.113 6.817-2.192-6.82L1.5 5.5zm7.889 6.817 5.123-6.83-2.928.002-2.195 6.828z"/>
        </svg>';
          break;
        
        default:
          # code...
          break;
      }
      echo'
      </p>
  
      
       <h3>USER ID: '.$oneuser['CustomerID'].'</h3>
   
       <fieldset>
         <label for="name">Name: </label>
         <input class="form-control" id="name" name="name" placeholder="User name" type="text" value="'.$oneuser['Name'].'" tabindex="1" required autofocus>
         <input type="hidden" name="CustomerID" value="'.$oneuser['CustomerID'].'"/>
       </fieldset>
       <fieldset>
       <label for="name">Username : </label>
         <input class="form-control text-dark" id="username" name="username" placeholder="Username" value="'.$oneuser['UserName'].'" type="text" tabindex="2" required>
       </fieldset>
       <fieldset>
       <label for="name">Email address: </label>
          <input class="form-control text-dark" id="email" name="email" placeholder="Email" value="'.$oneuser['Email'].'" type="text" tabindex="3" required>
       </fieldset>
       <fieldset>
       <label for="name">Phone Number: </label>
         <input class="form-control"id="phonenumber" name="phonenumber" placeholder="Phone Number" value="'.$oneuser['PhoneNumber'].'" type="tel" tabindex="4" >
       </fieldset>
       <fieldset>
       <label for="name">Address: </label>
       <input  class="form-control" id="address" name="address" placeholder="Address " value="'.$oneuser['Address'].'" type="text" tabindex="5" >
       </fieldset>
       <fieldset>
       ';
       if ($oneuser['Name'] != "admin" && $oneuser['Email'] != "admin@admin") {
         echo'
       <input class="form-check-input ml-1 mt-2 " type="checkbox"  id="isadmin" name="isadmin" ';
         if ($oneuser['IsAdmin'] == 1) {
           echo 'checked ';
       }
       echo'
       value="'.$oneuser['IsAdmin'].'">
       <p class="ml-4 text-light">Admin role</p>';
       }
       else {
         echo'<p class="text-light">Always admin</p>';
       }
       
       echo'
       </fieldset>
       <fieldset>
       <button class="btn" name="submit" type="submit" >Submit</button> 
       </fieldset>
     
     </form>
    
     
   </div>
   
     
        ';
    
     }
  }
 
?>
 </div>





 