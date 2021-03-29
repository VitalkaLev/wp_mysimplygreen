<section class="all-testimonials">
    <div class="inner-box">
    <?php 
        $args = array(
            'post_type' => 'testimonials',
            'posts_per_page' => -1,
        );

        $testimonials_loop = new WP_Query( $args );

            if ( $testimonials_loop->have_posts() ) : while ( $testimonials_loop->have_posts() ) : $testimonials_loop->the_post();
                $meta = get_post_meta( $post->ID, 'meta', true ); ?>
                <?php 
                if($meta['rating']==1){$rating = "one";}
                elseif($meta['rating']==2){$rating = "two";}
                elseif($meta['rating']==3){$rating = "three";}
                elseif($meta['rating']==4){$rating = "four";}
                ?>
        <div class="item">
            <span class="name"><?php the_title(); ?></span>
            <h3><?php echo $meta['topic']; ?></h3>
            <div class="star-rating <?php echo $rating; ?>"></div>     
            <?php the_content();?>
        </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</div>
</section>
