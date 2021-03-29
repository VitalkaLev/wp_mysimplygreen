<?php
/**
 * Template Name: Product Page Template
 * Template Post Type: products
 *
 * This is the wordpress posts template. It contains a list of all the posts and media to date.
 *
 * @package SG-Base-Theme
 * @subpackage SimplyGreen-2020
 * @since 2020
 */
?>
<?php get_header();?>
<?php $dir = get_stylesheet_directory_uri();?>

<!-- The Loop -->

<section class="single-product">
    <div class="inner-box">
        <h1><?php the_title();?></h1>
    </div>
    <?php
if (have_posts()): while (have_posts()): the_post();
        $meta = get_post_meta($post->ID, 'meta', true);
        ?>

    <div class="half-and-half-products" data-category="<?php sps_category();?>">
        <div class="text-side">
            <div class="copy">
                <?php echo '<img src="' . $meta['thumbnail_url'] . '" class="prod-logo"/>' ?>
                <p><?php the_content();?></p>
                <a href="#contact-form" class="button">We're here to help</a>
            </div>
        </div>
        <div class="image-side"><?php the_post_thumbnail();?></div>
    </div>
    <?php endwhile;endif;
wp_reset_postdata();?>
</section>

<section class="category-list  <?php sps_category();?>">
    <div class="inner-box">
        <h2>Related Products</h2>
        <nav id="tab-block">
            <ul>
                <li id="heating">Heating</li>
                <li id="cooling">Cooling</li>
                <li id="air-filtration">Air Filtration</li>
                <li id="water-heating">Water Heating</li>
                <li id="water-treatment">Water Treatment</li>
            </ul>
        </nav>
        <div class="product-grid">
            <?php
$args = array(
    'post_type' => 'products',
    'posts_per_page' => -1,
);

$product_loop = new WP_Query($args);

if ($product_loop->have_posts()): while ($product_loop->have_posts()): $product_loop->the_post();
        $meta = get_post_meta($post->ID, 'meta', true);?>
            <div class="item <?php sps_category();?>">
                <div class="text-side">
                    <?php echo '<img src="' . $meta['thumbnail_url'] . '" class="prod-logo"/>' ?>
                    <h3><?php the_title();?></h3>
                    <p><?php echo excerpt(10); ?></p>
                    <div class="cta-block"><a href="<?php the_permalink();?>">View details ›</a></div>
                </div>
                <div class="image-side"><?php the_post_thumbnail();?></div>
            </div>
            <?php endwhile;endif;
wp_reset_postdata();?>
        </div>
    </div>
</section>

<section class="form-bottom" id="contact-form">
    <div class="inner-box">
        <div class="bottom_form__header" aria-live="assertive" aria-relevant="all">
            <h2>
                <span id="new-form-title">
                    Looking for a New HVAC System?
                </span>
                <span id="existing-form-title">
                    Have a Question About Your Existing Products or Services?
                </span>
            </h2>
            <button type="button" class="bottom_form__toggle btn--no-style" id="bottom_form__toggle"
                aria-pressed="true">
                <div class="bottom_form__toggle--btn bottom_form__toggle--left active"
                    data-id="bottom_form__toggle--left" id="bottom_form__toggle--left">
                    I am a New Customer
                </div>
                <div class="bottom_form__toggle--btn bottom_form__toggle--right" data-id="bottom_form__toggle--right"
                    id="bottom_form__toggle--right">
                    I am an Existing Customer
                </div>
            </button>

        </div>
        <p class="subheader">
            <span id="new-form-copy">
                We have the right HVAC solution for you and experts that can help. Fill out the form below, and a member
                of our sales team will get back to you shortly.

            </span>
            <span id="existing-form-copy">
                Are you an existing customer? We’d be happy to help you with any questions you may have. Simply, fill
                out the form below and a member of our customer service team will get back to you shortly.
            </span>
        </p>

        <?php include 'sg-contact-form.php';?>
        <?php include 'sg-contact-sales-form.php';?>
    </div>
</section>
<?php get_footer();?>