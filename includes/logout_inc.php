<?php
   session_start();
   session_unset(); //Deletes all vales inside session variables
   session_destroy();
   header("Location: ../index.php");
