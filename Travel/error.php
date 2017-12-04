<html>
<head>
  <title>Login</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
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

  <!--  Header  -->
  <nav class="nav">
    <ul>
      <li><a class="active" href="http://localhost:8089/TravelDyno/index.html">Travel Website</a></li>
      <li><a class="active" href="map.php">Back To Map</a></li>
      <?php
      if(isset($_SESSION['loggedin'])){
        if ($_SESSION['loggedin'] == TRUE){
          $username = $_SESSION['username'];
          print '<li><a class="welcome-text">Welcome '.$username.' !</a></li>';


        }
      } else {
        // echo '<li><p>Session not Working</p></li>';
      }
     ?>
     <li style="float:right"><a href="signup.php" class="icon fa-users"> Sign Up </a></li>
    </ul>
  </nav>

  <!-- Header -->
  <center>
  <div id="header-wrapper">
    <h2>Error! Login Not Valid. Please Try Again.</h2>
    <div id="header" class="container">
  </center>

  <!-- Log In -->
    <center><h1> Log In </h1></center>
    <div class="container">
    <div class="login">
      <form method="POST" name="login" action="session_login.php">
        <center>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" >


      </br>
        <label for="pw">Password:</label>
        <input type="password" id="password"name="password" placeholder="Enter Password" >
      </center>

        <center><input  type="submit" name="Submit" value="Log In"></center>
    </form>
  </div>
</div>

</br></br>

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
