<?php
require 'dbh_inc.php';
if (isset($_POST['submitDelete-button']) && isset($_POST['keyToDelete'])) {
   $entryID = $_POST['keyToDelete'];
   $deleteQuery = "DELETE FROM entries WHERE entry_id = ?;";
   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt,$deleteQuery)){
      header("Location: ../entry_history.php?error=sqldeleteerror");
      exit();
   } else {
      mysqli_stmt_bind_param($stmt,"i",$entryID);
      mysqli_stmt_execute($stmt);
      header("Location: ../entry_history.php?delete=success");
      exit();
   }
}
 ?>
