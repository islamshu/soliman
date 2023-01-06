


$(document).ready(function(){
    $(".owl-one").owlCarousel({
        autoplay:true,
        items:3,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            480 :{
                items:2,
            },
            768 :{
                items:2,
            },
            1000 :{
                items:3,
            }
        }
    });

    $(".owl-two").owlCarousel({
        autoplay:true,
        items:5,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            480 :{
                items:3,
            },
            768 :{
                items:5,
            }
        }
    });
  });