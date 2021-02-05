(function ($) {
    "use strict";
/*--
    Commons Variables
-----------------------------------*/
var $window = $(window);
var $body = $('body');

/*--
    Header Dropdown (Custom Dropdown)
-----------------------------------*/
if ($('.header-dropdown').length) {
    var $headerDropdown = $('.header-dropdown'),
        $headerDropdownMenu = $headerDropdown.find('.header-dropdown-menu');

    $headerDropdown.on('click', '.toggle', function(e){
        e.preventDefault();
        var $this = $(this);
        if(!$this.parent().hasClass('show')) {
            $headerDropdown.removeClass('show');
            $headerDropdownMenu.removeClass('show');
            $this.siblings('.header-dropdown-menu').addClass('show').parent().addClass('show');
        } else {
            $this.siblings('.header-dropdown-menu').removeClass('show').parent().removeClass('show');
        }
    });
    /*Close When Click Outside*/
    $body.on('click', function(e){
        var $target = e.target;
        if (!$($target).is('.header-dropdown') && !$($target).parents().is('.header-dropdown') && $headerDropdown.hasClass('show')) {
            $headerDropdown.removeClass('show');
            $headerDropdownMenu.removeClass('show');
        }
    });
}

/*--
    Header Search Open/Close
-----------------------------------*/
var $headerSearchOpen = $('.header-search-open'),
    $headerSearchClose = $('.header-search-close'),
    $headerSearchForm = $('.header-search-form');
$headerSearchOpen.on('click', function(){
    $headerSearchForm.addClass('show');
});
$headerSearchClose.on('click', function(){
    $headerSearchForm.removeClass('show');
});

/*--
    Side Header
-----------------------------------*/
var $sideHeaderToggle = $('.side-header-toggle'),
    $sideHeaderClose = $('.side-header-close'),
    $sideHeader = $('.side-header');

/*Add/Remove Show/Hide Class On Depending on Viewport Width*/
function $sideHeaderClassToggle() {
    var $windowWidth = $window.width();
    if( $windowWidth >= 1200 ) {
        $sideHeader.removeClass('hide').addClass('show');
    } else {
        $sideHeader.removeClass('show').addClass('hide');
    }
}
$sideHeaderClassToggle();
/*Side Header Toggle*/
$sideHeaderToggle.on('click', function(){
    if($sideHeader.hasClass('show')){
        $sideHeader.removeClass('show').addClass('hide');
    } else {
        $sideHeader.removeClass('hide').addClass('show');
    }
});
/*Side Header Close (Visiable Only On Mobile)*/
$sideHeaderClose.on('click', function(){
    $sideHeader.removeClass('show').addClass('hide');
});
    
/*--
    Side Header Menu
-----------------------------------*/
var $sideHeaderNav = $('.side-header-menu'),
    $sideHeaderSubMenu = $sideHeaderNav.find('.side-header-sub-menu');

/*Add Toggle Button in Off Canvas Sub Menu*/
$sideHeaderSubMenu.siblings('a').append('<span class="menu-expand"><i class="zmdi zmdi-chevron-down"></i></span>');

/*Close Off Canvas Sub Menu*/
$sideHeaderSubMenu.slideUp();

/*Category Sub Menu Toggle*/
$sideHeaderNav.on('click', 'li a, li .menu-expand', function(e) {
    var $this = $(this);
    if ( $this.parent('li').hasClass('has-sub-menu') || ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
        e.preventDefault();
        if ($this.siblings('ul:visible').length){
            $this.parent('li').removeClass('active').children('ul').slideUp().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-up').addClass('zmdi-chevron-down');
            $this.parent('li').siblings('li').removeClass('active').find('ul:visible').slideUp().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-up').addClass('zmdi-chevron-down');
        } else {
            $this.parent('li').addClass('active').children('ul').slideDown().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-down').addClass('zmdi-chevron-up');
            $this.parent('li').siblings('li').removeClass('active').find('ul:visible').slideUp().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-up').addClass('zmdi-chevron-down');
        }
    }
});

// Adding active class to nav menu depending on page
var pageUrl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
$('.side-header-menu a').each(function() {
    if ($(this).attr("href") === pageUrl || $(this).attr("href") === '') {
        $(this).closest('li').addClass("active").parents('li').addClass('active').children('ul').slideDown().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-down').addClass('zmdi-chevron-up');
    }
    else if (window.location.pathname === '/' || window.location.pathname === '/index.html') {
        $('.side-header-menu a[href="index.html"]').closest('li').addClass("active").parents('li').addClass('active').children('ul').slideDown().siblings('a').find('.menu-expand i').removeClass('zmdi-chevron-down').addClass('zmdi-chevron-up');
    }
})

/*-- 
    Selectable Table
-----------------------------------*/
function tableSelectable() {
    var $tableSelectable = $('.table-selectable');
    $tableSelectable.find('tbody .selected').find('input[type="checkbox"]').prop('checked', true);
    $tableSelectable.on('click', 'input[type="checkbox"]', function(){
        var $this = $(this);
        if( $this.parent().parent().is('th')) {
            if( !$this.is(':checked') ) {
                $this.closest('table').find('tbody').children('tr').removeClass('selected').find('input[type="checkbox"]').prop('checked', false);
            } else {
                $this.closest('table').find('tbody').children('tr').addClass('selected').find('input[type="checkbox"]').prop('checked', true);
            }
        } else {
            if( !$this.is(':checked') ) {
                $this.closest('tr').removeClass('selected');
            } else {
                $this.closest('tr').addClass('selected');
            }
            if( $this.closest('tbody').children('.selected').length < $this.closest('tbody').children('tr').length ) {
                $this.closest('table').find('thead').find('input[type="checkbox"]').prop('checked', false);
            } else if( $this.closest('tbody').children('.selected').length === $this.closest('tbody').children('tr').length ) {
                $this.closest('table').find('thead').find('input[type="checkbox"]').prop('checked', true);
            }
        }
    });
}
tableSelectable();
    

// Common Resize function
function resize() {
    $sideHeaderClassToggle();
}
// Resize Window Resize
$window.on('resize', function(){
    resize();
});
 
	
	// following up page payment 
$("#new").click(function(){
	
	$("#newPay").fadeIn(1000);
	$("#resumptionPay").hide();
	$('body').getNiceScroll().resize();
});
	
	$("#resumption").click(function(){
	
	$("#resumptionPay").fadeIn(1000);
	$("#newPay").hide();
	$('body').getNiceScroll().resize();
});
	// Examination  page  
$('.add-test').click(function() {
    $('#test' + $(this).attr('target')).show();
	$('body').getNiceScroll().resize();
  });	
	
	$('.add-ray').click(function() {
    $('#ray' + $(this).attr('target')).show();
	$('body').getNiceScroll().resize();
  });
	
	$('.add-medcine').click(function() {
    $('#medcine' + $(this).attr('target')).show();
	$('body').getNiceScroll().resize();
  });
	$(".next").click(function(){
	$('body').getNiceScroll().resize();
});
	
	// Examination Edit page  
$("#editProfileItem").click(function(){
	
	$("#editProfile").fadeIn(1000);
	$('body').getNiceScroll().resize();
});
	$("#closeProfileItem").click(function(){
	
	$("#editProfile").fadeOut(100);
	$('body').getNiceScroll().resize();
});
	$("#editDaigonesisItem").click(function(){
	
	$("#editDaigonesis").fadeIn(1000);
	$('body').getNiceScroll().resize();
});
	$("#closeDaigonesisItem").click(function(){
	
	$("#editDaigonesis").fadeOut(100);
	$('body').getNiceScroll().resize();
});
	
	$("#editTestItem").click(function(){
	
	$("#editTest").fadeIn(1000);
	$('body').getNiceScroll().resize();
});
	$("#closeTestItem").click(function(){
	
	$("#editTest").fadeOut(100);
	$('body').getNiceScroll().resize();
});
	
	$("#editRayItem").click(function(){
	
	$("#editRay").fadeIn(1000);
	$('body').getNiceScroll().resize();
});
	$("#closeRayItem").click(function(){
	
	$("#editRay").fadeOut(100);
	$('body').getNiceScroll().resize();
});
	
	$("#editMedcineItem").click(function(){
	
	$("#editMedcine").fadeIn(1000);
	$('body').getNiceScroll().resize();
});
	$("#closeMedcineItem").click(function(){
	
	$("#editMedcine").fadeOut(100);
	$('body').getNiceScroll().resize();
});
	
	
	// Pricing add
	function newMenuItem() {
		var newElem = $('tr.pricing-list-item').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#pricing-list-container');
	}
	if ($("table#pricing-list-container").is('*')) {
		$('.add-pricing-list-item').on('click', function (e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#pricing-list-container .delete", function (e) {
			e.preventDefault();
			$(this).parent().parent().parent().remove();
		});
	}
	$("#addItem").click(function(){
	$('body').getNiceScroll().resize();
});
	// Schedule add
	function newSchedule() {
		var newElem = $('tr.schedule-list-item').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#schedule-list-container');
	}
	if ($("table#schedule-list-container").is('*')) {
		$('.add-schedule-list-item').on('click', function (e) {
			e.preventDefault();
			newSchedule();
		});
		$(document).on("click", "#schedule-list-container .delete", function (e) {
			e.preventDefault();
			$(this).parent().parent().parent().remove();
		});
	}
	$("#addSchedule").click(function(){
	$('body').getNiceScroll().resize();
});

//Herhesh
$('body').on('click','#btn-side',function(){
    $('.tabs-titles').animate({'left':0},'slow')
    $('.popup').css({
        backgroundColor:"rgba(000,000,000,.7)",
        width:'100%',
        height:'100vh',
        position:'fixed',
        zIndex:'10000',
        
    })
})

$('body').on('click','.popup',function(){
    $('.tabs-titles').animate({'left':'-240px'},'slow')
    $('.popup').css({
        backgroundColor:"",
        width:'',
        height:'',
        position:'',
        zIndex:'',
        
    })
})
$('.popup .tabs-titles').click(function(e){
    e.stopPropagation();
})

$('#accordion').click(function(){
    $('#collapseTwo').slideToggle()
})
$('#accordion-2').click(function(){
    $('#collapsethree').slideToggle()
})
})(jQuery);


$(function(){
    $('body').on('keyup', '.livesearch', function(){
        var field = $(this);
        var suggestions = field.siblings('.data');
        var li = field.siblings('.data')

        if(field.val().length >= 3){
            $.ajax({
                method:'GET',
                url:'/doctor/live',
                data:{medicine:field.val()},
                success:function(data){
                    suggestions.html('')
                    suggestions.append(data)
                    setInterval(function(){
                        if(field.val().length <= 2){
                            suggestions.hide()
                        }else{
                            if(suggestions.text().length < 1){
                                suggestions.hide()
                            }else{
                                suggestions.show()
                            }
                        }
                    },1)

                }
            })
        }else{
            return false;
        }
            
    });
    $('body').on('click','.data  li',function(){
        $(this).parents().siblings('.livesearch').val($(this).text())
        $(this).parents('.data').html('')
    })

})




