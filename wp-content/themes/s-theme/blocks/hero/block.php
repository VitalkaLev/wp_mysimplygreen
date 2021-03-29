<?php $dir = get_stylesheet_directory_uri(); ?>
<section class="hero">
	<div class="text-side">
		<div class="copy">
			<h1><?php block_field('headline'); ?></h1>
			<p><?php block_field('copy'); ?></p>
			<?php if(block_value('is-partner')){ ?>
				<div class="price-block">
					<span class="small-text">Lease at</span><span class="price"><sup>$</sup><?php block_field('price'); ?><sup>99</sup></span><span class="small-month">/mo</span>
					<div class="duration"><?php block_field('duration');?></div>
				</div>
			<?php }; ?>
			<a href="tel:<?php block_field('phone');?>" class="phone button"><?php block_field('phone');?></a>
		</div>
	</div>
	<div class="image-side" style="background-image:url(<?php block_field('image-side'); ?>);">
		<?php if(!block_value('is-partner')){ ?>
			<img src="<?php echo $dir;?>/images/green-dot.svg" class="green-dot">
		<?php }; ?>
	</div>
	<div class="inner-box">
		<h2>Or we can call you</h2><!-- Form ID = 3917049 -->
		<iframe src="<?php echo $dir;?>/forms/<?php block_field('form-choice');?>" class="form-frame"></iframe>
</div>
</section>