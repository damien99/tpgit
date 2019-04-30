<?php
try{
    $message="";
    $class='erreur'; // class du message passé par l'url pour le style
    require('includes/fonctions.php');
    $bdd=getBdd();
    // test des données saisies
    $class='erreur'; // par défaut les messages sont des messages d'erreur
    if (empty($_POST['nom'])){
        $message='Le+nom+doit+être+saisi. ';
    }
    if (empty($_POST['prenom'])){
        $message.='Le+prenom+doit+être+saisi. '; // concaténation des messages d'erreur
    }
    if ($message==""){// si aucun champ vide
        // recherche du numéro de l'enfant
        $ch='SELECT MAX(idEnfant)as "num" FROM enfant WHERE idFamille='.$_POST['idF'];
        $req=$bdd->query($ch);
        $res=$req->fetch();
        if ($res)
            $id=$res['num']+1;
        else $id=1;
        // Insertion du membre à l'aide d'une requête préparée
        $req=$bdd->prepare('INSERT INTO enfant (idEnfant,nomEnf,prenomEnf,dateNaiss,idFamille)
        VALUES(?,?,?,?,?)');
        $res=$req->execute(
        array($id,$_POST['nom'],$_POST['prenom'], $_POST['dateN'], $_POST['idF']));
        if ($res){
            $message='Ajout+réussi.';
            $class='info';
            }
            else{
                $message='Echec+de+l\'+ajout.';
                }

        $req->closeCursor();
    }
    // Redirection vers la page d'accueil
    header("Location:index.php?message=$message&class=$class");
}catch ( Exception $e)
{
die ('Erreur : ' . $e -> getMessage ());    /* die indique l'arrêt de l'exécution de la page en affichant un
message correspondant à l'exception levée */
}
?>
