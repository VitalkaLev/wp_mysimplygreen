<section class="stats grey">
	<div class="inner-box">
			<?php if(block_rows('stats')):
				while(block_rows('stats')):
					block_row('stats');?>
		<div class="item">
			<span class="stat"><?php block_sub_field('stat');?></span>
			<span class="topic"><?php block_sub_field('topic');?></span>
		</div>
	<?php endwhile; endif; reset_block_rows('stats');?>
	</div>
</section>