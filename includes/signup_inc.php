<?php
//This is the Script that will be referenced when the user hits the signup button on the signup page

//TO-DO Update to a fancy error handler

   //Check if the user actually clicked the submit button to access this page
   if (isset($_POST['Signup-submit'])) {
      require 'dbh_inc.php';

      //Grab data from user when they hit signup button and assign them to variables
      $username = $_POST['uid'];
      $email = $_POST['mail'];
      $password = $_POST['pwd'];
      $passwordCheck = $_POST['pwd_repeat'];

      //Error Handlers
      //Check if all signup forms are filled
      if (empty($username) || empty($email) || empty($password) || empty($passwordCheck)) {
         //Send uesr back to signup page with error Message
         header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
         //Exit this script if error
         exit();
      }
      //If both username and email are invalid
      else if (!preg_match("/^[a-zA-Z0-9]*$/",$username) && !filter_var($email,FILTER_VALIDATE_EMAIL)) {
         header("Location: ../signup.php?error=invalid_uid_email");
         exit();
      }
      //Checks If user gives invalid $email, FILTER_VALIDATE_EMAIL is php builtin
      else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
         header("Location: ../signup.php?error=invalid_email&uid=".$username);
         exit();
      }
      //Checks for valid Username for invalid characters and such, [] is what is allowed
      else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
         header("Location: ../signup.php?error=invalid_uid&mail=".$email);
         exit();
      }
      //if two password fields are not the same
      else if ($password !== $passwordCheck){
         header("Location: ../signup.php?error=passwordcheck&mail=".$email."&uid=".$username);
         exit();
      }
      //Check if username already exists
      else {
         //Use prepared statements to prevent SQL injection attacks, ?=placeholder
         $sql = "SELECT usernameUsers FROM users WHERE usernameUsers=?";
         $stmt = mysqli_stmt_init($conn); //$conn is from the dbh_inc file
         //Check if statement Failed
         if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
         }
         else {
            //Run sql statement with info from user ($stmt is which statement we want to bind the info from the users to)("s" is the datatype we want to pass in for each ? in the $sql statement ??='ss')
            mysqli_stmt_bind_param($stmt,"s",$username);
            //Execute into database
            mysqli_stmt_execute($stmt);
            //Stores result back into $stmt
            mysqli_stmt_store_result($stmt);
            //Check how many rows we get back
            $result_check = mysqli_stmt_num_rows($stmt);
            if ($result_check > 0) {
               header("Location: ../signup.php?error=userTaken&mail=".$email);
               exit();
            } else { //else insert the new username using ??? as placeholders again for security
               $sql = "INSERT INTO users (usernameUsers,emailUsers,pwdUsers) VALUES (?,?,?)";
               $stmt = mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql)){
                  header("Location: ../signup.php?error=sqlerror");
                  exit();
               } else {
                  //Hash password for security
                  $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
                  mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd);
                  mysqli_stmt_execute($stmt);
                  //After they have just created their account, send them back with success message
                  header("Location: ../signup.php?signup=success");
                  exit();
               }
            }
         }
      }
      //Close connections
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
   } else { //If user illegally got to this page send back to signup page
      header("Location: ../signup.php");
      exit();
   }
