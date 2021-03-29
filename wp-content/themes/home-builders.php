<?php
/**
 * Template Name: Home Page Builders
 *
 * This is the wordpress posts template. It contains a list of all the posts and media to date.
 *
 * @package SG-Base-Theme
 * @subpackage SG
 * @since 2020
 */
?>
<?php get_header('builders'); ?>
<?php $dir = get_stylesheet_directory_uri(); ?>
<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $meta = get_post_meta( $post->ID, 'meta', true ); ?>
        <?php the_content(); ?>
    <?php endwhile; endif; wp_reset_postdata(); ?>


<?php get_footer("builders"); ?>