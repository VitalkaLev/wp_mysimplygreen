<section class="category-list  <?php block_field('default-section');?>">
    <div class="inner-box">
        <h2>Related Products</h2>
        <nav id="tab-block-links" class="sticky-nav">
            <ul>
                <li id="heating"><a href="/heating-products/">Heating</a></li>
                <li id="cooling"><a href="/cooling-products/">Cooling</a></li>
                <li id="air-filtration"><a href="/air-filtration-products/">Air Filtration</a></li>
                <li id="water-heating"><a href="/water-heating-products/">Water Heating</a></li>
                <li id="water-treatment"><a href="/water-treatment-products/">Water Treatment</a></li>
            </ul>
        </nav>
        <div class="product-grid">
            <?php  $args = array(
                'post_type' => 'products',
                'posts_per_page' => -1,
            );

            $product_loop = new WP_Query( $args );

            if ( $product_loop->have_posts() ) : while ( $product_loop->have_posts() ) : $product_loop->the_post();
                $meta = get_post_meta( $post->ID, 'meta', true ); ?>
                <div class="item <?php sps_category(); ?>">
                    <div class="text-side">
                        <?php echo '<img src="'.$meta['thumbnail_url'].'" class="prod-logo"/>' ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo excerpt(10);?></p>        
                        <div class="cta-block"><a href="<?php the_permalink(); ?>">View details ›</a></div>                
                    </div>
                    <div class="image-side"><?php the_post_thumbnail();?></div>
                </div>      
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
