<?php
/*
Template Name: Accueil
*/
?>
<?php get_header() ?>
<section class="accueil_aleatoire">
<?php
$requete_photo_aleatoire = new WP_Query(array(
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'orderby' => 'rand',
));

if ($requete_photo_aleatoire->have_posts()) :
    while ($requete_photo_aleatoire->have_posts()) :
        $requete_photo_aleatoire->the_post(); ?>

        <img class="photoaleatoire" src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute(); ?>" id="photoAleatoire">

    <?php endwhile;
    wp_reset_postdata(); // Réinitialiser les données de publication pour revenir à la requête d'origine
endif;
?>

        <img class="photoevent" src="<?php echo get_template_directory_uri(); ?>/assets/images/photoevent.png" alt="photoevent">
    </div>
</section>
<div class="filtre">
    <div class="filtre_taxo">
        <div class="filtre_categ">
            <form class="js-filter-form" method="post">
                <?php
                $terms = get_terms('categorie');
                $select = "<div class='filtre'>";
                $select .= "<select name='categorie' id='cat1' class='postform'>";
                $select .= "<option value='' disabled selected style='display:none;'>CATEGORIES</option>";  // Placeholder option
                foreach ($terms as $term) {
                    if ($term->count > 0) {
                        $select .= "<option value='" . $term->slug . "'>" . $term->name . "</option>";
                    }
                }
                $select .= "</select></div>";
                echo $select;
                ?>
            </form>
        </div>

        <div class="filtre_form">
            <form class="js-filter-form" method="post">
                <?php
                $terms = get_terms('format');
                $select = "<div class='filtre'>";
                $select .= "<select name='format' id='format1' class='postform'>";
                $select .= "<option value='' disabled selected style='display:none;'>FORMAT</option>";  // Placeholder option
                foreach ($terms as $term) {
                    if ($term->count > 0) {
                        $select .= "<option value='" . $term->slug . "'>" . $term->name . "</option>";
                    }
                }
                $select .= "</select></div>";
                echo $select;
                ?>
            </form>
        </div>
    </div>

    <div class="filtre_date">
        <form class="js-filter-form" method="post">
            <div class='filtre'>
                <select name='date' id='date1' class='postform'>
                    <option value='' disabled selected style='display:none;'>TRIER PAR</option> 
                    <option value='nouveaute'>Les plus récentes</option>
                    <option value='anciens'>Les plus anciennes</option>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="photo_toutephoto">

    <?php
    // On place les critères de la requête dans un Array
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => 1,
    );
    //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post(); ?>
            <div class="photo_unephoto">
                </p>
                <?php the_post_thumbnail(); ?>
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
                                src="<?php echo get_stylesheet_directory_uri(); ?> '/assets/images/oeil.png' " alt="oeil"> </a>
                    </div>
                    <div class="divfullscreen">
                    <button class="buttonlightbox" 
        data-titre="<?php the_title(); ?>" 
        data-image="<?php echo esc_attr(get_the_post_thumbnail_url(get_the_ID())); ?>" 
        data-categ="<?php
            $categories = get_the_terms(get_the_ID(), 'categorie'); 
            if ($categories && !is_wp_error($categories)) {
                $category_names = array();
                foreach ($categories as $category) {
                    $category_names[] = $category->name;
                }
                echo implode(', ', $category_names);
            }
        ?>">
    <img src="wp-content\themes\Nathalie-mota\assets\images\fullscreen.png">
</button>
</div>
                </div>
            </div>
            <?php
        endwhile; ?>


    <?php else: ?>
        <p>Désolé, aucun article ne correspond à cette requête</p>
    <?php endif;
    wp_reset_query();
    ?>
</div>
<div class="chargerplus">
    <a href="#!" class="btn btn_chargezplus" id="load-more"> Charger plus </a>
</div>

</section>


<?php get_footer() ?>