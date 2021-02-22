<?php
	session_start();

	if (isset($_SESSION['Username'])) {
		header('Location: index.php'); // Redirect To Dashboard Page
	}

	include 'init.php';

	// Check If User Coming From HTTP Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$username = $_POST['login'];
		$password = $_POST['pass'];
		// $hashedpadd=password_hash($password, PASSWORD_DEFAULT);

		// Check If The User Exist In Database

		$stmt = $con->prepare("SELECT 
									 login,pass 
								FROM 
									user
								WHERE 
									login = ? 
								AND 
									pass = ? 
								
								LIMIT 1");

		$stmt->execute(array($username, $password));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();

		// If Count > 0 This Mean The Database Contain Record About This Username

		if ($count > 0) {
			$_SESSION['Username'] = $username; // Register Session Name
			/*$_SESSION['ID'] = $row['UserID']; // Register Session ID*/


			header('Location: index.php'); // Redirect To Dashboard Page
			exit();
		}

	}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>LOGIN</title>
  <link rel="stylesheet" href="./resources/css/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style>
  .container{
	  margin:120px auto;
	  max-width: 600px;
  }
  </style>
</head>
<body>
	<div class="container">
	<form action="" method="POST">
	<h1 class="text-center">LOGIN</h1>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Password</label>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
	<div>
  



 
</body>
</html>
