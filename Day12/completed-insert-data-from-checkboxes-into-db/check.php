<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Adding user transportation preferences</title>
  <!---
      * CSS files that are included
      * 
      *
    -->
    <!-- Latest AweSome Font CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Latest Bootstrap compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      
    <!-- jQuery CSS  -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

<!--
 * JavaScript files that are included
 * 
 * 
-->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
      
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  
</head>
<body>

<?php

	include('includes/connectdb.php');

  	$fname = $_POST['firstname'];
  	$lname = $_POST['lastname'];

  

	$userQuery = "INSERT INTO user (firstname, lastname)  VALUES ('$fname', '$lname')";
	mysqli_query($dbc, $userQuery) or die('Error querying database insert into user.');
	$uid = mysqli_insert_id($dbc);


foreach ($_POST['test'] as $oneCheckbox => $checkboxValue) {
    $userTransportationQuery = "INSERT INTO usertransportation (uid, tid) VALUES ('$uid', '$checkboxValue')";
    mysqli_query($dbc, $userTransportationQuery) or die('Error querying database insert into usertransportation.'); 
}
	echo '<div class="wrap">';
	echo  '<div class="container">';
 	echo      '<h4>Thank You for Registering your transportation preferences!</h4>';
	echo      '<button class="btn btn-danger" onclick="goBack()">Go Back</button>';
	echo  '</div>';
	echo '</div>';

	  mysqli_close($dbc);
?>

  <script>
    function goBack() {
    window.history.back();
    }
  </script>
  
