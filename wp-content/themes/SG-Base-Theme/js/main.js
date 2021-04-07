// APPLICATION CODE HERE
$(document).ready(function () {
  $('.testimonials .slider').slick({
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    dots: true,
    arrows: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: true,
  });
  $('.logo-salad .slider').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    fade: false,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 5,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });
  $('.accordion').on('click', function (e) {
    e.preventDefault();
    $(this).parents('.item').toggleClass('open');
  });
  $('#tab-block li').on('click', function () {
    $('.category-list')
      .removeClass('heating')
      .removeClass('cooling')
      .removeClass('water-treatment')
      .removeClass('water-heating')
      .removeClass('air-filtration');
    var category = $(this).attr('id');
    $('.category-list').addClass(category);
  });
  $('.apply').on('click', function () {
    $('html,body').delay(500).animate({ scrollTop: '0px' });
  });
  var stickyPos = $('.sticky-nav').offset().top;
  var sideStep = $('.sticky-nav').offset().left;
  var headerPos = $('#site-header').offset().top;
  var headerHeight = $('#site-header').height();
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop() + headerPos + headerHeight;
    if (scroll >= stickyPos) {
      $('.side-content').css('left', sideStep + 'px');
      $('.sticky-nav').addClass('fixed');
    } else {
      $('.sticky-nav').removeClass('fixed');
      sideStep = $('.sticky-nav').offset().left;
    }
  });
});

/* *************** */
/* *************** */
/* HERO FORM START */
/* *************** */
/* *************** */
let bodyElement = document.querySelector('body');

// Get the modal
let modalNewCx = document.getElementById('myModal--new-cx');
let modalExistingCx = document.getElementById('myModal--existing-cx');
let modalProduct = document.querySelector('.modal-product');
let modalForm = document.querySelector('.modal-form');


// Get the button that opens the modal
let newBtn = document.getElementById('myBtn--new-cx');
let existingBtn = document.getElementById('myBtn--existing-cx');
let btnModalProduct = document.querySelectorAll('.btn-modal-product');
let btnModalForm = document.querySelectorAll('.btn-modal-form');

// Get the <span> element that closes the modal
let span = document.querySelectorAll('.close');

if (newBtn) {
  newBtn.addEventListener('click', () => {
    modalNewCx.style.display = 'flex';
    // bodyElement.style.position = 'fixed';

    span[1].onclick = function () {
      modalNewCx.style.display = 'none';
      bodyElement.style.position = 'initial';
    };
  });
}


if (existingBtn) {
  existingBtn.addEventListener('click', () => {

    const scrollY = document.body.style.top;
    document.body.style.position = '';
    document.body.style.top = '';
    window.scrollTo(0, parseInt(scrollY || '0') * -1);


    modalExistingCx.style.display = 'flex';
    // bodyElement.style.position = 'fixed';

    span[0].onclick = function () {
      modalExistingCx.style.display = 'none';
      bodyElement.style.position = 'initial';
    };
  });
}

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
    console.log('!!!!!!!!!!!')

    modalForm.style.display = 'flex';
    // bodyElement.style.position = 'fixed';

    span[1].onclick = function () {
      console.log('11111111111112222')
      modalForm.style.display = 'none';
      bodyElement.style.position = 'initial';
      $(this).children('.modal-inner').html('')
    };
  });
});















window.onclick = function (event) {
  if (event.target === modalNewCx) {
    modalNewCx.style.display = 'none';
    bodyElement.style.position = 'initial';
  }
  if (event.target === modalExistingCx) {
    modalExistingCx.style.display = 'none';
    bodyElement.style.position = 'initial';
  }
  if (event.target === modalProduct) {
    modalProduct.style.display = 'none';
    bodyElement.style.position = 'initial';
    $('.modal-product .modal-inner').html('')
  }
  if (event.target === modalForm) {
    modalForm.style.display = 'none';
    bodyElement.style.position = 'initial';

  }
};
















/* *************** */
/* *************** */
/* HERO FORM MODAL END */
/* *************** */
/* *************** */

/* *************** */
/* *************** */
/* BOTTOM FORM TOGGLE */
/* *************** */
/* *************** */

// let bottomFormToggleState = true;
const bottomFormToggleBtn = document.getElementById('bottom_form__toggle');
const bottomFormToggleLeft = document.getElementById(
  'bottom_form__toggle--left'
);
const bottomFormToggleRight = document.getElementById(
  'bottom_form__toggle--right'
);
const bottomFormNewCx = document.querySelector('.bottom_form__new-cx');
const bottomFormExistingCx = document.querySelector(
  '.bottom_form__existing-cx'
);

const bottomFormTitleNew = document.getElementById('new-form-title');
const bottomFormCopyNew = document.getElementById('new-form-copy');
const bottomFormTitleExisting = document.getElementById('existing-form-title');
const bottomFormCopyExisting = document.getElementById('existing-form-copy');

const toggleBtn = () => {
  let pressed = bottomFormToggleBtn.getAttribute('aria-pressed') === 'true';

  if (pressed) {
    bottomFormToggleBtn.setAttribute('aria-pressed', !pressed);
    bottomFormToggleLeft.classList.remove('active');
    bottomFormToggleRight.classList.add('active');
    bottomFormNewCx.style.display = 'none';
    bottomFormExistingCx.style.display = 'block';
    bottomFormTitleNew.style.display = 'none';
    bottomFormCopyNew.style.display = 'none';
    bottomFormTitleExisting.style.display = 'block';
    bottomFormCopyExisting.style.display = 'block';
  } else {
    bottomFormToggleBtn.setAttribute('aria-pressed', !pressed);
    bottomFormToggleLeft.classList.add('active');
    bottomFormToggleRight.classList.remove('active');
    bottomFormNewCx.style.display = 'block';
    bottomFormExistingCx.style.display = 'none';
    bottomFormTitleNew.style.display = 'block';
    bottomFormCopyNew.style.display = 'block';
    bottomFormTitleExisting.style.display = 'none';
    bottomFormCopyExisting.style.display = 'none';
  }
};

if (bottomFormToggleBtn) {
  bottomFormToggleBtn.addEventListener('click', debounce(toggleBtn, 250));
}

function debounce(fun, mil) {
  var timer;
  return function () {
    clearTimeout(timer);
    timer = setTimeout(function () {
      fun();
    }, mil);
  };
}

/* *************** */
/* *************** */
/* BOTTOM FORM TOGGLE END */
/* *************** */
/* *************** */

/* *************** */
/* *************** */
/* FOOTER MOBILE DROPDOWNS START */
/* *************** */
/* *************** */

const footerDropdownArrow = document.getElementsByClassName(
  'footer-menu-link--mobile'
);

if (footerDropdownArrow) {
  for (let i = 0; i < footerDropdownArrow.length; i++) {
    footerDropdownArrow[i].parentNode.parentNode.addEventListener(
      'click',
      debounce(() => {
        let linkContainer =
          footerDropdownArrow[i].parentNode.parentNode.parentElement;

        if (linkContainer.classList.contains('open')) {
          linkContainer.classList.remove('open');
          footerDropdownArrow[i].setAttribute('aria-pressed', false);
        } else {
          linkContainer.classList.add('open');
          footerDropdownArrow[i].setAttribute('aria-pressed', true);
          console.log(footerDropdownArrow[i].attributes);
        }
      }, 250)
    );
  }
}

/* *************** */
/* *************** */
/* FOOTER MOBILE DROPDOWNS END */
/* *************** */
/* *************** */
