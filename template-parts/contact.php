<!-- La Modale -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="titre-contact"></div>
        <div class="titre-contact"></div>

        <div class="popup-informations">
            <?php
            // On insère le formulaire de demandes de renseignements
            // get_field('reference')
            $refPhoto = "";
            if (get_field('reference')) {
                $refPhoto = get_field('reference');
            };
            echo do_shortcode('[contact-form-7 id="fa72314" title="Modale de contact"]');
            ?>
        </div>
    </div>

</div>