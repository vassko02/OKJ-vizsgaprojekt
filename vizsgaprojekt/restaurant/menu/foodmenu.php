<?php
$appetiser = $StorageObj->getAllFoodByType('Appetiser');
$soup = $StorageObj->getAllFoodByType('Soup');
$dessert = $StorageObj->getAllFoodByType('Dessert');
$main = $StorageObj->getAllFoodByType('Main Course');
$HelpObj->writearray($_POST);

if (isset($_POST['itemname'])) {
    $_SESSION['itemname']= $_POST['itemname'];
    $_SESSION['itemprice'] = $_POST['itemprice'] ;
    $StorageObj->addtoconsumption($_SESSION);    
}
?>

<div class="bodyy">
    <div>
        <div class="eloetelcim">
            <h1>Appetisers</h1>
        </div>
        <div class="">
            <div class="row mx-auto">
                <?php foreach ($appetiser as $item) {
                    
                    echo '
                    
                    <form action="" method="POST" class="teszt col-xl-2 col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                    <div class="card-body mx-auto">
                        <div class="cardbody">
                        <img src="' . $item['ImageURL'] . '" class="card-img-top" alt="...">
                        <p class="card-text itemname" id="appetiserid">' . $item['ItemName'] . '</p>
                        <p class="card-text ">$' . $item['Price'] . '</p>
                        </div>

                        <input name="itemname" type="hidden" value="'.$item['ItemName'].'"/>
                        <input name="itemprice" type="hidden" value="'.$item['Price'].'"/>
                        ';if (isset($_SESSION['reservationid']) && $_SESSION['isadmin'] == 1) {
                            echo'  <button name="addcons" class="" type="submit" id="logingomb"  data-submit="...Sending">Add to consumption</button>';
                        }
                        
                        echo'
                    </div>
                    </div>
                   
                     </form>
                  '
                    
                  ;
                } ?>
            </div>
        </div>
    </div>
    <div>
        <div class="levescim">
            <h1>Soups</h1>
        </div>
        <div class="">
            <div class="cardss row mx-auto">
                <?php foreach ($soup as $item) {
                   echo '
                    
                   <form action="" method="POST" class="teszt col-xl-2 col-lg-3 col-md-4 col-sm-12">
                   <div class="card">
                   <div class="card-body mx-auto">
                   <div class="cardbody">
                   <img src="' . $item['ImageURL'] . '" class="card-img-top" alt="...">
                   <p class="card-text itemname" id="appetiserid">' . $item['ItemName'] . '</p>
                   <p class="card-text ">$' . $item['Price'] . '</p>
                   </div>
                       <input name="itemname" type="hidden" value="'.$item['ItemName'].'"/>
                       <input name="itemprice" type="hidden" value="'.$item['Price'].'"/>
                       ';if (isset($_SESSION['reservationid'])  && $_SESSION['isadmin'] == 1) {
                           echo'  <button name="addcons" type="submit" id="logingomb"  data-submit="...Sending">Add to consumption</button>';
                       }
                       
                       echo'
                   </div>
                   </div>
                  
                    </form>
                 '
                   
                 ;
                } ?>
            </div>
        </div>
    </div>
    <div>
        <div class="foetelcim">
            <h1>Main Courses</h1>
        </div>
        <div class="">
            <div class="cardss row mx-auto">
                <?php foreach ($main as $item) {
                   echo '
                    
                   <form action="" method="POST" class="teszt col-xl-2 col-lg-3 col-md-4 col-sm-12">
                   <div class="card">
                   <div class="card-body mx-auto">
                   <div class="cardbody">
                   <img src="' . $item['ImageURL'] . '" class="card-img-top" alt="...">
                   <p class="card-text itemname" id="appetiserid">' . $item['ItemName'] . '</p>
                   <p class="card-text ">$' . $item['Price'] . '</p>
                   </div>
                       <input name="itemname" type="hidden" value="'.$item['ItemName'].'"/>
                       <input name="itemprice" type="hidden" value="'.$item['Price'].'"/>
                       ';if (isset($_SESSION['reservationid'])  && $_SESSION['isadmin'] == 1) {
                           echo'  <button name="addcons" type="submit" id="logingomb"  data-submit="...Sending">Add to consumption</button>';
                       }
                       
                       echo'
                   </div>
                   </div>
                  
                    </form>
                 '
                   
                 ;
                } ?>
            </div>
        </div>
    </div>
    <div>
        <div class="dessertcim">
            <h1>Desserts</h1>
        </div>
        <div class="">
            <div class="cardss row mx-auto">
                <?php foreach ($dessert as $item) {
                   echo '
                        
                   <form action="" method="POST" class="teszt col-xl-2 col-lg-3 col-md-4 col-sm-12">
                   <div class="card">
                   <div class="card-body mx-auto">
                   <div class="cardbody">
                   <img src="' . $item['ImageURL'] . '" class="card-img-top" alt="...">
                   <p class="card-text itemname" id="appetiserid">' . $item['ItemName'] . '</p>
                   <p class="card-text ">$' . $item['Price'] . '</p>
                   </div>
                       <input name="itemname" type="hidden" value="'.$item['ItemName'].'"/>
                       <input name="itemprice" type="hidden" value="'.$item['Price'].'"/>
                       ';if (isset($_SESSION['reservationid'])  && $_SESSION['isadmin'] == 1) {
                           echo'  <button name="addcons" type="submit" id="logingomb"  data-submit="...Sending">Add to consumption</button>';
                       }
                       
                       echo'
                   </div>
                   </div>
                  
                    </form>
                 '
                   
                 ;
                } ?>
            </div>
        </div>
    </div>
</div>


</div>

