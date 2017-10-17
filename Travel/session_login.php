<?php session_start(); ?>

<?php
// from in class example

function reject($entry)
{
  echo 'Please <a href="login.php"> Log In</a>';
  exit();    // exit the current script, no value is returned
}

function alert($msg){
  echo "<script type='text/javascript'>alert('$msg')</script>";
}

$username = $password = NULL;

if (($_SERVER["REQUEST_METHOD"] == "POST")) {

  if (empty($_POST['username']) || empty($_POST['password']))
  echo 'Username and Password are invalid. Please <a href="login.php"> try again.</a>';
  else
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);



  if ($username != NULL && $password != NULL)
  {
    if (isset($_POST['username']))
    {
      $username = trim($_POST['username']);
      $_SESSION['username'] = $username;
      $_SESSION['loggedin'] = TRUE;

      // relocate the browser to another page using the header() function to specify the target URL
      header('Location: map.php');

    }
    else
    header('Location: login.php');
  }

}

?>
