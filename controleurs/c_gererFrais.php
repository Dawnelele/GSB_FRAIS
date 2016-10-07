<?php
include("vues/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
$isComptable = $_SESSION['isComptable'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);

$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
$action = $_REQUEST['action'];
switch($action){
	case 'modifierFiche': {
		$lesFraisForfait= $pdo->getLesFraisForfait($_REQUEST['idVisiteurToUpdate'], $_REQUEST['moisToUpdate']);
		include("vues/v_listeFraisForfait.php");
		break;
	}
	case 'changerEtat': {
		$idNouvelEtat = $_REQUEST['idNouvelEtat'];
		$res = $pdo->majEtatFicheFrais($_REQUEST['requestedIdVisiteur'], $_REQUEST['requestedMonth'], $idNouvelEtat);
		break;
	}
	case 'consulterFrais':{
		if($isComptable){
			$lesEtats = $pdo->getLesEtats();
			$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_REQUEST['requestedIdVisiteur'], $_REQUEST['requestedMonth']);
			$lesFraisForfait= $pdo->getLesFraisForfait($_REQUEST['requestedIdVisiteur'], $_REQUEST['requestedMonth']);
			include("vues/v_consulterFiche.php");
		} else {
			ajouterErreur("Vous n'avez pas accès à cette page");
			include("vues/v_erreurs.php");
		}
		break;
	}
    case 'listeFrais':{
        if($isComptable) {
            $listeVisiteurs = $pdo->getLesVisiteurs();
            $listeMois = array(
                date('Y') . "01" => "Janvier",
                date('Y') . "02" => "Février",
                date('Y') . "03" => "Mars",
                date('Y') . "04" => "Avril",
                date('Y') . "05" => "Mai",
                date('Y') . "06" => "Juin",
                date('Y') . "07" => "Juillet",
                date('Y') . "08" => "Août",
                date('Y') . "09" => "Septembre",
                date('Y') . "10" => "Octobre",
                date('Y') . "11" => "Novembre",
                date('Y') . "12" => "Décembre",
                );
            include("vues/v_listeFrais.php");
        } else{
            ajouterErreur("Vous n'avez pas accès à cette page");
        }
        break;
    }
	case 'saisirFrais':{
		if($pdo->estPremierFraisMois($idVisiteur,$mois)){
			$pdo->creeNouvellesLignesFrais($idVisiteur,$mois);
		}
		break;
	}
	case 'validerMajFraisForfait':{
		$lesFrais = $_REQUEST['lesFrais'];

		if($isComptable) {
			$idVisiteur = $_REQUEST['idVisiteurToUpdate'];
			$mois = $_REQUEST['moisToUpdate'];
			$_GET['updated'] = 1;
		}

		if(lesQteFraisValides($lesFrais)){
	  	 	$pdo->majFraisForfait($idVisiteur,$mois,$lesFrais);
	  	 	echo '<script>window.location.href = "index.php?uc=etatFrais&action=selectionnerMois";</script>';
		}
		else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
	  break;
	}
	case 'validerCreationFrais':{
		$dateFrais = $_REQUEST['dateFrais'];
		$libelle = $_REQUEST['libelle'];
		$montant = $_REQUEST['montant'];
		valideInfosFrais($dateFrais,$libelle,$montant);
		if (nbErreurs() != 0 ){
			include("vues/v_erreurs.php");
		}
		else{
			$pdo->creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant);
		}
		break;
	}
	case 'supprimerFrais':{
		$idFrais = $_REQUEST['idFrais'];
	    $pdo->supprimerFraisHorsForfait($idFrais);
	    if($isComptable) {
	    	echo "<script>window.location.href = \"index.php?uc=gererFrais&action=consulterFrais&requestedIdVisiteur=". $_REQUEST['requestedIdVisiteur'] ."&requestedMonth=". $_REQUEST['requestedMonth']. "\"</script>";
	    }
		break;
	}
}

if(!$isComptable) {
	include("vues/v_listeFraisForfait.php");
	include("vues/v_listeFraisHorsForfait.php");
}

?>