$(document).ready(function () {
  let owl = $('.owl-carousel');
  $('.owl-carousel').owlCarousel({
    items: 4,
    loop: true,
    nav: false,
    autoplay: true,
    margin: 15,
    height: 100,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 4,
      },
    },
  });

  $('.customNextBtn').click(function () {
    owl.trigger('next.owl.carousel');
  });
  // Go to the previous item
  $('.customPrevBtn').click(function () {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
  });
});
