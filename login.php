<?php
    session_start();
   include'ponction.php';
    foreach( Users() as $U){
        if($_POST['email']==$U['email'] && $_POST['pwd']==$U['pwd']){
            $_SESSION['nom']=$U['nom_prenom'];
            $_SESSION['id']=$U['id'];
            $_SESSION['role']=$U['role'];
            header('location: index.php');
            break;
        }else{
            header('location: connexion.php');
        }
    }

?>
