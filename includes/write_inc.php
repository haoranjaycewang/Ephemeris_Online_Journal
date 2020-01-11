<?php
   session_start();
   if (isset($_SESSION['userUID'])) {
      require 'dbh_inc.php';
      //Grab data
      $month = $_POST['month-1'];
      $day = $_POST['day-1'];
      $year = $_POST['year-1'];
      $entry = $_POST['entry-field'];
      $user = $_SESSION['userUID'];
      //Check if blank entry
      if (empty($entry)){
         header("Location: ../write_page.php?error=empty_entry");
         exit();
      } else {
         $sql = "INSERT INTO entries (userid,month,day,year,entry) VALUES (?,?,?,?,?)";
         $stmt = mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../write_page.php?error=sqlerror");
            exit();
         } else {
            mysqli_stmt_bind_param($stmt,"siiis",$user,$month,$day,$year,$entry);
            mysqli_stmt_execute($stmt);
            header("Location: ../write_page.php?entry=success");
            exit();
         }
      }
      //Close connections
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
   } else {
      header("Location: ../write_page.php?error=no_login");
      exit();
   }
