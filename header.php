<?php
   session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
   <title>Ephemeris - Personal Online Journal</title>
   <!-- update Style for Website Tabs-->
   <link rel="stylesheet" href="css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="utf-8">
</head>

<body>
   <header class="main-header">
      <nav class="nav">
         <ul>
            <li><a href='index.php'>Home</a></li>
            <li><a href='write_page.php'>Write</a></li>
            <li><a href='entry_history.php'>Your Entries</a></li>

         </ul>
         <div class="account-slot">
            <!-- form will send the user to a php file that will determine if the user is the correct user to log in-->
            <?php
               //Checks if session variables are available or if somebody is logged in
               if (isset($_SESSION['userID'])) {
                  echo '<form action="includes/logout_inc.php" method = "post">
                        <button type="submit" name="logout-submit">Logout</button>
                              </form>';}
               else {
                  echo '<a class="signup-button" href="signup.php">Signup</a>
                  <form action="includes/login_inc.php" method = "post">
                           <input type="text" name="mailuid" placeholder="Username/E-mail">
                           <input type="password" name="pwd" placeholder="Password">
                           <button type="submit" name="login-submit">Login</button>
                        </form>
                        ';}
            ?>
         </div>
      </nav>
      <h1>Ephemeris - Personal Online Journal</h1>
   </header>
</body>
</html>
