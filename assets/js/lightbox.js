$(document).ready(function() {
  // Sélectionner l'élément de la lightbox
  var lightbox = document.querySelector('.lightbox');

  // Sélectionner le bouton de fermeture de la lightbox
  var spanlightbox = document.querySelector('.lightbox__close');

  // Sélectionner tous les boutons qui ouvrent la lightbox
  var buttonlightbox = document.querySelectorAll('.buttonlightbox');

  // Lorsque l'un des boutons est cliqué
  buttonlightbox.forEach(function(button, index) {
    button.addEventListener('click', function(e){
      e.preventDefault();

      // Récupérer l'URL, le titre et la date de l'image associée au bouton
      let imageSrc = button.getAttribute('data-image');
      let imageTitre = button.getAttribute('data-titre');
      let imagecateg = button.getAttribute('data-categ');

      // Sélectionner l'élément de l'image dans la lightbox
      let lightboxImage = lightbox.querySelector('.lightbox__image');
      let lightboxTitre = lightbox.querySelector('.lightbox__titre');
      let lightboxcateg = lightbox.querySelector('.lightbox__categ');

      // Définir la source de l'image avec l'URL récupérée
      lightboxImage.setAttribute('src', imageSrc);

      // Définir le titre de l'image dans la lightbox
      lightboxTitre.textContent = imageTitre;
      lightboxcateg.textContent = imagecateg;

      // Afficher la lightbox
      lightbox.style.display = 'block';

      // Enregistrer l'index du bouton cliqué pour la navigation
      lightbox.setAttribute('data-current-index', index);
    });
  });

  // Lorsque le bouton de fermeture est cliqué
  spanlightbox.onclick = function() {
    // Cacher la lightbox
    lightbox.style.display = 'none';
  };

  // Lorsque l'utilisateur clique en dehors de la lightbox
  window.onclick = function(event) {
    // Si l'élément cliqué est la lightbox elle-même
    if (event.target == lightbox) {
      // Cacher la lightbox
      lightbox.style.display = 'none';
    }
  };

  // Lorsque les flèches gauche et droite sont cliquées
  lightbox.querySelector('.fleche-gauche').addEventListener('click', function(e) {
    e.stopPropagation(); // Empêche la propagation de l'événement pour éviter la fermeture de la lightbox
    // parseInt permet de recuperer une chaine de caractères en entier 
    var currentIndex = parseInt(lightbox.getAttribute('data-current-index'));
    var previousButton = buttonlightbox[currentIndex - 1];
    if (previousButton) {
      previousButton.click();
      lightbox.setAttribute('data-current-index', currentIndex - 1);
    }
  });

  lightbox.querySelector('.fleche-droite').addEventListener('click', function(e) {
    e.stopPropagation(); // Empêche la propagation de l'événement pour éviter la fermeture de la lightbox

    var currentIndex = parseInt(lightbox.getAttribute('data-current-index'));
    var nextButton = buttonlightbox[currentIndex + 1];
    if (nextButton) {
      nextButton.click();
      lightbox.setAttribute('data-current-index', currentIndex + 1);
    }
  });
});
