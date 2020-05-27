/* Window Load functions */

$(window).on('load',function(){
    setTimeout(function(){

    });
});


$(document).ready(function(){
    $('header .bottom_head .nav_left ul li a, header .bottom_head .nav_left > a').click(function() {
        if($(this).attr("class") == "search") {
            $('.location_drop').hide();
            $('.login_drop').hide();
        } else if($(this).attr("class") == "location") {
            $('.search_drop').hide();
            $('.login_drop').hide();
        } else if($(this).attr("class") == "login") {
            $('.search_drop').hide();
            $('.location_drop').hide();
        }
        
    }); 
    $('header .bottom_head .nav_left .search').click(function(){
        $('.search_drop').slideToggle()
    }); 
    $('header .bottom_head .nav_left .location').click(function(){
        $('.location_drop').slideToggle()
    });
    $('header .bottom_head .nav_left .login').click(function(){
        $('.login_drop').slideToggle()
    }); 
    $('.onscreen-phone').click(function(){
        $('.onscreen-phone-btn').toggle();
    }); 
    
    jQuery(document).on('click','.hamburger',function () {
        jQuery('.hamburger').addClass('is-active'); 
        jQuery('div.nav_right ul li.drop_infomation').find('ul.info_drop').hide();
        jQuery('ul.inner_drop').hide();
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
    if ($(window).width() < 770) {
            $('ul.inner_drop').hide();
            $('div.nav_right ul li.drop_infomation').click(function() {
                var sty = $(this).find('ul.info_drop').attr("style");
                if (typeof sty === typeof undefined) {
                    sty = "display: none;";
                } else {
                    $('div.nav_right ul li.drop_infomation').find('ul.info_drop').hide();
                }
                 
                if(sty == "display: none;") {
                    $(this).find('ul.info_drop').show();
                } else {
                    $(this).find('ul.info_drop').hide();
                    $('ul.inner_drop').hide(); 
                }
            });
            $('div.nav_right ul.info_drop li').click(function() { 
                var sty = $(this).find('ul.inner_drop').attr("style");
                $('div.nav_right ul li.drop_infomation').find('ul.info_drop').hide();
                $('ul.inner_drop').hide();
                if(sty == "display: none;") {
                    $(this).find('ul.inner_drop').show();
                } else {
                    $(this).find('ul.inner_drop').hide(); 
                }
            });
    }

});


if ($(window).width() < 770) {
    // $('ul.inner_drop').hide();
    $('div.nav_right ul li.drop_infomation').click(function() {
        var sty = $(this).find('ul.info_drop').attr("style");
        if (typeof sty === typeof undefined) {
            sty = "display: none;";
        } else {
            $('div.nav_right ul li.drop_infomation').find('ul.info_drop').hide();
        }
         
        if(sty == "display: none;") {
            $(this).find('ul.info_drop').show();
        } else {
            $(this).find('ul.info_drop').hide();
            $('ul.inner_drop').hide(); 
        }
    });
    $('div.nav_right ul.info_drop li').click(function() { 
        var sty = $(this).find('ul.inner_drop').attr("style");
        $('ul.inner_drop').hide();
        $(this).show();
        $('div.nav_right ul li.drop_infomation').find('ul.info_drop').hide();
        $('ul.inner_drop').hide();
        if(sty == "display: none;") {
            $(this).find('ul.inner_drop').show();
        } else {
            $(this).find('ul.inner_drop').hide(); 
        }
    });
}
else {
   
}


$('.main .tab_sec .panel_div').click(function(){
    $(this).next().slideToggle(); 
});