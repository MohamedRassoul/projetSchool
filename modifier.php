<?php
    include'ponction.php';
    if(!isset($_SESSION['id'])){
        header('location: connexion.php' );
    }
?>
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
    <center><h2>Ajouter un étudiant</h2></center>
	<div id="divform" >

		<?php 
			if(isset($_POST['modifier'])){
				AfficherEtudiant(
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
			<form action="liste_etudiant.php?id=<?php echo $_GET['id'];?>" method="POST">
            <?php 
                    foreach(AfficherEtudiant() as $AE){
    
                ?>
				<input type="radio" <?php if($AE['sexe']=='Mr'){ echo 'checked'; } ?> value="Mr" name="sexe"  > Mr
				<input type="radio" <?php if($AE['sexe']=='Mme'){ echo 'checked'; } ?> value="Mme" name="sexe" > Mme
				<input type="radio" value="Mlle" <?php if($AE['sexe']=='Mlle'){ echo 'checked'; } ?> name="sexe" > Mlle
				
                
				<table border="0" width="100%">
					<tr>
						<td>Nom</td>
						<td>
							<input class="formstyl" value="<?php echo $AE['nom'] ?>" placeholder="Saisissez votre nom" name="nom" type="text"  required/>
						</td>
						<td>Langue</td>
						<td>
							<select name="langue" class="formstyl" required>
								<option><?php echo $AE['langue'] ?></option>
								<option>Français</option>
								<option>Arabe</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Prénom</td>
						<td>
							<input class="formstyl" value="<?php echo $AE['prenom'] ?>" placeholder="Saisissez votre prénom" name="prenom" type="text" required/>
						</td>
						<td>Groupe</td>
						<td>
							<select class="formstyl"  name="groupe" required>
								<option><?php echo $AE['groupe'] ?></option>
								<option>A</option>
								<option>B</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Date de naissance</td>
						<td>
							<input name="date_de_naissance" class="formstyl" value="<?php echo $AE['date_de_naissance'] ?>" type="date" required/>
						</td>
						<td>Salle</td>
						<td>
							<select class="formstyl" name="salle" required>
								<option><?php echo $AE['salle'] ?></option>
								<option>1</option>
								<option>2</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Téléphone</td>
						<td>
							<input name="telephone" type="tel" class="formstyl" value="<?php echo $AE['telephone'] ?>" required/>
						</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
							<input name="email" type="email" class="formstyl" value="<?php echo $AE['email'] ?>" required/>
						</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Date d'inscription</td>
						<td>
							<input name="date_inscription" type="date" class="formstyl" value="<?php echo $AE['date_inscription'] ?>" required/>
						</td>
						<td></td>
						<td><input type="submit" name="modifier" value="Modifier" class="formstyl" id="formstyl" ></td>
					</tr>
				</table>
                <?php } ?>
			</form> 
	</div>
</body>
</html>