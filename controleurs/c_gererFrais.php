<?php
include("vues/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
$isComptable = $_SESSION['isComptable'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];
switch($action){
    case 'listeFrais':{
        if($isComptable) {
            $listeVisiteurs = $pdo->getLesVisiteurs();
            $listeMois = array(
                Date('Y') . "01" => "Janvier",
                Date('Y') . "02" => "Février",
                Date('Y') . "03" => "Mars",
                Date('Y') . "04" => "Avril",
                Date('Y') . "05" => "Mai",
                Date('Y') . "06" => "Juin",
                Date('Y') . "07" => "Juillet",
                Date('Y') . "08" => "Août",
                Date('Y') . "09" => "Septembre",
                Date('Y') . "10" => "Octobre",
                Date('Y') . "11" => "Novembre",
                Date('Y') . "12" => "Décembre",
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
		if(lesQteFraisValides($lesFrais)){
	  	 	$pdo->majFraisForfait($idVisiteur,$mois,$lesFrais);
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
		break;
	}
}
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
include("vues/v_listeFraisForfait.php");
include("vues/v_listeFraisHorsForfait.php");

?>