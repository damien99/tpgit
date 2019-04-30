<!DOCTYPE html>
<html>
  <head>
    <title>Familles et id relatif</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style/style.css" id="mycss"/>
	<link <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

	<?php
	include('includes/header.inc.php');
	require ('includes/fonctions.php');
     $bdd=getBdd();
    // requête qui récupère les familles
    $ch='SELECT * FROM Famille ORDER BY nomResp, prenomResp';
    $req=$bdd->query($ch);
    $familles=$req->fetchAll();
    ?>
    <section>
    <FORM action="formFam.php" method="post">
    <h2>Choisir une famille pour l'ajout d'un enfant </h2>
    <SELECT name="choix">

    <?php
    if ($familles){
        foreach ($familles as $res){ //si il existe des familles
            echo '<OPTION value="'.$res['idFamille'].'" >'.$res['NomResp'].' '.$res['prenomResp'].'</OPTION>';
        }
    }
    echo '<OPTION value="creer" >Créer une nouvelle famille</OPTION>';
    ?>
    </SELECT>

	<INPUT type="submit" value="Valider" name="valider"/>
	</form>
	</section>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
