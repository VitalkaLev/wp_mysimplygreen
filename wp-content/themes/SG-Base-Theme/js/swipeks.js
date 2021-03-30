//GeoLocation

let requestUrl = "http://ip-api.com/json";
const takeGeo = $('.current-location__button')

function myGeo() {
    $.ajax({
        url: requestUrl,
        type: 'GET',
        success: function(json) {
            $('.current-location__name').text(json.city)
            console.log('1');
        },
        error: function(err) {
            console.log("Request failed, error= " + err);
        }
    });
}
myGeo()

takeGeo.click(function() {
    myGeo()
});


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
$('.item__slider').slick();


// Filters
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
