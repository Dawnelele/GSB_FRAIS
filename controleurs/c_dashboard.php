<?php

// Variables d'environnement
$idVisiteur = $_SESSION['idVisiteur'];
$isComptable = $_SESSION['isComptable'];

$action = $_REQUEST['action'];

if ($isComptable) {

	switch ($action) {
		case 'selectionVisiteur': {
			$visiteurs = $pdo->getLesVisiteurs();
			include("vues/v_listeVisiteursDashboard.php");
			break;
		}
		case 'consultationDashboardVisiteur': {
			$idVisiteurSelectionne = $_GET['requestedIdVisiteur'];
			$availableFrais = $pdo->getLesMoisDisponibles($idVisiteurSelectionne);
			$availableYearsN2 = array();
			$availableYearsN1 = array();
			foreach ($availableFrais as $key => $value) {
				if ($value['numAnnee'] == "2016") {
					$availableYearsN1[] = $value['mois'];
				} elseif ($value['numAnnee'] == "2015") {
					$availableYearsN2[] = $value['mois'];
				}
			}
			$totalQuantiteN1 = 0;
			if (!empty($availableYearsN1)) {
				foreach ($availableYearsN1 as $key => $value) {
					$fraisForfaitsEnregistresN1[$key] = $pdo->getLesFraisForfait($idVisiteurSelectionne, $value);
					foreach ($fraisForfaitsEnregistresN1[$key] as $cle => $valeur) {
						$totalQuantiteN1 += (int)$valeur['quantite'];
					}
				}	
			}

			$totalQuantiteN2 = 0;
			if (!empty($availableYearsN2)) {
				foreach ($availableYearsN2 as $key => $value) {
					$fraisForfaitsEnregistresN2[$key] = $pdo->getLesFraisForfait($idVisiteurSelectionne, $value);
					foreach ($fraisForfaitsEnregistresN2[$key] as $cle => $valeur) {
						$totalQuantiteN2 += (int)$valeur['quantite'];
					}
				}	
			}

			$valeurN2 = date_sub(date_create(date('Y')), date_interval_create_from_date_string('2 years'));
			$valeurN1 = date_sub(date_create(date('Y')), date_interval_create_from_date_string('1 year'));
			$nomVisiteur = $pdo->getVisiteurName($idVisiteurSelectionne);
			include("vues/v_dashboardVisiteur.php");
			break;
		}
	}
} else {
	echo '<script type=\'text/javascript\'>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "10000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
  };
  toastr["error"]("Vous n\'êtes pas autorisé à accéder à cette zone", "Erreur");
  </script>';
}
// if($isComptable){
// 	$lesEtats = $pdo->getLesEtats();
// 	$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_REQUEST['requestedIdVisiteur'], $_REQUEST['requestedMonth']);
// 	$lesFraisForfait= $pdo->getLesFraisForfait($_REQUEST['requestedIdVisiteur'], $_REQUEST['requestedMonth']);
// 	$etatActuel = $pdo->getLesInfosFicheFraisObjet($_REQUEST['requestedIdVisiteur'], $_REQUEST['requestedMonth']);
// 	include("vues/v_consulterFiche.php");
// } else {
// 	ajouterErreur("Vous n'avez pas accès à cette page");
// 	include("vues/v_erreurs.php");
// }