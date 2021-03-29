<section class="featured">
	<div class="inner-box">
        <h2>Featured Products</h2>
        <div class="product-grid">
	<?php 
		$args = array(
    		'post_type' => 'products',
    		'tax_query' => array(
        		array(
            		'taxonomy' => 'category',
            		'field'    => 'slug',
            		'terms' => 'featured'
            	)
        	),
    		'posts_per_page' => 5,
    	);

    	$product_loop = new WP_Query( $args );

    		if ( $product_loop->have_posts() ) : while ( $product_loop->have_posts() ) : $product_loop->the_post();
                $meta = get_post_meta( $post->ID, 'meta', true ); ?>
	<div class="item">
        <div class="text-side">
            <?php echo '<img src="'.$meta['thumbnail_url'].'" class="prod-logo"/>' ?>
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt();?></p>        
            <div class="cta-block"><a href="<?php the_permalink(); ?>">View details ›</a></div>                
        </div>
        <div class="image-side"><?php the_post_thumbnail();?></div>
	</div>		
    <?php endwhile; endif; wp_reset_postdata(); ?>
</div>
</div>
</section>
<script>
    $(function(){
        $('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
});
    });
</script>