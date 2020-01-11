<?php
   require "header.php"
?>


   <main>
      <h1>Signup</h1>
      <?php
         //$_GET checks for a string inside the url
         if (isset($_GET['error'])) {
            if ($_GET['error'] == 'emptyfields') {
               echo '<p class="signup-error">Please fill in all fields</p>';
            } else if ($_GET['error'] == 'invalid_uid_email') {
               echo '<p class="signup-error">Invalid Username/Email</p>';
            } else if ($_GET['error'] == 'invalid_email') {
               echo '<p class="signup-error">Invalid Email</p>';
            } else if ($_GET['error'] == 'invalid_uid') {
               echo '<p class="signup-error">Invalid Username</p>';
            } else if ($_GET['error'] == 'passwordcheck') {
               echo '<p class="signup-error">Password do not match</p>';
            } else if ($_GET['error'] == 'userTaken') {
               echo '<p class="signup-error">Username is already taken</p>';
            }
         } else if (isset($_GET['signup'])) {
            if ($_GET['signup'] == 'success'){
               echo '<p class="signup-error">Signup Successful!</p>';
            }
         }
       ?>

      <form class='form-signup'action="includes/signup_inc.php" method="post">
         <input type="text" name="uid" placeholder="Username">
         <input type="text" name="mail" placeholder="E-mail">
         <input type="password" name="pwd" placeholder="Password">
         <input type="password" name="pwd_repeat" placeholder="Repeat Password">
         <button type="submit" name="Signup-submit">Signup!</button>
      </form>

   </main>



<?php
   require "footer.php"
?>
