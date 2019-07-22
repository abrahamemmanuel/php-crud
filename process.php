<?php

// Connect to database
$mysqli = new mysqli('localhost', 'emmy', '@Emmanuel2295', 'crud') or die(mysqli_error($mysqli));

// Check if the save button has been pressed
if(isset($_POST['save'])){
  // store input in variables
  $name = $_POST['name'];
  $location = $_POST['location'];


  // Insert record into databse
  $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);


}


















