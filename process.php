<?php

// start session
session_start();

// Connect to database
$mysqli = new mysqli('localhost', 'emmy', '@Emmanuel2295', 'crud') or die(mysqli_error($mysqli));

// Check if the save button has been pressed
if(isset($_POST['save'])){
  // store input in variables
  $name = $_POST['name'];
  $location = $_POST['location'];


  // Insert record into databse
  $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

  // Set session message and type for saving records
  // Set session message and type for deleting records
  $_SESSION['message'] = "Record has been saved!";
  $_SESSION['msg_type'] = "success";

  // Redirect users back to index.php
  header("location: index.php");
}

// Check if the delete button has been clicked
if(isset($_GET['delete'])){
  $id = $_GET['delete'];

  // Delete record from database
  $mysqli->query("DELETE From data WHERE id=$id") or die($mysqli->error);

  // Set session message and type for deleting records
  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

  // Redirect users back to index.php
  header("location: index.php");
}

















