<!DOCTYPE html>
<html>
<title>Familles et id relatif</title>
	<meta charset="utf-8">
	<link <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style/style.css" id="mycss"/>
<?php
// le titre de l'onglet change change en fonction du choix dans la liste déroulante
// if(vccze != null)
	echo "<title>Ajout d'une famille</title>";
// else
echo "<title>Ajout d'un enfant</title>";
?>
</head>
<body>
<?php require("includes/fonctions.php");
	include('includes/header.inc.php');
?>
<section>
<?php
    // si le choix est de créer une nouvelle famille on affiche le formulaire
	// d'ajout d'une famille
    if (isset($_POST['creer'])) { ?>
	<form method="post" action="ajoutFam.php">
	<div class="form-group">
    <label for="login">Nom resp</label>
    <input type="text" name="nomR" class="form-control" id="nomR" />
	</div>
	<div class="form-group">
	<label for="nom">Prénom resp</label>
	<input type="text" name="prenomR" class="form-control"  id="prenomR" />
	</div>
	<div class="form-group">
	<label for="rue">rue</label>
	<input type="text" name="rue"  class="form-control" id="rue"/>
	</div>
	<div class="form-group">
	<label for="cp">code postal</label>
	<input type="text" name="cp" class="form-control" id="cp"/>
	</div>
	<div class="form-group">
	<label for="ville">ville</label>
	<input type="text" name="ville" class="form-control" id="ville"/>
	</div>
	<div class="form-group">
	<label for="tel">téléphone</label>
	<input type="text" name="tel" class="form-control" id="tel"/>
	</div>
<?php }
else {
	// si l'utilisateur a choisi une famille, on affiche le formulaire
	// d'ajout d'un enfant
	echo '<form method="post" action="ajoutEnf.php">';
	$fam=$_POST['choix'];
	?>
	<div class="form-group">
	<label for="login">Nom enf</label>
	<input type="text" name="nom" id="nom" class="form-control" />
	</div>
	<div class="form-group">
	<label for="nom">Prénom enf</label>
	<input type="text" name="prenom" id="prenom" class="form-control" />
	</div>
	<div class="form-group">
	<label for="dateN">date naissance</label>
	<input type="date" name="dateN" id="dateN" class="form-control" />
	</div>
	<!-- ce champ caché permet de passer l'id de la famille pour l'ordre INSERT -->
	<input type="text" hidden name="idF" id="idF" value="<?php echo $fam;?>"/>
<?php }
	?>
<input type="submit" class="btn btn-primary btn-md" value="Créer <?php if ($_POST['choix']=='creer') echo 'la famille"'; else echo 'l\'enfant';?>"/>
<input type="reset" class="btn btn-primary btn-md" value="Annuler" />

</form>
</section>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</HTML>
