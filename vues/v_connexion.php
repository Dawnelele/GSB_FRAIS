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

<div class="container">
  <p style="text-align: center">
    <img src="./images/logo.jpg">
  </p>
  <h2 style="text-align: center">Identification utilisateur</h2>
  <br />

  <form method="POST" action="index.php?uc=connexion&action=valideConnexion">
    <div class="form-group">
      <div class="form-group">
       <label for="nom">Login</label>
       <input class="form-control" id="login" type="text" name="login"  size="30" maxlength="45">
     </div>
     <div class="form-group">
      <label for="mdp">Mot de passe</label>
      <input class="form-control" id="mdp"  type="password"  name="mdp" size="30" maxlength="45">
    </div>
    <button type="submit" class="btn btn-success">Connexion</button>
  </div>
</div>
</div>
</form>

</div>