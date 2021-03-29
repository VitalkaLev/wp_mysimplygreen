<section class="half-and-half <?php if(block_value('flip-sides')): echo 'flipped';endif;?> <?php if(block_value('alternating-greys')): echo 'no-grey';endif;?>">
	<div class="text-side">
		<div class="copy">
			<h2><?php block_field('title');?></h2>
			<div class="<?php if(block_value('two-col-list')): echo "two-col-list"; endif; ?>">
			<?php block_field('copy');?>
			</div>
			<?php if ( block_rows( 'link-list' ) ): ?>
			    <div class="link-block">
			    <?php while ( block_rows( 'link-list' ) ) :
			        block_row( 'link-list' );?>
			        <a href="<?php block_sub_field( 'link-url' ); ?>" class="<?php block_sub_field('link-style');?>">
			        <?php block_sub_field('link-text');?>
			        </a>
			<?php endwhile; ?>
			    </div>
			<?php endif;
			reset_block_rows( 'link-list' );
			?>
		</div>
	</div>
	<div class="image-side <?php block_field('no-dot');?>" style="background-image:url(<?php block_field('image');?>); <?php block_field('background-styles');?>">
	</div>
</section>