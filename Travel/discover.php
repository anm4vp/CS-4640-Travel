<?php session_start(); ?>

<!DOCTYPE HTML>

<html>
<head>
  <title>Travel</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
  <!-- Header -->
  <nav class="nav">
    <ul>
      <li><a class="active" href="index.php">Travel Website</a></li>
      <li><a class="active" href="map.php">Back To Map</a></li>

      <li style="float:right"><a href="#" class="icon fa-user-circle"> Login</a></li>
      <li style="float:right"><a href="signup.php" class="icon fa-users"> Sign Up</a></li>
      <div class="search">
        <li style="float:right">
          <span class="fa fa-search"></span>
          <input type="text" placeholder="Search...">
        </li>
      </div>
    </ul>
  </nav>

  <!-- Body -->
  <script>
    function alertChosen() {
      alert("You chose this destination!");
    }
  </script>
  <div class="test">
    <div class="section-buttons">
      <div class="box"><span class="box-text" >Where do you want to go?</span></div>
      <div class="box"><span class="box-text">Where do you want to stay?</span></div>
      <div class="box"><span class="box-text">How do you want to get there?</span></div>
      <div class="box"><span class="box-text">What do you want to eat?</span></div>
    </div>
    <div class="container content">
      <div class="col-xs-2 filter-box">
        <h2 class="filter-text">Filter</h2>
        <hr>
        <h4 class="filter-text">Maximum Price</h4><br>
        <form method='post' id='priceform' action="">
          <input type='checkbox' name='maxprice[]' value='500' id="filter"> $500<br>
          <input type='checkbox' name='maxprice[]' value='1000' id="filter"> $1000<br>
          <input type='checkbox' name='maxprice[]' value='2000' id="filter"> $2000<br>
          <input type='checkbox' name='maxprice[]' value='3000' id="filter"> $3000<br>
          <input type='checkbox' name='maxprice[]' value='4000' id="filter"> $4000<br>
          <input type='checkbox' name='maxprice[]' value='5000' id="filter"> $5000<br>
          <input type='checkbox' name='maxprice[]' value='6000' id="filter"> $6000<br>
          <input type="submit" name="submit" value="submit">
        </form>

        <!-- Make sure only one box is checked at a time -->
        <script>
        $('input[type="checkbox"]').on('change', function() {
           $(this).siblings('input[type="checkbox"]').prop('checked', false);
        });
        </script>
        <?php
          if(isset($_POST['submit'])){
            if(empty($_POST['maxprice'])){
              echo "Did not properly select a maximum price, try again.";
            }
            else {
              $maxprice = $_POST['maxprice'];
              foreach ($maxprice as $value)
              {
                  $_SESSION['maxprice'] = $value;
              }
            }
          }
         ?>
        <hr>
      </div>
      <div>
        <?php
        if (isset($_SESSION['maxprice']))
          {
           $maxprice = $_SESSION['maxprice'];
           echo "<p>Filters: Maximum Price: $$maxprice</p>";
         }
         ?>
     </div>
      <?php
        $divStyle=''; // show div
        $price = 2000;
        if (isset($_SESSION['maxprice']))
          {
          $maxprice = $_SESSION['maxprice'];
          if($price > $maxprice){
            $divStyle='style="display:none;"'; //hide div
          }
        }
        print'
        <div '.$divStyle.' class="col-xs-9 card" onclick="alertChosen()">
          <div class="container">
            <h4><b>Hawaii - United States</b></h4>
            <p>Price: $'.$price.'</p>
            <p>Visit the volcanic islands, surf the great swells, and enjoy the local customs.</p>
          </div>
        </div>';
      ?>
      <?php
        $divStyle=''; // show div
        $price = 400;
        if (isset($_SESSION['maxprice']))
          {
          $maxprice = $_SESSION['maxprice'];
          if($price > $maxprice){
            $divStyle='style="display:none;"'; //hide div
          }
        }
        print'
        <div '.$divStyle.' class="col-xs-9 card" onclick="alertChosen()">
          <div class="container">
            <h4><b>The Grand Canyon - Arizona, United States </b></h4>
            <p>Price: $'.$price.'</p>
            <p>Raft the spectacular river, hike along the South Rim, and enjoy this natural wonder.</p>
          </div>
        </div>';
        ?>
        <?php
          $divStyle=''; // show div
          $price = 1500;
          if (isset($_SESSION['maxprice']))
            {
            $maxprice = $_SESSION['maxprice'];
            if($price > $maxprice){
              $divStyle='style="display:none;"'; //hide div
            }
          }
          print'
          <div '.$divStyle.' class="col-xs-9 card" onclick="alertChosen()">
            <div class="container">
              <h4><b>Machu Pichu, Peru</b></h4>
              <p>Price: $'.$price.'</p>
              <p>Visit the miraculous ruins of the Inca Empire.</p>
            </div>
          </div>';
        ?>
      <?php
        $divStyle=''; // show div
        $price = 5000;
        if (isset($_SESSION['maxprice']))
          {
          $maxprice = $_SESSION['maxprice'];
          if($price > $maxprice){
            $divStyle='style="display:none;"'; //hide div
          }
        }
        print'
          <div '.$divStyle.' class="col-xs-9 card" onclick="alertChosen()">
            <div class="container">
              <h4><b>Pyramids of Giza, Giza, Egypt</b></h4>
              <p>Price: $'.$price.'</p>
              <p>One of the Seven Wonders of the World, visit these monuments to the ancient world. </p>
            </div>
          </div>';
      ?>
      <?php
        $divStyle=''; // show div
        $price = 4000;
        if (isset($_SESSION['maxprice']))
          {
          $maxprice = $_SESSION['maxprice'];
          if($price > $maxprice){
            $divStyle='style="display:none;"'; //hide div
          }
        }
        print'
      <div '.$divStyle.' class="col-xs-9 card" onclick="alertChosen()">
        <div class="container">
          <h4><b>The Eiffel Tower, Paris, France</b></h4>
          <p>Price: $'.$price.'</p>
          <p>See the most famous structure in Paris as it twinkles at night.</p>
        </div>
      </div>';
      ?>
  </div>

  <!-- Footer  -->
  <footer id="footer">

    <p class="right">Designed by <br> Adrienne & Karley</p>
    <div class="left">
      <table>
        <tr>
          <th>Contact Us</th>
        </tr>
        <tr>
          <td>Phone Number </td>
          <td>555-555-5555</td>
        </tr>
        <tr>
          <td>Address</td>
          <td>100 Engineering Way</td>
        </tr>
      </table>
    </div>
    <center>
      <a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a>
      <a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a>
      <a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a>
      <a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a>
      <a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a>
      <ul class="copyright">
        <li>&copy; Travel</li>
      </ul>
    </center>
  </footer>


</body>
</html>
