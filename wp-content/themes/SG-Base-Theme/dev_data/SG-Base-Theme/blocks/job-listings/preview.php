<section class="job-postings">
    <div class="inner-box">
        <h2><?php block_field('title');?></h2>
        <?php block_field('copy');?>
        <div class="job-grid">
<?php 
    $args = array(
        'post_type' => 'job_postings',
    );
    $your_loop = new WP_Query( $args );

    if ( $your_loop->have_posts() ) : while ( $your_loop->have_posts() ) : $your_loop->the_post();
    $meta = get_post_meta( $post->ID, 'meta', true ); ?>
    <div class="item">
        <h3><?php the_title() ;?></h3>
                <div class="meta-grid">
                    <div class="item">
                        <h3>Location</h3>
                        <?php echo $meta['location'] ?>
                    </div>
                    <div class="item">
                        <h3>Department</h3>
                        <?php echo $meta['department'] ?>
                    </div>
                    <div class="item">
                        <h3>Employment Type</h3>
                        <?php echo $meta['employment_type'] ?>
                    </div>
                    <div class="item"><h3>Salary Range</h3>
                        <?php echo $meta['pay'] ?>
                    </div>
            </div>
       <?php the_excerpt(); ?>
        <a href="<?php the_permalink();?>" class="button">Learn more</a>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
    </div></div>
</section>