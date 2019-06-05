//Javascript Document
var pathname = window.location.pathname;

//Toggle the metal background for 24 / 7 banner on homepage
function changeMetal() {
        console.log(pathname);
        if (pathname == '/') {
            $('#twenty-four-seven-banner').addClass('metal');
        } else {
            $('#twenty-four-seven-banner').removeClass('metal');
            $('#twenty-four-seven-banner').addClass('yellow');
        }
    }

//Wrap Service Boxes on the home page with link.  Rest of site acts upon button click.
function serviceBlockAnchorWrap() {
    if (pathname == '/') {
        $('#modernization').wrap('<a href="/services/modernization/"></a>');
        $('#maintenance').wrap('<a href="/services/maintenance/"></a>');
        $('#repair').wrap('<a href="/services/repair/"></a>');
        $('#new-construction').wrap('<a href="/services/new-construction/"></a>');
    }
}

//Imagefill
$('#vintage-banner').imagefill();
$('#featured-image').imagefill();

//Mobile Navigation
$(function() {
    $('.menu-toggle').click(function() {
        // Calling a function in case you want to expand upon this.
        toggleNav();
    });
});

function toggleNav() {
    if ($('#page').hasClass('show-nav')) {
        // Do things on Nav Close
        $('#page').removeClass('show-nav');
    } else {
        // Do things on Nav Open
        $('#page').addClass('show-nav');
    }
    //$('#site-wrapper').toggleClass('show-nav');
}

function mobileNavHeading() {
    if ($('#page').hasClass('show-nav')) {
        ($('.menu-primary-navigation-container').remove(
            '#mobile-nav-heading'));
    } else {
        ($('.menu-primary-navigation-container').prepend(
            '<h3 id="mobile-nav-heading">Menu</h3>'));
    }
}

//Sub-navigation menu fix for tablet to desktop
//$(window).resize(function() {
function subNavResize(){
    var sub_menu_list_item = $('.current-menu-item .sub-menu li');
	var ancestor_sub_menu_list_item = $('.current-menu-ancestor .sub-menu li');
	
    var sub_menu_list_item_count = sub_menu_list_item.length;
	var ancestor_sub_menu_list_item_count = ancestor_sub_menu_list_item.length;
	
    var divisor = ( 1 / sub_menu_list_item_count );
	var divisor_2 = ( 1 / ancestor_sub_menu_list_item_count );
	
	
    var width_1 = divisor * 100;
	var width_2 = divisor_2 * 100;
    var ww = $(window).width();
    
    if ( ww > 600 && ww < 1200 ){
        if ( sub_menu_list_item_count % sub_menu_list_item_count === 0 ){
            sub_menu_list_item.css('width',  width_1 + '%' );
        } else if ( ancestor_sub_menu_list_item_count % ancestor_sub_menu_list_item_count === 0 ){
			ancestor_sub_menu_list_item.css('width',  width_2 + '%' );
		}
    } else {
        sub_menu_list_item.css('width',  'auto' );
		ancestor_sub_menu_list_item.css('width',  'auto' );
   }
}

/*window.onload = function() {
    changeMetal();
    serviceBlockAnchorWrap();
    mobileNavHeading();
};*/

//$(document).ready(subNavResize);
$(document).ready(function(){
    changeMetal();
    serviceBlockAnchorWrap();
    mobileNavHeading();
    subNavResize();
});
$(window).resize(subNavResize);
subNavResize();










