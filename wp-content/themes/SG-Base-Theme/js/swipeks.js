//GeoLocation

let requestUrl = "http://ip-api.com/json";
const takeGeo = $('.current-location__button');






// WGAC
const accordionHeaders = document.querySelectorAll('[data-accordion]');
Array.prototype.forEach.call(accordionHeaders, accordionHeader => {
    let target = accordionHeader.parentElement.nextElementSibling;
    accordionHeader.onclick = () => {
        let expanded = accordionHeader.getAttribute('aria-expanded') === 'true' || false;
        accordionHeader.setAttribute('aria-expanded', !expanded);
        target.hidden = expanded;
    }
})
// console.log(accordionHeaders);

// ObjectFit
if ('objectFit' in document.documentElement.style === false) {
    document.addEventListener('DOMContentLoaded', function() {
        Array.prototype.forEach.call(document.querySelectorAll('img[data-object-fit]'), function(image) {
            (image.runtimeStyle || image.style).background = 'url("' + image.src + '") no-repeat 50%/' + (image.currentStyle ? image.currentStyle['object-fit'] : image.getAttribute('data-object-fit'));
            image.src = 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'' + image.width + '\' height=\'' + image.height + '\'%3E%3C/svg%3E';
        });
    });
}


// Slider
$('.item__slider').slick(
    {
        infinite: true,
        speed: 1200,
        fade: true,
    }
);


// Filters
var models  = [];
var brands = [];
var locations = [];
var sizes = [];


$(".category-filter-group input").on("change", function(){
    
    var $this = $(this)
    var $thisValue = $this.val(); 
    var $thisData = $this.data('group'); 

    if ($this.is(":checked")) {


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
        $('.item__slider').slick(
            {
                infinite: true,
                speed: 1200,
                fade: true,
            }
        );
        
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
           

            let bodyElement = document.querySelector('body');
            let modalProduct = document.querySelector('.modal-product');
            let modalForm = document.querySelector('.modal-form');
            let btnModalProduct = document.querySelectorAll('.btn-modal-product');
            let btnModalForm = document.querySelectorAll('.btn-modal-form');
            let span = document.querySelectorAll('.close');

            $(btnModalProduct).each(function(i,elem) {
                elem.addEventListener('click', () => {
                modalProduct.style.display = 'flex';
                // bodyElement.style.position = 'fixed';
                
                span[0].onclick = function () {
                  modalProduct.style.display = 'none';
                  bodyElement.style.position = 'initial';
                  // $(this).childred('.modal-inner').html('')
                  $('.modal-product .modal-inner').html('')
                };
              });
            });
            
            $(btnModalForm).each(function(i,elem) {
                elem.addEventListener('click', () => {
                modalForm.style.display = 'flex';
                // bodyElement.style.position = 'fixed';
            
                span[1].onclick = function () {
                  modalForm.style.display = 'none';
                  bodyElement.style.position = 'initial';
                  $(this).children('.modal-inner').html('')
                };
              });
            });
            
            destroyCarousel()
            slickCarousel();

            $('.category-filter__btn').attr("aria-expanded","false");

            $('.category-filter__body').prop('hidden', true);



            $( ".item__links .btn-modal-product" ).on( "click", function(){
                var $this = $(this);
                var $thisItem = $this.data('item'); 
                var ajaxurl = '../wp-admin/admin-ajax.php';
            
                jQuery.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {"action": "loadmore", getID: $thisItem },
                    success: function(response) {
                        jQuery(".modal-product .modal-inner").html(response);            
                        
                        return false;
                    }
                });
            
            });
            

            return false;
        }
    });
}
$('.category-filter__submit').on('click' , brand_ajax_get);

$( ".item__links .btn-modal-product" ).on( "click", function(){
    var $this = $(this);
    var $thisItem = $this.data('item'); 
    var ajaxurl = '../wp-admin/admin-ajax.php';

    jQuery.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {"action": "loadmore", getID: $thisItem },
        success: function(response) {
            jQuery(".modal-product .modal-inner").html(response);            
            
            return false;
        }
    });

});



//Collapse mobile
$('.category-filter-group__action').click(function(){
    $(this).parent(".category-filter-group").toggleClass('active')
});



// get location
(function() {

    var currentLocation = $('.current-location__name');


    $(document).mouseup(function (e){ 
        var div = $(".current-location__list"); 
        if (!div.is(e.target) 
            && div.has(e.target).length === 0) { 
                $('.current-location__list').prop('hidden', true);
                $('.current-location__button').attr("aria-expanded","false");
                
        }
    });

    $('.current-location__item button').on('click' , function(){
        var $val = $(this).val();
        currentLocation.text($val);
        var $product_category = $(this).data('category'); 

        $('.current-location__list').prop('hidden', true);
        $('.current-location__button').attr("aria-expanded","false");
        
        function slickCarousel() {
            $('.item__slider').slick(
                {
                    infinite: true,
                    speed: 1200,
                    fade: true,
                }
            );
            
        }
    
        function destroyCarousel() {
            if ($('.item__slider').hasClass('slick-initialized')) {
                $('.item__slider').slick('destroy');
            }      
        }

        var ajaxurl = '../wp-admin/admin-ajax.php';

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {"action": "load-location", get_location: $val  , product_category: $product_category },
            success: function(response) {

                jQuery(".product-ajax").html(response);  

                let bodyElement = document.querySelector('body');
                let modalProduct = document.querySelector('.modal-product');
                let modalForm = document.querySelector('.modal-form');
                let btnModalProduct = document.querySelectorAll('.btn-modal-product');
                let btnModalForm = document.querySelectorAll('.btn-modal-form');
                let span = document.querySelectorAll('.close');
    
                $(btnModalProduct).each(function(i,elem) {
                    elem.addEventListener('click', () => {
                    console.log('!!!!!!!!!')
                    modalProduct.style.display = 'flex';
                    // bodyElement.style.position = 'fixed';
                    
                    span[0].onclick = function () {
                      modalProduct.style.display = 'none';
                      bodyElement.style.position = 'initial';
                      // $(this).childred('.modal-inner').html('')
                      $('.modal-product .modal-inner').html('')
                    };
                  });
                });
                
                $(btnModalForm).each(function(i,elem) {
                    elem.addEventListener('click', () => {
                    modalForm.style.display = 'flex';
                    // bodyElement.style.position = 'fixed';
                
                    span[1].onclick = function () {
                      modalForm.style.display = 'none';
                      bodyElement.style.position = 'initial';
                      $(this).children('.modal-inner').html('')
                    };
                  });
                });

                destroyCarousel()
                slickCarousel();


                $( ".item__links .btn-modal-product" ).on( "click", function(){
                    var $this = $(this);
                    var $thisItem = $this.data('item'); 
                    var ajaxurl = '../wp-admin/admin-ajax.php';
                
                    jQuery.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: {"action": "loadmore", getID: $thisItem },
                        success: function(response) {
                            jQuery(".modal-product .modal-inner").html(response);            
                            
                            return false;
                        }
                    });
                });

                

                return false;
            }
        });


    })
  })();