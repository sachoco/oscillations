/*!
 * 
 * oscillations
 * 
 * @author Satoshi Shiraishi
 * @version 0.1.0
 * @link UNLICENSED
 * @license UNLICENSED
 * 
 * Copyright (c) 2020 Satoshi Shiraishi
 * 
 * This software is released under the UNLICENSED License
 * https://opensource.org/licenses/UNLICENSED
 * 
 * Compiled with the help of https://wpack.io
 * A zero setup Webpack Bundler Script for WordPress
 */
(window.wpackiooscillationsthemeJsonp=window.wpackiooscillationsthemeJsonp||[]).push([[0],[,,function(e,t,o){o(3),o(4),e.exports=o(8)},,function(e,t,o){"use strict";o.r(t);o(5);var s,i=o(0),a=o.n(i);(s=jQuery)(document).ready((function(){var e,t=s(window);function o(){t.width(),e=!0}o(),s(window).resize(o),s(".menu-item-home a").append('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="46" height="46" viewBox="0 0 46 46"><path d="M23,0 C10.2974508,0 0,10.2974508 0,23 C0,35.7025492 10.2974508,46 23,46 C35.7025492,46 46,35.7025492 46,23 C46,10.2974508 35.7025492,0 23,0 Z M23,2 C34.5979797,2 44,11.4020203 44,23 C44,34.5979797 34.5979797,44 23,44 C11.4020203,44 2,34.5979797 2,23 C2,11.4020203 11.4020203,2 23,2 Z"/><path d="M15.495 22L15.495 17.665 19.485 17.665 19.485 22 22.05 22 22.05 11.47 19.485 11.47 19.485 15.595 15.495 15.595 15.495 11.47 12.93 11.47 12.93 22 15.495 22zM28.875 22.105C31.86 22.105 34.26 19.87 34.26 16.705 34.26 13.54 31.875 11.32 28.875 11.32 25.89 11.32 23.46 13.54 23.46 16.705 23.46 19.87 25.89 22.105 28.875 22.105zM28.875 19.765C27.165 19.765 26.085 18.55 26.085 16.705 26.085 14.83 27.165 13.645 28.875 13.645 30.555 13.645 31.65 14.83 31.65 16.705 31.65 18.55 30.555 19.765 28.875 19.765zM15.495 36L15.495 29.67 17.865 36 19.935 36 22.29 29.685 22.29 36 24.855 36 24.855 25.47 21.84 25.47 18.915 32.76 15.96 25.47 12.93 25.47 12.93 36 15.495 36zM33.15 36L33.15 33.945 29.265 33.945 29.265 31.635 32.7 31.635 32.7 29.655 29.265 29.655 29.265 27.525 33.15 27.525 33.15 25.47 26.7 25.47 26.7 36 33.15 36z"/></svg>'),s(".menu-toggle").on("click",(function(){s("header.header").toggleClass("on")})),(s("body").hasClass("post-type-archive-project")||s("body").hasClass("single-project")||s("body").hasClass("post-type-archive-artist"))&&s("body").addClass("nav-color-inverse"),s(".view-switcher button").on("click",(function(){s(this).parent().toggleClass("on"),s("section.content").toggleClass("list-view"),(s("body").hasClass("post-type-archive-artist")||s("body").hasClass("home"))&&(s("section.content").hasClass("list-view")?(s("body").css("background-color","#FDF4EF"),s("body").removeClass("nav-color-inverse")):s(window).scroll()),s("body").hasClass("post-type-archive-project")&&(s("section.content").hasClass("list-view")?s("body").removeClass("nav-color-inverse"):s("body").addClass("nav-color-inverse")),s("body").hasClass("post-type-archive-event")&&(s("section.content").hasClass("list-view")?s(".info-container .meta").replaceWith((function(){return s(".meta-item",this)})):s(".info-container .place").each((function(){s(this).add(s(this).next(".meta-item")).wrapAll("<div class='meta' />")})))})),s("#slide-in-box .close").on("click",(function(){s("#slide-in-box").removeClass("active")})),s("#partners-map .poi").on("click",(function(){s("#slide-in-box").addClass("active")})),s(".slick").slick({infinite:!1,slidesToShow:2,slidesToScroll:1,arrows:!1,responsive:[{breakpoint:768,settings:{slidesToShow:1}}]}),s(".main-slick, .gallery-slick").slick({infinite:!1,slidesToShow:1,slidesToScroll:1,arrows:!1}),s(".item.artist").each((function(e){var t=this,o=s(this).data("bg");o&&new a.a(o).getPalette((function(e,o){var i=o.Muted.getHex();o.Muted.getRgb().push(.7),s(t).attr("data-color",i),s(window).scroll()}))})),s(".item.project").each((function(e){var t=this,o=s(this).data("bg");o&&new a.a(o).getPalette((function(e,o){var i=o.Muted.getHex();s(t).find(".item-content-wrapper").css("background-color",i)}))})),s("article.artist").each((function(e){var t=this,o=s(this).data("bg");o&&new a.a(o).getPalette((function(e,o){var i=o.Muted.getHex(),a=o.LightVibrant.getHex();s(t).find(".article-header-inner").css({"background-color":i,color:a})}))})),s("article.project").each((function(e){var t=this,o=s(this).data("bg");o&&new a.a(o).getPalette((function(e,o){var i=o.DarkMuted.getHex(),a=o.LightVibrant.getHex();s(t).css({"background-color":i,color:a}),s(".related-items").css({"background-color":i,color:a}),s(".related-items .back").css({color:a}),s(".related-items .back-navigation").css({"border-color":a})}))})),s(window).scroll((function(){if(!s(".content").hasClass("list-view")&&e){var t=s(window),o=s("body"),i=s(".panel"),a=t.scrollTop()+t.height()/3;i.each((function(){var e=s(this);e.offset().top<=a&&e.offset().top+e.height()>a&&(o.css("background-color",s(this).data("color")),e.hasClass("intro")?s("body").removeClass("nav-color-inverse"):s("body").hasClass("nav-color-inverse")||s("body").addClass("nav-color-inverse"))}))}})).scroll()}))},,function(e,t){e.exports=jQuery},,function(e,t,o){}],[[2,1,2]]]);
//# sourceMappingURL=main-46d434e0.js.map