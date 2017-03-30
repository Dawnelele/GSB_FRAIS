<?php

if(isset($_REQUEST['notFound']) && $_REQUEST['notFound'] == "true") {
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
  toastr["error"]("Impossible d\'afficher le tableau de bord pour ce visiteur", "Erreur");
  </script>';
} else {
    echo "";
}

    ?>
    <fieldset>
        <legend>Choississez un visiteur pour afficher son tableau de bord</legend>
        <div id="conteneurSelecteurs">
            <select class="selecteurVisiteur form-control"><?php
                foreach($visiteurs as $visiteur){
                    echo '<option value="'. $visiteur['id'] .'">'. $visiteur['nom'] . ' ' . $visiteur['prenom'] . '</option>';
                }
                echo '</select></div>';
                ?>

                <script type="text/javascript">
                    $('.selecteurVisiteur').on("change", function() {
                        var requestedIdVisiteur = $(".selecteurVisiteur :selected").val();
                        $.ajax({
                            url: 'index.php?uc=dashboard&action=consultationDashboardVisiteur',
                            type: 'get',
                            data: {requestedIdVisiteur: requestedIdVisiteur,},
                                success: function() {
                                    window.location.href = "index.php?uc=dashboard&action=consultationDashboardVisiteur&requestedIdVisiteur="+requestedIdVisiteur;
                                },
                                error: function() {
                                    window.location.href = "index.php?uc=dashboard&action=consultationDashboardVisiteur&requestedIdVisiteur="+requestedIdVisiteur;
                                },
                                complete: function() {
                                    window.location.href = "index.php?uc=dashboard&action=consultationDashboardVisiteur&requestedIdVisiteur="+requestedIdVisiteur;
                                },
                            })
                    })
                </script>


