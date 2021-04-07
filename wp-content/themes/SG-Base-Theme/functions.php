<?php 
	add_filter('excerpt_more', function($more) {
		return '';
	});


	

  	function dd( $data ){
		echo '<pre>';
			var_dump( $data );
		echo '</pre>';
 	}

	// CUSTOM CATEGORY CLASS CODE
	function sps_category(){
		$categories = get_the_category();   
		foreach ( $categories as $category ) {
			echo esc_html( $category->slug.' ' );	
			//echo esc_html( $category->cat_name ).', ';	
		}
	}


	function get_city(){

		$request = wp_remote_get( 'http://ip-api.com/json' );

		$body = wp_remote_retrieve_body( $request );

		$data = json_decode( $body );

		$city = $data->city;


		if( is_wp_error( $city ) ) {
			
			return false; 

		} else{

			return $city;

		}

	}





	// Location AJAX
	add_action( 'wp_ajax_nopriv_load-location', 'get_product_location_ajax' );
	add_action( 'wp_ajax_load-location', 'get_product_location_ajax' );

	function get_product_location_ajax(){

		$dir = "/wp-content/themes/SG-Base-Theme";

		$product_category = $_POST['product_category'];

		if( !empty($_POST['get_location'])  ){
			$get_location = $_POST['get_location'];
		} 

		$product_args = array(
			'post_type' => 'products',
			'numberposts'   => -1,          
			'post_status'   => 'publish',
			'orderby' => 'name',
			'order' => 'ASC',
			'tax_query'	=> array(
				'relation'		=> 'OR',
				array(
					'taxonomy' => 'product_location',
					'field' => 'name',
					'terms'	  	=> $get_location ,
					'relation'	=> 'AND',
				),
			),
		);

		$product_posts = get_posts( $product_args );
		// dd( $product_posts );
		ob_start ();
	
		if ( !empty($product_posts) ) {
			foreach ( $product_posts as $product_post ) { setup_postdata( $product_post ); ?>

                   <div class="item">
                        <div class="item__logo">
                            <picture>
                                <source srcset="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" media="(max-width: 560px) ">
                                <img src="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" alt="brand" />
                            </picture>
                        </div>
                        <div class="item__hero">
                            <div class="item__title">
                                <span><?php echo get_the_title($product_post->ID); ?></span>
                            </div>
                            <?php if( get_field('acf_product_brand_model', $product_post->ID) ){ ?>
                                <a href="<?php the_permalink($product_post->ID); ?>" class="item__subtitle">
                                    <?php echo get_field('acf_product_brand_model', $product_post->ID); ?>
                                </a>
                            <?php } ?>
                            <div class="item__slider">
                                <?php 
                                    if( have_rows('acf_product_slider', $product_post->ID) ){
                                        while( have_rows('acf_product_slider', $product_post->ID) ) { the_row(); ?>
                                           
                                            <div class="item__slide">  
                                                <div class="item__characteristics">
                                                    <div class="item__characteristic ">
                                                        <span><?php echo get_sub_field('acf_product_btu', $product_post->ID); ?></span>
                                                        
                                                        <?php if( get_field('acf_product_text_btu', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_btu', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="item__characteristic">
                                                        <span><?php echo get_sub_field('acf_product_rating', $product_post->ID); ?>%</span>
                                                    
                                                        <?php if( get_field('acf_product_text_rating', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_rating', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="item__characteristic">
                                                        <span><?php echo get_sub_field('acf_product_size', $product_post->ID); ?></span>

                                                        <?php if( get_field('acf_product_text_size', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_size', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div> 

                                                <a href="<?php the_permalink($product_post->ID); ?>">   
                                                    <picture class="h-object-fit">
                                                        <source srcset="<?php echo wp_get_attachment_image_url( get_sub_field('acf_product_image', $product_post->ID) , 'large'); ?>" media="(max-width: 560px) ">
                                                        <img src="<?php echo wp_get_attachment_image_url( get_sub_field('acf_product_image', $product_post->ID) , 'large'); ?>" alt="описание" />
                                                    </picture>
                                                </a>
                                            </div>

                                        <?php } ?>
                                    
                                    <?php } else { ?>

                                        <a href="<?php the_permalink($product_post->ID); ?>" class="item__slide">   
                                            <picture class="h-object-fit">
                                                <source srcset="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($product_post->ID)  , 'large'); ?>" media="(max-width: 560px) ">
                                                <img src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($product_post->ID)  , 'large'); ?>" alt="product" />
                                            </picture>
                                        </a>

                                    <?php } ?>
                            
                            </div>
                            
                                <?php if( has_excerpt($product_post->ID) ){ ?>
                                    <div class="item__recommend">
                                        <span><?php echo get_the_excerpt($product_post->ID);?></span>
                                    </div>
                                <?php } ?>
                            
                            <a href="<?php the_permalink($product_post->ID); ?>" class="item__link"><?php echo get_field('acf_product_text_link', 'option'); ?></a>
                        </div>
                        <div class="item__info">
                            <?php if( get_field('acf_product_info', $product_post->ID) ){ ?>
                                <div class="item__desc">
                                    <?php echo get_field('acf_product_info', $product_post->ID); ?>
                                </div>
                            <?php } ?>
                            <div class="item__rate-price">
                                <?php if( get_field('acf_product_rating', $product_post->ID) ){ ?>
                                    <div class="item__rate">
                                        <div class="item__rate-stars">
                                           
                                            <?php $ratings = get_field('acf_product_rating', $product_post->ID);  

                                                $stars = calculateStarRating($ratings);

                                                for ($i = 0; $i < $stars; ++$i) { ?>
                                                    <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                                <?php } 

                                            ?>
                                         
                                        </div>
                                        <?php if( get_field('acf_product_text_google_rating', 'option') ){ ?>
                                            <span><?php echo get_field('acf_product_text_google_rating', 'option'); ?></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <?php if( get_field('acf_product_price', $product_post->ID) ){ ?>
                                    <div class="item__price">
                                        <span><?php echo get_field('acf_product_text_price', 'option'); ?> <?php echo get_field('acf_product_price', $product_post->ID); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="item__offer-txt">
                                
                                <?php if( have_rows('acf_product_offer', $product_post->ID) ): ?>
                                    <ul class="item__offer-list ">
                                        <?php while( have_rows('acf_product_offer', $product_post->ID) ): the_row(); ?>

                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                <span>
                                                    <?php echo get_sub_field('acf_product_offer_content', $product_post->ID); ?>
                                                </span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if( get_field('acf_product_offer_text', $product_post->ID) ){ ?>
                                    <div class="item__txt">
                                        <span>
                                            <?php echo get_field('acf_product_offer_text', $product_post->ID); ?>
                                        </span>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="item__links">
                                <button type="button" class="button btn-modal-product" data-item="<?php echo $product_post->ID ?>"><?php echo get_field('acf_product_text_btn_benefits', 'option'); ?></button>
                                <button type="button" class="button btn-modal-form"><?php echo get_field('acf_product_text_btn_speak', 'option'); ?></button>
                            </div>
                        </div>
                    </div>

			<?php } 
		} else {
				
                $default_args = array(
                    'post_type' => 'products',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    =>  $product_category,
                        ),
                    ),
                );

                $default_loop = get_posts( $default_args );

                if ( $default_loop ) : 
                    foreach( $default_loop as $product_post ) { ?>

						<div class="item">
							<div class="item__logo">
								<picture>
									<source srcset="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" media="(max-width: 560px) ">
									<img src="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" alt="brand" />
								</picture>
							</div>
							<div class="item__hero">
								<div class="item__title">
									<span><?php echo get_the_title($product_post->ID); ?></span>
								</div>
								<?php if( get_field('acf_product_brand_model', $product_post->ID) ){ ?>
									<a href="<?php the_permalink($product_post->ID); ?>" class="item__subtitle">
										<?php echo get_field('acf_product_brand_model', $product_post->ID); ?>
									</a>
								<?php } ?>
									
								<div class="item__slider">
                                <?php 
                                    if( have_rows('acf_product_slider', $product_post->ID) ){
                                        while( have_rows('acf_product_slider', $product_post->ID) ) { the_row(); ?>
                                           
                                            <div class="item__slide">  
                                                <div class="item__characteristics">
                                                    <div class="item__characteristic ">
                                                        <span><?php echo get_sub_field('acf_product_btu', $product_post->ID); ?></span>
                                                        
                                                        <?php if( get_field('acf_product_text_btu', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_btu', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="item__characteristic">
                                                        <span><?php echo get_sub_field('acf_product_rating', $product_post->ID); ?>%</span>
                                                    
                                                        <?php if( get_field('acf_product_text_rating', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_rating', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="item__characteristic">
                                                        <span><?php echo get_sub_field('acf_product_size', $product_post->ID); ?></span>

                                                        <?php if( get_field('acf_product_text_size', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_size', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div> 

                                                <a href="<?php the_permalink($product_post->ID); ?>">   
                                                    <picture class="h-object-fit">
                                                        <source srcset="<?php echo wp_get_attachment_image_url( get_sub_field('acf_product_image', $product_post->ID) , 'large'); ?>" media="(max-width: 560px) ">
                                                        <img src="<?php echo wp_get_attachment_image_url( get_sub_field('acf_product_image', $product_post->ID) , 'large'); ?>" alt="описание" />
                                                    </picture>
                                                </a>
                                            </div>

                                        <?php } ?>
                                    
                                    <?php } else { ?>

                                        <a href="<?php the_permalink($product_post->ID); ?>" class="item__slide">   
                                            <picture class="h-object-fit">
                                                <source srcset="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($product_post->ID)  , 'large'); ?>" media="(max-width: 560px) ">
                                                <img src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($product_post->ID)  , 'large'); ?>" alt="product" />
                                            </picture>
                                        </a>

                                    <?php } ?>
                            
                            </div>
								
								
									<?php if( has_excerpt($product_post->ID) ){ ?>
										<div class="item__recommend">
											<span><?php echo get_the_excerpt($product_post->ID);?></span>
										</div>
									<?php } ?>
								
								<a href="<?php the_permalink($product_post->ID); ?>" class="item__link"><?php echo get_field('acf_product_text_link', 'option'); ?></a>
							</div>
							<div class="item__info">
								<?php if( get_field('acf_product_info', $product_post->ID) ){ ?>
									<div class="item__desc">
										<?php echo get_field('acf_product_info', $product_post->ID); ?>
									</div>
								<?php } ?>
								<div class="item__rate-price">
									<?php if( get_field('acf_product_rating', $product_post->ID) ){ ?>
										<div class="item__rate">
											<div class="item__rate-stars">
											
												<?php $ratings = get_field('acf_product_rating', $product_post->ID);  

													$stars = calculateStarRating($ratings);

													for ($i = 0; $i < $stars; ++$i) { ?>
														<img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
													<?php } 

												?>
											
											</div>
											<?php if( get_field('acf_product_text_google_rating', 'option') ){ ?>
												<span><?php echo get_field('acf_product_text_google_rating', 'option'); ?></span>
											<?php } ?>
										</div>
									<?php } ?>

									<?php if( get_field('acf_product_price', $product_post->ID) ){ ?>
										<div class="item__price">
											<span><?php echo get_field('acf_product_text_price', 'option'); ?> <?php echo get_field('acf_product_price', $product_post->ID); ?></span>
										</div>
									<?php } ?>
								</div>
								<div class="item__offer-txt">
									
									<?php if( have_rows('acf_product_offer') ): ?>
										<ul class="item__offer-list ">
											<?php while( have_rows('acf_product_offer') ): the_row(); ?>

												<li>
													<i class="fas fa-check-circle"></i>
													<span>
														<?php echo get_sub_field('acf_product_offer_content', $product_post->ID); ?>
													</span>
												</li>
											<?php endwhile; ?>
										</ul>
									<?php endif; ?>

									<?php if( get_field('acf_product_offer_text', $product_post->ID) ){ ?>
										<div class="item__txt">
											<span>
												<?php echo get_field('acf_product_offer_text', $product_post->ID); ?>
											</span>
										</div>
									<?php } ?>

								</div>
								<div class="item__links">
									<button type="button" class="button btn-modal-product" data-item="<?php echo $product_post->ID ?>"><?php echo get_field('acf_product_text_btn_benefits', 'option'); ?></button>
									<button type="button" class="button btn-modal-form"><?php echo get_field('acf_product_text_btn_speak', 'option'); ?></button>
								</div>
							</div>
						</div>

                	<?php }
                endif; 
                wp_reset_postdata(); ?>


		<?php }
		
		wp_reset_postdata(); 

		$response = ob_get_contents();
		ob_end_clean();

		echo $response;
		die(1);
	}

	












	// Filter AJAX
	add_action( 'wp_ajax_nopriv_load-filter', 'product_ajax_get' );
	add_action( 'wp_ajax_load-filter', 'product_ajax_get' );
	
	function product_ajax_get () {

		$dir = "/wp-content/themes/SG-Base-Theme";

		$product_category = $_POST['product_category'];

		if( !empty($_POST['product_brands'])  ){
			$brand_name = $_POST['product_brands'];
		} 
		
		if( !empty($_POST['product_models']) ){
			$product_model = $_POST['product_models'];
		} 
		

		if( !empty($_POST['product_locations'])  ){
			$product_location = $_POST['product_locations'];
		} 

		if( !empty($_POST['product_sizes']) ){
			$product_size = $_POST['product_sizes'];
		} 

			$product_args = array(
				'post_type' => 'products',
				'numberposts'   => -1,          
				'post_status'   => 'publish',
				'orderby' => 'name',
				'order' => 'ASC',
				'tax_query'	=> array(
					'relation'		=> 'OR',
					array(
						'taxonomy' => 'product_model',
						'field' => 'name',
						'terms'	  	=> $product_model ,
						'relation'	=> 'AND',
					),
					array(
						'taxonomy' => 'product_location',
						'field' => 'name',
						'terms'	  	=> $product_location ,
						'relation'	=> 'AND',
					),
					array(
						'taxonomy' => 'product_brand',
						'field' => 'name',
						'terms'	  	=> $brand_name ,
						'relation'	=> 'AND',
					),
					array(
						'taxonomy' => 'product_size',
						'field' => 'name',
						'terms'	  	=> $product_size ,
						'relation'	=> 'AND',
					),
				),
			);

		$product_posts = get_posts( $product_args );
		// dd( $product_posts );
		ob_start ();
	
		if ( $product_posts ) {
			foreach ( $product_posts as $product_post ) { setup_postdata( $product_post ); ?>

                   <div class="item">
                        <div class="item__logo">
                            <picture>
                                <source srcset="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" media="(max-width: 560px) ">
                                <img src="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" alt="brand" />
                            </picture>
                        </div>
                        <div class="item__hero">
                            <div class="item__title">
                                <span><?php echo get_the_title($product_post->ID); ?></span>
                            </div>
                            <?php if( get_field('acf_product_brand_model', $product_post->ID) ){ ?>
                                <a href="<?php the_permalink($product_post->ID); ?>" class="item__subtitle">
                                    <?php echo get_field('acf_product_brand_model', $product_post->ID); ?>
                                </a>
                            <?php } ?>
                            <div class="item__slider">
                                <?php 
                                    if( have_rows('acf_product_slider', $product_post->ID) ){
                                        while( have_rows('acf_product_slider', $product_post->ID) ) { the_row(); ?>
                                           
                                            <div class="item__slide">  
                                                <div class="item__characteristics">
                                                    <div class="item__characteristic ">
                                                        <span><?php echo get_sub_field('acf_product_btu', $product_post->ID); ?></span>
                                                        
                                                        <?php if( get_field('acf_product_text_btu', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_btu', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="item__characteristic">
                                                        <span><?php echo get_sub_field('acf_product_rating', $product_post->ID); ?>%</span>
                                                    
                                                        <?php if( get_field('acf_product_text_rating', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_rating', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="item__characteristic">
                                                        <span><?php echo get_sub_field('acf_product_size', $product_post->ID); ?></span>

                                                        <?php if( get_field('acf_product_text_size', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_size', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div> 

                                                <a href="<?php the_permalink($product_post->ID); ?>">   
                                                    <picture class="h-object-fit">
                                                        <source srcset="<?php echo wp_get_attachment_image_url( get_sub_field('acf_product_image', $product_post->ID) , 'large'); ?>" media="(max-width: 560px) ">
                                                        <img src="<?php echo wp_get_attachment_image_url( get_sub_field('acf_product_image', $product_post->ID) , 'large'); ?>" alt="описание" />
                                                    </picture>
                                                </a>
                                            </div>

                                        <?php } ?>
                                    
                                    <?php } else { ?>

                                        <a href="<?php the_permalink($product_post->ID); ?>" class="item__slide">   
                                            <picture class="h-object-fit">
                                                <source srcset="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($product_post->ID)  , 'large'); ?>" media="(max-width: 560px) ">
                                                <img src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($product_post->ID)  , 'large'); ?>" alt="product" />
                                            </picture>
                                        </a>

                                    <?php } ?>
                            
                            </div>
                            
                                <?php if( has_excerpt($product_post->ID) ){ ?>
                                    <div class="item__recommend">
                                        <span><?php echo get_the_excerpt($product_post->ID);?></span>
                                    </div>
                                <?php } ?>
                            
                            <a href="<?php the_permalink($product_post->ID); ?>" class="item__link"><?php echo get_field('acf_product_text_link', 'option'); ?></a>
                        </div>
                        <div class="item__info">
                            <?php if( get_field('acf_product_info', $product_post->ID) ){ ?>
                                <div class="item__desc">
                                    <?php echo get_field('acf_product_info', $product_post->ID); ?>
                                </div>
                            <?php } ?>
                            <div class="item__rate-price">
                                <?php if( get_field('acf_product_rating', $product_post->ID) ){ ?>
                                    <div class="item__rate">
                                        <div class="item__rate-stars">
                                           
                                            <?php $ratings = get_field('acf_product_rating', $product_post->ID);  

                                                $stars = calculateStarRating($ratings);

                                                for ($i = 0; $i < $stars; ++$i) { ?>
                                                    <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                                <?php } 

                                            ?>
                                         
                                        </div>
                                        <?php if( get_field('acf_product_text_google_rating', 'option') ){ ?>
                                            <span><?php echo get_field('acf_product_text_google_rating', 'option'); ?></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <?php if( get_field('acf_product_price', $product_post->ID) ){ ?>
                                    <div class="item__price">
                                        <span><?php echo get_field('acf_product_text_price', 'option'); ?> <?php echo get_field('acf_product_price', $product_post->ID); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="item__offer-txt">
                                
                                <?php if( have_rows('acf_product_offer', $product_post->ID) ): ?>
                                    <ul class="item__offer-list ">
                                        <?php while( have_rows('acf_product_offer', $product_post->ID) ): the_row(); ?>

                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                <span>
                                                    <?php echo get_sub_field('acf_product_offer_content', $product_post->ID); ?>
                                                </span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if( get_field('acf_product_offer_text', $product_post->ID) ){ ?>
                                    <div class="item__txt">
                                        <span>
                                            <?php echo get_field('acf_product_offer_text', $product_post->ID); ?>
                                        </span>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="item__links">
                                <button  class="button btn-modal-product" data-item="<?php echo $product_post->ID ?>"><?php echo get_field('acf_product_text_btn_benefits', 'option'); ?></button>
                                <button class="button btn-modal-form"><?php echo get_field('acf_product_text_btn_speak', 'option'); ?></button>
                            </div>
                        </div>
                    </div>

			<?php } 
		} else {
				
                $default_args = array(
                    'post_type' => 'products',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    =>  $product_category,
                        ),
                    ),
                );

                $default_loop = get_posts( $default_args );

                if ( $default_loop ) : 
                    foreach( $default_loop as $product_post ) { ?>

						<div class="item">
							<div class="item__logo">
								<picture>
									<source srcset="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" media="(max-width: 560px) ">
									<img src="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" alt="brand" />
								</picture>
							</div>
							<div class="item__hero">
								<div class="item__title">
									<span><?php echo get_the_title($product_post->ID); ?></span>
								</div>
								<?php if( get_field('acf_product_brand_model', $product_post->ID) ){ ?>
									<a href="<?php the_permalink($product_post->ID); ?>" class="item__subtitle">
										<?php echo get_field('acf_product_brand_model', $product_post->ID); ?>
									</a>
								<?php } ?>
								<div class="item__slider">
                                <?php 
                                    if( have_rows('acf_product_slider', $product_post->ID) ){
                                        while( have_rows('acf_product_slider', $product_post->ID) ) { the_row(); ?>
                                           
                                            <div class="item__slide">  
                                                <div class="item__characteristics">
                                                    <div class="item__characteristic ">
                                                        <span><?php echo get_sub_field('acf_product_btu', $product_post->ID); ?></span>
                                                        
                                                        <?php if( get_field('acf_product_text_btu', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_btu', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="item__characteristic">
                                                        <span><?php echo get_sub_field('acf_product_rating', $product_post->ID); ?>%</span>
                                                    
                                                        <?php if( get_field('acf_product_text_rating', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_rating', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="item__characteristic">
                                                        <span><?php echo get_sub_field('acf_product_size', $product_post->ID); ?></span>

                                                        <?php if( get_field('acf_product_text_size', 'option') ){ ?>
                                                            <span class="item__characteristic-green"><?php echo get_field('acf_product_text_size', 'option'); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div> 

                                                <a href="<?php the_permalink($product_post->ID); ?>">   
                                                    <picture class="h-object-fit">
                                                        <source srcset="<?php echo wp_get_attachment_image_url( get_sub_field('acf_product_image', $product_post->ID) , 'large'); ?>" media="(max-width: 560px) ">
                                                        <img src="<?php echo wp_get_attachment_image_url( get_sub_field('acf_product_image', $product_post->ID) , 'large'); ?>" alt="описание" />
                                                    </picture>
                                                </a>
                                            </div>

                                        <?php } ?>
                                    
                                    <?php } else { ?>

                                        <a href="<?php the_permalink($product_post->ID); ?>" class="item__slide">   
                                            <picture class="h-object-fit">
                                                <source srcset="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($product_post->ID)  , 'large'); ?>" media="(max-width: 560px) ">
                                                <img src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($product_post->ID)  , 'large'); ?>" alt="product" />
                                            </picture>
                                        </a>

                                    <?php } ?>
                            
                            </div>
								
									<?php if( has_excerpt($product_post->ID) ){ ?>
										<div class="item__recommend">
											<span><?php echo get_the_excerpt($product_post->ID);?></span>
										</div>
									<?php } ?>
								
								<a href="<?php the_permalink($product_post->ID); ?>" class="item__link"><?php echo get_field('acf_product_text_link', 'option'); ?></a>
							</div>
							<div class="item__info">
								<?php if( get_field('acf_product_info', $product_post->ID) ){ ?>
									<div class="item__desc">
										<?php echo get_field('acf_product_info', $product_post->ID); ?>
									</div>
								<?php } ?>
								<div class="item__rate-price">
									<?php if( get_field('acf_product_rating', $product_post->ID) ){ ?>
										<div class="item__rate">
											<div class="item__rate-stars">
											
												<?php $ratings = get_field('acf_product_rating', $product_post->ID);  

													$stars = calculateStarRating($ratings);

													for ($i = 0; $i < $stars; ++$i) { ?>
														<img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
													<?php } 

												?>
											
											</div>
											<?php if( get_field('acf_product_text_google_rating', 'option') ){ ?>
												<span><?php echo get_field('acf_product_text_google_rating', 'option'); ?></span>
											<?php } ?>
										</div>
									<?php } ?>

									<?php if( get_field('acf_product_price', $product_post->ID) ){ ?>
										<div class="item__price">
											<span><?php echo get_field('acf_product_text_price', 'option'); ?> <?php echo get_field('acf_product_price', $product_post->ID); ?></span>
										</div>
									<?php } ?>
								</div>
								<div class="item__offer-txt">
									
									<?php if( have_rows('acf_product_offer') ): ?>
										<ul class="item__offer-list ">
											<?php while( have_rows('acf_product_offer') ): the_row(); ?>

												<li>
													<i class="fas fa-check-circle"></i>
													<span>
														<?php echo get_sub_field('acf_product_offer_content', $product_post->ID); ?>
													</span>
												</li>
											<?php endwhile; ?>
										</ul>
									<?php endif; ?>

									<?php if( get_field('acf_product_offer_text', $product_post->ID) ){ ?>
										<div class="item__txt">
											<span>
												<?php echo get_field('acf_product_offer_text', $product_post->ID); ?>
											</span>
										</div>
									<?php } ?>

								</div>
								<div class="item__links">
									<button  class="button btn-modal-product" data-item="<?php echo $product_post->ID ?>"><?php echo get_field('acf_product_text_btn_benefits', 'option'); ?></button>
									<button class="button btn-modal-form"><?php echo get_field('acf_product_text_btn_speak', 'option'); ?></button>
								</div>
							</div>
						</div>

                	<?php }
                endif; 
                wp_reset_postdata(); ?>
       




		<?php }
		
		wp_reset_postdata(); 

		$response = ob_get_contents();
		ob_end_clean();

		echo $response;
		die(1);
	}


	function get_list_tax( $taxonomy ) {
		$taxonomy_args = array(
			'orderby'       => 'term_id', 
			'order'         => 'ASC',
			'hide_empty'    => true, 
		);
		$list_tax = get_terms( $taxonomy, $taxonomy_args );
		return $list_tax; 
	}

// Post ajax to modal
add_action( 'wp_ajax_loadmore', 'true_load_posts' );
add_action( 'wp_ajax_nopriv_loadmore', 'true_load_posts' );
	function true_load_posts () {

		$postID = $_POST[ 'getID' ];

		$args = array( 
			'post_type' => 'products',
			'numberposts'=> 0,
			'include' => $postID,
			'suppress_filters' => true,
		  );
	
		$products = get_posts( $args );
	
		ob_start ();
	
		foreach ( $products as $product_post ) { setup_postdata( $product_post ); ?>

			<div id="modal-product-item_<?php echo $product_post->ID ?>">
				<?php if( get_field('acf_product_modal', $product_post->ID) ){ ?>
					<?php echo get_field('acf_product_modal', $product_post->ID); ?>
				<?php } else { ?>
					<h2>Not found</h2>
				<?php } ?>
			</div>
			
		<?php }  wp_reset_postdata(); 

	
			$response = ob_get_contents();
			ob_end_clean();
	
			echo $response;
			die(1);
	}
	


	$dir = get_template_directory();
	// Update CSS within in Admin
	function admin_style() {
	  wp_enqueue_style('admin-styles', '/wp-content/themes/SG-Base-Theme/css/admin.css');
	}
	add_action('admin_enqueue_scripts', 'admin_style');
	add_theme_support( 'post-thumbnails' );
	// ADD CUSTOM POST TYPES AND CUSTOM META FIELDS
	function codex_custom_init(){
		require_once('includes/posts.php');
		require_once('includes/products.php');
		require_once('includes/testimonials.php');
		require_once('includes/press.php');
		require_once('includes/job-postings.php');
		add_post_type_support( 'products', 'thumbnail' );
	}
	// THEN YOU INITIALIZE THE CODE BY RUNNING THE "init" HOOK
	add_action( 'init', 'codex_custom_init' );


	

	// MANUALLY LIMIT THE EXCERPT COUNT
	function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

	// REGISTER NEW MENUS
	function register_my_menus() {
	    register_nav_menus(
	        array(
	            'primary-menu' => __( 'menu-top' ),
	            'secondary-menu' => __( 'footer-top' ),
	            'tertiary-menu' => __( 'footer-bottom' ),
	            'builder-primary-menu' => __( 'menu-top' ),
	            'builder-secondary-menu' => __( 'footer-top' ),
	            'builder-tertiary-menu' => __( 'footer-bottom' )
			)
	    );
	}
	add_action( 'init', 'register_my_menus' );

	// REGISTER SIDE BARS
	function wpdocs_theme_slug_widgets_init() {
	    register_sidebar( array(
	        'name'          => __( 'Footer Text', 'textdomain' ),
	        'id'            => 'sidebar-1',
	        'description'   => __( 'Text in this area will be shown on all posts and pages.', 'textdomain' ),
	        'before_widget' => '',
	        'after_widget'  => '',
	        'before_title'  => '',
	        'after_title'   => '',
	    ) );
	}
	add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

	// ONLY ALLOW CERTAIN BLOCK TYPES
	add_filter( 'allowed_block_types', 'codesquid_allowed_block_types' );
 
function codesquid_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/html',
		'block-lab/sg-hero',
		'block-lab/featured-products',
		'block-lab/form-block',
		'block-lab/half-and-half',
		'block-lab/half-and-half-products',
		'block-lab/info-block',
		'block-lab/image-flex-list',
		'block-lab/logo-salad',
		'block-lab/price-block',
		'block-lab/testimonials',
		'block-lab/two-column-list',
		'block-lab/bottom-form',
		'block-lab/faq-block',
		'block-lab/all-testimonials',
		'block-lab/contact-block',
		'block-lab/stats-block',
		'block-lab/timeline-block',
		'block-lab/all-products',
		'block-lab/job-listings',
		'block-lab/plan-forms',
		'block-lab/video-block'
	);
 
}

/**
* Customizer additions.
*/
require $dir.'/includes/customizer.php';


/**
* Admin Fields additions.
*/
require get_template_directory() . '/includes/swipeks.php';



// define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
// 	define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );
	
// 	include_once( MY_ACF_PATH . 'acf.php' );
	
// 	add_filter('acf/settings/url', 'my_acf_settings_url');
// 	function my_acf_settings_url( $url ) {
// 		return MY_ACF_URL;
// 	}
	
// 	add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// 	function my_acf_settings_show_admin( $show_admin ) {
// 		return false;
// 	}
	
	// Admin fields to product
	// add_action( 'acf/register_fields', 'my_function_to_add_field_groups' );
	// function my_function_to_add_field_groups() {

	// 	if( function_exists('acf_add_local_field_group') ):

			
	// 	endif;

	// }




// options page(s)

if( function_exists('acf_add_options_page') ) {

	

	acf_add_options_page(array(

		'page_title' 	=> 'Swipeks settings',

		'menu_title'	=> 'Swipeks settings',

		'icon_url'      => 'dashicons-tide',

		'menu_slug' 	=> 'theme-general-settings',

		'capability'	=> 'edit_posts',

		'redirect'		=> false

	));

}



add_filter('acf/format_value/type=textarea', 'do_shortcode');


add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field', 20);
  function add_default_value_to_image_field($field) {
    acf_render_field_setting( $field, array(
      'label'      => __('Default Image ID','acf'),
      'instructions'  => __('Appears when creating a new post','acf'),
      'type'      => 'image',
      'name'      => 'default_value',
    ));
  }


add_filter('acf/format_value/type=wysiwyg', 'format_value_wysiwyg', 10, 3);
function format_value_wysiwyg( $value, $post_id, $field ) {
	$value = apply_filters( 'the_content', $value );
	return $value;
}


add_filter('the_content', 'do_shortcode');





function calculateStarRating( $rating ){ 

	$rating = intval($rating); 

	// 1 - 20
	// 2 - 40
	// 3 - 60
	// 4 - 80
	// 5 - 100

	// dd( $rating );

	if($rating <= 0 and $rating >= 20 ){ 
		return number_format(1);
	}

	elseif($rating >= 21 and $rating <= 40 ){
		return number_format(2);
	}

	elseif($rating >= 41 and $rating <= 60 ){
		return number_format(3);
	}

	elseif($rating >= 61 and $rating <= 80 ){
		return number_format(4);
	}

	elseif($rating >= 81 and $rating <= 100 ){
		return number_format(5);
	}

}






