<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <script src="./js/jquery-3.1.1.min.js"></script>
  <script src="./js/chosen.jquery.min.js"></script>
  <script src="./js/chosen.proto.min.js"></script>
  <script src="./js/toastr.min.js"></script>
  <link href="./styles/styles.css" rel="stylesheet" type="text/css" />
  <link href="./styles/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./styles/chosen.min.css" rel="stylesheet" type="text/css" />
  <link href="./styles/toastr.min.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />

</head>
<body>
<div class="container">
  <div id="entete" class="header clearfix">
    <img width="75" height="50" src="./images/logo.jpg" id="logoGSB" alt="Laboratoire Galaxy-Swiss Bourdin" title="Laboratoire Galaxy-Swiss Bourdin" />
    
    
 
    
    <nav id="navbar" class="navbar navbar-static-top navbar-right">

          <button type="button" class="btn btn-default navbar-btn"><a href="index.php?uc=connexion&action=accueil">Accueil</a></button>
          <?php echo ($_SESSION['isComptable'] == 1) ? "
          <a href=\"index.php?uc=gererFrais&action=listeFrais\" title=\"Afficher la liste des frais\"><button type=\"button\" class=\"btn btn-default navbar-btn\">Afficher la liste des frais</button></a>
          " : ""?>

          <?php echo ($_SESSION['isComptable'] == 1) ? "" : '
          <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais"><button type="button" class="btn btn-default navbar-btn">Saisie fiche de frais</button></a>
          <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais"><button type="button" class="btn btn-default navbar-btn">Mes fiches de frais</button></a>'; ?>           
          <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter"><button type="button" class="btn btn-default navbar-btn">Déconnexion</button></a>

        
    </nav>

  </div>
  <div class="container" id="content">