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
console.log(accordionHeaders);




$('.item__slider').slick();




if ('objectFit' in document.documentElement.style === false) {
    document.addEventListener('DOMContentLoaded', function() {
        Array.prototype.forEach.call(document.querySelectorAll('img[data-object-fit]'), function(image) {
            (image.runtimeStyle || image.style).background = 'url("' + image.src + '") no-repeat 50%/' + (image.currentStyle ? image.currentStyle['object-fit'] : image.getAttribute('data-object-fit'));

            image.src = 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'' + image.width + '\' height=\'' + image.height + '\'%3E%3C/svg%3E';
        });
    });
}