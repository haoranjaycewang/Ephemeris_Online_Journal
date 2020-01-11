<?php
   //File for the DataBase Handler (dbh)
   //If using onine server, use the name of the dashboard of the hosting company
   $servername = "localhost";
   //Databse username and Password
   $db_username = "root";
   $db_password = "";
   $db_name = "login_system_ephemeris";

   $conn = mysqli_connect($servername,$db_username,$db_password,$db_name);

   //Check if connection was successful
   if (!$conn){
      die("Connection Failed: ".mysqli_connect_error());
   }
   
