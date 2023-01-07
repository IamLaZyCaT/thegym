<script>
    $(".slider").owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000, //2000ms = 2s;
      autoplayHoverPause: true,
      responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:4,
                nav:true,
                loop:true
            }
        }
    });
   
 </script>