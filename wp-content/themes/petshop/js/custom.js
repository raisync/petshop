(function($) {
	$(function() {
		"use strict";
/* Panel row styles */
$(".panel-grid-cell:not(.panel-row-style)").parent('.panel-grid').addClass("no-panel-row-style");
$('.panel-row-style').parent().addClass("panel-row-style-parent");
$('.panel-row-style-parent:first-child').parent().parent().parent().parent().parent().css('padding-top','0').addClass("panel-row-style-parent-first");
$('.panel-row-style-parent:last-child').parent().parent().parent().parent().parent().css('padding-bottom','0').addClass("panel-row-style-parent-last");
var header_height = $('.header_content_wrapper').delay(1500).outerHeight();
var footer_height = $('.bottom_footer_bar_wrapper').outerHeight();
		//Menu
		$('.primary-menu').on('click touchend', function(e) {
	      var el = $(this);
	      var link = el.attr('href');
	      window.location = link;
	   });
		$('#loader').delay(1000).fadeOut();
		//wpadminbar
		var  wpadminbar = $('#wpadminbar').height();
		$('.header_logo_top_bar').css('top',wpadminbar);
		function petshop_kaya_prettyphoto(){
			$("a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal',  deeplinking:false,  });
		}	
	petshop_kaya_prettyphoto();
		// Menu Section
 $('#menu ul:first > li').addClass("main-links");
  $("#menu ul li.main-links:last-child").css("border-right","none");
  
  //end 
  function checkWidth() {
    if ($(window).width() <= 1006) {
      $('#myslidemenu').removeClass('menu');
      $('#myslidemenu').addClass('mobile_menu');
      $('#left_header_section .mobile_menu, #right_header_section, .mobile_menu').removeClass('left_menu header_main_menu');
      //$('.header_menu_left_position, .header_menu_right_position, .header_menu_section').removeClass('toggle_menu');
      $('.header_menu_left_position, .header_menu_right_position, .header_menu_section').addClass('mobile_menu_nav');
      $('.mobile_menu').removeClass('menu');
      $('.with_out_header').hide();
      $('#header_container').addClass('mobile_header_section');
      $('.left_nav_wrap').removeClass('left_menu_toggle');
      $('.right_nav_wrap').removeClass('right_menu_toggle');
   
    } else {
      $('.mobile_menu').addClass('menu');
      $('#left_header_section .mobile_menu').addClass('left_menu');
      $('#right_header_section .mobile_menu').addClass('header_main_menu');
      $('.left_menu, .header_main_menu').removeClass('mobile_menu');
      $('#myslidemenu').removeClass('mobile_menu');
      $('#myslidemenu').addClass('menu');
      //$('.header_menu_left_position, .header_menu_right_position,  .header_menu_section').addClass('toggle_menu');
      $('.with_out_header').show();
      $('.left_nav_wrap').addClass('left_menu_toggle');
      $('.right_nav_wrap').addClass('right_menu_toggle');
      $('#header_container').removeClass('mobile_header_section');
    }
}
checkWidth();
$(window).resize(checkWidth);
/*toggle menu*/
function mobile_menu(){
	  if ($(window).width() <= 1006) { 
	      $('.header_menu_section').removeClass('main_menu_section');
	      $('.mobile_menu').removeClass('menu');
	  }else{
	      $('.header_menu_section').addClass('main_menu_section');
	      $('.mobile_menu').addClass('menu');
	      $('#myslidemenu').removeClass('mobile_menu');
	  }
	}
$('.main-menu-btn').click(function(e){
      $('.mobile_menu_nav').slideToggle('slow');
    });
mobile_menu();
$(window).resize(function(){
 // window_resize_width();
  mobile_menu();
});
/* Sticky header menu */
 if( $('.header_main_menu').hasClass('sticky')){
  var header_top_section = $('.header_top_section').height();
  var header_section = $('.header_section ').height();
	var $header_container = header_top_section + header_section;
  var sticky_navigation = function(){ 
  var scroll_top = $(window).scrollTop();
   if($('.header_main_menu').hasClass('sticky')){
      if ((scroll_top > $('#header_container').height()) && ($(window).width() > 1024)) {
      $('.header_main_menu.sticky').css({'position':'fixed', 'top':'0'});
      $('.header_main_menu.sticky').addClass('sticky_menu');
       $('.header_main_menu.sticky').addClass('header_menu');
      $('.header_top_section').fadeOut(0);
    } else {
      $('.header_main_menu.sticky').removeClass('sticky_menu');
       $('.header_main_menu.sticky').removeClass('header_menu');
      $('.header_top_section').fadeIn(0);
      $('.header_main_menu.sticky').css({'position':'relative', 'top':'inherit'});
    }
   }    
  };
  sticky_navigation();

  $(window).scroll(function() {

  sticky_navigation();

  });

}
/*-------------------------- */
$('#main-menu').smartmenus();
		function header_menu_section(){			
			if ($(window).width() <= 1006) {
				$('.mobile_menu_section').removeClass('disable_header_mobile_menu');
			}else{
				$('.mobile_menu_section').addClass('disable_header_mobile_menu');	
			}
		}
		$('.mobile_toggle_menu_icons').click(function(){
				$('.mobile_menu_section').slideToggle(250).toggleClass('active');
			});
		header_menu_section();
		$(window).resize(function() {
		  header_menu_section();
		});
	/* Portfolio Image Sorting */
	if (jQuery().isotope){
		$(window).load(function(){
			$(function (){
				if($.browser.safari){ 
					var isotopeContainer = $('.masonry_blog_gallery');
				} else{
					var isotopeContainer = $('.masonry_blog_gallery, .isotope-container');
				}
				isotopeContainer.isotope({
					masonry:{
						columnWidth:    1,
						isAnimated:     true,
						 easing: '',
					},
				})
			});
		});
	}
	if (jQuery().isotope){
			var tempvar = "all";
			jQuery(window).load(function(){
				jQuery(function (){
					var isotopeContainer = jQuery('.isotope-container'),
					isotopeFilter = jQuery('#filter'),
					isotopeLink = isotopeFilter.find('a');
					if($.browser.safari){ } else{
						isotopeContainer.isotope({
							itemSelector : '.isotope-item',
							layoutMode : 'fitRows',
							filter : '.' +tempvar,
							masonry:  {
								columnWidth: 1,
								isAnimated: true,
								isFitWidth: true,
							},
							onLayout: function() {
					   			$('.isotope li').addClass('isotope-ready');
							},
						});
					}
					isotopeLink.click(function(){
						var selector = jQuery(this).attr('data-category');
						isotopeContainer.isotope({
							filter : '.' + selector,
							itemSelector : '.isotope-item',
							layoutMode : 'fitRows',
							animationEngine : 'best-available',
						});
						isotopeLink.removeClass('active');
						jQuery(this).addClass('active');
						return false;
					});

				});
				jQuery("#filter ul li a").removeClass('active');
				jQuery("#filter ul li."+tempvar+ " a").addClass('active');
			});
		}
function header_slider_hover_buttons(){
            $('#main_slider_slides').each(function(){
                   $(this).hover(function(){
                        $(this).find('.slides-navigation a.prev').css({'left':'0px','display':'block'}).stop().animate({'left':'30px', opacity:1},0);
                        $(this).find('.slides-navigation a.next').css({'right':'0px','display':'block'}).stop().animate({'right':'30px',opacity:1},0);
              }, function(){
                  $(this).find('.slides-navigation a.prev').css({'left':'30px','display':'block'}).stop().animate({'left':'0px',opacity:0},0);
                  $(this).find('.slides-navigation a.next').css({'right':'30px','display':'block'}).stop().animate({'right':'0px',opacity:0},0);
              }); 
              });    
            }
	header_slider_hover_buttons();
		/* Portfolio Single page Slider */
		var slider_class = $(".gallery_horizontal");
	    function petshop_kaya_pf_single_page_gallery_slider() {
		    $('.single_image_slider').find('.horizontal_item img').css('height',($(window).height() - ( header_height + footer_height + 60 )));
		    if (slider_class.find(".owl-stage-outer").length) {
	            slider_class.trigger("destroy.owl.carousel");
	            slider_class.find(".horizontal_item").unwrap();
	        }
	        var columns = $(this).data('column');
			var responsive2_column = ( (columns == '4') || (columns == '5') ) ? '3' :columns;
	        slider_class.owlCarousel({
	            autoWidth: true,
	            margin: 10,
	            items: columns,
	            smartSpeed: 1300,
	            loop: true,
	            nav:true,
	            onChanged : petshop_kaya_prettyphoto,
				navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	                responsive: {
	                     0:{
		                	items:1,
		                	 autoWidth: false,
		                	 autoheight : true,
		                },
		                480:{
		                    items:2,
		                },
		                768:{
		                    items:2,
		                },
		                1024:{
		                   
		                },
	                },
	            onInitialized: function() {
	            	$('.single_page_slider_loader').hide();
	                
	            }
	        });
	    }
	    if (slider_class.length) {
	        petshop_kaya_pf_single_page_gallery_slider();
	        $(window).on("resize.destroyhorizontal", function() {
	          setTimeout(petshop_kaya_pf_single_page_gallery_slider, 150);
	        });
	    }
	    slider_class.on('mousewheel', '.owl-stage', function (e) {
			if (e.deltaY>0) {
			    slider_class.trigger('next.owl');
			} else {
			    slider_class.trigger('prev.owl');
			}
			e.preventDefault();
		});
		//end	
		$(".search_box_icon").click(function () {
        $('.search_box_wrapper').animate({width:'toggle'},500);
          $(this).toggleClass("closed");
    });  	
	//Single Page Tabs
	function petshop_kaya_pf_single_page_tabs(){
			$('.single_page_content_wrapper').each(function(){
				petshop_kaya_pf_single_page_gallery_slider();
		      	$(".pf_tab_content").hide(); //Hide all content
		      	$(".pf_tab_list > ul li:first").addClass("tab-active").show();
		      	$(".pf_tab_content:first").stop(true,true).fadeIn(0);
		      	$(".pf_tab_list > ul li").click(function() {
		        	$(".pf_tab_list > ul li").removeClass("tab-active");
		        	$(this).addClass("tab-active");
		        	$(".pf_tab_content").stop(true,true).fadeOut(0);
		        	var activeTab = $(this).find("a").attr("href");
		        	$(activeTab).stop(true,true).fadeIn(800);
		        	setTimeout(petshop_kaya_pf_single_page_gallery_slider, 10);
		        	return false;
		      	});
			});
		}
		/* Posts Related Slider */
		function petshop_kaya_related_post_slider(){
			$('.related_post_slider').each(function(){
				$(this).owlCarousel({
					nav : false,
					autoPlay : true,
					stopOnHover : true,
					loop :true,
					margin : 20,
					onInitialized: function() {
	                	$('.related_post_slider').show();
	            	},
					responsive: {
						0:{
							items:1,
						},
						480:{
							items:1,
						},
						768:{
							items:2,
						},
						1024:{
							items:3,
						},
					},    
				});
			});
		}
	/*Product thumnail slider */
	/*function petshop_kaya_product_thumbnail_slider(){
			$('.product_thumnails').each(function(){
				$(this).owlCarousel({
					nav : true,
					navText : false,
					autoplay : true,
					loop :true,
					margin:10,
					animateOut: 'slideOutUp',
  					animateIn: 'slideInUp',
  					onInitialized: function() {
                    $('.product_thumnails').show();
                    $('.slider_bg_loading_img').hide();
                }, 
					responsive: {
						0:{
							items:2,
						},
						480:{
							items:2,
						},
						768:{
							items:3,
						},
						1024:{
							items:4,
						},
					},    
				});
			});
		}*/
		/* Footer Height */
		function petshop_kaya_elements_resize(){
			if ( $(window).width() > 1006 ) {
				var footer_height = $('.footer_widgets').height();
				$('.footer_widgets > div').css('height', footer_height);
			}else{
				var footer_height = $('.footer_widgets').height();
				$('.footer_widgets > div').css('height', 'inherit');	
			}
			// Mid container settings
			var sticky_header = $('.header_top_bar_setion').data('sticky-header');
			var sticky_footer = $('.bottom_footer_bar_wrapper').data('footer-sticky');
			var header_height = $('.header_content_wrapper').delay(1500).outerHeight();
			var footer_height = $('.bottom_footer_bar_wrapper').outerHeight();
			if( sticky_header == 'on' ){ // Header
				$('.header_top_bar_setion').css('position','fixed');
				$('#mid_container_wrapper').css({'padding-top':header_height});
			}
			if( sticky_footer == 'on' ){ //Footer
				$('.bottom_footer_bar_wrapper').css('position','fixed');
				$('#mid_container_wrapper').css({'padding-bottom':footer_height});
			}
			// Menu Height
			var menu_height = $('#header_container_wrapper').delay('3000').height();
				$('.header_right_section').css({'padding-top':( ( $('.header_content_wrapper').height() / 4 ) ),'margin-top':-( menu_height / 2 ) });
			}
			/* Header Main slider Description */
			$('.slides_description,.video_description').each(function(){
	     		$(this).css('margin-top', -Math.ceil($(this).outerHeight() / 2));
	  		});
		//Woocommerce Buttons Quantity
			$('.quantity').each(function(){
				$(this).find('.woo_qty_plus').click(function(e){
					e.preventDefault();
					$('input[name="update_cart"]').removeAttr('disabled');
					var currentVal = parseInt( $(this).prev('.woo_items_quantity').val());
					if (!isNaN(currentVal)) {
						$(this).prev('.woo_items_quantity').val(currentVal + 1);
					} else {
						$(this).prev('.woo_items_quantity').val(0);
					}
			});
		// This button will decrement the value till 0
		$(this).find(".woo_qty_minus").click(function(e) {
				e.preventDefault();
				$('input[name="update_cart"]').removeAttr('disabled');
				var currentVal = parseInt( $(this).next('.woo_items_quantity').val());
					if (!isNaN(currentVal) && currentVal > 0) {
				$(this).next('.woo_items_quantity').val(currentVal - 1);
				} else {
					$(this).next('.woo_items_quantity').val(0);
				}
			});
		});
		// Cross Sales Products
		function petshop_kaya_cross_sells_product_slider(){
			$('.cross-sell.products').each(function(){
					$(this).find(".cross-sells-product-slider").owlCarousel({
			        navigation : false,
			        autoplay : true,
			        stopOnHover : true,
			        pagination  : false,
			        items :4,
			        margin:20,
			        smartSpeed: 1500,
			        onInitialized: function() {
	                    $('.cross-sells-product-slider').show();
	                },
	                responsive: {
	                     0:{
		                	items:1,
		                },
		                480:{
		                    items:2,
		                },
		                768:{
		                    items:2,
		                },
		                1024:{
		                    items:3,
		                },
		                1366:{
		                    items:4,
		                },
	                }
		      	});
			});
		}
		// Upsells
		function petshop_kaya_upsells_product_slider(){
		$('.upsells.products').each(function(){
			$(this).find(".upsells-product-slider").owlCarousel({
                navigation : false,
                autoplay : true,
                stopOnHover : true,
                pagination  : false,
                items :4,
                margin:20,
                responsive: {
	                0:{
	                	items:1,
	                },
	                480:{
	                    items:2,
	                },
	                768:{
	                    items:2,
	                },
	                1024:{
	                    items:3,
	                },
	                1366:{
	                    items:4,
	                },
            	}
              });
		});
		}
		//Related Products
		function petshop_kaya_related_product_slider(){
			$('.related.products').each(function(){
				$(this).find(".related-product-slider").owlCarousel({
	                navigation : false,
	                autoplay : true,
	                stopOnHover : true,
	                pagination  : false,
	                items :4,
	                margin:20,
	                responsive: {
		                0:{
		                	items:1,
		                },
		                480:{
		                    items:2,
		                },
		                768:{
		                    items:2,
		                },
		                1024:{
		                    items:3,
		                },
		                1366:{
		                    items:4,
		                },
	            	}
		        });
			});
		}
		$('.woocommerce-billing-fields').each(function(){
			$(this).find('h3').nextAll().wrapAll( "<div class='woocommerce-billing-fields-wrapper'></div>" );
		});
		$('.woocommerce-shipping-fields').each(function(){
			$(this).find('h3').nextAll().wrapAll( "<div class='woocommerce-shipping-fields-wrapper'></div>" );
		});
		// Video Player
		$('.video_background_wrapper').each(function(){
			var desc_height = $(this).find('.video_description').height();
			$(this).find('.video_description').css('margin-top',-(desc_height / 2));
			$(".player").mb_YTPlayer();
		})
	// Coming Soon Date
	$('.coming_soon_page_wraaper').each(function(){
			var countdown_date = $(this).find('#coming_soon_date').data('date');
			var date_color = $(this).find('#coming_soon_date').data('date-color');
			$(this).find('#coming_soon_date').css("color:"+date_color);

			$(this).find("#coming_soon_date").countdown(countdown_date, function(event) {
		   	var $this = $(this).html(event.strftime(''
		     + '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time" style="color:'+date_color+'">%w</span> Weeks </div></div>'
		     + '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time"  style="color:'+date_color+'">%d</span> Days </div></div>'
		     + '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time"  style="color:'+date_color+'">%H</span> Hours </div></div>'
		     + '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time"  style="color:'+date_color+'">%M</span> Min </div></div>'
		     + '<div class="count_down_wrapper_border"><div class="countdown_wrapper"><span class="countdown_time"  style="color:'+date_color+'">%S</span> Sec </div></div>'));
		});
	});
	$('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
	});
	// Scroll Top
	 $(window).scroll(function(){
	    if ($(this).scrollTop() > 100) {
	        $('.scroll_top').fadeIn();
	    } else {
	        $('.scroll_top').fadeOut();
	    }
	});
	 $('.scroll_top').click(function(){
	    $("html, body").animate({ scrollTop: 0 },  600);
	    return false;
	});    
// Search 
	$('.toggle_search_icon').click(function(){
		if( $('.search_box_overlay').length > 0 ){
		 	return false;
		}
		$('body').append('<div class="search_box_overlay"></div>');
		$('.toggle_search_wrapper').css({'display':'block'}).animate({  'opacity':'1'}, 650, 'swing', function(){
		});
	});
	$('.toggle_search_wrapper').each(function(){
		$(this).find('span.search_close').click(function(){
		   $(this).parent().parent('.toggle_search_wrapper').css({'display':'block'}).animate({'opacity':'0'}, 850, 'swing', function(){
		         $('.toggle_search_wrapper').css('display', 'none');
		    });
		   $('.search_box_overlay').remove();
		});
	});
	// Footer Height
	function petshop_kaya_footer_height(){
		if($('body')[0].scrollHeight > $(window).height()){
		    $('.bottom_footer_bar_wrapper').removeClass("footer_scroll");
		}else{
			$('.bottom_footer_bar_wrapper').addClass("footer_scroll");
		}
	}
	// On hover footer socila icons
		$('.social_share_button').click(function(){
			$(this).prev('ul').toggle();
		});
	//
	$('ul.page-numbers').each(function(){
	$(this).find('.current').parent().addClass('current_page');
	})
	/* Shooping Cart */
	$('.widget_shopping_cart_content .buttons a').removeClass('wc-forward');
	$('.woocommerce .button, #review_form_wrapper .form-submit #submit').not('.wc-forward, .shop_product_slider_wrapper .button').addClass('primary-button');
	$('.checkout-button, #place_order, .cart-sussess-message a').addClass('seconadry-button');
	$('.related.products li, .upsells.products li, .cross-sells ul.products li').removeClass('first last');
	$('.add_to_wishlist').removeClass('single_add_to_wishlist button alt primary-button');
	$('i.icon-align-right').removeClass('icon-align-right').addClass('fa fa-heart');
	$('.widget_shopping_cart_content .buttons a').addClass('primary-button');
	$('.cart-sussess-message a').removeClass('seconadry-button');
	// Page title line height
	var title_line_height = $('.title_border_bottom_line').data('line-height');
 	$('span.title_border_bottom_line').delay( 800 ).animate({'height':title_line_height, 'opacity':'1'}, 1000);
	// Resize Function
	petshop_kaya_elements_resize();
	petshop_kaya_footer_height();
	$(window).load(function() {
		//Scroller
		$('.tab_content_wrapper_loader').hide();
		$('.pf_tabs_content_wrapper').show();
		petshop_kaya_pf_single_page_tabs();
		petshop_kaya_pf_single_page_gallery_slider();
		petshop_kaya_related_post_slider();
		petshop_kaya_cross_sells_product_slider();
		petshop_kaya_related_product_slider();
		petshop_kaya_upsells_product_slider();
		//petshop_kaya_product_thumbnail_slider();
		petshop_kaya_footer_height();
	})
	$(window).resize(function() {
		var header_height = $('.header_content_wrapper').outerHeight();
		var footer_height = $('.bottom_footer_bar_wrapper').outerHeight();
		petshop_kaya_footer_height();
	  	petshop_kaya_elements_resize();  
	});
	// Detect IE Browser
	if ($.browser.msie) {
	 	$('.page_title_wrapper h2, .page_title_wrapper h2 span').css('opacity','1').addClass('ie_opacity_title');
	 	$('input[type=text], textarea').placeholder();
	 }
	//Email Sending Validator
jQuery("#send_mail_to_post").click(function(){
  var user_post_link = jQuery("#user_post_link").val();
  var user_email = jQuery("#user_email").val();
  var user_name = jQuery("#user_name").val();
  var receiver_email = jQuery("#receiver_email").val();
  var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
  var hasError = false;
  if( user_email =='' ){
    jQuery('#user_email').addClass('vaidate_error');
     hasError = true;
  }else{
    if (!pattern.test(user_email)) {
    jQuery('#user_email').addClass('vaidate_error');
     hasError = true;
   }else{
     jQuery('#user_email').removeClass('vaidate_error');
     }
   }
  if( user_name == '' ){
    jQuery('#user_name').addClass('vaidate_error')
  }else{
    jQuery('#user_name').removeClass('vaidate_error')
  }
  if( receiver_email =='' ){
    jQuery('#receiver_email').addClass('vaidate_error');
  }else{
    if (!pattern.test(receiver_email)) {
    jQuery('#receiver_email').addClass('vaidate_error');
     hasError = true;
   }else{
     jQuery('#receiver_email').removeClass('vaidate_error');
     }
   }
  if(hasError) { return; }
  else{ 
    jQuery('.mail_form_load_img').show();
    jQuery('#send_mail_to_post').attr('disabled','disable').addClass('button_disable');
    jQuery.ajax({
      type: 'POST',
      url: kaya_ajax_url.ajaxurl,
      data: {
        action: 'petshop_kaya_share_post_email',
        'user_email': user_email,
        'user_name' : user_name,
        'receiver_email' : receiver_email,
        'user_post_link':user_post_link,
      },
      success: function(data) {
        jQuery('#send_mail_to_post').removeAttr('disabled').removeClass('button_disable');
        jQuery('.mail_form_load_img').hide();
        jQuery('.success_result').show();
        jQuery('.success_result').html(data.toString());
        return false;
      },
      error: function(data){
        $('p.success_result').html(data.toString())
        return false;
      }
    });
  }
});
$('.user_send_email_post').hide();
$('.pf_social_share_icons').delegate( ".user_email_form", "click",function(){
  $('.user_send_email_post').show();
  $(this).addClass('hide_user_form');
  $('.hide_user_form').removeClass('user_email_form');
  return false;
}); 
	//Share ICons
	$('.user_send_email_post').hide();
	$('.pf_social_share_icons').delegate( ".user_email_form", "click",function(){
	  $('.user_send_email_post').show();
	  $(this).addClass('hide_user_form');
	  $('.hide_user_form').removeClass('user_email_form');
	  return false;
	});
	//
	$('.pf_social_share_icons').delegate( ".hide_user_form", "click",function(){
	  $('.user_send_email_post').hide();
	  $(this).addClass('show_user_form');
	  $('.show_user_form').addClass('user_email_form');
	  $('.user_email_form').removeClass('hide_user_form');
	  return false;
	});	 
	});
})(jQuery);