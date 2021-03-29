<section class="form-bottom">
    <div class="inner-box">


        <!-- If button clicked show both
		else show one -->

        <?php if (block_value('include-both-forms')) {?>
        <div class="bottom_form__header" aria-live="assertive" aria-relevant="all">
            <h2>
                <span id="new-form-title"><?php block_field('new-form-title');?></span>
                <span id="existing-form-title"><?php block_field('title');?></span>
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
            <span id="new-form-copy"><?php block_field('new-form-copy');?></span>
            <span id="existing-form-copy"><?php block_field('copy');?></span>
        </p>

        <?php include 'sg-contact-form.php';?>
        <?php include 'sg-contact-sales-form.php';?>

        <?php } else {;?>
        <h2><?php block_field('title');?></h2>
        <p class="subheader"><?php block_field('copy');?></p>
        <?php include 'sg-contact-form.php';?>
        <?php }
;?>
    </div>

</section>