<section class="contact-block">
	<div class="inner-box">
		<h2><?php block_field('title');?></h2>
		<p><?php block_field('copy');?></p>
		<div class="contact-info">
			<div class="item address">
				<span><?php block_field('address');?></span>
			</div>
			<div class="item phone">
				<span>Phone: <a href="tel:<?php block_field('phone');?>"><?php block_field('phone');?></a><br>
				Fax: <?php block_field('fax');?></span>
			</div>
			<div class="item email">
				<a href="mailto:<?php block_field('email');?>"><?php block_field('email');?></a>
			</div>
		</div>
	</div>
</section>