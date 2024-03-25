<?php
session_start();
function Connexion(){
	try {
	$cnx = new PDO('mysql:host=localhost;dbname=appgestionecole', "root", "");
	} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
	}
		return $cnx;
}

function AjouterEtudiant($sexe, $nom, $prenom, $date_de_naissance, $telephone, $email, $date_inscription, $langue, $groupe, $salle) {
	$cnx = Connexion();
	$req = $cnx->prepare("INSERT INTO `ajouter_etudiant` (`sexe`, `nom`, `prenom`, `date_de_naissance`, `telephone`, `email`, `date_inscription`, `langue`, `groupe`, `salle`) VALUES(?,?,?,?,?,?,?,?,?,?)");
	$req->execute(array($sexe, $nom, $prenom, $date_de_naissance, $telephone, $email, $date_inscription, $langue, $groupe, $salle));
}

function AfficherEtudiants() {
	$cnx = Connexion();
	$req = $cnx->prepare("SELECT * FROM ajouter_etudiant");
	$req->execute();
	return $req->fetchAll();
}

function AfficherRecherche() {
	$cnx = Connexion();
	$nom=$_POST['champ_msg'];
	$req = $cnx->prepare("SELECT * FROM ajouter_etudiant WHERE nom='$nom'" );
	$req->execute();
	return $req->fetchAll();
}

function NombreEtudiants() {
	$cnx = Connexion();
	$req = $cnx->prepare("SELECT count(*) as nbr FROM ajouter_etudiant");
	$req->execute();
	return $req->fetchAll();
}

function Users() {
	$cnx = Connexion();
	$req = $cnx->prepare("SELECT * FROM admins");
	$req->execute();
	return $req->fetchAll();
}

function ModifierEtudiants($sexe, $nom, $prenom, $date_de_naissance, $telephone, $email, $date_inscription, $langue, $groupe, $salle) {
	$id=$_GET['id'];
	$cnx = Connexion();
	$req=$cnx->prepare ("UPDATE ajouter_etudiant SET `sexe`=?, `nom`=?, `prenom`=?, `date_de_naissance`=?, `telephone`=?, `email`=?, `date_inscription`=?, `langue`=?, `groupe`=?, `salle`=? WHERE id='$id'");
    $req->execute(array($sexe, $nom, $prenom, $date_de_naissance, $telephone, $email, $date_inscription, $langue, $groupe, $salle));
}

function SupprimerEtudiants(){
	$cnx = Connexion();
	$id=$_GET['idSupp'];
	$req=$cnx->prepare ("DELETE FROM ajouter_etudiant WHERE id='$id'");
    $req->execute();

}

function AfficherEtudiant() {
	$cnx = Connexion();
	$id=$_GET['id'];
	$req = $cnx->prepare("SELECT * FROM ajouter_etudiant WHERE id='$id'");
	$req->execute();
	return $req->fetchAll();
}
?>