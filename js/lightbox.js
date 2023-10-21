// Fonction pour ouvrir la lightbox avec une image spécifique

function openLightbox(imageIndex) {
    var lightbox = document.getElementById("lightbox");
    var lightboxImage = document.getElementById("lightbox-image");
    var lightboxCaption = document.getElementById("lightbox-caption");

    if (imageIndex >= 0 && imageIndex < images.length) {
        lightbox.style.display = "block";
        lightboxImage.src = images[imageIndex];
        currentImageIndex = imageIndex;

        // Légende de la photo avec l'icône d'œil
        var captionText = '<i class="fa fa-eye"></i> Référence de la photo : ' + imageIndex;

        // Afficher la légende
        lightboxCaption.innerHTML = captionText;
    }
}