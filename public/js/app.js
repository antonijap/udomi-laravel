!function(e){function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}var t={};n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:o})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},n.p="",n(n.s=0)}([function(e,n,t){t(1),e.exports=t(2)},function(e,n){function t(e,n,t){return n in e?Object.defineProperty(e,n,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[n]=t,e}$(document).foundation(),$(window).on("changed.zf.mediaquery",function(){$(".is-dropdown-submenu.invisible").removeClass("invisible")}),$(function(){$(".chocolat-parent").Chocolat({loop:!0,imageSize:"native",enableZoom:!0}),$("#counter").textcounter(t({type:"character",max:100,min:32,stopInputAtMaximum:!0,minimumErrorText:"Opis mora imati barem 32 znaka.",counterText:"Broj znakova: %d",maximumErrorText:"Maksimalan broj znakova 1000.",inputErrorClass:"danger",displayErrorText:!0},"stopInputAtMaximum",!1)),$(".owl-carousel").owlCarousel({items:1,margin:10,autoHeight:!0,nav:!0,loop:!0}),$(".flash-message").delay(1e3).fadeOut(1e3);var e=$('input[name="files"]').fileuploader({addMore:!0,fileMaxSize:2,extensions:["jpg","jpeg","png"],limit:3,enableApi:!0,onRemove:function(e,n,t,o,r){return 1==api.getFiles().length?($(':input[type="submit"]').prop("disabled",!0),$(".photos-error").append("Obavezno mora biti barem jedna slika.")):($(':input[type="submit"]').prop("disabled",!1),$(".photos-error").append("")),!0},onSelect:function(e,n,t,o,r){$(".photos-error").empty(),$(':input[type="submit"]').prop("disabled",!1)}});window.api=$.fileuploader.getInstance(e)})},function(e,n){}]);