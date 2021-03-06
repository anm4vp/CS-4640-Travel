<?php session_start(); ?>

<!DOCTYPE HTML>

<html>
<head>
  <title>Travel</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/main.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body ng-app="myApp" ng-controller="myCtrl">
  <!-- Header -->
  <nav class="nav">
    <ul>
      <li><a class="active" href="http://localhost:8089/TravelDyno/index.html">Travel Website</a></li>
      <li><a class="active" href="map.php">Back To Map</a></li>
      <li><a class="active" href="view.html"> Destinations</a></li>
      <li><a class="active" href="user.html"> Users</a></li>
      <?php
      if(isset($_SESSION['loggedin'])){
        if ($_SESSION['loggedin'] == TRUE){
          $username = $_SESSION['username'];
          print '<li><a class="welcome-text">Welcome '.$username.' !</a></li>';
          echo '<li style="float:right"><a href="logout.php" class="icon fa-user-circle"> Logout</a></li>';
        }
      } else {
        // echo '<li><p>Session not Working</p></li>';
        echo '<li style="float:right"><a href="login.php" class="icon fa-user-circle"> Login</a></li>';
        echo '<li style="float:right"><a href="signup.php" class="icon fa-users"> Sign Up</a></li>';
      }
      ?>
      <div class="search">
        <li style="float:right">
          <a href="search.html"><span class="fa fa-search" style="color: white"></span></a>
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
        <h4 class="filter-text-sub">Maximum Price</h4><br>
        <form method='post' id='priceform' action="">
          <input type='checkbox' name='maxprice[]' value='500'><span class="filter"> $500</span><br>
          <input type='checkbox' name='maxprice[]' value='1000'><span class="filter"> $1000</span><br>
          <input type='checkbox' name='maxprice[]' value='2000'><span class="filter"> $2000</span><br>
          <input type='checkbox' name='maxprice[]' value='3000'><span class="filter"> $3000</span><br>
          <input type='checkbox' name='maxprice[]' value='4000'><span class="filter"> $4000</span><br>
          <input type='checkbox' name='maxprice[]' value='5000'><span class="filter"> $5000</span><br>
          <input type='checkbox' name='maxprice[]' value='6000'><span class="filter"> $6000</span><br>
          <input type='checkbox' name='maxprice[]' value='1000000000000'><span class="filter"> All</span><br>
          <input type="submit" name="submit" value="apply">
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

      <h3>List All Desinations:  <input type="checkbox" ng-model="destination"></h3>

      <div ng-show="destination">
        <h4 ng-repeat="x in records">{{x}}</h4>
      </div>

      <script>
      var app = angular.module("myApp", []);
      app.controller("myCtrl", function($scope) {
        $scope.records = [
          "Hawaii",
          "The Grand Canyon",
          "Machu Pichu",
          "Pyramids of Giza",
          "The Eiffel Tower"
        ]
      });
      </script>

      <div class="col-xs-9">
        <?php
        if (isset($_SESSION['maxprice']))
        {
          $maxprice = $_SESSION['maxprice'];
          echo "Filters: Maximum Price: $$maxprice";
        }
        ?>
      </div>
      <div class="col-xs-9">
        <?php
        # Connet to DB
        $db = new mysqli('localhost', 'root', '', 'Travel');
        if ($db->connect_error):
          die ("Could not connect to db: " . $db->connect_error);
        endif;

        $sql = "SELECT `Country`, `Price`, `Description`, `Location` FROM `Destinations` WHERE 1";
        $result = mysqli_query($db,$sql);

        while ($row = $result->fetch_assoc()) {

          $divStyle=''; // show div
          $price = $row['Price'];
          if (isset($_SESSION['maxprice']))
          {
            $maxprice = $_SESSION['maxprice'];
            if($price > $maxprice){
              $divStyle='style="display:none;"'; //hide div
            }
          }
          print'
          <div '.$divStyle.' class="card" >
          <div class="container">
          <div class="login">
          <form method="POST" action="http://localhost:8089/TravelDyno/variables.jsp">
            <h4><b>'.$row['Country'].'</b></h4>
            <input type = "hidden" value="'.$row['Country'].'" name="country">
            <input type = "hidden" value="'.$row['Price'].'" name="price">
            <input type = "hidden" value="'.$row['Description'].'" name="des">
            <input type = "hidden" value="'.$row['Location'].'" name="location">
            <p>Price: $'.$price.'</p>

            <input type="submit" value="Select">
            </form>

            </div>
            </div>
            </div>';
          }
          ?>
            <!-- <h4><b>'.$row['Country'].' - '.$row['Location'].'</b></h4> -->
<!-- <p>'.$row['Description'].'</p> -->
        </div>
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
