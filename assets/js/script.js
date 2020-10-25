// JavaScript Document
jQuery(document).ready(function($){
	
	// Add Smooth scroll Plugin to the page. Best effect is reached on Tablets & Smartphones.
	$("html").niceScroll({cursorborder:"",cursorcolor:"#cccccc",scrollspeed:100});
	
	
	/* Shopping Cart Items */
	$(".header-shopping-cart div .toggle-items").click(function(){ // Show/Hide Shopping Cart Items
		if ($(".header-shopping-cart-items").css("display") == "none" && $("#items-amount").html() > 0) {
			$(".header-shopping-cart-items").fadeIn();
			$(this).find("i").removeClass("icon-angle-left").addClass("icon-angle-down");
		}
		else {
			$(".header-shopping-cart-items").fadeOut();
			$(this).find("i").removeClass("icon-angle-down").addClass("icon-angle-left");
		}
		return false;
	});
	// When remove button is clicked hide shopping cart item. In the future, it's possible to remove the item from cart table via AJAX
	$(".header-shopping-cart-items .item a").click(function(){
		var amount = $("#items-amount").html();
		if (amount > 0) {
			$("#items-amount").html(amount - 1); // Dicrease the amount of SC items
			$(this).parent().slideUp(); // Hide this item
			if (amount - 1 == 0) {
				$(".header-shopping-cart-items").fadeOut(); // When there's no any items in the cart, hide the items block
				$(".header-shopping-cart div .toggle-items i").fadeOut();
			}
		}
		return false;
	});
	
	
	
	
	// Product Hover Animations
	$(".product").hover(
		function () {
			if ($(document).width() > 979) {
				var pr = $(this);
				pr.find(".product-preview img").animate({"width": "250px"}, 1000);
				pr.find(".product-info").animate({"height": "130px"}, "normal", "linear", function(){
					$(this).find(".button-box").animate({"opacity": "1"}, 700);
				});
			}
		}, 
		function () {
			if ($(document).width() > 979) {
				var pr = $(this);
				pr.find(".button-box").stop().animate({"opacity":"0"},200, "linear", function() {
					pr.find(".product-info").stop().animate({"height": "90px"}, "fast", "linear");
					pr.find(".product-preview img").stop().animate({"width": "206px"}, 400);
				});
			}
		}
	);
	
	
	// Categories Menu Manipulations
	$(".categories li a").click(function() {
		var sm = $(this).next();
		if (sm.attr("class") == "categories-submenu") {
			if (sm.css("display") == "none") {
				$(this).prev().removeClass("icon-angle-left").addClass("icon-angle-down");
				$(this).next().slideDown();
			}
			else {
				$(this).next().find(".icon-angle-down").removeClass("icon-angle-down").addClass("icon-angle-left");
				$(this).next().slideUp();
				$(this).next().find(".categories-submenu").slideUp();
				$(this).prev().removeClass("icon-angle-down").addClass("icon-angle-left");
				/*$(this).next().find(".categories-submenu").slideUp("normal", function() {
					$(this).parent().find(".icon-angle-down").removeClass("icon-angle-down").addClass("icon-angle-left");
				});*/
			}
			return false;
		}
		else {
			return true;
		}
	});
	
	
	$(".ei-slider").eislideshow({
		easing		: 'easeInOutQuart',
		titleeasing	: 'easeInOutElastic',
		slideshow_interval	: 8000,
		autoplay	: true,
		titlespeed	: 1200
	});
	
	// Elastic Slidshow Image Centralize Fix
	$(window).resize(function(){
		var liwidth = $(".ei-slider-large li").width();
		var imgwidth = $(".ei-slider-large li img").width();
		var mr = (liwidth - imgwidth) / 2;
		$(".ei-slider-large li img").css("margin-right", mr + "px");
	});
	
	
	// Color Filter
	$(".colors li a").each(function() {
        $(this).css("background-color", "#" + $(this).attr("rel")).attr("href", "#" + $(this).attr("rel"));
    });
	
	// Price Range  - JQuery UI slider
	$( "#price-range" ).slider({
		range: true,
		min: 0,
		max: 1000,
		step: 10,
		values: [ 0, 1000 ],
		slide: function( event, ui ) {
			$( "#price-from" ).val( ui.values[ 0 ] );
			$( "#price-to" ).val( ui.values[ 1 ] );
		}
	});
	$( "#price-from" ).val( $( "#price-range" ).slider( "values", 0 ) );
	$( "#price-to" ).val( $( "#price-range" ).slider( "values", 1 ) );
	
	$( ".product-additional-info" ).tabs();
	
	
	// Fix Smart Wizard On Load Auto-Height Issue
	$(".stepContainer img").load(function() {
		 $(".stepContainer").height($(".stepContainer").find("div:not(:hidden)").height());
	});
	
	// Checkout => Remove Shopping Cart Item
	$(".remove-shopping-cart-item").click(function() {
		$(this).parent().parent().fadeOut("normal", function() {
			// Recalculate Total information
			var rightItems = $(".shopping-cart-summary").find("tbody tr:not(:hidden)").get();
			if (rightItems.length == 1) // If no items right in the shopping cart, we'll remove the whole table.
				$(".shopping-cart-summary").fadeOut("normal", function() {
					$(".stepContainer").height($(".stepContainer").find("div:not(:hidden)").height());
					$(this).prev().html("No products in your cart.");
				});
			else
				$(".stepContainer").height($(".stepContainer").find("div:not(:hidden)").height());
		}); // Hide/Remove this item
		return false;
	});
	
	
	// Form Styler
	$(".selectbox, .manufacturers input, .checkout-options input, .form-login input").styler();
	$('#wizard').smartWizard({selected: 0});
	function onFinish() {
		$('#wizard').smartWizard('showMessage', 'Finish Clicked');
	};
	
	
	// Scroll to top button
	$(window).scroll(function() { // hide/show button when page is scrolled
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
	
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});
	
});
