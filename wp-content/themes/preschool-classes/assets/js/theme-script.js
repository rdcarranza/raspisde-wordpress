function preschool_classes_openNav() {
  jQuery(".sidenav").addClass('show');
}
function preschool_classes_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

var preschool_classes_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    preschool_classes_btn.addClass('show');
  } else {
    preschool_classes_btn.removeClass('show');
  }
});

preschool_classes_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery(document).ready(function ($) {
// Menu Js
    $('.submenu-toggle').click(function () {
        $(this).toggleClass('button-toggle-active');
        var currentClass = $(this).attr('data-toggle-target');
        $(currentClass).toggleClass('submenu-toggle-active');
    });
    $('.skip-link-menu-start').focus(function () {
        if (!$("#offcanvas-menu #primary-nav-offcanvas").length == 0) {
            $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus();
        }
    });
    // Menu Toggle Js
    $('.navbar-control-offcanvas').click(function () {
        $(this).addClass('active');
        $('body').addClass('body-scroll-locked');
        $('#offcanvas-menu').toggleClass('offcanvas-menu-active');
        $('.button-offcanvas-close').focus();
    });
    $('.offcanvas-close .button-offcanvas-close').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
        setTimeout(function () {
            $('.navbar-control-offcanvas').focus();
        }, 300);
    });
    $('#offcanvas-menu').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
    });
    $(".offcanvas-wraper").click(function (e) {
        e.stopPropagation(); //stops click event from reaching document
    });
    $('.skip-link-menu-end').on('focus', function () {
        $('.button-offcanvas-close').focus();
    });
});

jQuery('.header-search-wrapper .search-main').click(function(){
  jQuery('.search-form-main').toggleClass('active-search');
  jQuery('.search-form-main .search-field').focus();
});

jQuery("#top-banner .banner-content h2").html(function(){
  var words = jQuery(this).text().trim().split(" ");

    words[0] = `<span class="first-word">${words[0]}</span>`;
    words[words.length - 1] = `<span class="last-word">${words[words.length - 1]}</span>`;

  return words.join(" ");
});

jQuery("#service-section h3").html(function(){
  var words = jQuery(this).text().trim().split(" ");

    words[3] = `<span>${words[3]}</span>`;

  return words.join(" ");
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.top-header').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.top-header').addClass("stick_header");
    } else {
      jQuery('.top-header').removeClass("stick_header");
    }
  }
});