<?php 
    $dir = "/wp-content/themes/SG-Base-Theme";
?>



<section class="category-list <?php block_field('default-section');?>">
    <div class="inner-box">
        <div class="category-head">
            <div class="category-head__info">
                <h2>Our Products</h2>
                <span>Filter products by: </span>
            </div>
            <div class="current-location">
                <div class="current-location__ico">
                    <i class="fas fa-location-arrow"></i>
                </div>
                <div class="current-location__info">
                    <span class="current-location__name"> Select location </span>
                    <button type="button" id="current-location__button" class="current-location__button">
                        <span class="current-location__button-txt">Change ›</span>
                    </button>
                </div>
            </div>
        </div>
        <nav id="tab-block-links" class="category-list__nav">
            <ul class="category-list__list">
                <li id="heating" class="category-list__item"><a class="category-list__link" href="/heating-products/">Heating</a></li>
                <li id="cooling" class="category-list__item"><a class="category-list__link" href="/cooling-products/">Cooling</a></li>
                <li id="air-filtration" class="category-list__item"><a class="category-list__link" href="/air-filtration-products/">Air Filtration</a></li>
                <li id="water-heating" class="category-list__item"><a class="category-list__link" href="/water-heating-products/">Water Heating</a></li>
                <li id="water-treatment" class="category-list__item"><a class="category-list__link" href="/water-treatment-products/">Water Treatment</a></li>
            </ul>
            <div class="category-filter">
                <h3 class="category-filter__action">
                    <button class="category-filter__btn" id="accordion-header-1" aria-expanded="false" aria-controls="accordion-panel-1" data-accordion> Show Filters 
                        <img src="<?php echo $dir; ?>/images/SVG/arrow.svg" alt="">
                    </button>
                </h3>
                <div class="category-filter__body" id="accordion-panel-1" aria-labelledby="accordion-header-1" hidden>
                    <div class="category-filter__list">
                        <div class="category-filter__group category-filter-group category-filter-group--product">
                            <span class="category-filter-group__title">Product</span>
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
                            <span class="category-filter-group__title">Brand</span>
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
                            <span class="category-filter-group__title">Location</span>
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
                            <span class="category-filter-group__title">Home Size</span>
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
                        <button>Apply</button>
                    </div>

                </div>
            </div>
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
                    ),
                );

                $product_loop = get_posts( $product_args );

                if ( $product_loop ) : 
                    foreach( $product_loop as $product_post ) { ?>

                    <div class="item">
                        <div class="item__logo">
                            <picture>
                                <source srcset="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" media="(max-width: 560px) ">
                                <img src="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" alt="описание" />
                            </picture>
                        </div>
                        <div class="item__hero">
                            <div class="item__title">
                                <span><?php the_title(); ?></span>
                            </div>
                            <a href="<?php the_permalink($product_post->ID); ?>" class="item__link">
                                <?php echo get_field('acf_product_brand_name', $product_post->ID); ?>
                            </a>
                            <div class="item__characteristics">
                                <div class="item__characteristic ">
                                    <span><?php echo get_field('acf_product_btu', $product_post->ID); ?></span>
                                    <span>BTU</span>
                                </div>
                                <div class="item__characteristic">
                                    <span><?php echo get_field('acf_product_rating', $product_post->ID); ?></span>
                                    <span>Efficiency Rating</span>
                                </div>
                                <div class="item__characteristic">
                                    <span><?php echo get_field('acf_product_size', $product_post->ID); ?></span>
                                    <span>Size</span>
                                </div>
                            </div>
                            <div class="item__slider">
                                <?php 

                                    $gallery = get_field('acf_product_gallery', $product_post->ID);

                                    if( $gallery ): ?>
                                    
                                        <?php foreach( $gallery as $gallery_item ): ?>
                                            <?php if( !empty($gallery_item) ){ ?>
                                                <a href="<?php the_permalink($product_post->ID); ?>" class="item__slide">   
                                                    <picture class="h-object-fit">
                                                        <source srcset="<?php echo wp_get_attachment_image_url( $gallery_item , 'large'); ?>" media="(max-width: 560px) ">
                                                        <img src="<?php echo wp_get_attachment_image_url( $gallery_item , 'large'); ?>" alt="описание" />
                                                    </picture>
                                                </a>
                                            <?php } else { ?>
                                                <a  href="<?php the_permalink($product_post->ID); ?>" class="item__slide">   
                                                    <picture class="h-object-fit">
                                                        <source srcset="<?php echo $dir; ?>/placeholder.png" media="(max-width: 560px) ">
                                                        <img src="<?php echo $dir; ?>/placeholder.png" alt="описание" />
                                                    </picture>
                                                </a>
                                            <?php } ?>

                                              
                                        <?php endforeach; ?>
                                    
                                    <?php endif; ?>
                            
                            </div>
                            <div class="item__recommend">
                                <span><?php echo get_the_excerpt($product_post->ID);?></span>
                            </div>
                            <a href="<?php the_permalink($product_post->ID); ?>" class="item__link">Learn more</a>
                        </div>
                        <div class="item__info">
                            <div class="item__desc">
                                <?php echo get_field('acf_product_info', $product_post->ID); ?>
                            </div>
                            <div class="item__rate-price">
                                <div class="item__rate">
                                    <div class="item__rate-stars">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                    </div>
                                    <span>Google Rating</span>
                                </div>
                                <div class="item__price">
                                    <span>Relative Price: <?php echo get_field('acf_product_price', $product_post->ID); ?></span>
                                </div>
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


                                <div class="item__txt">
                                    <span>
                                        <?php echo get_field('acf_product_offer_text', $product_post->ID); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="item__links">
                                <a href="#" class="button">Benefits of leasing</a>
                                <a href="#" class="button">Speak to a home specialist </a>
                            </div>
                        </div>
                    </div>

                <?php }
                endif; 
                wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<script>

        var models  = [];
        var brands = [];
        var locations = [];
        var sizes = [];


        $(".category-filter-group input").on("change", function(){
            
            var $this = $(this)
            var $thisValue = $this.val(); 
            var $thisData = $this.data('group'); 
            
            if ($this.is(":checked")) 
            {
                if($thisData == 'models') {
                    models.push($this.val());
                }

                if($thisData == 'sizes') {
                    sizes.push($this.val());
                }

                if($thisData == 'brands') {
                    brands.push($this.val());
                }

                if($thisData == 'locations') {
                    locations.push($this.val());
                }

            } else {
                models = models.filter(x => x != $this.val());
                if($thisData == 'models') {
                    models = models.filter(x => x != $this.val());
                }

                if($thisData == 'sizes') {
                    sizes = sizes.filter(x => x != $this.val());
                }

                if($thisData == 'brands') {
                    brands = brands.filter(x => x != $this.val());
                }

                if($thisData == 'locations') {
                    locations = locations.filter(x => x != $this.val());
                }
            }
            

        });

    

    function brand_ajax_get() {

        function slickCarousel() {
            $('.item__slider').slick();
        }

        function destroyCarousel() {
            if ($('.item__slider').hasClass('slick-initialized')) {
                $('.item__slider').slick('destroy');
            }      
        }


        var category = $(this).data('category'); 
        var ajaxurl = '../wp-admin/admin-ajax.php';

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: { action: "load-filter", product_category: category , product_models: models , product_locations: locations , product_brands: brands , product_sizes: sizes },
            success: function(response) {
                $(".product-ajax").html(response);
                
                destroyCarousel()
                slickCarousel();

                $('.category-filter__body').prop('hidden', true);

                return false;
            }
        });
    }

    $('.category-filter__submit').on('click' , brand_ajax_get);

</script>