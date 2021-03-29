<section class="faq">
	<div class="inner-box">
		<?php if(block_rows('faqs')):
			while (block_rows('faqs')):
				block_row('faqs'); ?>
			
			<div class="item">
			<a class="accordion faq-accordion" href="#"><span><?php block_sub_field('question');?></span></a>
			<div class="answer"><?php block_sub_field('answer');?></div>
			</div>

			<?php endwhile; endif;
		reset_block_rows( 'faqs' ); ?>

		<?php if(block_rows('ctas')): ?>
			<div class="button-block">
			<?php while(block_rows('ctas')):
				block_row('ctas'); ?>

				<a href="<?php block_sub_field('link');?>" class="button"><?php block_sub_field('text'); ?></a>

			<?php endwhile; ?>
			</div>
		<?php endif;
		reset_block_rows( 'ctas' ); ?>
	</div>
</section>