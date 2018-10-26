!function(t){var n={};function e(o){if(n[o])return n[o].exports;var i=n[o]={i:o,l:!1,exports:{}};return t[o].call(i.exports,i,i.exports,e),i.l=!0,i.exports}e.m=t,e.c=n,e.d=function(t,n,o){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:o})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(e.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var i in t)e.d(o,i,function(n){return t[n]}.bind(null,i));return o},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="",e(e.s=1)}([function(t,n){t.exports=jQuery},function(t,n,e){"use strict";var o=function(t){return t&&t.__esModule?t:{default:t}}(e(2));var i=e(0);e(3);var s=document.querySelector(".headroom");new o.default(s).init({tolerance:20,offset:80,classes:{initial:"animated",pinned:"slideDown",unpinned:"slideUp"}}),i(window).scroll(function(){140<i(this).scrollTop()?(i(".headroom").removeClass("ontop-now"),i(".navbar-dual").removeClass("navbar-inverse")):(i(".headroom").addClass("ontop-now"),i(".navbar-dual").addClass("navbar-inverse"))})},function(t,n,e){var o,i,s;
/*!
 * headroom.js v0.9.4 - Give your page some headroom. Hide your header until you need it
 * Copyright (c) 2017 Nick Williams - http://wicky.nillia.ms/headroom.js
 * License: MIT
 */
/*!
 * headroom.js v0.9.4 - Give your page some headroom. Hide your header until you need it
 * Copyright (c) 2017 Nick Williams - http://wicky.nillia.ms/headroom.js
 * License: MIT
 */
!function(e,r){"use strict";i=[],void 0===(s="function"==typeof(o=function(){var t={bind:!!function(){}.bind,classList:"classList"in document.documentElement,rAF:!!(window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame)};function n(t){this.callback=t,this.ticking=!1}function e(t){return t&&"undefined"!=typeof window&&(t===window||t.nodeType)}function o(t,n){n=function t(n){if(arguments.length<=0)throw new Error("Missing arguments in extend function");var o,i,s=n||{};for(i=1;i<arguments.length;i++){var r=arguments[i]||{};for(o in r)"object"!=typeof s[o]||e(s[o])?s[o]=s[o]||r[o]:s[o]=t(s[o],r[o])}return s}(n,o.options),this.lastKnownScrollY=0,this.elem=t,this.tolerance=function(t){return t===Object(t)?t:{down:t,up:t}}(n.tolerance),this.classes=n.classes,this.offset=n.offset,this.scroller=n.scroller,this.initialised=!1,this.onPin=n.onPin,this.onUnpin=n.onUnpin,this.onTop=n.onTop,this.onNotTop=n.onNotTop,this.onBottom=n.onBottom,this.onNotBottom=n.onNotBottom}return window.requestAnimationFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame,n.prototype={constructor:n,update:function(){this.callback&&this.callback(),this.ticking=!1},requestTick:function(){this.ticking||(requestAnimationFrame(this.rafCallback||(this.rafCallback=this.update.bind(this))),this.ticking=!0)},handleEvent:function(){this.requestTick()}},o.prototype={constructor:o,init:function(){if(o.cutsTheMustard)return this.debouncer=new n(this.update.bind(this)),this.elem.classList.add(this.classes.initial),setTimeout(this.attachEvent.bind(this),100),this},destroy:function(){var t=this.classes;for(var n in this.initialised=!1,t)t.hasOwnProperty(n)&&this.elem.classList.remove(t[n]);this.scroller.removeEventListener("scroll",this.debouncer,!1)},attachEvent:function(){this.initialised||(this.lastKnownScrollY=this.getScrollY(),this.initialised=!0,this.scroller.addEventListener("scroll",this.debouncer,!1),this.debouncer.handleEvent())},unpin:function(){var t=this.elem.classList,n=this.classes;!t.contains(n.pinned)&&t.contains(n.unpinned)||(t.add(n.unpinned),t.remove(n.pinned),this.onUnpin&&this.onUnpin.call(this))},pin:function(){var t=this.elem.classList,n=this.classes;t.contains(n.unpinned)&&(t.remove(n.unpinned),t.add(n.pinned),this.onPin&&this.onPin.call(this))},top:function(){var t=this.elem.classList,n=this.classes;t.contains(n.top)||(t.add(n.top),t.remove(n.notTop),this.onTop&&this.onTop.call(this))},notTop:function(){var t=this.elem.classList,n=this.classes;t.contains(n.notTop)||(t.add(n.notTop),t.remove(n.top),this.onNotTop&&this.onNotTop.call(this))},bottom:function(){var t=this.elem.classList,n=this.classes;t.contains(n.bottom)||(t.add(n.bottom),t.remove(n.notBottom),this.onBottom&&this.onBottom.call(this))},notBottom:function(){var t=this.elem.classList,n=this.classes;t.contains(n.notBottom)||(t.add(n.notBottom),t.remove(n.bottom),this.onNotBottom&&this.onNotBottom.call(this))},getScrollY:function(){return void 0!==this.scroller.pageYOffset?this.scroller.pageYOffset:void 0!==this.scroller.scrollTop?this.scroller.scrollTop:(document.documentElement||document.body.parentNode||document.body).scrollTop},getViewportHeight:function(){return window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight},getElementPhysicalHeight:function(t){return Math.max(t.offsetHeight,t.clientHeight)},getScrollerPhysicalHeight:function(){return this.scroller===window||this.scroller===document.body?this.getViewportHeight():this.getElementPhysicalHeight(this.scroller)},getDocumentHeight:function(){var t=document.body,n=document.documentElement;return Math.max(t.scrollHeight,n.scrollHeight,t.offsetHeight,n.offsetHeight,t.clientHeight,n.clientHeight)},getElementHeight:function(t){return Math.max(t.scrollHeight,t.offsetHeight,t.clientHeight)},getScrollerHeight:function(){return this.scroller===window||this.scroller===document.body?this.getDocumentHeight():this.getElementHeight(this.scroller)},isOutOfBounds:function(t){var n=t<0,e=t+this.getScrollerPhysicalHeight()>this.getScrollerHeight();return n||e},toleranceExceeded:function(t,n){return Math.abs(t-this.lastKnownScrollY)>=this.tolerance[n]},shouldUnpin:function(t,n){var e=t>this.lastKnownScrollY,o=t>=this.offset;return e&&o&&n},shouldPin:function(t,n){var e=t<this.lastKnownScrollY,o=t<=this.offset;return e&&n||o},update:function(){var t=this.getScrollY(),n=t>this.lastKnownScrollY?"down":"up",e=this.toleranceExceeded(t,n);this.isOutOfBounds(t)||(t<=this.offset?this.top():this.notTop(),t+this.getViewportHeight()>=this.getScrollerHeight()?this.bottom():this.notBottom(),this.shouldUnpin(t,e)?this.unpin():this.shouldPin(t,e)&&this.pin(),this.lastKnownScrollY=t)}},o.options={tolerance:{up:0,down:0},offset:0,scroller:window,classes:{pinned:"headroom--pinned",unpinned:"headroom--unpinned",top:"headroom--top",notTop:"headroom--not-top",bottom:"headroom--bottom",notBottom:"headroom--not-bottom",initial:"headroom"}},o.cutsTheMustard=void 0!==t&&t.rAF&&t.bind&&t.classList,o})?o.apply(n,i):o)||(t.exports=s)}()},function(t,n,e){"use strict";wp.customize("blogname",function(t){t.bind(function(t){$(".site-title a").text(t)})}),wp.customize("blogdescription",function(t){t.bind(function(t){$(".site-description").text(t)})}),wp.customize("header_textcolor",function(t){t.bind(function(t){"blank"===t?$(".site-title, .site-description").css({clip:"rect(1px, 1px, 1px, 1px)",position:"absolute"}):($(".site-title, .site-description").css({clip:"auto",position:"relative"}),$(".site-title a, .site-description").css({color:t}))})})}]);
//# sourceMappingURL=main.js.map