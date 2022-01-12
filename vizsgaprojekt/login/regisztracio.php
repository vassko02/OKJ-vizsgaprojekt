<div class="col-12 col-md-4 mx-auto text-light">
    <h1 class="mt-4">Registration</h1>
    <form action="index.php?m=regisztracio" method="post">
            <div class="row mb-3">
                <label for="nev" class="col-sm-3 col-form-label">Name: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nev" name="nev"
                     required value="<?php if(isset($_POST['nev'])) {echo $_POST['nev'];}?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nev" class="col-sm-3 col-form-label">Username: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nev" name="nev"
                     required value="<?php if(isset($_POST['username'])) {echo $_POST['usernmae'];}?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">E-mail:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" 
                    required value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>">
                    <?php 
                       if (isset($emailHibauzenet) && $emailHibauzenet!=''){
                        echo '<span class="hibauzenet">'.$emailHibauzenet.'</span>';
                        }
                    ?>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jelszo" class="col-sm-3 col-form-label">Password: </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="jelszo" name="jelszo">
                </div>
            </div>
            <div class="row mb-3">
                <label for="jelszoujra" class="col-sm-3 col-form-label">Password again: </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="jelszoujra" name="jelszoujra">
                </div>
            </div>
                    <?php 
                       if (isset($jelszohibauzenet) && count($jelszohibauzenet) != 0){
                            echo '<div class="alert alert-danger" role="alert">';
                           foreach($jelszohibauzenet as $hiba){
                               echo $hiba.'<br>';
                           }
                            echo' </div>';
                        }
                    ?>
            <button type="submit" class="btn btn-warning" name="btn_reg">Registrate</button>
        </form>
</div>