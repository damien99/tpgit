<!DOCTYPE html>
<html>
  <head>
    <title>Familles et id relatif</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style/style.css" id="mycss"/>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
     <script type="text/javascript" src="monJs.js"></script>
  </head>

  <body>
  <?php
	include('includes/header.inc.php');
	?>
    <section>
  <h2>Les familles et leurs enfants</h2>
	<?php
	require ('includes/fonctions.php');
	$bdd=getBdd();
	$ch='SELECT * FROM Famille ORDER BY nomResp, prenomResp';
	$req=$bdd->query($ch);
	$familles=$req->fetchAll();
	if ($familles){
	?>
	<div id="lesFamilles">
	<BR/>
	<span>Nom du responsable</span><span class="c">Prénom</span><span class="c">Ville</span><BR/><BR/>
	<?php
		foreach ($familles as $res){
			?>
			<div>
			<?php echo '<img src="images/moins.jpg" name="moins" onclick="afficher(this);"/> <span>Famille n°'.$res['idFamille'].': </span>';
			echo '<span>'.$res['NomResp'].'</span><span class="c">'.$res['prenomResp'].'</span><span class="c">'.$res['ville'].'</span><BR/>';
			$ch='SELECT * FROM enfant WHERE idFamille='.$res['idFamille'].' ORDER BY nomEnf, prenomEnf';
			$req=$bdd->query($ch);
			$enfants=$req->fetchAll();
			echo '<ul>';
			foreach ($enfants as $enf){
			echo '<li class="e"><span>'.$res['idFamille'].'  '.$enf['IdEnfant'].'</span><span class="c">'.$enf['NomEnf'].'</span><span class="c">'.$enf['PrenomEnf'].'</span>
			</li>';
			}
			echo '</ul></div>';
		}
	?>
	<?php
	}
	else echo '<h3>pas de famille...</h3>';
	?>
	</div>
	</section>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
