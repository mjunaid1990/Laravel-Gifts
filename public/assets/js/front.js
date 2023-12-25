/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


$(document).ready(function() {
   init_sliders();
   
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll > 50) {
            $("#minicart-modal .b-p1TdDk").css('display', 'none');
        }else {
            $("#minicart-modal .b-p1TdDk").css('display', 'block');
        }
   }); 
   
});

function init_sliders() {
    if($('.category-slider').length > 0) {
        $('.category-slider').slick({
//            rows: 1,
            dots: false,
            arrows: true,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 2
        });
    }
}


