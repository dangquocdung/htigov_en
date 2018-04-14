
$(document).on('click', '.hw-details-icon', function () {
    $(this).parent().find(".hw-more-details").fadeToggle();
    return false;
});

$(document).on('click', '.hw-more-details .hw-close-icon', function () {
    $(this).parent().fadeToggle();
    return false;
});

$(window).on('load', function () {
    var i = 1;
    $(".hw-demo .hw-settings-icon").on('click', function (e) {
        i++;
        if (i % 2 == 0) {
            $(".hw-demo").animate({ "left": "0" });
        }
        else {
            $(".hw-demo").animate({ "left": "-277px" });

        }
        e.preventDefault();
    });
});

//demo settings menu animation
$(window).on('load', function () {
    
    $(".hw-demo .hw-settings-header").on('click', function (e) {
        if ($(this).hasClass("active")) {            
            return;
        }
        $(".hw-settings-header.active").parent().find(".hw-settings-content").slideUp();
        $(".hw-settings-header").removeClass("active");
        $(this).addClass("active");
        $(".hw-settings i").removeClass("fa-minus").addClass("fa-plus");
        $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
        $(".hw-settings .active").parent().find(".hw-settings-content").slideDown();
       
    });
});
//demo-settings for change color of text
    $(".choose-color a").on('click', function (e) { 
        $(".choose-color a").removeClass("active");
        $(this).addClass("active");
		$(".choose-color li").css("opacity", "0.7").css("transform", "scale(1)");
        $(this).parent().css("opacity","1").css("transform","scale(1.3)");
        pluginRun(); 
        return false;
    });

    //get location name
    $(".hw-demo .btn-search").on('click', function (e) {       
        if ($(".location-search").val().length < 1)
        {            
            return false;            
        }
        
        pluginRun();
        return false;
    });
    //get checkboxes value
    $(".checkbox").on('click', function (e) {  
        pluginRun();
    });
    $(".choose-temperature input[type=radio]").on('click', function (e) {       
        pluginRun();
    });

