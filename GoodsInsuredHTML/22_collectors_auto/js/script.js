/* Window Load functions */

$(window).on('load',function(){
    setTimeout(function(){

    });
});


$(document).ready(function(){
    $('header .bottom_head .nav_left .search').click(function(){
        $('.search_drop').slideToggle()
    }); 
    $('header .bottom_head .nav_left .location').click(function(){
        $('.location_drop').slideToggle()
    });
    $('header .bottom_head .nav_left .login').click(function(){
        $('.login_drop').slideToggle()
    }); 
    
    jQuery(document).on('click','.hamburger',function () {
        jQuery('.hamburger').addClass('is-active'); 
        jQuery('header .bottom_head .nav_right').slideDown();   
    });
    jQuery(document).on('click','.hamburger.is-active',function () {
        jQuery('.hamburger').removeClass('is-active'); 
        jQuery('header .bottom_head .nav_right').slideUp();   
    });
});

$(window).resize(function(){

})

/* achievement */
equalheight = function(container){
    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $(container).each(function() {

        $el = $(this);
        $($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

$(window).load(function() {
    equalheight('.choose_in .list .box');
});


$(window).resize(function(){
    equalheight('.choose_in .list .box');
});

if ($(window).width() < 767) {
    $('body header ul li.drop_infomation').click(function(){
        $(this).find('ul.info_drop').slideToggle(); 
    });
}
else {
   
}


$('.main .tab_sec .panel_div').click(function(){
    $(this).next().slideToggle(); 
});