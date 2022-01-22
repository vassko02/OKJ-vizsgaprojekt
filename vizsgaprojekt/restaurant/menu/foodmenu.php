<?php
$appetiser = $StorageObj->getAllFoodByType('Appetiser');
$soup = $StorageObj->getAllFoodByType('Soup');
$dessert = $StorageObj->getAllFoodByType('Dessert');
$main = $StorageObj->getAllFoodByType('Main Course');

?>

<div class="bodyy">
    <div>
        <div class="eloetelcim">
            <h1>Appetizers</h1>
        </div>
        <div class="">
            <div class="row mx-auto">
                <?php foreach ($appetiser as $item) {
                    echo '<div class="teszt col-xl-2 col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                    <div class="card-body mx-auto">
                        <img src="' . $item['ImageURL'] . '" class="card-img-top" alt="...">
                        <p class="card-text">' . $item['ItemName'] . '</p>
                        <p class="card-text">$' . $item['Price'] . '</p>
                    </div>
                    </div>
                </div>';
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
                    echo '<div class="teszt col-xl-2 col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                    <div class="card-body mx-auto">
                        <img src="' . $item['ImageURL'] . '" class="card-img-top" alt="...">
                        <p class="card-text">' . $item['ItemName'] . '</p>
                        <p class="card-text">$' . $item['Price'] . '</p>
                    </div>
                    </div>
                </div>';
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
                    echo '<div class="teszt col-xl-2 col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                    <div class="card-body mx-auto">
                        <img src="' . $item['ImageURL'] . '" class="card-img-top" alt="...">
                        <p class="card-text">' . $item['ItemName'] . '</p>
                        <p class="card-text">$' . $item['Price'] . '</p>
                    </div>
                    </div>
                </div>';
                } ?>
            </div>
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
                echo '<div class="teszt col-xl-2 col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                <div class="card-body mx-auto">
                    <img src="' . $item['ImageURL'] . '" class="card-img-top" alt="...">
                    <p class="card-text">' . $item['ItemName'] . '</p>
                    <p class="card-text">$' . $item['Price'] . '</p>
                </div>
                </div>
            </div>';
            } ?>
        </div>
    </div>
</div>

</div>