<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!--<h1><?php the_title(); ?></h1> -->
    <?php the_content( __( '(more...)' ) ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
