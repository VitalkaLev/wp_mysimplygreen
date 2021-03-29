<section class="logo-salad">
    <div class="inner-box">
        <p style="text-align:center;"><?php block_field('title');?></p>
        <div class="slider">
        <?php if ( block_rows( 'logo-list' ) ):
                while ( block_rows( 'logo-list' ) ) :
                block_row( 'logo-list' );?>
            <div class="item">
                <img src="<?php block_sub_field( 'logo' );?>" alt="">
            </div>
        <?php endwhile; endif;
        reset_block_rows( 'logo-list' ); ?>
        </div>
    </div>
</section>