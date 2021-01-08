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

    $(".menu-item-home a").append('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="46" height="46" viewBox="0 0 46 46"><path d="M23,0 C10.2974508,0 0,10.2974508 0,23 C0,35.7025492 10.2974508,46 23,46 C35.7025492,46 46,35.7025492 46,23 C46,10.2974508 35.7025492,0 23,0 Z M23,2 C34.5979797,2 44,11.4020203 44,23 C44,34.5979797 34.5979797,44 23,44 C11.4020203,44 2,34.5979797 2,23 C2,11.4020203 11.4020203,2 23,2 Z"/><path d="M15.495 22L15.495 17.665 19.485 17.665 19.485 22 22.05 22 22.05 11.47 19.485 11.47 19.485 15.595 15.495 15.595 15.495 11.47 12.93 11.47 12.93 22 15.495 22zM28.875 22.105C31.86 22.105 34.26 19.87 34.26 16.705 34.26 13.54 31.875 11.32 28.875 11.32 25.89 11.32 23.46 13.54 23.46 16.705 23.46 19.87 25.89 22.105 28.875 22.105zM28.875 19.765C27.165 19.765 26.085 18.55 26.085 16.705 26.085 14.83 27.165 13.645 28.875 13.645 30.555 13.645 31.65 14.83 31.65 16.705 31.65 18.55 30.555 19.765 28.875 19.765zM15.495 36L15.495 29.67 17.865 36 19.935 36 22.29 29.685 22.29 36 24.855 36 24.855 25.47 21.84 25.47 18.915 32.76 15.96 25.47 12.93 25.47 12.93 36 15.495 36zM33.15 36L33.15 33.945 29.265 33.945 29.265 31.635 32.7 31.635 32.7 29.655 29.265 29.655 29.265 27.525 33.15 27.525 33.15 25.47 26.7 25.47 26.7 36 33.15 36z"/></svg>');

  	$(".menu-toggle").on("click", function(){
  		$("header.header").toggleClass("on");
  	});

  	if($("body").hasClass("post-type-archive-project") || $("body").hasClass("single-project")||$("body").hasClass("post-type-archive-artist")) $("body").addClass("nav-color-inverse");

  	$(".view-switcher button").on("click", function(){
  		$(this).parent().toggleClass("on");
  		$("section.content").toggleClass("list-view");
   		if($("body").hasClass("post-type-archive-artist")||$("body").hasClass("home")) {
 			if($("section.content").hasClass("list-view")){
  				$("body").css("background-color", "#FDF4EF");
          $("body").removeClass("nav-color-inverse");
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
      var id = $(this).data("id");
      $.ajax({
          type: 'POST',
          url: ajaxurl,
          data: {
              'action' : 'get_partner',
              'id' : id,
          },
          dataType:'json',
          success: function( response ){
            var obj = response;
            var $container = $("#slide-in-box .content");
            $container.find(".title").text(obj.title);
            $container.find(".body").html(obj.content);
            $container.find(".website").attr("href", obj.website);
            $container.find(".facebook").attr("href", obj.facebook);
            $container.find(".instagram").attr("href", obj.instagram);

            $("#slide-in-box").addClass("active");
          }
      });
      return false;
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
        if($this.hasClass("intro")) {
          $("body").removeClass("nav-color-inverse");
        }else{
          if(!$("body").hasClass("nav-color-inverse")) $("body").addClass("nav-color-inverse");
        }
	    }

	  });

	  }

	}).scroll();





 });
}(jQuery));
