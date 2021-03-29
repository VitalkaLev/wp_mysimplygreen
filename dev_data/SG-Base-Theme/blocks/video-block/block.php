<section class="video-block grey">
	<div class="inner-box">
		<h2><?php block_field('title');?></h2>
		<?php block_field('copy');?>
	</div>
	<div class="half-and-half">
		<div class="video-side">
			<?php include "lease-buy-video.php";?>
		</div>
		<div class="text-side">
			<div class="copy">
				<div class="header-grid"><h3>Lease vs Buy Comparison</h3><span class="column">Leasing</span><span class="column">Buying</span></div>
				<?php if(block_rows('accordion')):while(block_rows('accordion')):block_row('accordion');?>
					<div class="accordion">
						<h4><?php block_sub_field('accordion-title');?></h4>
						<div class="included <?php if(block_sub_value('lease')): echo 'yes'; endif;?>"><div class="mark"></div><sup><?php block_sub_field('add-lease-bug');?></sup></div>
						<div class="included <?php if(block_sub_value('buy')): echo 'yes'; endif;?>"><div class="mark"></div><sup><?php block_sub_field('add-buy-bug');?></sup></div>
						<div class="info-pane"><?php block_sub_field('message');?></div>
					</div>
				<?php endwhile; endif; reset_block_rows('accordion');?>
				<div class="legal">*Only with a valid warranty</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(function(){
		$('.accordion').on('click', function(){
			$('.accordion').not(this).removeClass('open');
			$(this).toggleClass('open');
		});
	});
</script>