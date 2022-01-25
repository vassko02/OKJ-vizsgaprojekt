<?php
$appetiser = $StorageObj->getFoodByType('Appetiser');
$soup = $StorageObj->getFoodByType('Soup');
$dessert = $StorageObj->getFoodByType('Dessert');
$main = $StorageObj->getFoodByType('Main Course');

?>
<div class="hatter">
  <div class="title">
    <h1>Welcome to our restaurant!</h1>
  </div>
</div>
<div class="favoritefood">
  <p>Take a look at our best seller meals!</p>
</div>

<div class="row mx-auto">
  <?php foreach ($appetiser as $item) {
    echo '<div class="card col-lg-3 col-md-4 col-sm-12">
    <div class="card-body">
      <img src="'.$item['ImageURL'].'" class="card-img-top" alt="...">
      <p class="card-text">'.$item['ItemName'].'</p>
      <p class="card-text">$'.$item['Price'].'</p>
    </div>
  </div>';
  }
  foreach ($soup as $item) {
    echo '<div class="card col-lg-3 col-md-4 col-sm-12">
    <div class="card-body">
      <img src="'.$item['ImageURL'].'" class="card-img-top" alt="...">
      <p class="card-text">'.$item['ItemName'].'</p>
      <p class="card-text">$'.$item['Price'].'</p>
    </div>
  </div>';
  }
  foreach ($main as $item) {
    echo '<div class="card col-lg-3 col-md-4 col-sm-12">
    <div class="card-body">
      <img src="'.$item['ImageURL'].'" class="card-img-top" alt="...">
      <p class="card-text">'.$item['ItemName'].'</p>
      <p class="card-text">$'.$item['Price'].'</p>
    </div>
  </div>';
  }
  foreach ($dessert as $item) {
    echo '<div class="card col-lg-3 col-md-4 col-sm-12">
    <div class="card-body">
      <img src="'.$item['ImageURL'].'" class="card-img-top" alt="...">
      <p class="card-text">'.$item['ItemName'].'</p>
      <p class="card-text">$'.$item['Price'].'</p>
    </div>
  </div>';
  }
   ?>


</div>
<div class="menu">
  <a class=" btn w-100" href="<?php echo $baseUrl ?>/dining/menu">Menu</a>
</div>