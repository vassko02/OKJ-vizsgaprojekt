<div id="signin">
    <div class="loginout" id="loginout">
        <div class="form-loginout sign-up-loginout">
            <form action="#">
                <h1>Sign up</h1>
                <input type="text" placeholder="Username" />
                <input type="email" placeholder="Email" />
                <input type="text" placeholder="Name" />
                <input type="password" placeholder="Password" />
                <input type="password" placeholder="Repeat Password" />
                <button class="signgomb">Sign Up</button>
            </form>
        </div>
        <div class="form-loginout sign-in-loginout urlap">
            <form action="#">
                <div id="title">
                    <h1 class="title">Sign in</h1>
                </div>
                <div class="input-signin">
                    <input type="#{type}" id="#{label}" required="required" />
                    <label for="#{label}">Name</label>
                    <div class="bar"></div>
                </div>
                <div class="input-signin">
                    <input type="#{type}" id="#{label}" required="required" />
                    <label for="#{label}">Password</label>
                    <div class="bar"></div>
                </div>
                <!-- <input type="email" placeholder="Username or Email" />
                <input type="password" placeholder="Password" /> -->
                <!-- <a href="#">Forgot your password?</a>
                <button class="signgomb">Sign In</button>  -->
                <div class="button-signin">
                    <button id="logingomb">Sign in</button>
                </div>
                <div class="footer"><a href="index.php?m=login">Already have an account?</a></div>
            </form>
        </div>
        <div class="overlay-loginout">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Already have an account?</h1>
                    <p>For full access, sign in with your exsisting account</p>
                    <button class="ghost signgomb" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Need an account?</h1>
                    <p>Sign up to our website for full access</p>
                    <button class="ghost signgomb" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- partial
<script  src="./script.js"></script> -->
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const loginout = document.getElementById('loginout');

    signUpButton.addEventListener('click', () => {
        loginout.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        loginout.classList.remove("right-panel-active");
    });
</script>





<!-- <div class="signin">
    <div class="urlap"></div>
    <div class="urlap">
        <div class="row">
            <div class="col-6">
                <h1 class="title">Sign up</h1>
                <form>
                    <div class="input-signin">
                        <input type="#{type}" id="#{label}" required="required" />
                        <label for="#{label}">Name</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-signin">
                        <input type="#{type}" id="#{label}" required="required" />
                        <label for="#{label}">Username</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-signin">
                        <input type="#{type}" id="#{label}" required="required" />
                        <label for="#{label}">Email</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-signin">
                        <input type="#{type}" id="#{label}" required="required" />
                        <label for="#{label}">Password</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-signin">
                        <input type="#{type}" id="#{label}" required="required" />
                        <label for="#{label}">Repeat Password</label>
                        <div class="bar"></div>
                    </div>
                    <div class="button-signin">
                        <button id="logingomb"><span>Sign up</span></button>
                    </div>
                    <div class="footer"><a href="index.php?m=login">Already have an account?</a></div>
                </form>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div> -->




<!-- <div class="col-12 col-md-4 mx-auto text-light">
    <h1 class="mt-4">Sign up</h1>
    <form action="index.php?m=home" method="post">
            <div class="row mb-3">
                <label for="nev" class="col-sm-3 col-form-label">Name: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nev" name="nev"
                     required value="<?php if (isset($_POST['nev'])) {
                                            echo $_POST['nev'];
                                        } ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nev" class="col-sm-3 col-form-label">Username: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nev" name="nev"
                     required value="<?php if (isset($_POST['username'])) {
                                            echo $_POST['username'];
                                        } ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">E-mail:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" 
                    required value="<?php if (isset($_POST['email'])) {
                                        echo $_POST['email'];
                                    } ?>">
                    <?php
                    if (isset($emailHibauzenet) && $emailHibauzenet != '') {
                        echo '<span class="hibauzenet">' . $emailHibauzenet . '</span>';
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
                    if (isset($jelszohibauzenet) && count($jelszohibauzenet) != 0) {
                        echo '<div class="alert alert-danger" role="alert">';
                        foreach ($jelszohibauzenet as $hiba) {
                            echo $hiba . '<br>';
                        }
                        echo ' </div>';
                    }
                    ?>
            <button type="submit" class="btn btn-warning" name="btn_reg">Sign up</button>
        </form>
</div> --> -->