<?php
     echo '<pre>';
     if (isset($_POST['select'])) {
        $_SESSION['serviceid'] = $_POST['select'];
        
     }
     print_r($_SESSION);
     print_r($_POST);
     echo '</pre>'; 
  
    if (isset($_POST['btn_send'])) {
      
        if ($GuestObj->findcustomerbyemail($_POST['email'])== 0) {
            $GuestObj->savecustomer($_POST);
        }
        $customer = $GuestObj->findcustomerbyemail($_POST['email']);
        $_SESSION['customerid'] = $customer['CustomerID'];
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>'; 
    }
?>
<div class="container  mt-5 bg-light">
    <div class="row">
        <h1 class="mt-3">Some information about you</h1>
        <div class="col">
            <form action="index.php?m=confirm" method="post">
                     <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control"  placeholder="Cicz Imre" name="name" value="<?php if(isset($_SESSION['customername'])) echo $_SESSION['customername']; ?>" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="form-label">Phone number</label>
                        <input type="tel" name="tel" class="form-control" value="<?php if(isset($_SESSION['phonenumber'])) echo $_SESSION['phonenumber']; ?>" id="tel" placeholder="+36301234567">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" value="<?php if(isset($_SESSION['address'])) echo $_SESSION['address']; ?>"  placeholder="9232 Darnózseli, Táncsics u. 33" name="address" id="address">
                     </div>  
                     <button type="submit" name="btn_send" class="btn btn-warning mb-3">Continue</button>
            </form>
                   
        </div>
    </div>
</div> 








