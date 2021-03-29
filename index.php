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

<!-- The Loop  index.php-->
<section class="job-postings">
	<div class="inner-box">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $meta = get_post_meta( $post->ID, 'meta', true ); ?>
    <h2><?php the_title() ;?></h2>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink();?>">Learn more</a>
        <hr>
    <?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</section>



<?php get_footer(); ?>