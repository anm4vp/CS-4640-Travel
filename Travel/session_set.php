<?php session_start(); ?>

<?php
// from in class example

function reject($entry)
{
   echo 'Please <a href="signup.php">Sign Up</a>';
   exit();    // exit the current script, no value is returned
}

if (isset($_POST['username']))
{
   $username = trim($_POST['username']);
  //  if (!ctype_alnum($user))   // ctype_alnum() check if the values contain only alphanumeric data
  //     reject('User Name');
  //
  //  if (isset($_POST['pwd']))
  //  {
  //     $pwd = trim($_POST['pwd']);
  //     if (!ctype_alnum($pwd))
  //        reject('Password');
  //     else
  //     {
         $_SESSION['username'] = $username;

         // relocate the browser to another page using the header() function to specify the target URL
         header('Location: session_get.php');
  //     }
  //  }
}
else
   header('Location: signup.php');

?>
