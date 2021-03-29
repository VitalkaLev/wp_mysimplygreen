<section class="testimonials grey" id="testimonials">
    <div class="inner-box">
        <p class="pretext">Testimonials</p>
        <h2><?php block_field('title'); ?></h2>
        <p class="subheader"><?php block_field('subheader'); ?></p>
        <div class="slider">
        <?php 
            if ( block_rows( 'testimonial' ) ): 
                while ( block_rows( 'testimonial' ) ) :
                    block_row( 'testimonial' );?>
            <div class="item">
                <span class="name"><?php block_sub_field( 'name' ); ?></span>
                <h3><?php block_sub_field('product');?></h3>
                <p><?php block_sub_field( 'copy' ); ?></p>
                <div class="star-rating <?php block_sub_field('rating'); ?>"></div>
            </div>
     <?php  endwhile; endif; 
            reset_block_rows( 'testimonial' ); ?>
        </div>
    </div>
</section>