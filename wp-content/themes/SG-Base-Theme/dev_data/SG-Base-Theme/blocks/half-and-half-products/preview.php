<section class="half-and-half-products">
	<div class="text-side">
		<div class="copy">
			<img src="<?php block_field('logo');?>" class="prod-logo">
			<h3><?php block_field('title');?></h3>
			<?php block_field('copy-block');?>
			<?php if(block_value('go-to-form')){ ?>
				<a href="#footer-form" class="button">We're here to help</a>
				<div class="small"><?php block_field('fineprint');?></div>
			<?php }; ?>
		</div>
	</div>
	<div class="image-side">
		<img src="<?php block_field('image-side');?>);" alt="<?php block_field('title'); ?>">
	</div>
			
</section>