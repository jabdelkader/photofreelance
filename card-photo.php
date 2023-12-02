
<?php
// On place les critères de la requête dans un Array
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => 2,
);
//On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
$query = new WP_Query($args);
?>

<?php if ($query->have_posts()): ?>


    <?php while ($query->have_posts()): ?>
        <?php $query->the_post(); ?>
        <div class="photo_unephoto">
            <a href="<?php the_permalink(); ?>"><?php the_content(); ?></p>
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>

                </a>
                <div class="fadedbox">
                    <div class="title text">
                        <div class="titre">
                            <p>
                                <?php the_title(); ?>
                            </p>
                        </div>
                        <div class="categorie">
                            <p>
                                <?php echo the_terms(get_the_ID(), 'categorie', false); ?>
                            </p>
                        </div>
                    </div>
                    <div class="divoeil">
                        <a href="<?php the_permalink(); ?>"><img
                                src="<?php echo get_stylesheet_directory_uri(); ?> '/assets/images/oeil.png' " alt="oeil"></a>
                    </div>
                    <div class="divfullscreen">
                    <button class="buttonlightbox" data-titre="<?php the_title(); ?>" data-date="<?php $post_date = get_the_date('Y');
                          echo $post_date; ?>" data-image="<?php echo esc_attr(get_the_post_thumbnail_url(get_the_ID())); ?>" data-categ="<?php
                               $categories = get_the_terms(get_the_ID(), 'categorie'); // Remplacez 'categorie' par le nom de votre taxonomie
                               if ($categories && !is_wp_error($categories)) {
                                   // Vérifie si la variable $categories existe et n'est pas une erreur de WordPress
                                   $category_names = array(); // Crée un tableau vide pour stocker les noms des catégories
                                   foreach ($categories as $category) {
                                       // Parcourt chaque terme de taxonomie dans $categories
                                       $category_names[] = $category->name;
                                       // Ajoute le nom de la catégorie courante au tableau $category_names
                                   }
                                   echo implode(', ', $category_names);
                                   // Concatène les noms des catégories avec une virgule comme séparateur
                               }
                               ?>"><img src="wp-content\themes\Nathalie-mota\assets\images\fullscreen.png"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>


<?php else: ?>
    <p>Désolé, aucun article ne correspond à cette requête</p>
<?php endif;
wp_reset_query();
?>
 <script> 
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

</script>
</div>