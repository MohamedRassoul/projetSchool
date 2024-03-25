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
        <div class="menu"><a href="index.php">Accueil</a></div>
        <div class="menu"><a href="ajouter.php">Ajouter</a></div>
        <div class="menu">Paiements</div>
        <div class="menu">Absence</div>
        <?php if($_SESSION['role']=='Administrateur'){ ?><div class="menu">Paramètres</div> <?php }else{ ?><div class="menu">Mon Compte</div> <?php } ?>
    </div>
    
    <section >
        <form action="liste_etudiant.php" method="POST">
            <table>
                <tr>
                    <td> <input type="text" name="msg" placeholder="Nom de famille"> </td>
                    <td> <input type="button" value="Rechercher" name="msg" class="recherche" > </td>
                </tr>
            </table>
        </form>
</section>

	<div id="divform" >
		

        <table border="1" width="100%">
            <tr>
                <th>sexe</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Téléphone</th>
                <th>E-mail</th>
                <th>Date d'inscription</th>
                <th>Langue</th>
                <th>Groupe</th>
                <th>Salle</th>
            </tr>

        <?php 
			foreach(AfficherRecherche() as $AR){
                ?> 
                <tr>
                <td><?php echo $AR['sexe']; ?></td>
                    <td><?php echo $AR['nom']; ?> </td>
                    <td><?php echo $AR['prenom']; ?></td>
                    <td><?php echo $AR['date_de_naissance']; ?></td>
                    <td><?php echo $AR['telephone']; ?></td>
                    <td><?php echo $AR['email']; ?></td>
                    <td><?php echo $AR['date_inscription']; ?></td>
                    <td><?php echo $AR['langue']; ?></td>
                    <td><?php echo $AR['groupe']; ?></td>
                    <td><?php echo $AR['salle']; ?></td>
                </tr>
              <?php } ?>
                
