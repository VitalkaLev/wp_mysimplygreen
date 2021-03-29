<?php $dir = get_stylesheet_directory_uri(); ?>

<section class="form-block <?php block_field('background');?>">
	<div class="inner-box">
		<h2><?php block_field('title');?></h2>
		<h2><?php block_field('subheader');?></h2>
		<iframe src="<?php echo $dir;?>/blocks/form-block/<?php block_field('form-choice');?>" class="form-frame"></iframe>
	</div>
</section>