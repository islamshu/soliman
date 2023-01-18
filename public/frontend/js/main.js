


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
                items:4,
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


    $(".owl-three").owlCarousel({
        autoplay:false,
        items:4,
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
                items:4,
            }
        }
    });


    var cleave = new Cleave('.Number', {
        creditCard: true,
        onCreditCardTypeChanged: function (type) {
            
        }
    });


    var cleave = new Cleave('.MM', {
        date: true,
        datePattern: ['M']
    });

    var cleave2 = new Cleave('.YYYY', {
        date: true,
        datePattern: ['Y']
    });


    var cleave3 = new Cleave('.CVC', {
        blocks: [3],
        uppercase: true
    });


  });