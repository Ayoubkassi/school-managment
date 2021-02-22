<?php
	session_start();
	$username = $_SESSION['Username'] ; 
	include 'init.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
		$do= isset($_GET['do']) ? $_GET['do'] : 'Manage';
 		 if($do == 'Manage'){

		$nom = $_POST["nom"];
		$row = getInfo($nom);
		
		if(is_array($row) ){
		
	?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Detail</title>
  <link rel="stylesheet" href="./resources/css/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style type="text/css">
  	.container{
  		max-width: 1000px;
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
  	a:hover{
  		text-decoration: none;
  		color: white;
  	}

  	.na{
  		display: flex;
  		justify-content: center;
  	}
  	.han{
  		text-align: center;
  		margin-top: 30px;
  	}
  </style>
</head>
<body>
	<div class="container mt-4">
				<h1 class="text-center mb-4">Contact</h1>




	<div class="mb-2">
 	<div class="row">
  		<div class="col-md-6">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" value="<?php echo $row['nom'] ?>" name="nom" id="exampleInputEmail1" aria-describedby="emailHelp">
	</div>
	<div class="col-md-6">
		 <label for="exampleInputPassword1" class="form-label">Prenom</label>
    <input type="text" class="form-control" value="<?php echo $row['prenom'] ?>" name="prenom" id="exampleInputPassword1">
	</div>

	</div>
  </div>

  

   <div class="mb-3">
    <label for="profession" class="form-label">Profession</label>
    <input type="text" class="form-control" value="<?php echo $row['profession'] ?>" name="profession" id="profession" aria-describedby="emailHelp">
  </div>
  <div class="mb-2">
  <select class="form-select form-select-lg mb-3" name="ville" aria-label="Default select example">
  <option selected><?php  echo getVille($row['id_ville']); ?></option>
  <?php 
  $rows = getVilles();
  echo $rows;
  	foreach ($rows as $rowa) {
  		echo '
  		<option value="'.$rowa["id_ville"].'">'.$rowa["lib_ville"].'</option>
  		';
  	}
  ?>
</select>
</div>

<div class="mb-2">
	<div class="row">
  		<div class="col-md-6">
    <label for="tel" class="form-label">Telephone</label>
    <input type="text" class="form-control" value="<?php echo $row['tel'] ?>" name="tel" id="tel" aria-describedby="emailHelp">
	</div>

	<div class="col-md-6">
		<label for="mail" class="form-label">Mail</label>
    <input type="email" class="form-control" value="<?php echo $row['mail'] ?>" name="mail" id="mail" aria-describedby="emailHelp">
	</div>


  </div>
  <input type="hidden" name="id" value="<?php echo $row['id_contact'] ?>" />

  
  <div class="mb-2">
    <label for="adresse" class="form-label">Adresse</label>
    <input type="text" class="form-control" name="adresse" value="<?php echo $row['adresse'] ?>" id="adresse" aria-describedby="emailHelp">
  </div>


<div class="na">
  <button type="submit" name="save" class="btn btn-primary mr-2"><a href="detail.php?do=Edit&id=<?php echo $row['id_contact'] ?>">Enregistrer</a></button>
  <button type="submit" name="save" class="btn btn-danger">Supprimer</button>

<div>













	<?php 
}
else{
	echo "<h1 class='han'>Contact non trouvé</h1>";
	header('refresh:1;url = recherche.php');
}
}
else if($do == 'Edit'){
	echo "hoooooooooooooooooooooo";
}
}

	?>
