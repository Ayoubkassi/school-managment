<?php
	session_start();
	$username = $_SESSION['Username'] ; 
	include 'init.php';

	 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
	 	$nom  = $_POST["nom"];
	 	$prenom = $_POST["prenom"];
	 	$profession = $_POST["profession"];
	 	$ville = $_POST["ville"];
	 	$tel= $_POST["tel"];
	 	$mail = $_POST["mail"];
	 	$adresse = $_POST["adresse"];
	 	$avatarName = $_FILES['image']['name'];
        $avatarSize = $_FILES['image']['size'];
        $avatarTmp  = $_FILES['image']['tmp_name'];
        $avatarType = $_FILES['image']['type'];

        // List Of Allowed File Typed To Upload

        $avatarAllowedExtension = array("jpeg", "jpg", "png", "gif");

        // Get Avatar Extension

        $avatarExtension = explode('.', $avatarName);
        $avatarExtension = strtolower(end($avatarExtension));

        // Validate The Form

        $formErrors = array();

        if (empty($nom)) {
          $formErrors[] = 'Nom Cant Be <strong>Empty</strong>';
        }

        if (empty($prenom)) {
          $formErrors[] = 'Prenom Cant Be <strong>Empty</strong>';
        }

        if (empty($profession)) {
          $formErrors[] = 'Profession Cant Be <strong>Empty</strong>';
        }

        if (empty($ville)) {
          $formErrors[] ='ville Cant Be <strong>Empty</strong>';
        }
        

        if (empty($tel)) {
          $formErrors[] = 'Telephone Cant Be <strong>Empty</strong>';
        }


        if (empty($mail)) {
          $formErrors[] = 'Mail Cant Be <strong>Empty</strong>';
        }

        if (empty($adresse)) {
          $formErrors[] = 'Adresse Cant Be <strong>Empty</strong>';
        }
        

        if (! empty($avatarName) && ! in_array($avatarExtension, $avatarAllowedExtension)) {
          $formErrors[] = 'This Extension Is Not <strong>Allowed</strong>';
        }

        if (empty($avatarName)) {
          $formErrors[] = 'Image Is <strong>Required</strong>';
        }

        if ($avatarSize > 4194304) {
          $formErrors[] = 'Avatar Cant Be Larger Than <strong>4MB</strong>';
        }

        // Loop Into Errors Array And Echo It

        foreach($formErrors as $error) {
          echo '<div class="alert alert-danger" style="max-width:700px;">' . $error . '</div>';
        }

        // Check If There's No Error Proceed The Update Operation

        if (empty($formErrors)) {

          $avatar = rand(0, 10000000000) . '_' . $avatarName;

          $source_path = $avatarTmp;

		  $target_path = 'up/' . $_FILES["image"]["name"];

		  move_uploaded_file($source_path,$target_path);

          $stmt = $con->prepare("INSERT INTO contact VALUES(NULL,'$username','$nom','$prenom','$profession','$ville','$tel','$mail','$adresse','$avatarName')");
          $stmt->execute();
          if($stmt == true){
            echo "Félicitation livre ajouté";
                header('Location: index.php');
          }
          else{
            echo "Error of creation";
          }


			 

	}
}




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
  </style>
</head>
<body>
	<div class="container mt-4">
				<h1 class="text-center mb-4">Nouveau Contact</h1>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
  <div class="mb-2">
  	<div class="row">
  		<div class="col-md-6">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" id="exampleInputEmail1" aria-describedby="emailHelp">
	</div>
	<div class="col-md-6">
		 <label for="exampleInputPassword1" class="form-label">Prenom</label>
    <input type="text" class="form-control" name="prenom" id="exampleInputPassword1">
	</div>

	</div>
  </div>

  

   <div class="mb-3">
    <label for="profession" class="form-label">Profession</label>
    <input type="text" class="form-control" name="profession" id="profession" aria-describedby="emailHelp">
  </div>
  <div class="mb-2">
  <select class="form-select form-select-lg mb-3" name="ville" aria-label="Default select example">
  <option selected>Choisissez une ville</option>
  <?php 
  $rows = getVilles();
  echo $rows;
  	foreach ($rows as $row) {
  		echo '
  		<option value="'.$row["id_ville"].'">'.$row["lib_ville"].'</option>
  		';
  	}
  ?>
</select>
</div>

<div class="mb-2">
	<div class="row">
  		<div class="col-md-6">
    <label for="tel" class="form-label">Telephone</label>
    <input type="text" class="form-control" name="tel" id="tel" aria-describedby="emailHelp">
	</div>

	<div class="col-md-6">
		<label for="mail" class="form-label">Mail</label>
    <input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelp">
	</div>


  </div>

  
  <div class="mb-2">
    <label for="adresse" class="form-label">Adresse</label>
    <input type="text" class="form-control" name="adresse" id="adresse" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Photo</label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
  </div>

  <button type="submit" name="save" class="btn btn-primary">Enregistrer</button>
</form>


	<div>
 
</body>
</html>