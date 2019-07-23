<?php

// start session
session_start();

// Set name and loaction to empty strings
$name = '';
$location = '';

// Connect to database
$mysqli = new mysqli('localhost', 'emmy', '@Emmanuel2295', 'crud') or die(mysqli_error($mysqli));

// Check if the save button has been pressed
if(isset($_POST['save'])){
  // store input in variables
  $name = $_POST['name'];
  $location = $_POST['location'];


  // INSERT RECORD INTO DATABASE
  $mysqli->query("INSERT INTO data (name, location) VALUES('$name', '$location')") or die($mysqli->error);

  // Set session message and type for saving records
  $_SESSION['message'] = "Record has been saved!";
  $_SESSION['msg_type'] = "success";

  // Redirect users back to index.php
  header("location: index.php");
}


// DELETE RECORD FROM DATABASE
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



// EDIT RECORD FROM IN DATABASE
// Check if the edit variable has been clicked
if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
  // Check if record exist
  if(mysqli_num_rows($result)==1){
    $row = $result->fetch_array();
    $name = $row['name'];
    $location = $row['location'];
  }
}