/**
 * Legacy Preschool Kindergarten Theme - Main JavaScript
 * Handles theme interactive functionality
 */

// Faq
document.addEventListener("DOMContentLoaded", function () {
  const legacy_preschool_kindergarten_game_details = document.querySelectorAll(".faq-btm-title");

  legacy_preschool_kindergarten_game_details.forEach((targetDetail) => {
    targetDetail.addEventListener("toggle", () => {
      if (targetDetail.open) {
        legacy_preschool_kindergarten_game_details.forEach((legacy_preschool_kindergarten_game_detail) => {
          if (legacy_preschool_kindergarten_game_detail !== targetDetail) {
            legacy_preschool_kindergarten_game_detail.removeAttribute("open");
          }
        });
      }
    });
  });
});

jQuery(document).ready(function ($) {

  // Category Slider
  $('.cat-position.owl-carousel').owlCarousel({
      nav: false,
      autoplay: true,
      margin: 20,
      lazyLoad: true,
      autoplayTimeout: 2000,
      loop: true,
      dots: false,
      responsive: {
        0: { items: 1 },
        768: { items: 2 },
        992: { items: 2 },
        1200: { items: 4 }
      },
      autoplayHoverPause: true,
      mouseDrag: true
  });
});

jQuery(document).ready(function () {
  jQuery("h2.banner-heading").each(function () {
    var text = jQuery(this).text().trim();
    var words = text.split(" ");

    // Check if 9th and 10th words exist
    if (words.length >= 10) {
      words[8] = "<span style='color:var(--wp--preset--color--secondary)'>" + words[8] + "</span>";
      words[9] = "<span style='color:var(--wp--preset--color--secondary)'>" + words[9] + "</span>";
    }

    jQuery(this).html(words.join(" "));
  });
});
