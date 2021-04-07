<?php 
    $dir = "/wp-content/themes/SG-Base-Theme";
?>

<section class="category-list <?php block_field('default-section');?>">
    <div class="inner-box">
        <div class="category-head">
            <div class="category-head__info">
                <?php if( get_field('acf_filter_name_title', 'option') ){ ?>
                    <h2><?php echo get_field('acf_filter_name_title', 'option'); ?></h2>
                <?php } ?>

                <?php if( get_field('acf_filter_name_subtitle', 'option') ){ ?>
                    <span>
                        <?php echo get_field('acf_filter_name_subtitle', 'option'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="current-location">
                <div class="current-location__ico">
                    <i class="fas fa-location-arrow"></i>
                </div>
                <div class="current-location__info">
                    
                    <span class="current-location__name"><?php echo $get_location = get_city(); ?></span>
                    <h3>
                        <button type="button" id="current-location__button accordion-header-2" class="current-location__button" aria-expanded="false" aria-controls="accordion-panel-2" data-accordion>
                                <span class="current-location__button-txt">Change ›</span> 
                        </button>
                    </h3>
                    <ul class="current-location__list" hidden aria-labelledby="accordion-header-2" id="accordion-panel-2">
                        <?php 
                            $locations_args = array(
                            'post_type' => 'list_location',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                        );

                        $locations = get_posts( $locations_args );

                        
                        if ( $locations ) { 
                            foreach( $locations as $location ) { ?>

                                <li class="current-location__item">
                                    <button value="<?php echo get_the_title($location->ID); ?>" data-category="<?php block_field('default-section');?>">
                                        <?php echo get_the_title($location->ID); ?>
                                    </button>
                                </li>
                            <?php } 
                        }  ?>
                      
                        

                    </ul>
                </div>
            </div>
        </div>

        <nav id="tab-block-links" class="category-list__nav">
            <ul class="category-list__list category-list__list--mobile">
                <li id="heating" class="category-list__item <?php if( block_field('default-section', false ) === 'heating' ){ echo "active"; } ?>">
                    <a class="category-list__link" href="/heating-products/">Heating</a>
                    
                    <?php if(  block_field('default-section', false ) === 'heating' ){ ?>
                        <div class="category-list__item-mobile-wrap">
                            <?php if( wp_is_mobile() ){ ?>
                                <form action="/" class="category-filter__body " id="accordion-panel-1" aria-labelledby="accordion-header-1" >
                                    <button type="reset" class="category-filter__all">View all Heating</button>
                                    
                                    <?php get_template_part('/blocks/swipeks-mobile-filters'); ?>

                                    <div class="category-filter__submit" data-category=<?php block_field('default-section');?>>
                                        <button type="button"><?php echo get_field('acf_filter_name_btn_submit', 'option'); ?></button>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </li>
                <li id="cooling" class="category-list__item <?php if( block_field('default-section', false ) === 'cooling' ){ echo "active"; } ?>">
                    <a class="category-list__link" href="/cooling-products/">Cooling</a>
                    <?php if(  block_field('default-section', false ) === 'cooling' ){ ?>
                        <div class="category-list__item-mobile-wrap">
                            <?php if( wp_is_mobile() ){ ?>
                                <form action="/" class="category-filter__body" id="accordion-panel-1" aria-labelledby="accordion-header-1" >
                                    <button type="reset" class="category-filter__all">View all Cooling</button>
                                    
                                    <?php get_template_part('/blocks/swipeks-mobile-filters'); ?>

                                    <div class="category-filter__submit" data-category=<?php block_field('default-section');?>>
                                        <button type="button"><?php echo get_field('acf_filter_name_btn_submit', 'option'); ?></button>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </li>
                <li id="air-filtration" class="category-list__item <?php if( block_field('default-section', false ) === 'air-filtration' ){ echo "active"; } ?>">
                    <a class="category-list__link" href="/air-filtration-products/">AirFiltration</a>
                    <?php if(  block_field('default-section', false ) === 'air-filtration' ){ ?>
                        <div class="category-list__item-mobile-wrap">
                            <?php if( wp_is_mobile() ){ ?>
                                <form action="/" class="category-filter__body" id="accordion-panel-1" aria-labelledby="accordion-header-1" >
                                    <button type="reset" class="category-filter__all">View all AirFiltration</button>
                                    
                                    <?php get_template_part('/blocks/swipeks-mobile-filters'); ?>

                                    <div class="category-filter__submit" data-category=<?php block_field('default-section');?>>
                                        <button type="button"><?php echo get_field('acf_filter_name_btn_submit', 'option'); ?></button>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </li>
                <li id="water-heating" class="category-list__item <?php if( block_field('default-section', false ) === 'water-heating' ){ echo "active"; } ?>">
                    <a class="category-list__link" href="/water-heating-products/">Water Heating</a>
                    <?php if(  block_field('default-section', false ) === 'water-heating' ){ ?>
                        <div class="category-list__item-mobile-wrap">
                            <?php if( wp_is_mobile() ){ ?>
                                <form action="/" class="category-filter__body" id="accordion-panel-1" aria-labelledby="accordion-header-1" >
                                    <button type="reset" class="category-filter__all">View all Water Heating</button>
                                    
                                    <?php get_template_part('/blocks/swipeks-mobile-filters'); ?>

                                    <div class="category-filter__submit" data-category=<?php block_field('default-section');?>>
                                        <button type="button"><?php echo get_field('acf_filter_name_btn_submit', 'option'); ?></button>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </li>
                <li id="water-treatment" class="category-list__item <?php if(  block_field('default-section', false ) === 'water-treatment' ){ echo "active"; } ?>">
                    <a class="category-list__link" href="/water-treatment-products/">Water Treatment</a>
                    <?php if(  block_field('default-section', false ) === 'water-treatment' ){ ?>
                        <div class="category-list__item-mobile-wrap">
                            <?php if( wp_is_mobile() ){ ?>
                                <form action="/" class="category-filter__body" id="accordion-panel-1" aria-labelledby="accordion-header-1" >
                                    <button type="reset" class="category-filter__all">View all Water Treatment</button>

                                     <?php get_template_part('/blocks/swipeks-mobile-filters'); ?>

                                    <div class="category-filter__submit" data-category=<?php block_field('default-section');?>>
                                        <button type="button"><?php echo get_field('acf_filter_name_btn_submit', 'option'); ?></button>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </li>
            </ul>
            <?php if( !wp_is_mobile()){ ?>      
            <div class="category-filter category-filter--desktop">
                <h3 class="category-filter__action">
                    <button class="category-filter__btn" id="accordion-header-1" aria-expanded="false" aria-controls="accordion-panel-1" data-accordion> Show Filters 
                        <img src="<?php echo $dir; ?>/images/SVG/arrow.svg" alt="filter">
                    </button>
                </h3>
                
                <form action="/" class="category-filter__body" id="accordion-panel-1" aria-labelledby="accordion-header-1" hidden>
                    <div class="category-filter__list">
                        <div class="category-filter__group category-filter-group category-filter-group--product">
                            <span class="category-filter-group__title"><?php echo get_field('acf_filter_name_product', 'option'); ?></span>
                            <ul class="category-filter-group__list">
                                <?php 
                                    $models = get_list_tax('product_model');
                                
                                    if( $models ){
                                        foreach ( $models as $model_index => $model ) { ?>

                                            <li class="category-filter-group__item">
                                                <input type="checkbox" id="ch-<?php echo $model_index; ?>-label-model" value="<?php echo $model->name; ?>" data-group='models' >
                                                <label for="ch-<?php echo $model_index; ?>-label-model">
                                                    <?php echo $model->name;  ?>
                                                </label>
                                            </li>

                                        <?php } 

                                    } else {
                                        echo 'Not found';
                                    } 
                                ?>
                            </ul>
                        </div>
                        <div class="category-filter__group category-filter-group category-filter-group--brand">
                            <span class="category-filter-group__title"><?php echo get_field('acf_filter_name_brand', 'option'); ?></span>
                            <ul class="category-filter-group__list">
                                <?php 
                                    $brands = get_list_tax('product_brand');
                            
                                    if( $brands ){
                                        foreach ( $brands as $brand_index => $brand ) { ?>

                                            <li class="category-filter-group__item">
                                                <input type="checkbox" id="ch-<?php echo $brand_index; ?>-label-brand" value="<?php echo $brand->name; ?>" data-group='brands' >
                                                <label for="ch-<?php echo $brand_index; ?>-label-brand">
                                                    <?php echo $brand->name;  ?>
                                                </label>
                                            </li>

                                        <?php } 

                                    } else {
                                        echo 'Not found';
                                    } 
                                ?>
                            </ul>
                        </div>
                        <div class="category-filter__group category-filter-group category-filter-group--location">
                            <span class="category-filter-group__title"><?php echo get_field('acf_filter_name_location', 'option'); ?></span>
                            <ul class="category-filter-group__list">
                                <?php 
                                    $locations = get_list_tax('product_location');
                            
                                    if( $locations ){
                                        foreach ( $locations as $location_index => $location ) { ?>

                                            <li class="category-filter-group__item">
                                                <input type="checkbox" id="ch-<?php echo $location_index; ?>-label-location" value="<?php echo $location->name; ?>" data-group='locations' >
                                                <label for="ch-<?php echo $location_index; ?>-label-location">
                                                    <?php echo $location->name;  ?>
                                                </label>
                                            </li>

                                        <?php } 

                                    } else {
                                        echo 'Not found';
                                    } 
                                ?>
                            </ul>
                        </div>
                        <div class="category-filter__group category-filter-group category-filter-group--size">
                            <span class="category-filter-group__title"><?php echo get_field('acf_filter_name_size', 'option'); ?></span>
                            <ul class="category-filter-group__list">
                                <?php 
                                    $sizes = get_list_tax('product_size');

                                    if( $sizes ){
                                        foreach ( $sizes as $size_index => $size ) { ?>
                                            <li class="category-filter-group__item">
                                                <input type="checkbox" id="ch-<?php echo $size_index; ?>-label-size" value="<?php echo $size->name; ?>" data-group='sizes' >
                                                <label for="ch-<?php echo $size_index; ?>-label-size">
                                                    <?php echo $size->name;  ?>
                                                </label>
                                            </li>

                                        <?php } 

                                    } else {
                                        echo 'Not found';
                                    } 
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="category-filter__submit" data-category=<?php block_field('default-section');?>>
                        <button type="button"><?php echo get_field('acf_filter_name_btn_submit', 'option'); ?></button>
                    </div>
                </form>

            </div>
            <?php } ?>
        </nav>
        <div class="product-grid product-ajax">
            <?php  
             
                $product_cat = block_field('default-section', false);  


                $product_args = array(
                    'post_type' => 'products',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    =>  $product_cat,
                        ),
                        array(
                            'taxonomy' => 'product_location',
                            'field' => 'name',
                            'terms'	  	=> $get_location ,
                            'relation'	=> 'AND',
                        ),
                    ),
                );

                $product_loop = get_posts( $product_args );

                if ( $product_loop ) {
                    foreach( $product_loop as $product_post ) { ?>

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
                } else { ?>
                    
                    <h2>
                        No products were found at this location! Please change the location!!
                    </h2>
                <?php }
                wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="modal modal-product" aria-modal="true" role="dialog">
        <div class="modal-content">
            <span class="close">
                <button type="button" class="btn--no-style" style="border: none !important">×</button>
            </span>
            <div class="modal-inner">
            
            </div>
        </div>
    </div>
    <div class="modal modal-form" aria-modal="true" role="dialog">
        <div class="modal-content">
            <span class="close">
                <button type="button" class="btn--no-style" style="border: none !important">×</button>
            </span>
            <div class="modal-inner">
                <?php get_template_part('blocks/swipeks-modal-form');?>
            </div>
        </div>
    </div>
</section>



                          
