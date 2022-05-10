<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>


<!-- lien redirect login -->

    <hr class="divider">

    <div>
    <p class="clickonlog"><a href="Log.php">Inscrivez-vous ici</a>.</p>       
    </div>
    <?php 
        if(empty($_COOKIE['id'])) { // Redirection si la personne n'est pas connecté
            $_SESSION['message']='Veuillez vous inscrire ou vous connecter pour accéder à cette rubrique';
            header('location: log.php');
        } else { // Si la personne est connectée on lui affiche la page 

    ?>

<!-- POUR SE DECONNECTER -->
    <?php if(empty($_COOKIE['id'])) { 
                 $user = null;
                 } elseif(isset($_COOKIE['id'])) {
                include("db/connexionPDO.php");
                $id = $_COOKIE['id'];
                $req = $bdd->prepare('SELECT * FROM Users WHERE id= :id');
                $req-> execute(array('id'=>$id));
                $user = $req->fetch();
                echo '<div id="hello"><span>Bonjour '.$user['prenom'].' !&nbsp;&nbsp;</span>';
                echo '<a class="logout" href="Traitement/traitementDeconnexion.php"> Deconnexion </a></div>';
             } ?>
    </body>
</html>
<?php } ?>