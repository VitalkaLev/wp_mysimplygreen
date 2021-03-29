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
                                // function get_query_posts( $post_type , $taxonomy , $meta_key ) 
                                $brands = get_query_tax('products','category','product-brands');
                                $product_data = [];

                                $term_obj_list = get_the_terms( $post->ID, 'product-brands' );

                                if( $brands->have_posts() ){
                                    while( $brands->have_posts() ) : $brands->the_post(); ?>

                                        <?php 
                                            // $brand_data = [
                                            //     'brand_name' => '' , 
                                            //     'product_category' => get_queried_object()->post_name ,
                                            // ];

                                            // if( $brand_data['brand_name'] ){ ?>

                                                <li class="category-filter-group__item" onclick="brand_ajax_get('<?php echo $brand_data['brand_name'] ?>', '<?php echo $brand_data['product_category'] ?>');">
                                                    <input type="checkbox" id="chk<?php echo $brand_index; ?>-label">
                                                    <label for="chk<?php echo $brand_index; ?>-label">
                                                        <?php echo get_field('acf_product_brand_name');  ?>
                                                    </label>
                                                </li>
                                            <?php } ?>

                                    <?php endwhile; wp_reset_query(); 
                                } else {
                                    echo 'Not found';
                                } ?>
                            </ul>
                        </div>
                        <div class="category-filter__group category-filter-group category-filter-group--brand">
                            <span class="category-filter-group__title">Brand</span>
                            <ul class="category-filter-group__list">
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk5-label">
                                    <label for="chk5-label">Goodman</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk6-label">
                                    <label for="chk6-label">Lennox</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk7-label">
                                    <label for="chk7-label">LG</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk8-label">
                                    <label for="chk8-label">Navien</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk9-label">
                                    <label for="chk9-label">Rinnai</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk10-label">
                                    <label for="chk10-label">Rheem</label>
                                </li>
                            </ul>
                        </div>
                        <div class="category-filter__group category-filter-group category-filter-group--location">
                            <span class="category-filter-group__title">Location</span>
                            <ul class="category-filter-group__list">
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk11-label">
                                    <label for="chk11-label">Alberta</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk12-label">
                                    <label for="chk12-label">British Columbia</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk13-label">
                                    <label for="chk13-label">Manitoba</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk14-label">
                                    <label for="chk14-label">New Brunswick</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk15-label">
                                    <label for="chk15-label">Newfoundland & Labrador</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk16-label">
                                    <label for="chk16-label">Nova Scotia</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk17-label">
                                    <label for="chk17-label">Ontario</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk18-label">
                                    <label for="chk18-label">Prince Edward Island</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk19-label">
                                    <label for="chk19-label">Saskatchewan</label>
                                </li>
                            </ul>
                        </div>
                        <div class="category-filter__group category-filter-group category-filter-group--size">
                            <span class="category-filter-group__title">Home Size</span>
                            <ul class="category-filter-group__list">
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk20-label">
                                    <label for="chk20-label">800 - 1,200 sq. ft.</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk21-label">
                                    <label for="chk21-label">1,200 - 1,600 sq. ft.</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk22-label">
                                    <label for="chk22-label">1,600 - 2,000 sq. ft.</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk23-label">
                                    <label for="chk23-label">2,000 - 2,400 sq. ft.</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk24-label">
                                    <label for="chk24-label">2,400 - 2,800 sq. ft.</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk25-label">
                                    <label for="chk25-label">2,800 - 3,200 sq. ft.</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk26-label">
                                    <label for="chk26-label">3,200 - 3,600 sq. ft.</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk27-label">
                                    <label for="chk27-label">3,600 - 4,000 sq. ft.</label>
                                </li>
                                <li class="category-filter-group__item">
                                    <input type="checkbox" id="chk28-label">
                                    <label for="chk28-label">4,000+ sq. ft.</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="category-filter__submit">
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

    function brand_ajax_get( productBrand, productCat ) {
      
        var ajaxurl = '../wp-admin/admin-ajax.php';
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: { action: "load-filter", product_brand: productBrand , product_cat: productCat },
            success: function(response) {
                $(".product-ajax").html(response);
                return false;
            }
        });
    }

</script>