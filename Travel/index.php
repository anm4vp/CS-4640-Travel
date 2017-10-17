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

  <script>
  function setFocus()
  {
    document.forms[0].elements[0].focus();
  }
  </script>
</head>

<body onload="setFocus()">
  <!-- Header -->
  <nav class="nav">
    <ul>
      <li><a class="active" href="index.php">Travel Website</a></li>
       <?php
       if(isset($_SESSION['loggedin'])){
         if ($_SESSION['loggedin'] == TRUE){
           $username = $_SESSION['username'];
           print '<li><a class="welcome-text">Welcome '.$username.' !</a></li>';

           echo '<li style="float:right"><a href="logout.php" class="icon fa-user-circle"> Logout</a></li>';
         }
       } else {
         echo '<li><p>Session not Working</p></li>';
         echo '<li style="float:right"><a href="login.php" class="icon fa-user-circle"> Login</a></li>';
         echo '<li style="float:right"><a href="signup.php" class="icon fa-users"> Sign Up</a></li>';
       }
      ?>
     <div class="search">
       <li style="float:right">
         <span class="fa fa-search"></span>
         <input type="text" placeholder="Search...">
       </li>
     </div>
   </ul>
  </nav>

  <center><h1> Select a Region You Would Like to Visit </h1></center>

  <!-- Map Image-->
  <a href="discover.php"><img src="images/world_map.png" width=100% height=100%></img></a>

  <!-- Modal -->
  <div id="Map" class="modal">
    <span onclick="document.getElementById('Map').style.display='none'" class="close" title="Close Modal">×</span>
    <form method="post" name="start" class="modal-content animate" action="map.php">
      <div class="container">
        <center>
          <h2><font color="white">Welcome to Travel Website</font></h2>
          <form method="POST" name="tripname" action="map.php">
            <input type="text" id="trip"onclick="document.getElementById('Map').style.display='none'"  name="trip" placeholder="Name Your Trip" required></h2>
            <input type="submit" value="Start Your Journey">
          </form>
        </center>
      </div>
    </form>
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

  <!-- Script -->
  <script>
  var modal = document.getElementById('Map');
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>

</body>
</html>
