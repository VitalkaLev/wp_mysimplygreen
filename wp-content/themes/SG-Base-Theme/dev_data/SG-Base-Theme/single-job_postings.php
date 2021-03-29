<?php
/**
 * Template Name: Generic Single Page
 *
 * This is the wordpress posts template. It contains a list of all the posts and media to date.
 *
 * @package SG-Base-Theme
 * @subpackage SG
 * @since 2020
 */
?>
<?php get_header(); ?>
<?php $dir = get_stylesheet_directory_uri(); ?>

<!-- The Loop single-job_postings.php-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $meta = get_post_meta( $post->ID, 'meta', true ); ?>
<section class="job-page">
	<div class="inner-box">
    	<input type="checkbox" id="apply-checkbox" name="apply" />
    	<h1><?php the_title() ;?></h1>
    	   	<div class="mobile-content">
        		<label class="button apply" for="apply-checkbox"></label>
				<div class="meta-grid">
					<div class="item">
						<h3>Location</h3>
						<?php echo $meta['location'] ?>
					</div>
					<div class="item">
						<h3>Department</h3>
						<?php echo $meta['department'] ?>
					</div>
					<div class="item">
						<h3>Employment Type</h3>
						<?php echo $meta['employment_type'] ?>
					</div>
					<div class="item"><h3>Salary Range</h3>
						<?php echo $meta['pay'] ?>
					</div>
			</div>
		</div>
		<div class="two-column-layout">
			<div class="container">
    		<div class="main-content">
    			<div class="entry">
	      			<?php the_content(); ?>
					<div class="mobile-content">
	      				<label class="button apply" for="apply-checkbox"></label>
	      			</div>

        		</div>
        		<div class="form">
        			<?php gravity_form( 1, false, false, false, '', false); ?>
        		</div>
        	</div>
        </div>
        	<div class="side-content sticky-nav">
        		<label class="button apply" for="apply-checkbox"></label>
        		<hr>
        		<p>
        			<label>Link to this job<br>
						<input type="text" value="<?php the_permalink();?>" style="width:100%;">
	        		</label>
	        	</p>
	        	<div class="social-side">
	        	<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>" rel="noopener noreferrer" target="_blank" title="LinkedIn" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400'); return false;"><i class="fab fa-linkedin"></i></a>

				<a href="" rel="noopener noreferrer" target="_blank" title="Twitter" class="twitter-share" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400'); return false;"><i class="fab fa-twitter-square"></i></a>
				<script>
					$(function(){
						function translate_to_twitter(){
							var pageURL = "<?php the_permalink();?>";
							var pageTitle = "<?php the_title();?>";
							var twURL = pageURL.replace(/\:/g, '%3A').replace(/\//g, '%2F');
							var twPageTitle = pageTitle.replace(/ /g, '%20');
							var twTranslation = "https://twitter.com/share?url="+twURL+"&text="+twPageTitle;
							$('.twitter-share').attr('href', twTranslation);
							console.log(twTranslation);
						};
						translate_to_twitter();
					});
				</script>

				<a rel="noopener noreferrer" target="_blank" title="Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=400'); return false;"><i class="fab fa-facebook-square"></i></a>  
				</div> 
				<h3>Location</h3>
				<?php echo $meta['location'] ?> 
				<hr>
				<h3>Department</h3>
				<?php echo $meta['department'] ?>
				<hr>
				<h3>Employment Type</h3>
				<?php echo $meta['employment_type'] ?>  
				<hr>
				<h3>Salary Range</h3>
				<?php echo $meta['pay'] ?>
				<hr>  	
			</div>
    	</div>
    </div>
</section>
    <?php endwhile; endif; wp_reset_postdata(); ?>
<script>
	$(function(){
		$('input[name=input_22]').val("<?php the_title();?>");
	});
</script>


<?php get_footer(); ?>