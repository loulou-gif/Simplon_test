<?php
//connection à la base de donnée
try {
    $conn = new PDO('mysql:host=localhost;dbname=id20178707_simplon_db;charset=utf8',
    'id20178707_kadk27',
    '764bP/jp7]_hQWy}'
);
} catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
}
?> 
<?php
//requette sql pour recuppérer tous les élément de la table
$sql='SELECT * FROM liste';

$printList = $conn->prepare($sql);
//exécution de la requete sql

$printList->execute();

$listes = $printList->fetchall();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="simplon.css">
    <link rel="stylesheet" href="simp.css">
    <title></title>
</head>
<body style="background-color: #DBDBDB; font-family: Nunito Sans">
	<div id="banner">
		<img src="banner.jpg" width="100%" height="180px">
	</div>
	<div id="body">
		<div id="table">
			<h1>
				LISTE DES PARTICIPANTS
			</h1>
			<table>
				<thead>
        			<tr>
            			<th id="ID">ID</th>
            			<th class="Id">PRENOM</th>
            			<th class="Id">NOM</th>
            			<th class="Id">TEL</th>
            			<th class="Id">MAIL</th>
        			<tr>
    			</thead>
    			<tbody>
    				<?php foreach ($listes as $liste): ?>
        			<tr>
        		    	<td class="ID"><?= $liste["user_id"] ?></td>
            			<td class="id"><?= $liste["prenom"] ?></td>
            			<td class="IDs"><?= $liste["nom"] ?></td>
            			<td class="IDs"><?= $liste["tel"] ?></td>
            			<td class="id"><?= $liste["mail"] ?></td>
        			<tr>
    				<?php endforeach; ?>
    			</tbody>
			</table>
			<div>
				<style>
					a{
						border: 1px solid black;
						width: 300px;
						height: 15px;
						margin: 10px 33% 10px 45%;
						text-decoration: none;
						color: white;
						background-color: blue;
						border-radius: 2px;
					}
					a:hover{
						color: whithe;
						background-color: darkblue;
					}
					@media (max-width:600px){
						a{
							width: 100px;
							margin: 10px 27%;
						}
					}
				</style>
				<a href="index.php">retour au formulaire</a>
			</div>
		</div>
	</div>	
</body>
</html>