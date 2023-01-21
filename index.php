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
@$nom=$_POST['nom'];
@$prenom=$_POST['prenoms'];
@$tel=$_POST['tel'];
@$mail=$_POST['mail'];
if (!empty($_POST)) {
	if (isset($nom, $prenom, $tel, $mail) && !empty($nom) && !empty($prenom) && !empty($tel) && !empty($mail)
	) {
		//on va donc chercher à enregistrer les données dans notre db
		//code sql
		$sqlRequest = "INSERT INTO `liste`(`nom`, `prenom`, `tel`, `mail`) VALUES (:nom, :prenom, :tel, :mail)";
		//on va préparer la variable
		$query=$conn->prepare($sqlRequest);
		//on injecte les valeurs dans la base de donner
		$query->bindValue(":nom", $nom, PDO::PARAM_STR);
		$query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
		$query->bindValue(":tel", $tel, PDO::PARAM_STR);
		$query->bindValue(":mail", $mail, PDO::PARAM_STR);
		if (!$query->execute()) {
			die('Une erreur est survenu');
		}
		//affichons le numéro de la personne
		@$id = $conn->lastInsertId();
	}else{
		
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="simplon.css">
	<link rel="stylesheet" href="simp.css">
	<title>SIMPLON FORMULAIRE</title>
</head>
<body style="background-color: #DBDBDB; font-family: Nunito Sans">
	<div id="banner">
		<img src="banner.jpg" width="100%" height="180px">
	</div>
	<article>
		<div id="titre">
			<h1><span>Bienvenu à SIMPLON CI</span><br/>veiller renseigner le formulaire soigneusement</h1>
		</div>
		<div id="formulaire">
			<!--On vas commencer avec les formulaire à renseigner-->
			<form method="post" action="">
				<input type="text" name="nom" placeholder="Nom" >
				<input type="text" name="prenoms" placeholder="Prénoms">
				<input type="tel" name="tel" placeholder=" Tel (0708050604)" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required>
				<input type="email" name="mail" placeholder="xyz@exemple.com">
				<input type="submit" value="envoyer">
				<div>
					<style>
						a{
							border: 1px solid black;
							width: 300px;
							height: 15px;
							margin: 10px 35% 10px 40%;
							text-decoration: none;
							color: #f9f9f9;
							background-color: #ce0033;
							transition-duration: 1s;
							border-radius: 3px;
							padding: 1px 8px;
						}
						a:hover{
							color: #f9f9f9;
							background-color: #AB002A;
						}
						@media (max-width:600px){
							a{
								width: 100px;
								margin: 10px 27%;
							}
						}
					</style>
					<a href="simplon.php">liste des participants</a>
				</div>
				<?php 
				//on remet une condition- pour empècher que la notice sur id n'affiche et pour que le méssage s'affiche uniquement après la validation du formulaire
				 if (!empty($_POST)) {
					if (isset($nom, $prenom, $tel, $mail) && !empty($nom) && !empty($prenom) && !empty($tel) && !empty($mail)
				) { echo " <style> p{text-align:center; color:blue;}</style> <p>vous êtes le numéro $id à s'être renseigner.<p>";
				}else{
					echo " <style> p{text-align:center; color:red;}</style> <p>Veiller renseigner tout les champs!!!!<p>";
				}
				} ?>
			</form>
		</div>
	</article>
	<footer>
		<!--<div id="copy"> copyright &copy SIMPLON CI</div>-->
	</footer>

</body>
</html>