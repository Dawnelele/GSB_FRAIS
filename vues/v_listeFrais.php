<table class="table">
    <tr>
        <th>Id visiteur</th>
        <th>Nom du visiteur</th>
        <th>Fiches disponibles</th>
        <th>Action</th>
    </tr>
    <?php foreach($listeVisiteurs as $visiteur){
    echo '<tr>
            <td id="idVisiteur">'. $visiteur['id'] .'</td>
            <td>'. $visiteur['nom'] .' '. $visiteur['prenom'] .'</td>
            <td>
            <select class="selecteurMois" title="Choisir une fiche">';
            foreach($listeMois as $idMois => $mois){
                echo '<option value="'. $idMois .'">'. $mois .'</option>';
            }
            echo '</select></td>
            <td><a id="submitButton"><button class="btn btn-primary" action="submit">Accéder</button></a></td>
            </tr>';
    }
    ?>
</table>

<script
  src="http://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous">
</script>

<script type="text/javascript">
    $("#submitButton").on("click", function() {
        var selectedVisiteur = $("#idVisiteur").text();
        console.log(selectedVisiteur);
        var selectedIdMois = $(":selected").val();
        var url = 'href="index.php?uc=gererFrais&action=consulterFrais&idVisiteur=\'. $visiteur[\'id\'] .\'&idMois=\'. $idMois .\'"';
})
</script>



<?php

