<?php $dir = get_stylesheet_directory_uri(); ?>

<section class="plan-forms form-bottom grey">
	<div class="inner-box">
		<h2><?php block_field('title');?></h2>
		<span class="subheader"><?php block_field('copy');?></span>
		<div class="fsBody" id="fsLocal">
			<div class="fsBottomPage">
				<?php include block_value('available-forms');?>
			</div>
		</div>
	</div>
</section>