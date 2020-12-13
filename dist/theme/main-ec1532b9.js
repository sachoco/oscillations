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
(window.wpackiooscillationsthemeJsonp=window.wpackiooscillationsthemeJsonp||[]).push([[0],[,,function(o,t,e){e(3),e(4),o.exports=e(8)},,function(o,t,e){"use strict";e.r(t);e(5);var s,i=e(0),n=e.n(i);(s=jQuery)(document).ready((function(){var o,t=s(window);function e(){var e=t.width();o=e>768}e(),s(window).resize(e),s(".menu-toggle").on("click",(function(){s("header.header").toggleClass("on")})),(s("body").hasClass("post-type-archive-project")||s("body").hasClass("single-project"))&&s("body").addClass("nav-color-inverse"),s(".view-switcher button").on("click",(function(){s(this).parent().toggleClass("on"),s("section.content").toggleClass("list-view"),(s("body").hasClass("post-type-archive-artist")||s("body").hasClass("home"))&&(s("section.content").hasClass("list-view")?s("body").css("background-color","#FDF4EF"):s(window).scroll()),s("body").hasClass("post-type-archive-project")&&(s("section.content").hasClass("list-view")?s("body").removeClass("nav-color-inverse"):s("body").addClass("nav-color-inverse")),s("body").hasClass("post-type-archive-event")&&(s("section.content").hasClass("list-view")?s(".info-container .meta").replaceWith((function(){return s(".meta-item",this)})):s(".info-container .place").each((function(){s(this).add(s(this).next(".meta-item")).wrapAll("<div class='meta' />")})))})),s("#slide-in-box .close").on("click",(function(){s("#slide-in-box").removeClass("active")})),s("#partners-map .poi").on("click",(function(){s("#slide-in-box").addClass("active")})),s(".slick").slick({infinite:!1,slidesToShow:2,slidesToScroll:1,arrows:!1,responsive:[{breakpoint:768,settings:{slidesToShow:1}}]}),s(".main-slick, .gallery-slick").slick({infinite:!1,slidesToShow:1,slidesToScroll:1,arrows:!1}),s(".item.artist").each((function(o){var t=this,e=s(this).data("bg");e&&new n.a(e).getPalette((function(o,e){var i=e.DarkMuted.getHex(),n=e.DarkMuted.getRgb();n.push(.7),s(t).attr("data-color",i),s(t).css({"background-color":"rgba("+n.toString()+")"}),s(window).scroll()}))})),s(".item.project").each((function(o){var t=this,e=s(this).data("bg");e&&new n.a(e).getPalette((function(o,e){var i=e.Muted.getHex();s(t).find(".item-content-wrapper").css("background-color",i)}))})),s("article.project").each((function(o){var t=this,e=s(this).data("bg");e&&new n.a(e).getPalette((function(o,e){var i=e.DarkMuted.getHex(),n=e.LightVibrant.getHex();s(t).css({"background-color":i,color:n}),s(".related-items").css({"background-color":i,color:n})}))})),s(window).scroll((function(){if(!s(".content").hasClass("list-view")&&o){var t=s(window),e=s("body"),i=s(".panel"),n=t.scrollTop()+t.height()/3;i.each((function(){var o=s(this);o.offset().top<=n&&o.offset().top+o.height()>n&&e.css("background-color",s(this).data("color"))}))}})).scroll()}))},,function(o,t){o.exports=jQuery},,function(o,t,e){}],[[2,1,2]]]);
//# sourceMappingURL=main-ec1532b9.js.map