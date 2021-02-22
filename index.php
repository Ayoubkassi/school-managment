<?php
	session_start();
	include 'init.php';

	$stmt = $con->prepare("SELECT * FROM contact");
	$stmt->execute();
	$rows=$stmt->fetchAll();

	?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>HOME</title>
  <link rel="stylesheet" href="./resources/css/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style type="text/css">
  	img{
  		width: 50px;
  		height: 50px;
  		border-radius: 50%;
  	}
  	a{
  		text-decoration: none;
  		color: white;
  	}

  	a:hover{
  		text-decoration: none;
  		color: white;
  	}
  </style>
</head>
<body>
	<div class="container mt-4">
		<h1 class="text-center mb-4">Liste des Contacts</h1>
		<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Profession</th>
      <th scope="col">ville</th>
      <th scope="col">Tel</th>
      <th scope="col">Mail</th>
      <th scope="col">Adresse</th>
      <th scope="col">Photo</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	foreach ($rows as $row) {
  		echo '
  	<tr>
      <td>'.$row["nom"].'</td>
      <td>'.$row["prenom"].'</td>
      <td>'.$row["profession"].'</td>
      <td>'.getVille($row["id_ville"]).'</td>
      <td>'.$row["tel"].'</td>
      <td>'.$row["mail"].'</td>
      <td>'.$row["adresse"].'</td>
      <td><img src="./up/'. $row["photo"] .'"></td>
    </tr>
  		'
  		;
  	}

  	 ?>
  </tbody>
</table>

	<div class="card mt-4">
  <div class="card-body">
    <div class="row">
    	<div class="col-md-2">
    		<button type="button" class="btn btn-primary"><a href="nouveau.php">NOUVEAU</a></button>
    	</div>
    	<div class="col-md-2">
			<button type="button" class="btn btn-primary"><a href="recherche.php">MODIFIER</a></button>
    	</div>
    	<div class="col-md-2">
    		<button type="button" class="btn btn-primary"><a href="recherche.php">SUPPRIMER</a></button>
    	</div>
    	<div class="col-md-2">
    		<button type="button" class="btn btn-primary"><a href="recherche.php">RECHERCHE</a></button>
    	</div>
    	<div class="col-md-2">
    		<button type="button" class="btn btn-primary"><a href="">Liste des Contact</a></button>
    	</div>

    </div>
  </div>
</div>

	<div>
 
</body>
</html>