<?php $dir = get_stylesheet_directory_uri();?>
<section class="hero">
    <div class="text-side">
        <div class="copy">
            <h1><?php block_field('title');?></h1>
            <p><?php block_field('copy');?></p>
            <?php if (block_rows('link-list')): ?>
            <div class="link-block">
                <?php while (block_rows('link-list')):
    block_row('link-list');?>
                <a href="<?php block_sub_field('link-url');?>" class="<?php block_sub_field('link-style');?>">
                    <?php block_sub_field('link-text');?>
                </a>
                <?php endwhile;?>
            </div>
            <?php endif;
reset_block_rows('link-list');
?>
            <?php if (block_value('include-phone')) {?>
            <a href="<?php echo 'tel:' . get_theme_mod('phone_number'); ?>"
                class="phone button"><?php echo get_theme_mod('phone_number'); ?></a>
            <?php }
;?>
            <?php if (block_value('include-form')) {?>
            <h3>Or we can call you</h3>

            <div class="fsBody " id="fsLocal">
                <form method="post" novalidate enctype="multipart/form-data"
                    action="https://www.formstack.com/forms/index.php"
                    class="splash-form fsForm fsMultiColumn fsMaxCol4" id="fsForm3847518" autocomplete="off">
                    <input type="hidden" name="form" value="3847518" />
                    <input type="hidden" name="viewkey" value="qRR97MtlyP" />
                    <input type="hidden" name="hidden_fields" id="hidden_fields3847518" value="" />
                    <input type="hidden" name="_submit" value="1" />
                    <input type="hidden" name="incomplete" id="incomplete3847518" value="" />
                    <input type="hidden" name="incomplete_password" id="incomplete_password3847518" />
                    <input type="hidden" name="style_version" value="3" />
                    <input type="hidden" id="viewparam" name="viewparam" value="826720" />
                    <div id="requiredFieldsError" style="display:none;">Please fill in a valid value for all required
                        fields</div>
                    <div id="invalidFormatError" style="display:none;">Please ensure all values are in a proper format.
                    </div>
                    <div id="resumeConfirm" style="display:none;">Are you sure you want to leave this form and resume
                        later?</div>
                    <div id="resumeConfirmPassword" style="display: none;">Are you sure you want to leave this form and
                        resume later? If so, please enter a password below to securely save your form.</div>
                    <div id="saveAndResume" style="display: none;">Save and Resume Later</div>
                    <div id="saveResumeProcess" style="display: none;">Save and get link</div>
                    <div id="fileTypeAlert" style="display:none;">You must upload one of the following file types for
                        the selected field:</div>
                    <div id="embedError" style="display:none;">There was an error displaying the form. Please copy and
                        paste the embed code again.</div>
                    <div id="applyDiscountButton" style="display:none;">Apply Discount</div>
                    <div id="dcmYouSaved" style="display:none;">You saved</div>
                    <div id="dcmWithCode" style="display:none;">with code</div>
                    <div id="submitButtonText" style="display:none;">Submit</div>
                    <div id="submittingText" style="display:none;">Submitting</div>
                    <div id="validatingText" style="display:none;">Validating</div>
                    <div id="autocaptureDisabledText" style="display:none;"></div>
                    <div id="paymentInitError" style="display:none;">There was an error initializing the payment
                        processor on this form. Please contact the form owner to correct this issue.</div>
                    <div id="checkFieldPrompt" style="display:none;">Please check the field: </div>
                    <div class="fsPage" id="fsPage3847518-1">
                        <div id="ReactContainer3847518" style="display:none" class="FsReactContainerInitApp"
                            data-fs-react-app-id="3847518"></div>
                        <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100"
                            id="fsCell91397836" lang="en" fs-field-type="text" fs-field-validation-name="Name">

                            <input type="text" id="field91397836" name="field91397836" placeholder="Name*" required
                                value="" class="fsField fsFormatText fsRequired   " aria-required="true" />
                        </div>
                        <div class="fsRowBody fsCell fsFieldCell fsFirst fsLast fsLabelVertical fsSpan100"
                            id="fsCell91397839" lang="en" fs-field-type="phone" fs-field-validation-name="Phone number">

                            <input type="tel" id="field91397839" name="field91397839" placeholder="Phone*" required
                                value="" class="fsField fsFormatPhoneCA  fsRequired" aria-required="true"
                                data-country="CA" data-format="user" />
                        </div>
                        <div id="fsSubmit3847518" class="fsSubmit fsPagination">
                            <button type="button" id="fsPreviousButton3847518" class="fsPreviousButton"
                                value="Previous Page" style="display:none;" aria-label="Previous"><span
                                    class="fsFull">Previous</span><span class="fsSlim">&larr;</span></button>
                            <button type="button" id="fsNextButton3847518" class="fsNextButton" value="Next Page"
                                style="display:none;" aria-label="Next"><span class="fsFull">Next</span><span
                                    class="fsSlim">&rarr;</span></button>
                            <input id="fsSubmitButton3847518" class="fsSubmitButton" style="display: block;"
                                type="submit" value="Submit" />
                            <div class="clear"></div>
                            <div class="withAds"></div>
                        </div>
                        <script type="text/javascript">
                        window.FS_FIELD_DATA_3847518 = [];
                        </script>
                        <script type="text/javascript" src="//static.formstack.com/forms/js/3/jquery.min.js"></script>
                        <script type="text/javascript" src="//static.formstack.com/forms/js/3/jquery-ui.min.js">
                        </script>
                        <script type="text/javascript" src="//static.formstack.com/forms/js/3/scripts.js"></script>
                        <script type="text/javascript" src="//static.formstack.com/forms/js/3/analytics.js"></script>
                        <script type="text/javascript" src="//static.formstack.com/forms/js/3/google-phone-lib.js">
                        </script>
                        <script type="text/javascript">
                        (function() {
                            if (typeof sessionStorage !== 'undefined' && sessionStorage.fsFonts) {
                                document.documentElement.className = document.documentElement.className +=
                                    ' wf-active';
                            }
                            var pre = document.createElement('link');
                            pre.rel = 'preconnect';
                            pre.href = 'https://fonts.googleapis.com/';
                            pre.setAttribute('crossorigin', '');
                            var s = document.getElementsByTagName('head')[0];
                            s.appendChild(pre);
                            var fontConfig = {
                                google: {
                                    families: [
                                        'Muli:400,300,700'
                                    ]
                                },
                                timeout: 2000,
                                active: function() {
                                    if (typeof sessionStorage === 'undefined') {
                                        return;
                                    }
                                    sessionStorage.fsFonts = true;
                                }
                            };
                            if (typeof WebFont === 'undefined') {
                                window.WebFontConfig = fontConfig;
                                var wf = document.createElement('script');
                                wf.type = 'text/javascript';
                                wf.async = 'true';
                                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                                    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                                s.appendChild(wf);
                            } else {
                                WebFont.load(fontConfig);
                            }
                        })();
                        if (window.addEventListener) {
                            window.addEventListener('load', loadFormstack, false);
                        } else if (window.attachEvent) {
                            window.attachEvent('onload', loadFormstack);
                        } else {
                            loadFormstack();
                        }

                        function loadFormstack() {
                            var form3847518 = new Formstack.Form(3847518, 'https://www.formstack.com/forms/');
                            form3847518.logicFields = [];
                            form3847518.calcFields = [];
                            form3847518.dateCalcFields = [];
                            form3847518.init();
                            if (Formstack.Analytics) {
                                form3847518.plugins.analytics = new Formstack.Analytics('https://www.formstack.com',
                                    3847518, form3847518);
                                form3847518.plugins.analytics.trackTouch();
                                form3847518.plugins.analytics.trackBottleneck();
                            }
                            window.form3847518 = form3847518;
                        };
                        </script>
                    </div>
                </form>
            </div>

            <?php }
;?>



            <div class="myBtn--container">
                <!-- NEW CUSTOMER BUTTON -->
                <?php if (block_value('include-new-customer-btn')) {?>
                <button class="button" id="myBtn--new-cx">New Customer</button>
                <?php }
;?>
                <!-- EXISTING CUSTOMER BUTTON -->
                <?php if (block_value('include-existing-customer-btn')) {?>
                <button class="button" id="myBtn--existing-cx">Existing Customer</button>
                <?php }
;?>
            </div>

            <!-- SHOWING BOTH FORMS THAT WILL BE BE POP UPS -->
            <?php foreach (block_value('available-forms') as $value): ?>
            <?php include $value;?>
            <?php endforeach;?>







        </div>
    </div>
    </div>
    <div class="image-side <?php block_field('no-dot');?>"
        style="background-image:url(<?php block_field('image-side');?>);background-position:right <?php block_field('image-position');?>">

    </div>
</section>