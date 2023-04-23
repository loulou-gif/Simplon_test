<?php
//on se connecte à notre base de donnée
try {
    $conn = new PDO('mysql:host=localhost;dbname=id20178707_simplon_db;charset=utf8',
    'id20178707_kadk27',
    '764bP/jp7]_hQWy}'
);
} catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
}
//on récupère nos donnée

//on vérifie si le formulaire a été soumis
if (!empty($_POST['nom']) && !empty($_POST['prenoms']) && !empty($_POST['tel']) && !empty($_POST['mail'])) {
	//on récupère les données
	$nom = $_POST['nom'];
	$prenom = $_POST['prenoms'];
	$tel = $_POST['tel'];
	$mail = $_POST['mail'];
	
	//on prépare la requête SQL
	$sqlRequest = "INSERT INTO `liste`(`nom`, `prenom`, `tel`, `mail`) VALUES (:nom, :prenom, :tel, :mail)";
	$query = $conn->prepare($sqlRequest);
	$query->bindValue(":nom", $nom, PDO::PARAM_STR);
	$query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
	$query->bindValue(":tel", $tel, PDO::PARAM_STR);
	$query->bindValue(":mail", $mail, PDO::PARAM_STR);
	
	//on exécute la requête et on vérifie si elle s'est bien déroulée
	if ($query->execute()) {
		//on affiche l'identifiant de la dernière ligne insérée
		$id = $conn->lastInsertId();
		
	} else {
		echo 'Une erreur est survenue lors de l\'enregistrement.';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.tailwindcss.com"></script>
	<title>FORMULAIRE AD JEUNESSE</title>
</head>
<body>
	<article>
			<!--On vas commencer avec les formulaire à renseigner-->
				<div class="form form border border-2 rounded-4 row g-8 mt-20 col-md-6 position-absolute top-25 start-50 translate-middle-x">
					<form method="POST" class="row g-3" class='mx-auto mt-20'>
						<div class='col-md-6 text-3xl text-primary'>
							<h1>S'ENREGISTRER</h1>
						</div>
						<div class="col-md-12">
							<label for="inputText" class="form-label">Nom</label>
							<input type="Text" class="form-control" id="inputText " name="nom"/>
						</div>
						<div class="col-md-12">
							<label for="inputText" class="form-label">Prénom</label>
							<input type="Text" class="form-control" id="inputText" name="prenoms"/>
						</div>
						<div class="col-md-12">
							<label for="inputEmail4" class="form-label">Email</label>
							<input type="email" class="form-control" id="inputEmail4" name="mail"/>
						</div>
						<div class="col-md-12">
							<label for="inputNumber" class="form-label">Numero</label>
							<input type="tel" class="form-control" id="inputNumber" name="tel"/>
						</div>            
						<div class="col-12 ">
							<button class='col-6 btn btn-primary '>S'ENREGISTRER</button>
						</div>
						<div class="text-primary">
				            <?php 
            				//on remet une condition- pour empècher que la notice sur id n'affiche et pour que le méssage s'affiche uniquement après la validation du formulaire
            				 if (!empty($_POST)) {
            					if (isset($nom, $prenom, $tel, $mail) && !empty($nom) && !empty($prenom) && !empty($tel) && !empty($mail)
            				) { echo " <style> p{text-align:center; color:blue;}</style> <p>vous êtes le numéro $id à s'être renseigné.<p>";
            				}else{
            					echo " <style> p{text-align:center; color:red;}</style> <p>Veiller renseigner tout les champs!!!!<p>";
            				}
            				} ?>
				        </div>
						<div class="text-primary mb-10">
					        <a href="simplon.php">liste des participants>></a>
				        </div>
				        
					</form>
				</div>
		</div>
	</article>
	<footer>
		<!--<div id="copy"> copyright &copy SIMPLON CI</div>-->
	</footer>

</body>
</html>
