<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_erreurs.php");
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);

        if (!is_array($visiteur)) {
            ajouterErreur("Login ou mot de passe incorrect");
            include("vues/v_erreurs.php");
            include("vues/v_connexion.php");
        } else {
            $id = $visiteur['id'];
            $nom = $visiteur['nom'];
            $prenom = $visiteur['prenom'];
            $isComptable = $visiteur['isComptable'];
            connecter($id, $nom, $prenom, $isComptable);
            echo "<script>window.location.href = 'index.php?uc=connexion&action=accueil';</script>";
        }
        break;
	}
	case 'accueil':{
		if($_SESSION['idVisiteur']) {
			include("vues/v_accueil.php");
		} else {
			//TODO Use toastr to display error notification
			echo "<script>window.location.href = 'index.php?uc=connexion&action=demandeConnexion';</script>";
		}
		break;
	}
	case 'deconnecter':{
		session_destroy();
		echo "<script>window.location.href = 'index.php';</script>";
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>