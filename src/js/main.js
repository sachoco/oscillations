'use strict';

import "slick-carousel/slick/slick.min.js";
import Vibrant from "node-vibrant/dist/vibrant.js";



(function($) {
  $(document).ready(function(){

  	var is_desktop_layout;
    var $window = $(window);
    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize > 768) {
            is_desktop_layout = true;
        }else{
		        is_desktop_layout = true;
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);



  	$(".menu-toggle").on("click", function(){
  		$("header.header").toggleClass("on");
  	});

  	if($("body").hasClass("post-type-archive-project") || $("body").hasClass("single-project")) $("body").addClass("nav-color-inverse");

  	$(".view-switcher button").on("click", function(){
  		$(this).parent().toggleClass("on");
  		$("section.content").toggleClass("list-view");
   		if($("body").hasClass("post-type-archive-artist")||$("body").hasClass("home")) {
 			if($("section.content").hasClass("list-view")){
  				$("body").css("background-color", "#FDF4EF");
	  		}else{
	  			$(window).scroll();
	  		}
   		}
     	if($("body").hasClass("post-type-archive-project")){
     		if($("section.content").hasClass("list-view")){
  				$("body").removeClass("nav-color-inverse");
  			}else{
	  			$("body").addClass("nav-color-inverse");
	  		}
     	}
      	if($("body").hasClass("post-type-archive-event")){
     		if($("section.content").hasClass("list-view")){
  				$(".info-container .meta").replaceWith(function() {
	  				return $('.meta-item', this);
	  			});
  			}else{
	  			$(".info-container .place").each(function() {
					$(this).add($(this).next('.meta-item')).wrapAll( "<div class='meta' />");
				});
	  		}
     	}
  	});



  	$("#slide-in-box .close").on("click", function(){
  		$("#slide-in-box").removeClass("active");
  	});

  	$("#partners-map .poi").on("click", function(){
  		$("#slide-in-box").addClass("active");
  	});

  	$(".slick").slick({
		infinite: false,
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: false,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				}
			}
		]
	});

	$(".main-slick, .gallery-slick").slick({
		infinite: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false
	});

/*
Vibrant: Picking up a color dynamically from the image
 */

	$(".item.artist").each(function( index ) {
		var img = $(this).data("bg");
		if(img){
			var vibrant = new Vibrant(img);

			vibrant.getPalette((err, palette) => {

				// var hex = palette["DarkMuted"].getHex();
				// var rgb = palette["DarkMuted"].getRgb();
        var hex = palette["Muted"].getHex();
				var rgb = palette["Muted"].getRgb();
				rgb.push(0.7);
				$(this).attr("data-color",hex);
		    // $(this).css({
		    //   "background-color": "rgba("+rgb.toString()+")",
		    // });
				$(window).scroll();
			});
		}
	});

	$(".item.project").each(function( index ) {
		var img = $(this).data("bg");
		if(img){
			var vibrant = new Vibrant(img);
			vibrant.getPalette((err, palette) => {
				var hex = palette["Muted"].getHex();
				$(this).find(".item-content-wrapper").css("background-color",hex);
			});
		}
	});

  $("article.artist").each(function( index ) {
		var img = $(this).data("bg");
		if(img){
			var vibrant = new Vibrant(img);
			vibrant.getPalette((err, palette) => {
				var hex = palette["Muted"].getHex();
				var light_hex = palette["LightVibrant"].getHex();
        var $article_header_inner = $(this).find(".article-header-inner");
				$article_header_inner.css({
			      "background-color": hex,
			      "color": light_hex
			    });
			    // $(".related-items").css({
			    //   "background-color": hex,
			    //   "color": light_hex
			    // });
			});
		}
	});

	$("article.project").each(function( index ) {
		var img = $(this).data("bg");
		if(img){
			var vibrant = new Vibrant(img);
			vibrant.getPalette((err, palette) => {
				var hex = palette["DarkMuted"].getHex();
				var light_hex = palette["LightVibrant"].getHex();
				$(this).css({
			      "background-color": hex,
			      "color": light_hex
			    });
		    $(".related-items").css({
		      "background-color": hex,
		      "color": light_hex
		    });
        $(".related-items .back").css({
		      "color": light_hex
		    });
        $(".related-items .back-navigation").css({
		      "border-color": light_hex
		    });
			});
		}
	});

	$(window).scroll(function() {

	  if(!$(".content").hasClass("list-view")&&is_desktop_layout ){
	  // selectors
	  var $window = $(window),
	      $body = $('body'),
	      $section = $('.panel');

	  // Change 33% earlier than scroll position so colour is there when you arrive.
	  var scroll = $window.scrollTop() + ($window.height() / 3);

	  $section.each(function () {
	    var $this = $(this);

	    // if position is within range of this panel.
	    // So position of (position of top of div <= scroll position) && (position of bottom of div > scroll position).
	    // Remember we set the scroll to 33% earlier in scroll var.
	    if ($this.offset().top <= scroll && $this.offset().top + $this.height() > scroll) {

	      // Add class of currently active div
	      $body.css('background-color', $(this).data('color'));

	    }

	  });

	  }

	}).scroll();




 });
}(jQuery));
