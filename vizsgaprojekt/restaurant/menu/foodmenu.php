<?php
$appetiser = $StorageObj->getAllFoodByType('Appetiser');
$soup = $StorageObj->getAllFoodByType('Soup');
$dessert = $StorageObj->getAllFoodByType('Dessert');
$main = $StorageObj->getAllFoodByType('Main Course');


if (isset($_POST['itemname'])) {
    $_SESSION['itemname']= $_POST['itemname'];
    $_SESSION['itemprice'] = $_POST['itemprice'] ;
    $StorageObj->addtoconsumption($_SESSION);    
}
?>

<div class="eloetelcim">
                  <h1>Appetizers</h1>
                </div>
      <section class="hero-section">
          <div class="card-grid">
             
                <?php foreach ($appetiser as $item) {
                    
                    echo '
                    
                    <form action="" method="POST" class="">
                    <a class="card" href="#">
                    <div class="card__background" style="background-image: url(' . $item['ImageURL'] . ')"></div>
                    <div class="card__content">
                    <p class="card__category">$' . $item['Price'] . '</p>
                    <h3 class="card__heading"> '.$item['ItemName'].' </h3>
                    </div>
                    </a>
                    <input name="itemname" type="hidden" value="'.$item['ItemName'].'"/>
                    <input name="itemprice" type="hidden" value="'.$item['Price'].'"/>
                    ';if (isset($_SESSION['reservationid'])  && $_SESSION['isadmin'] == 1) {
                        echo'  <button name="addcons" type="submit" id="logingomb"  data-submit="...Sending">Add to consumption</button>';
                    }
                    
                    echo'
                    </form>
                    '
                    
                    ;
                } ?>
            </div>
        </div>
    </div>
</section>
<div class="levescim">
                  <h1>Soups</h1>
                </div>
      <section class="hero-section">
          <div class="card-grid">
             
                <?php foreach ($soup as $item) {
                    
                    echo '
                    
                    <form action="" method="POST" class="">
                    <a class="card" href="#">
                    <div class="card__background" style="background-image: url(' . $item['ImageURL'] . ')"></div>
                    <div class="card__content">
                    <p class="card__category">$' . $item['Price'] . '</p>
                    <h3 class="card__heading"> '.$item['ItemName'].' </h3>
                    </div>
                    </a>
                    <input name="itemname" type="hidden" value="'.$item['ItemName'].'"/>
                    <input name="itemprice" type="hidden" value="'.$item['Price'].'"/>
                    ';if (isset($_SESSION['reservationid'])  && $_SESSION['isadmin'] == 1) {
                        echo'  <button name="addcons" type="submit" id="logingomb"  data-submit="...Sending">Add to consumption</button>';
                    }
                    
                    echo'
                    </form>
                    '
                    
                    ;
                } ?>
            </div>
        </div>
    </div>
</section>
<div class="foetelcim">
                  <h1>Main course</h1>
                </div>
      <section class="hero-section">
          <div class="card-grid">
             
                <?php foreach ($main as $item) {
                    
                    echo '
                    
                    <form action="" method="POST" class="">
                    <a class="card" href="#">
                    <div class="card__background" style="background-image: url(' . $item['ImageURL'] . ')"></div>
                    <div class="card__content">
                    <p class="card__category">$' . $item['Price'] . '</p>
                    <h3 class="card__heading"> '.$item['ItemName'].' </h3>
                    </div>
                    </a>
                    <input name="itemname" type="hidden" value="'.$item['ItemName'].'"/>
                    <input name="itemprice" type="hidden" value="'.$item['Price'].'"/>
                    ';if (isset($_SESSION['reservationid'])  && $_SESSION['isadmin'] == 1) {
                        echo'  <button name="addcons" type="submit" id="logingomb"  data-submit="...Sending">Add to consumption</button>';
                    }
                    
                    echo'
                    </form>
                    '
                    
                    ;
                } ?>
            </div>
        </div>
    </div>
</section>
<div class="desszertcim">
                  <h1>Desserts</h1>
                </div>
      <section class="hero-section">
          <div class="card-grid">
             
                <?php foreach ($dessert as $item) {
                    
                    echo '
                    
                    <form action="" method="POST" class="">
                    <a class="card" href="#">
                    <div class="card__background" style="background-image: url(' . $item['ImageURL'] . ')"></div>
                    <div class="card__content">
                    <p class="card__category">$' . $item['Price'] . '</p>
                    <h3 class="card__heading"> '.$item['ItemName'].' </h3>
                    </div>
                    </a>
                    <input name="itemname" type="hidden" value="'.$item['ItemName'].'"/>
                    <input name="itemprice" type="hidden" value="'.$item['Price'].'"/>
                    ';if (isset($_SESSION['reservationid'])  && $_SESSION['isadmin'] == 1) {
                        echo'  <button name="addcons" type="submit" id="logingomb"  data-submit="...Sending">Add to consumption</button>';
                    }
                    
                    echo'
                    </form>
                    '
                    
                    ;
                } ?>
            </div>
        </div>
    </div>
</section>
  
    


</div>

