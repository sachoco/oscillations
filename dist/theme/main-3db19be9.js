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
(window.wpackiooscillationsthemeJsonp=window.wpackiooscillationsthemeJsonp||[]).push([[0],[,,function(t,e,o){o(3),o(4),t.exports=o(8)},,function(t,e,o){"use strict";o.r(e);o(5);var s,i=o(0),a=o.n(i);(s=jQuery)(document).ready((function(){var t,e=s(window);function o(){e.width(),t=!0}o(),s(window).resize(o),s(".menu-toggle").on("click",(function(){s("header.header").toggleClass("on")})),(s("body").hasClass("post-type-archive-project")||s("body").hasClass("single-project"))&&s("body").addClass("nav-color-inverse"),s(".view-switcher button").on("click",(function(){s(this).parent().toggleClass("on"),s("section.content").toggleClass("list-view"),(s("body").hasClass("post-type-archive-artist")||s("body").hasClass("home"))&&(s("section.content").hasClass("list-view")?s("body").css("background-color","#FDF4EF"):s(window).scroll()),s("body").hasClass("post-type-archive-project")&&(s("section.content").hasClass("list-view")?s("body").removeClass("nav-color-inverse"):s("body").addClass("nav-color-inverse")),s("body").hasClass("post-type-archive-event")&&(s("section.content").hasClass("list-view")?s(".info-container .meta").replaceWith((function(){return s(".meta-item",this)})):s(".info-container .place").each((function(){s(this).add(s(this).next(".meta-item")).wrapAll("<div class='meta' />")})))})),s("#slide-in-box .close").on("click",(function(){s("#slide-in-box").removeClass("active")})),s("#partners-map .poi").on("click",(function(){s("#slide-in-box").addClass("active")})),s(".slick").slick({infinite:!1,slidesToShow:2,slidesToScroll:1,arrows:!1,responsive:[{breakpoint:768,settings:{slidesToShow:1}}]}),s(".main-slick, .gallery-slick").slick({infinite:!1,slidesToShow:1,slidesToScroll:1,arrows:!1}),s(".item.artist").each((function(t){var e=this,o=s(this).data("bg");o&&new a.a(o).getPalette((function(t,o){var i=o.Muted.getHex();o.Muted.getRgb().push(.7),s(e).attr("data-color",i),s(window).scroll()}))})),s(".item.project").each((function(t){var e=this,o=s(this).data("bg");o&&new a.a(o).getPalette((function(t,o){var i=o.Muted.getHex();s(e).find(".item-content-wrapper").css("background-color",i)}))})),s("article.artist").each((function(t){var e=this,o=s(this).data("bg");o&&new a.a(o).getPalette((function(t,o){var i=o.Muted.getHex(),a=o.LightVibrant.getHex();s(e).find(".article-header-inner").css({"background-color":i,color:a})}))})),s("article.project").each((function(t){var e=this,o=s(this).data("bg");o&&new a.a(o).getPalette((function(t,o){var i=o.DarkMuted.getHex(),a=o.LightVibrant.getHex();s(e).css({"background-color":i,color:a}),s(".related-items").css({"background-color":i,color:a}),s(".related-items .back").css({color:a}),s(".related-items .back-navigation").css({"border-color":a})}))})),s(window).scroll((function(){if(!s(".content").hasClass("list-view")&&t){var e=s(window),o=s("body"),i=s(".panel"),a=e.scrollTop()+e.height()/3;i.each((function(){var t=s(this);t.offset().top<=a&&t.offset().top+t.height()>a&&o.css("background-color",s(this).data("color"))}))}})).scroll()}))},,function(t,e){t.exports=jQuery},,function(t,e,o){}],[[2,1,2]]]);
//# sourceMappingURL=main-3db19be9.js.map