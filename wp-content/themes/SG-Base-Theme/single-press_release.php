<?php
/**
 * Template Name: Press Releases
 * Template Post Type: press_release
 * This is the wordpress press release template.
 *
 * @package SG-Base-Theme
 * @subpackage SG
 * @since 2020
 */
?>
<?php get_header(); ?>
<?php $dir = get_stylesheet_directory_uri(); ?>

<!-- The Loop -->
    <?php 
            if (have_posts() ) : while ( have_posts() ) : the_post();
                $meta = get_post_meta( $post->ID, 'meta', true ); ?>
<section class="press">
<div class="inner-box">
<h1><?php the_title() ;?></h1>
        <?php the_content(); ?>
</div>
</section>
    <?php endwhile; endif; wp_reset_postdata(); ?>



<?php get_footer(); ?>