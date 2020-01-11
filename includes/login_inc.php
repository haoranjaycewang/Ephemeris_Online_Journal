<?php
//Script to handle the login
   if (isset($_POST['login-submit'])) {
      require 'dbh_inc.php';
      //Grab data from user when they hit signup button and assign them to variables
      $mailuid = $_POST["mailuid"];
      $password = $_POST["pwd"];

      if (empty($mailuid) || empty($password)) {
         //Send uesr back to signup page with error Message
         header("Location: ../index.php?error=emptyfields");
         exit();
      } else {
         //Check if there is a corresponding credential in the database
         $sql = "SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?;";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlError");
            exit();
         } else {
            mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //Checks if we actually got a result from the query
            if ($row = mysqli_fetch_assoc($result)) {
               //Check password
               $pwdCheck = password_verify($password,$row["pwdUsers"]);
               if ($pwdCheck == false) {
                  header("Location: ../index.php?error=wrongCredentials");
                  exit();
               } else if ($pwdCheck == true) {
                  //Need to start a session and a session variable for the user who just logged in
                  session_start();
                  $_SESSION["userID"] = $row["idUsers"];
                  $_SESSION['userUID'] = $row['usernameUsers'];
                  header("Location: ../index.php?login=success");
                  exit();

               } else {
                  header("Location: ../index.php?error=noUser");
                  exit();
               }
            } else {
               header("Location: ../index.php?error=noUser");
               exit();
            }

         }
      }


   } else {
      header("Location: ../index.php");
      exit();
   }
