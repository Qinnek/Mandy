jQuery(document).ready(function($) {
	$("#menu").mmenu({
		"navbar": {
			"title": "<?php bloginfo('name'); ?> 导航菜单"
		},
		"navbars": [{
			"position": "top",
		}]
	})
});
jQuery(function() {
	jQuery("img").lazyload({
		effect: "fadeIn",
		failure_limit: 10
	})
});
$("cite.fn").replaceWith(function() {
	return $("<b />").append($(this).contents())
});
$(".arctips img").addClass("am-img-thumbnail am-circle");$(function(){$("a.lazy").lazyload()});$('#commentform').addClass('am-form');$('#respond').addClass('am-u-sm-centered')
// 搜索
;(function(window){'use strict';var mainContainer=document.querySelector('.main-wrap'),openCtrl=document.getElementById('btn-search'),closeCtrl=document.getElementById('btn-search-close'),searchContainer=document.querySelector('.search'),inputSearch=searchContainer.querySelector('.search__input');function init(){initEvents()}function initEvents(){openCtrl.addEventListener('click',openSearch);closeCtrl.addEventListener('click',closeSearch);document.addEventListener('keyup',function(ev){if(ev.keyCode==27){closeSearch()}})}function openSearch(){mainContainer.classList.add('main-wrap--move');searchContainer.classList.add('search--open')}function closeSearch(){mainContainer.classList.remove('main-wrap--move');searchContainer.classList.remove('search--open')}init()})(window);

//滚动距离
$(window).scroll(function(){
	$(window).scrollTop()>310?$(".header").addClass('fixed')&$(".header").fadeIn("slow"):$(".header").removeClass('fixed');
	// console.log($(window).scrollTop())
});
