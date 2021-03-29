<?php
/**
 * Template Name: Generic Single Page
 *
 * This is the wordpress posts template. It contains a list of all the posts and media to date.
 *
 * @package SG-Base-Theme
 * @subpackage SG
 * @since 2020
 */
?>
<?php get_header(); ?>
<?php $dir = get_stylesheet_directory_uri(); ?>

<!-- The Loop single.php-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $meta = get_post_meta( $post->ID, 'meta', true ); ?>
<article>
    <h1><?php the_title() ;?></h1>
        <?php if (get_the_post_thumbnail_url()){the_post_thumbnail();}?>    
        <?php the_content(); ?>
</article>
    <?php endwhile; endif; wp_reset_postdata(); ?>



<?php get_footer(); ?>