<?php
while (have_posts()):
    the_post(); ?>
    <div class="lightbox">
        <button class="lightbox__close"></button>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="lightbox__container">
                <div class="fleche fleche-gauche" >
                    <p class="lightbox__arrow-text">&larr; Précédente</p>

                
                
                </div>
                <img class="lightbox__image" src="" alt="Image">
                <div  class="fleche fleche-droite">
                <p class="lightbox__arrow-text">Suivante &rarr;</p>
                
                    </div>
                <div class="lightbox__datecateg">
                    <div> <p class="lightbox__titre"> </p></div>
                    <div>  <p class="lightbox__categ"> </p></div>
                </div>
            </div>
        </article><!-- #post-<?php the_ID(); ?> -->
    </div>
<?php endwhile; ?>
