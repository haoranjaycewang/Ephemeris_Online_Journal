<?php
   require "header.php";
   include_once 'includes/dbh_inc.php';
?>
<link rel="stylesheet" href="css/style.css">
<main>
   <div id="entry_table" style="overflow:auto; height:400px;width:1200px;margin:auto;text-align:center;">

   <table align="center" border="1px" style="width:1150px;line-height: 40px;">
      <tr>
         <th colspan="5"><h2>Entry History</h2></th>
      </tr>
      <t>
         <th>Month</th>
         <th>Day</th>
         <th>Year</th>
         <th>Entry</th>
         <th>Delete</th>
      </t>
      <?php
         $sql = "SELECT entry_id,month, day, year, entry FROM entries WHERE userid = ? ;";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../entry_history.php?error=sqlError");
            exit();
         } else {
            mysqli_stmt_bind_param($stmt,"s",$_SESSION['userUID']);
            mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         #Check if the query returned any results
         $resultCheck = mysqli_num_rows($result);
         if ($resultCheck > 0) {
            #Insert each row of data into the $row variable
            while($row = mysqli_fetch_assoc($result)) {
         ?>
            <tr>
               <form action="includes/deleteEntry_inc.php"  method="post" role="form">
                  <td><?php echo $row['month'] ?></td>
                  <td><?php echo $row['day'] ?></td>
                  <td><?php echo $row['year'] ?></td>
                  <td><?php echo $row['entry'] ?></td>
                  <td>
                     <input type="checkbox" name="keyToDelete" value="<?php echo $row['entry_id'];?>">
                  </td>
                  <td>
                     <input type="submit" name="submitDelete-button" class="btn btn-info">
                  </td>
               </form>
            </tr>
   <?php
         }
      }
   }
    ?>
   </table>
   </div>
</main>

<?php
   require "footer.php";
?>
