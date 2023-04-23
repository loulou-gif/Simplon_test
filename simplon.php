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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.tailwindcss.com"></script>
    <title></title>
</head>
<body class="mt-20">
    <div class="position-absolute top-0 start-50 translate-middle-x col-8 mt-20">
	    <h1 class="text-bg-primary text-center text-2xl rounded-4  mb-10">
				LISTE DES JEUNES DE L'EGLISE
			</h1>
		</div>
	<div id="body" class="border border-2 rounded-4 row g-8 mt-20 col-md-12 position-absolute top-25 start-50 translate-middle-x">
	    
		<div id="table" class='col-md-12  px-4 text-2xl text-primary'>
			<table class="table table-hover table-striped-columns">
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
			<div class="text-primary mt-20">
				<a href="index.php"><<< retour au formulaire</a>
			</div>
		</div>
	</div>	
</body>
</html>
