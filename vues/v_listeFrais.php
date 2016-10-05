<script
  src="http://code.jquery.com/jquery-3.1.1.min.js">
</script>

<?php

echo '<div class="hidden alert alert-danger" id="danger-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Erreur! </strong>
    Cette fiche n\'existe pas.
</div>';

$visiteurs = $pdo->getLesVisiteurs();
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

echo '<div id="conteneurSelecteurs" class="row">';
echo '<select class="selecteurVisiteur">';
foreach($visiteurs as $visiteur){
    echo '<option value="'. $visiteur['id'] .'">'. $visiteur['nom'] . ' ' . $visiteur['prenom'] . '</option>';
}
echo '</select>';

echo '<select class="hidden selecteurMois">';
foreach($listeMois as $idMois => $nomMois){
    echo '<option value="'. $idMois .'">'. $nomMois .'</option>';
}
echo '</select></div>';


//TODO SEND CORRECT VALUES TO THE METHOD
if(empty($pdo->getLesFraisForfait('a131', '201610'))){
    ajouterErreur("Cette fiche n'existe pas");
    echo '<script>';
    echo '$("#danger-alert").removeClass("hidden");
          $("#danger-alert").on("click", function() {
            $("#danger-alert").fadeTo(1, 500).slideUp(500, function(){
                $("#danger-alert").slideUp(500);
              });
          });';
            
    echo '</script>';
}
?>

<script type="text/javascript">
$(".selecteurVisiteur").on("change", function() {
    $('.selecteurMois').removeClass("hidden");
});
</script>

<?php

if($_REQUEST['ficheSelectionnee']){

}

