<!DOCTYPE html>
<html>
  <head>
    <title>Familles et id relatif</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css" id="mycss"/> 
    <link <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
  <section>
  <?php
    include('includes/header.inc.php');
    ?>
  <h2>Les visites et l'enfant concerné</h2>
    <?php
    require ('includes/fonctions.php');
    $bdd=getBdd();
    // requêtes de sélection des visites
    $ch='SELECT v.* , nomEnf, prenomEnf FROM visite v INNER JOIN enfant f ON v.idEnfant=f.idEnfant AND v.idFamille=f.idFamille WHERE datev>=now() ORDER BY datev';
    $req=$bdd->query($ch);
    $visites=$req->fetchAll();
    if ($visites){
    // affichage des visites
    foreach ($visites as $vis){
            echo '<span>'. $vis['datev'].'</span><span class="c">'.$vis['prenomEnf'].'</span><span class="c">'.$vis['nomEnf'].'</span><BR/>';
    }
    }
    else echo '<h3>pas de visites...</h3>';
    ?>
    </div>
    </section>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
