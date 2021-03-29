<!-- version 2 -->
<section class="price-block">
	<div class="inner-box">
		<h2><?php block_field('title');?></h2>
		<?php block_field('copy');?>
		<div class="price-blocks">
			<?php if(block_rows('pricing')):
				while(block_rows('pricing')):
		 			block_row('pricing');
		 			if(!block_sub_value('bundle')): ?>
					<div class="item <?php block_sub_field('background-color');?>">
						<?php if(block_sub_value('percent')):?><div class="savings"><?php block_sub_field('percent');?></div><?php endif; ?>
						<h3><?php block_sub_field('price-title');?></h3>
						<div class="price-side">
							<span class="was"><?php block_sub_field('was');?></span>
							<span class="price"><?php block_sub_field('price');?></span>
							<span class="term"><?php block_sub_field('term');?></span>
						</div>
						<div class="disclaimer"><?php block_sub_field('disclaimer');?></div>
					</div>
			<?php endif; endwhile; endif; reset_block_rows('pricing');?>
		</div>
		<?php if(block_value('include-bundles')): ?>
		<div class="price-blocks bundles">
			<?php if(block_rows('pricing')):
				while(block_rows('pricing')):
					block_row('pricing');
					if(block_sub_value('bundle')):?>
					<div class="item <?php block_sub_field('background-color');?>">
						<?php if(block_sub_value('percent')):?><div class="savings"><?php block_sub_field('percent');?></div><?php endif; ?>
						<h3><?php block_sub_field('price-title');?></h3>
						<div class="price-side">
							<span class="was"><?php block_sub_field('was');?></span>
							<span class="price"><?php block_sub_field('price');?></span>
							<span class="term"><?php block_sub_field('term');?></span>
						</div>
					</div>
			<?php endif; endwhile; endif; reset_block_rows('pricing');?>
		</div>
	<?php endif; ?>
		<div class="fine-print"><?php block_field('fine-print');?></div>
	</div>
</section>