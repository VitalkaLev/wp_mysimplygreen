<section class="timeline">
	<div class="inner-box">
		<?php if(block_rows('timeline')):
			while(block_rows('timeline')):
				block_row('timeline');?>
				<div class="item">
					<h3><?php block_sub_field('year');?></h3>
					<?php block_sub_field('copy');?>
				</div>
			<?php endwhile; endif; reset_block_rows('timeline'); ?>
	</div>
</section>