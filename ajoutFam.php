<?php
try{
    $message="";
    $class='erreur'; // class du message passé par l'url pour le style
    require('includes/fonctions.php');
    $bdd=getBdd();
    // test des données saisies
    $class='erreur'; // par défaut les messages sont des messages d'erreur
    if (empty($_POST['nomR'])){
        $message='Le+nom+doit+être+saisi. ';
    }
    if (empty($_POST['prenomR'])){
        $message.='Le+prenom+doit+être+saisi. '; // concaténation des messages d'erreur
    }
    if (empty($_POST['tel'])){
        $message.='Le+téléphone+doit+être+saisi. ';
        }

    if ($message==""){// si aucun champ vide et mdp égaux
        // Insertion du membre à l'aide d'une requête préparée
        $req=$bdd->prepare('INSERT INTO famille (nomResp,prenomResp,rue,cp,ville,tel)
        VALUES(?,?,?,?,?,?)');
        $res=$req->execute(
        array($_POST['nomR'],$_POST['prenomR'], $_POST['rue'], $_POST['cp'], $_POST['ville'],$_POST['tel']));
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
die ('Erreur : ' . $e -> getMessage ());    // die indique l'arrêt de l'exécution de la page en affichant un
                    // message correspondant à l'exception levée
}
?>
