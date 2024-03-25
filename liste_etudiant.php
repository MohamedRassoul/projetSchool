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
        <form action="recherche.php" method="POST">
            <table>
                <tr>
                    <td> <input type="text" name="champ_msg" placeholder="Nom de famille"> </td>
                    <td> <input type="submit" value="Rechercher" name="msg" class="recherche"> </td>
                </tr>
            </table>
        </form>
</section>

    <center><h2>La liste des étudiants</h2></center>
	<div id="divform" >

		<?php 
			if(isset($_POST['modifier'])){
				ModifierEtudiants(
					$_POST['sexe'],
					$_POST['nom'],
					$_POST['prenom'],
					$_POST['date_de_naissance'],
					$_POST['telephone'],
					$_POST['email'],
					$_POST['date_inscription'],
					$_POST['langue'],
					$_POST['groupe'],
					$_POST['salle']
				);
			}
			
		?>
        <br>
        <?php 
            if(isset($_GET['idSupp'])){
                SupprimerEtudiants();
            }
        ?>

<table border="1" width="100%">
    <tr>
        <th>sexe</th>
        <th>Nom et Prénom</th>
        <th>Date de naissance</th>
        <th>Téléphone</th>
        <th>E-mail</th>
        <th>Date d'inscription</th>
        <th>Langue</th>
        <th>Groupe</th>
        <th>Salle</th>
        <th style="background-color: green;">Mod</th>
        <th style="background-color: red;">Sup</th>
    </tr>
    <?php
       foreach(AfficherEtudiants() as $AC){
        ?>
        <tr>
        <td><?php echo $AC['sexe']; ?></td>
            <td><?php echo $AC['nom']. " " . $AC['prenom']; ?> </td>
            <td><?php echo $AC['date_de_naissance']; ?></td>
            <td><?php echo $AC['telephone']; ?></td>
            <td><?php echo $AC['email']; ?></td>
            <td><?php echo $AC['date_inscription']; ?></td>
            <td><?php echo $AC['langue']; ?></td>
            <td><?php echo $AC['groupe']; ?></td>
            <td><?php echo $AC['salle']; ?></td>
            <td> <a href="modifier.php?id=<?php echo $AC['id']?>" style="color: green;">Mod</a></td>
            <td> <a href="liste_etudiant.php?idSupp=<?php echo $AC['id']; ?>"style="color: red;">Sup</a></td>
        </tr>
      <?php } ?>
                

        
</table>
</body>
</html>