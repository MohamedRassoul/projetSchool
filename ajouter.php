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
        <div class="menu active"><a href="ajouter.php">Ajouter</a></div>
        <div class="menu">Paiements</div>
        <div class="menu">Absence</div>
        <?php if($_SESSION['role']=='Administrateur'){ ?><div class="menu">Paramètres</div> <?php }else{ ?><div class="menu">Mon Compte</div> <?php } ?>
    </div>
    <center><h2>Ajouter un étudiant</h2></center>
	<div id="divform" >
		<?php 
			if(isset($_POST['enregistrer'])){
				AjouterEtudiant(
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
			<form action="ajouter.php" method="POST">
				<input type="radio" checked value="Mr" name="sexe" > Mr
				<input type="radio" value="Mme" name="sexe" > Mme
				<input type="radio" value="Mlle" name="sexe" > Mlle
				
				<table border="0" width="100%">
					<tr>
						<td>Nom</td>
						<td>
							<input class="formstyl" placeholder="Saisissez votre nom" name="nom" type="text"  required/>
						</td>
						<td>Langue</td>
						<td>
							<select name="langue" class="formstyl" required>
								<option>Choisissez une langue</option>
								<option>Français</option>
								<option>Arabe</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Prénom</td>
						<td>
							<input class="formstyl" placeholder="Saisissez votre prénom" name="prenom" type="text" required/>
						</td>
						<td>Groupe</td>
						<td>
							<select class="formstyl" name="groupe" required>
								<option>Choisissez un Groupe</option>
								<option>A</option>
								<option>B</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Date de naissance</td>
						<td>
							<input name="date_de_naissance" class="formstyl" type="date" required/>
						</td>
						<td>Salle</td>
						<td>
							<select class="formstyl" name="salle" required>
								<option>Choisissez une salle</option>
								<option>1</option>
								<option>2</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Téléphone</td>
						<td>
							<input name="telephone" type="tel" class="formstyl" required/>
						</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
							<input name="email" type="email" class="formstyl" required/>
						</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Date d'inscription</td>
						<td>
							<input name="date_inscription" type="date" class="formstyl" required/>
						</td>
						<td></td>
						<td><input type="submit" name="enregistrer" value="Enregistrer" class="formstyl" id="formstyl" ></td>
					</tr>
				</table>
			</form>
		
	</div>


	<br><br><br>

	<table border="1" width="70%" style="margin: 0 auto;">
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
            </tr>
          <?php } ?>
            
    </table>
</body>
</html>