 
 <div class="hibauzenetek">
     <?php

        if ((isset($jelszohibauzenet) && count($jelszohibauzenet) != 0) || isset($usernamehibauzenet) || isset($emailHibauzenet) || $hiba == 3 || $hiba == 4) {
            echo '<div class="alert alert-danger mt-5 mb-0" role="alert">';
            if ($hiba === 3) {
                echo 'Wrong Email address or password!';
            }
            if ($hiba === 4) {
                echo 'Please activate your account first!';
            }
            if (isset($usernamehibauzenet) && $usernamehibauzenet != '') {
                echo $usernamehibauzenet . '<br>';
            }
            if (isset($emailHibauzenet) && $emailHibauzenet != '') {
                echo $emailHibauzenet . '<br>';
            }
            if (isset($jelszohibauzenet) && count($jelszohibauzenet) != 0) {


                foreach ($jelszohibauzenet as $hiba) {
                    echo $hiba . '<br>';
                }
            }
            echo ' </div>';
        }

        ?>
 </div>
 <div id="signin" class="">
     <div class="loginout <?php if ((isset($jelszohibauzenet) && count($jelszohibauzenet) != 0)
                                || $usernamehibauzenet != '' || $emailHibauzenet != ''
                            ) echo "right-panel-active"; ?>" id="loginout">
         <div class="form-loginout sign-up-loginout urlap ">
             <form action="" method="POST">
                 <div id="title">
                     <h1 class="title">Sign up</h1>
                 </div>
                 <div class="input-signin">
                     <input type="text" id="#{label}" name="username" required="required" value="<?php if (isset($_POST['username'])) {
                                                                                                        echo $_POST['username'];
                                                                                                    } ?>" />
                     <label for="#{label}">Username</label>
                     <div class="bar"></div>

                 </div>
                 <div class="input-signin">
                     <input type="text" id="#{label}" name="name" required="required" value="<?php if (isset($_POST['name'])) {
                                                                                                    echo $_POST['name'];
                                                                                                } ?>" />
                     <label for="#{label}">Name</label>
                     <div class="bar"></div>
                 </div>
                 <div class="input-signin">
                     <input type="email" id="#{label}" name="email" required="required" value="<?php if (isset($_POST['email'])) {
                                                                                                    echo $_POST['email'];
                                                                                                } ?>" />
                     <label for="#{label}">Email</label>
                     <div class="bar"></div>

                 </div>
                 <div class="input-signin">
                     <input type="password" id="#{label}" name="jelszo" required="required" />
                     <label for="#{label}">Password</label>
                     <div class="bar"></div>
                 </div>
                 <div class="input-signin">
                     <input type="password" name="jelszoujra" id="#{label}" required="required" />
                     <label for="#{label}">Password again</label>
                     <div class="bar"></div>
                 </div>


                 <div class="button-signin">
                     <button type="submit" class="<?php if (isset($jelszohibauzenet) && $usernamehibauzenet != '' && $emailHibauzenet != '') echo 'mt-1';
                                                    else {
                                                        echo 'mt-4';
                                                    } ?>" name="btn_reg" id="logingomb">Sign up</button>
                 </div>




                 
             </form>
         </div>

         <div class="form-loginout sign-in-loginout urlap">
             <form action="" method="POST">
                 <div id="title">
                     <h1 class="title">Sign in</h1>
                 </div>
                 <div class="input-signin">
                     <input type="text" value="<?php if (isset($_POST['usernameperemail'])) {
                                                    echo $_POST['usernameperemail'];
                                                } ?>" id="validUsernameperEmail" name="usernameperemail" required="required" />
                     <label for="validUsernameperEmail">Username or Email</label>

                     <div class="bar"></div>
                 </div>
                 <div class="input-signin">
                     <input type="password" name="loginpassword" id="validPassword" required="required" />
                     <label for="#{label}">Password</label>

                     <div class="bar"></div>
                 </div>
                 <?php if ($hiba == 3) { ?>

                 <?php } ?>
                 <!-- <input type="email" placeholder="Username or Email" />
                    <input type="password" placeholder="Password" /> -->
                 <!-- <a href="#">Forgot your password?</a>
                    <button class="signgomb">Sign In</button>  -->
                 <div class="button-signin">
                     <button id="logingomb" type="submit" name="login">Sign in</button>
                 </div>
                 
                 <div class="footer"><a href="<?php echo $baseUrl?>/forgotpassword">Forgot password?</a></div>
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
     <!--Telefonos signin-->
     <div class="mobilesign urlap">
         <div class="row mobilebuttons">
             <button class="col-6 btn" disabled id="mobileSignIn">Sign in</button>
             <button class="col-6 btn" id="mobileSignUp">Sign up</button>
         </div>
         <!--signin-->
         <form class="mobilsignin" id="mobilsignin" action="" method="POST">
             <div id="title">
                 <h1 class="title">Sign in</h1>
             </div>
             <div class="input-signin">
                 <input type="text" value="<?php if (isset($_POST['usernameperemail'])) {
                                                echo $_POST['usernameperemail'];
                                            } ?>" id="validUsernameperEmail" name="usernameperemail" required="required" />
                 <label for="validUsernameperEmail">Username or Email</label>
                 <div class="bar"></div>
             </div>
             <div class="input-signin">
                 <input type="password" name="loginpassword" id="validPassword" required="required" />
                 <label for="#{label}">Password</label>
                 <div class="bar"></div>
             </div>
             <?php if ($hiba == 3) { ?><?php } ?>
             <div class="button-signin">
                 <button id="logingomb" type="submit" name="login">Sign in</button>
             </div>
         </form>
         <!--signup-->
         <form class="mobilsignup eltunes" id="mobilsignup" action="" method="POST">
                 <div id="title">
                     <h1 class="title">Sign up</h1>
                 </div>
                 <div class="input-signin">
                     <input type="text" id="#{label}" name="username" required="required" value="<?php if (isset($_POST['username'])) {
                                                                                                        echo $_POST['username'];
                                                                                                    } ?>" />
                     <label for="#{label}">Username</label>
                     <div class="bar"></div>
                 </div>
                 <div class="input-signin">
                     <input type="text" id="#{label}" name="name" required="required" value="<?php if (isset($_POST['name'])) {
                                                                                                    echo $_POST['name'];
                                                                                                } ?>" />
                     <label for="#{label}">Name</label>
                     <div class="bar"></div>
                 </div>
                 <div class="input-signin">
                     <input type="email" id="#{label}" name="email" required="required" value="<?php if (isset($_POST['email'])) {
                                                                                                    echo $_POST['email'];
                                                                                                } ?>" />
                     <label for="#{label}">Email</label>
                     <div class="bar"></div>
                 </div>
                 <div class="input-signin">
                     <input type="password" id="#{label}" name="jelszo" required="required" />
                     <label for="#{label}">Password</label>
                     <div class="bar"></div>
                 </div>
                 <div class="input-signin">
                     <input type="password" name="jelszoujra" id="#{label}" required="required" />
                     <label for="#{label}">Password again</label>
                     <div class="bar"></div>
                 </div>
                 <div class="button-signin">
                     <button type="submit" class="<?php if (isset($jelszohibauzenet) && $usernamehibauzenet != '' && $emailHibauzenet != '') echo 'mt-1';
                                                    else {
                                                        echo 'mt-4';
                                                    } ?>" name="btn_reg" id="logingomb">Sign up</button>
                 </div>
                 <div class="footer"><a href="https://en.wikipedia.org/wiki/Stupidity">Forgot password</a></div>
             </form>
     </div>
 </div>


 <script>
     const signUpButton = document.getElementById('signUp');
     const signInButton = document.getElementById('signIn');
     const loginout = document.getElementById('loginout');
     
     const mobileSignUpButton = document.getElementById('mobileSignUp');
     const mobileSignInButton = document.getElementById('mobileSignIn');
     const mobilsignup = document.getElementById('mobilsignup');
     const mobilsignin = document.getElementById('mobilsignin');

    //rendes nézet váltása
     signUpButton.addEventListener('click', () => {
         loginout.classList.add("right-panel-active");
     });
     signInButton.addEventListener('click', () => {
         loginout.classList.remove("right-panel-active");
     });

     //mobil nézet váltása
     mobileSignUpButton.addEventListener('click', () => {
        mobilsignin.classList.add("eltunes");
        mobilsignup.classList.remove("eltunes");
        document.getElementById('mobileSignUp').disabled = true;
        document.getElementById('mobileSignIn').disabled = false;
     });
     mobileSignInButton.addEventListener('click', () => {
        mobilsignup.classList.add("eltunes");
        mobilsignin.classList.remove("eltunes");
        document.getElementById('mobileSignIn').disabled = true;
        document.getElementById('mobileSignUp').disabled = false;
     });     

 </script>