<?php session_start(); ?>

<?php
// from in class example

function reject($entry)
{
  echo 'Please <a href="signup.php">Sign Up</a>';
  exit();    // exit the current script, no value is returned
}

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
  if (isset($_POST['username']))
  {
    $username = trim($_POST['username']);
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = TRUE;

    // relocate the browser to another page using the header() function to specify the target URL
    header('Location: session_get.php');

  }
  else
  header('Location: signup.php');
}
?>
