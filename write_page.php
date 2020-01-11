<?php
   require "header.php"
?>

<main>
   <h3 style="text-align:center;">Make sure to date your entry! </h3>
   <h3 style="text-align:center;">Note: Your current entry will be wiped if you attempt to submit without loging in first!</h3>
   <?php
      //$_GET checks for a string inside the url
      if (isset($_GET['error'])) {
         if ($_GET['error'] == 'no_login') {
            echo '<p class="signup-error">Please login first before making an entry</p>';
         } else if ($_GET['error'] == 'empty_entry') {
            echo '<p class="signup-error">An empty entry cannot be submitted!</p>';
         }
      } else if (isset($_GET['entry'])) {
         if ($_GET['entry'] == 'success'){
            echo '<p style="text-align:center;">Entry Submitted!</p>';
         }
      }

    ?>
   <form class="entry-page" action="includes/write_inc.php" method="post">
      <div class="date-selector">
         <select class="month-1" name="month-1">
            <option value=1>January</option>
            <option value=2>February</option>
            <option value=3>March</option>
            <option value=4>April</option>
            <option value=5>May</option>
            <option value=6>June</option>
            <option value=7>July</option>
            <option value=8>August</option>
            <option value=9>September</option>
            <option value=10>October</option>
            <option value=11>November</option>
            <option value=12>December</option>
         </select>
         <select class="day-1" name="day-1">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
            <option value=6>6</option>
            <option value=7>7</option>
            <option value=8>8</option>
            <option value=9>9</option>
            <option value=10>10</option>
            <option value=11>11</option>
            <option value=12>12</option>
            <option value=13>13</option>
            <option value=14>14</option>
            <option value=15>15</option>
            <option value=16>16</option>
            <option value=17>17</option>
            <option value=18>18</option>
            <option value=19>19</option>
            <option value=20>20</option>
            <option value=21>21</option>
            <option value=22>22</option>
            <option value=23>23</option>
            <option value=24>24</option>
            <option value=25>25</option>
            <option value=26>26</option>
            <option value=27>27</option>
            <option value=28>28</option>
            <option value=29>29</option>
            <option value=30>30</option>
            <option value=31>31</option>
         </select>
         <select class="year-1" name="year-1">
            <option value=2018>2018</option>
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
            <option value=2022>2022</option>
            <option value=2023>2023</option>
            <option value=2024>2024</option>
            <option value=2025>2025</option>
            <option value=2026>2026</option>
            <option value=2027>2027</option>
            <option value=2028>2028</option>
         </select>
         <br><br>
         <textarea class="entry-field"name="entry-field" rows="20" cols="80" placeholder="Thoughts go here!"></textarea>
            <br>
         <button type="submit" name="entry-submit">Submit Entry!</button>
      </div>
   </form>
</main>

<?php
   require "footer.php"
?>
