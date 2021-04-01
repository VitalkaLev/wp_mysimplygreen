<div class="category-filter__list">
    <div class="category-filter__group category-filter-group category-filter-group--product">
        <button type="button" class="category-filter-group__action">
            <span class="category-filter-group__title"><?php echo get_field('acf_filter_name_product', 'option'); ?></span>
        </button>
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
        <button type="button" class="category-filter-group__action">
            <span class="category-filter-group__title"><?php echo get_field('acf_filter_name_brand', 'option'); ?></span>
        </button>        
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
        <button type="button" class="category-filter-group__action">
            <span class="category-filter-group__title"><?php echo get_field('acf_filter_name_location', 'option'); ?></span>
        </button>
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
        <button type="button" class="category-filter-group__action">
            <span class="category-filter-group__title"><?php echo get_field('acf_filter_name_size', 'option'); ?></span>
        </button>
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



                                
    
                          