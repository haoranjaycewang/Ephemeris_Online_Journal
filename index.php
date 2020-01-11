<?php
   require "header.php";
?>


   <main>
      <div class="wrapper-main">
         <section class="section-default">
            <?php
               //Checks if session variables are available or if somebody is logged in
               if (isset($_SESSION['userID'])) {
                  echo '<h3 class="login-status">You are logged in!</h3>';
               }
             ?>
         </section>
         <section>
            <p> Welcome to Ephemeris (latin for diary/journal), your very own online journal.</p>
            <p>
               Here, you can write diary entries, jot down ideas that may come about on a daily basis, or to simply type out whatever may be on your mind. We offer you an easy and simple organizational system that lets you search and view your past entries and export them in a text file so that you can digitally share your thoughts to distant friends, family, or whomever else you desire.
            </p>
            <p> To get started, sign up a new account at the top-right corner so that you can access your journal at anytime, anywhere (with internet access). Or login to an existing account and continue to let your thoughts run free.
            </p>
         </section>

      </div>
      <div class="footer-note">
            Created by Haoran (Jayce) Wang. Source Code available on Github
      </div>
      <h2></h2>
   </main>




<?php
   require "footer.php";
?>
