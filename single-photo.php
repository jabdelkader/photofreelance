<?php


get_header() ?>

<div id="primary" class="contant">
    <main id="main" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post_contant">
                <div class="post_description">
                    <h1 class="entry-title">
                        <?php the_title(); ?>
                    </h1>
                    <p class="ref">REFERANCE :
                        <?php echo get_post_meta(get_the_ID(), 'references', true); ?>
                    </p>
                    <p>CATÉGORIE :
                        <?php echo the_terms(get_the_ID(), 'categorie', false); ?>
                    </p>
                    <p>TYPE :
                        <?php echo get_post_meta(get_the_ID(), 'type', true); ?>
                    </p>
                    <p>FORMAT :
                        <?php echo the_terms(get_the_ID(), 'format', false); ?>
                    </p>
                    <p>ANNEE:
                        <?php $post_date = get_the_date('Y');
                        echo $post_date; ?>

                </div>

                <div class="post_image">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url(array(500, 500)); ?>" alt="<?php the_title_attribute(); ?>"
                            class="post-thumbnail" />
                    <?php endif; ?>
                    <?php the_content(); ?>
                    <div class="fadedbox">
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
    <img src="/wp-content/themes/Nathalie-mota/assets/images/fullscreen.png">

</button>

                        </div>
                    </div>
                </div>
            </div>
        </article><!-- #post-<?php the_ID(); ?> -->

        <!-- Intéressé -->
        <section class="section_interesse">
            <div class="interesse">
                <div class="btn_interesse">
                    <p> Cette photo vous intéresse ? </p>
                    <button id="myBtn2" class="myBtn contact contact_interesse btnhover"> Contact </button>
                </div>
               <div class="photo_carousel">
    <div class="carousel-container">
        <?php
        $args = array(
            'post_type'      => 'photo',
            'posts_per_page' => -1,
            'orderby'        => 'date',  // Trie par date
            'order'          => 'DESC',  // Ordre décroissant (du plus récent au plus ancien)
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
        ?>
        <div class="carousel-track">
            <?php
            while ($query->have_posts()) :
                $query->the_post();

                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');

                // Output each image with a link to the full-size image
                echo '<div class="carousel-item">';
                echo '<a href="' . esc_url(get_permalink()) . '" target="_blank">';
                echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '" class="carousel-image" data-date="' . esc_attr(get_the_date('Y-m-d')) . '">';
                echo '</a>';
                echo '</div>';
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <?php endif; ?>
    </div>
    <button class="prev-btn">&larr;</button>
    <button class="next-btn"> &rarr;</button>
</div>

            </div>
        </section>
        <section class="section_aimerezaussi">
    <h2> Vous aimerez aussi </h2>
    <?php
    // On place les critères de la requête dans un Array
    $cats = array_map(function ($terms) {
        return $terms->term_id;
    }, get_the_terms(get_post(), 'categorie'));
    $args = array(
        'post__not_in' => [get_the_ID()],
        'order_by_rand' => 'rand',
        'post_type' => 'photo',
        'tax_query' => [
            [
                'taxonomy' => 'categorie',
                'terms' => $cats,
            ]
        ]
    );
    //On crée ensuite une instance de requête WP_Query basée sur les critères placés dans la variables $args
    $query = new WP_Query($args);
    ?>
    <div class="photo_aleatoire">
        <!-- //On vérifie si le résultat de la requête contient des articles -->
        <?php if ($query->have_posts()): ?>

            <!-- //On parcourt chacun des articles résultant de la requête -->
            <?php $count = 0; ?>
            <?php while ($query->have_posts()): ?>
                <?php $count++; ?>
                <?php $query->the_post(); ?>


                <?php the_content(); ?>
                <?php if (has_post_thumbnail()): ?>

                    <div class="photo_aimerezaussi">
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
                            <button class="buttonlightbox buttonaimerezaussi" data-titre="<?php the_title(); ?>" data-date="<?php $post_date = get_the_date('Y');
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
                               ?>"><img class="fullscreen"
                               src="<?php echo get_stylesheet_directory_uri(); ?> '/assets/images/fullscreen.png' " alt="fullscreen">"></button>
                            </div>
                        </div>
                    </div>
                    <?php if ($count == 2) {
                        break; // sortir de la boucle si deux photos ont été traitées
                    } ?>
                <?php endif; ?>

            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Désolé, aucun article ne correspond à cette requête</p>
    <?php endif;
        wp_reset_query();
        ?>
</section>
        <div class="btntoutephoto"> <a href="http://localhost/Nathalie-mota/" class="btn btn_toutephoto btnhover"> Toutes
                les photos </a>
        </div>
    </main>
</div>

<?php get_footer(); ?>