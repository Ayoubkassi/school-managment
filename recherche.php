<?php
	session_start();
	$username = $_SESSION['Username'] ; 
	include 'init.php';

	?>


	<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Nouveau</title>
  <link rel="stylesheet" href="./resources/css/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style type="text/css">
  	.container{
  		max-width: 800px;
  		margin: 0 auto;
  	}
  	img{
  		width: 50px;
  		height: 50px;
  		border-radius: 50%;
  	}
  	a{
  		text-decoration: none;
  		color: white;
  	}
  	.bat{
  		width: 150px;
  	}

  	.bo{
  		display: flex;
  		justify-content: center;
  		align-items: center;
  		flex-direction: column;
  	}


  </style>
</head>
<body>
	<div class="container mt-4">
				<h1 class="text-center mb-4">Recherche Contact</h1>
				<form action="detail.php" method="POST">
					<div class="bo">
					<div class="col-md-12 mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" id="exampleInputEmail1" aria-describedby="emailHelp">
	</div>
	  <button type="submit" name="save" class="btn btn-primary bat">Recherche</button>
	</div>

				</form>

	<div>
 
</body>
</html>