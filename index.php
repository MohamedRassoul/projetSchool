<?php
    include'ponction.php';
    if(!isset($_SESSION['id'])){
        header('location: connexion.php' );
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon nouveau Projet</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="images/iconfo.svg">
</head>
<body>
    <div class="header">
          <div class="logo">LOGO</div>
          <div class="titre">TITRE</div> 
    </div>
    <div id="conn">
        <div id="user">
            <img src="images/user.png" alt="">
        </div>
        <div id="titre">
            Bienvenue <?php echo $_SESSION['nom'];?>, vous êtes connectés en tant qu'<?php if($_SESSION['role']=='Administrateur'){ ?>administrateur !<?php }else{ echo 'utilisateur !'; } ?>
        </div>
        <div id="deco">
            <a href="deconnexion.php">
            <img src="images/fermer.png" alt="">
            </a>
        </div>
    </div>
    <div id="menu">
        <div class="menu active"><a href="index.php">Accueil</a></div>
        <div class="menu"><a href="ajouter.php">Ajouter</a></div>
        <div class="menu">Paiements</div>
        <div class="menu">Absence</div>
        <?php if($_SESSION['role']=='Administrateur'){ ?><div class="menu">Paramètres</div> <?php }else{ ?><div class="menu">Mon Compte</div> <?php } ?>
    </div>
    <div class="dash">
        <div class="dashIn">
            <div class="val">
            <?php
           foreach(NombreEtudiants() as $NE){
            echo $NE['nbr'];
           }
            ?>
            </div>
            <div class="tit"><a href="liste_etudiant.php">Etudiants</a></div>
        </div>
        <div class="dashIn">
            <div class="val">3</div>
            <div class="tit">Enseignants</div>
        </div>
        <div class="dashIn">
            <div class="val">3</div>
            <div class="tit">Salles</div>
        </div>
        <div class="dashIn supEspace">
            <div class="val">5</div>
            <div class="tit">Groupes</div>
        </div>
    </div>
    <div class="imag"></div>
    <div class="lang">Arabe - Amazigh - Français - Anglais - Allemand</div>
    <div class="footer">
        Votre texte ici
    </div>
</body>
</html>