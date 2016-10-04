<table class="table">
    <tr>
        <th>Nom du visiteur</th>
        <th>Fiches disponibles</th>
    </tr>

    <?php foreach($listeVisiteurs as $visiteur){
    echo '<tr>
            <td>'. $visiteur['nom'] .' '. $visiteur['prenom'] .'</td>
            <td><select title="Choisir une fiche"><option disabled selected>Choisir un mois</option>';
            foreach($listeMois as $idMois => $mois){
                echo '<option id="'. $idMois .'" name="'. $mois .'" value="'. $idMois .'">'. $mois .'</option>';
            }
            echo '</select></td></tr>';
    }
    ?>

</table>


<?php

