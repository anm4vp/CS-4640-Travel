<?php session_start(); ?>

<html>
<head>
  <title>Create An Account</title>
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
      <li><a class="active" href="index.php">Travel Website</a></li>
      <li><a class="active" href="map.php">Back To Map</a></li>
      <li>
        <?php
        if(isset($_SESSION['loggedin'])){
          if ($_SESSION['loggedin'] == TRUE){
            $username = $_SESSION['username'];
            print '<li><a class="welcome-text">Welcome '.$username.' !</a></li>';


          }
        } else {
          echo '<li><p>Session not Working</p></li>';

        }
       ?>
     </li>
      <li style="float:right"><a href="login.php" class="icon fa-user-circle"> Login</a></li>
    </ul>
  </nav>


  <!-- Sign Up -->
    <center><h1> Sign Up </h1></center>
    <div class="container">
    <div class="signup">
      <form method="POST" name="signup" action="newuserquery.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" required>

        <label for="pw">Password:</label>
        <input type="password" id="pw"name="pw" pattern=".{6,}" title="Six or more characters" placeholder="Enter Password" required>

        <label for="pw">Repeat Password:</label>
        <input type="password" id="pw2"name="pw2" pattern=".{6,}" title="Six or more characters" placeholder="Repeat Password" required>

        <label for="First">First Name:</label>
        <input type="text" id="First"name="FirstName" pattern="^[A-Za-z]+$" title="First name not valid" placeholder="Enter First Name"required>

        <label for="Last">Last Name:</label>
        <input type="text" id="Last" name = "LastName" pattern="^[A-Za-z]+$" title="Last name not valid"placeholder="Enter Last Name" required>

        <label for="Email">E-mail:</label>
        <input type="text" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter E-mail Address" required>

        <input type="checkbox" checked="checked"> Remember me
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <center><input onclick="formValidation()" type="submit" name="Submit" value="Create Account"></center>
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

<!-- Script -->

<!-- Form Validation-->
<script type="text/javascript">
function formValidation(){
  var pw = document.signup.pw;
  var pw2 = document.signup.pw2;

  if(!pwVal(pw, pw2)){
    return false;
  }
  return true;
}

function pwVal(pw, pw2){
  if(pw.value != pw2.value) {
    alert("Passwords must be the same");
    pw.focus();
    pw2.focus();
    return false;
  } else if (pw.value.length > 30){
    alert("Passwords length invalid");
    pw.focus();
    pw2.focus();
    return false;
  }
  return true;
}
</script>

</body>
</html>
