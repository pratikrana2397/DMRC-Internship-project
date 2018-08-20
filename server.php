<?php
session_start();

// initializing variables
$stationid = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost','root','', 'internship');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $stationid = mysqli_real_escape_string($db, $_POST['stationid']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($stationid)) { array_push($errors, "Stationid is required"); }

  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same stationid and/or email
  $user_check_query = "SELECT * FROM users WHERE StationID='$stationid'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['stationid'] === $stationid) {
      array_push($errors, "stationid already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = $password_1;//encrypt the password before saving in the database

    $query = "INSERT INTO users (StationID, Password) 
          VALUES('$stationid', '$password')";
    mysqli_query($db, $query);
    $_SESSION['stationid'] = $stationid;
    $_SESSION['success'] = "You are now logged in";
    header('location: dashboard.php');
  }
}
if (isset($_POST['login_user'])) {

  $stationid = mysqli_real_escape_string($db, $_POST['stationid']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($stationid)) {
    array_push($errors, "Stationid is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

     $query = "SELECT * FROM users WHERE StationID='$stationid' AND Password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['stationid'] = $stationid;
      $_SESSION['success'] = "You are now logged in";
      header('location: dashboard.php');
    }else {
      array_push($errors, "Wrong stationid/password combination");
    }
  
}

?>