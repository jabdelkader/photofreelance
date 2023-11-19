<?php
/*
Template Name: Accueil
*/
?>
<?php get_header() ?>
<section class="accueil_aleatoire">
    <div class="accueil_aleatoire_photo">
        <?php query_posts(
            array(
                'post_type' => 'photo',
                'showposts' => 1,
                'orderby' => 'rand',
            )
        ); ?>
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
               <img class="photoaleatoire" src="<?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?>" alt="<?php the_title_attribute(); ?>" id="photoAleatoire">

        <?php endwhile;
        endif; ?>
        <img class="photoevent" src="<?php echo get_template_directory_uri(); ?>/assets/images/photoevent.png" alt="photoevent">
    </div>
</section>


<?php get_footer() ?>