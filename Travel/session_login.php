<?php session_start(); ?>

<?php

$q = ($_POST['username']);
# Connet to DB
$db = new mysqli('localhost', 'root', '', 'Travel');
if ($db->connect_error):
  die ("Could not connect to db: " . $db->connect_error);
endif;

$sql="SELECT * FROM Users WHERE Username = '".$q."' ";
$result = mysqli_query($db,$sql);

if (empty($_POST['username']) || empty($_POST['password']))
header('Location: error.php');
else
$username = trim($_POST['username']);
$password = trim($_POST['password']);

while($row = mysqli_fetch_array($result)){

  if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    if ($username != NULL && $password != NULL)
    {
      if (isset($_POST['username']))
      {
        $username = trim($row['Username']);
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = TRUE;

        // relocate the browser to another page using the header() function to specify the target URL
        header('Location: http://localhost:8089/TravelDyno/index.html');

      }
      else
      header('Location: login.php');
    }

  }

}




?>
