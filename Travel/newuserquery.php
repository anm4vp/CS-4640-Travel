<?php

# Connet to DB
$db = new mysqli('localhost', 'root', '', 'Travel');
if ($db->connect_error):
  die ("Could not connect to db: " . $db->connect_error);
endif;

$username = $_POST["username"];
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$email = $_POST['Email'];
$password = $_POST['pw'];

$query = "insert into Users values ('$username', '$firstname', '$lastname', '$email', '$password')";
$db->query($query) or die ("Invalid insert " . $db->error);
session_start();
$_SESSION['username'] = $_POST["username"];
$_SESSION['loggedin'] = TRUE;

header('Location: session_get.php');

?>
