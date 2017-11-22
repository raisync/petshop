(function( $ ) {
    "use strict";
    /* Start here */
    $.noConflict();
     $('#user_login').attr( {'placeholder':'Username', "required":"true"} );
    $('#user_pass').attr( {'placeholder': 'Password' , "required":"true"} );
    $('#wp-submit').addClass('readmore_button');
    $("a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal'});
    /* Image Boxes */ 
    $('.image_box_wrapper').each(function(){
        var button_bg =  $(this).find('.image_description_wrapper .readmore_button').css('background-color');
        var button_link = $(this).find('.image_description_wrapper .readmore_button').css('color');
        var button_border = $(this).find('.image_description_wrapper .readmore_button').css('border-color');

    	var button_bg_hover =  $(this).find('.image_description_wrapper .readmore_button').data('hover-bg');
    	var button_link_hover = $(this).find('.image_description_wrapper .readmore_button').data('button-hover');
        var button_border_hover = $(this).find('.image_description_wrapper .readmore_button').data('hover-border');
       	$(this).find('.image_description_wrapper .readmore_button').hover(function(){
    		$(this).css({  'color':button_link_hover, 'background': button_bg_hover, 'border-color' : button_border_hover});
       	}, function(){
    		$(this).css({  'color':button_link, 'background': button_bg, 'border-color' : button_border});
    	});
    })
    
    /* Callout Boxes */
    $('.widget_kaya-calloutbox-widget').each(function(){
        var button_hover_bg = $(this).find('.callout_button').data('hoverbg');
        var button_border_color =  $(this).find('.callout_button').data('border');
        var button_hover_border = $(this).find('.callout_button').data('hoverborder');
        var button_hover_text = $(this).find('.callout_button').data('hovertext');
        var button1_hover_bg = $(this).find('.callout_button1').data('hoverbg');

        var button1_border_color =  $(this).find('.callout_button1').data('border');
        var button1_hover_border = $(this).find('.callout_button1').data('hoverborder');
        var button1_hover_text = $(this).find('.callout_button1').data('hovertext');
        var button2_hover_bg = $(this).find('.callout_button2').data('hoverbg');
        var button2_hover_text = $(this).find('.callout_button2').data('hovertext');
        var button2_border_color =  $(this).find('.callout_button2').data('border');
        var button2_hover_border = $(this).find('.callout_button2').data('hoverborder');
        var bg_color =  $(this).find('.callout_button').css("background-color");
        var text_color =  $(this).find('.callout_button').css("color");
        var bg1_color =  $(this).find('.callout_button1').css("background-color");
        var text1_color =  $(this).find('.callout_button1').css("color");
        var bg2_color =  $(this).find('.callout_button2').css("background-color");
        var text2_color =  $(this).find('.callout_button2').css("color");
        var bg_color2 =  $(this).find('.callout_button').css("background-color");
        var text_color2 =  $(this).find('.callout_button').css("color");
        var border_color = button_border_color ? '1px solid '+button_border_color+'' : '0px';
        var button1_border = button1_border_color ? '1px solid '+button1_border_color+'' : '0px';
        var button2_border = button2_border_color ? '1px solid '+button2_border_color+'' : '0px';
        var button_border_hover_color = button_hover_border ? '1px solid '+button_hover_border+'' : border_color;
        var button_1_border_hover_color = button1_hover_border ? '1px solid '+button1_hover_border+'' : button1_border;
        var button_2_border_hover_color = button2_hover_border ? '1px solid '+button2_hover_border+'' : button2_border;
        $(this).find('.callout_box_wrapper .callout_button').hover(function(){
            $(this).css({'background-color':button_hover_bg, 'color':button_hover_text, 'border':button_border_hover_color});
        },function(){
            $(this).css({'background-color':bg_color, 'color':text_color, 'border':border_color})
        });
        $(this).find('.callout_box_wrapper .callout_button1').hover(function(){
            $(this).css({'background-color':button1_hover_bg, 'color':button1_hover_text, 'border':button_1_border_hover_color});
        },function(){
            $(this).css({'background-color':bg1_color, 'color':text1_color, 'border':button1_border})
        });
        $(this).find('.callout_box_wrapper .callout_button2').hover(function(){
            $(this).css({'background-color':button2_hover_bg, 'color':button2_hover_text, 'border':button_2_border_hover_color});
        },function(){
            $(this).css({'background-color':bg2_color, 'color':text2_color, 'border':button2_border});
        });
        var callout_content = $(this).find('.callout_box_content h3').height();
         $(this).find('.callout_box_style1 .callout_box_content h3').css({'margin-top':(Math.ceil(callout_content / 2.3))});
    });
    /* Icon Box */
    $('.iconbox').each(function(){
        var title_color = $(this).find('.title_style1').css('color');
        var title_hover_color = $(this).find('.title_style1').data('hover-color');
        var readmore_bg = $(this).find('.readmore_button').css('background-color');
        var readmore_color = $(this).find('.readmore_button').css('color');
        var readmore_border = $(this).find('.readmore_button').css('border-color');
        var readmore_hover_bg = $(this).find('.readmore_button').data('hover-bg') ? $(this).find('.readmore_button').data('hover-bg') : readmore_bg;
        var readmore_hover_color = $(this).find('.readmore_button').data('hover-color') ? $(this).find('.readmore_button').data('hover-color') : readmore_color;
        var readmore_hover_border = $(this).find('.readmore_button').data('hover-border') ? $(this).find('.readmore_button').data('hover-border') : readmore_border;

        $(this).find('.readmore_button').hover(function(){
            $(this).css({'color':readmore_hover_color, 'background-color' : readmore_hover_bg, 'border-color': readmore_hover_border});
        }, function(){
            $(this).css({'color':readmore_color, 'background-color' : readmore_bg, 'border-color': readmore_border});
        });
        $(this).find('a .title_style1').hover(function(){
            $(this).css('color',title_hover_color);
        }, function(){
            $(this).css('color',title_color);
        });
    });
/* Image Text Boxes */
function banner_overlay_content() {
$('.widget_kaya-image-text-boxes').each(function(){
    $(this).next(this).prev(this).css('margin-bottom','30px');
    var content_height = $(this).find('.overlay_content').height();
    $(this).find('.overlay_content.vertical_align_middle').css('margin-top',-(Math.ceil((content_height/2))+30));
});
}
banner_overlay_content();
$(window).resize(banner_overlay_content);
/* Image Box */
$('.image-boxes').each(function(){
    var grayscale = $(this).data('grayscale');
    if( grayscale == 'on' ){
        $(this).find('ul li, .image_gallery_slider').addClass('gray_scale_img');
        $(this).find('ul li, .image_gallery_slider').hover(function(){
            $(this).removeClass('gray_scale_img');
        },function(){
            $(this).addClass('gray_scale_img');
        });
    }
    $(this).find('ul li, .image_gallery_slider').hover(function(){
        $(this).find('.image_hover_bg_color').stop(true,true).fadeIn('slow');
        $(this).find('.mouse_over_on_image').stop(true,true).css('bottom', "0px");
    },function(){
        $(this).find('.image_hover_bg_color').stop(true,true).fadeOut('slow');
        $(this).find('.mouse_over_on_image').stop(true,true).css('bottom', "-100%");
    }); 
    var bg_color =$(this).find('.image_hover_bg_color').css('background-color');
    if( bg_color != 'transparent'){
        $(this).find('ul li, .image_gallery_slider').hover(function(){
            $(this).find('img').css('opacity',0.5);
        },function(){
            $(this).find('img').css('opacity',1);
        }); 
    }
});

    /* -----------------------------------
    Testimonial Slider 
    ------------------------------------ */
    function testimonial_slider_widget(){
        $('.testimonial_slider_wrapper').each(function(){
            var autoplay = $(this).data('autoplay');
            var columns = $(this).data('columns');
            var responsive2_column = ( (columns == '4') || (columns == '3') ) ? '2' :columns;
            $(this).find('.testimonial_slider_section').owlCarousel({
                nav         : false,
                items       : columns,
                margin      : 0, 
                dots: false,
                autoplay    : false,
                autoHeight  : false,
                smartSpeed: 1500,
                loop:false,
                touchDrag     : false,
                mouseDrag     : false,
                 URLhashListener:true,
                startPosition: 'URLHash',
                onInitialized: function() {
                     $('.testimonial_slider_wrapper').css('display','block');
                },
                responsive: {
                    0:{
                    items:1,
                    },
                    480:{
                        items:1,
                    },
                    768:{
                        items:responsive2_column,
                        loop : false,
                    },
                    1024:{
                        items:columns,
                        loop : false,
                    },
                },   
                });
            var img_active_border = $(this).find('.slider_thumb_img').data('active-border');
            var img_border = $(this).find('.slider_thumb_img .slider_thumb_border').css('border-color');
            $(this).find('.slider_thumb_img:first-child').addClass('active').children('.slider_thumb_border').css('border-color',img_active_border);;
            $(this).find('.slider_thumb_img').on('click', function () {
                $('.slider_thumb_img').removeClass('active').children('.slider_thumb_border');
                $(this).addClass('active').children('.slider_thumb_border').css('border-color',img_active_border);
                $(this).find('.slider_thumb_border').css('border-color',img_border);
            });
           
        });
}
 // Gallery Slider Images 
    function image_gallery_slider(){
        $('.petshop_image_gallery_slider').each(function(){
            var  $sync1 = $(this).find("#main_slider_imgs");//big photo
            var $sync2 = $(this).find("#slider_thumb_images"); //thumbs
            var autoplay = $(this).data('auto-play');
            var disable_navigation = $(this).data('disable-nav-buttons');
           // alert(disable_navigation);
            var duration = 300;
            $sync1.owlCarousel({
                items: 1,
                nav:disable_navigation,
                smartSpeed: 1500,
                autoplay :autoplay,
                navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
            })
            var button_bg_color = $(this).data('buttons-bg');
            var buttons_color = $(this).data('buttons-color');
            $(this).find('#main_slider_imgs .owl-controls .owl-nav').css({'background-color':button_bg_color, 'color':buttons_color});
            $(this).find('#main_slider_imgs .owl-controls .owl-nav .owl-prev i, #main_slider_imgs .owl-controls .owl-nav .owl-next i').css({'color':buttons_color});
            $sync1.on('changed.owl.carousel', function (e) {
                var syncedPosition = syncPosition(e.item.index);
                if ( syncedPosition != "stayStill" ) {
                    $sync2.trigger('to.owl.carousel', [syncedPosition, duration, true]);
                }
            });
            $sync2.on('initialized.owl.carousel', function() { //must go before owl carousel initialization
                addClassCurrent( 0 );
            })
            $sync2.owlCarousel({ //owl carousel init
                items: 4,
                nav:false,
                margin: 0,
                smartSpeed: 1500,
                autoplay :autoplay,
                onInitialized: function() {
                    $('#main_slider_imgs').show();
                    $('.slider_bg_loading_img').hide();
                }, 
                responsive: {
                    0:{
                        items:3,
                    },
                    768:{
                        items:4
                    },
                    1366:{
                        items:5
                    },
                },
            })
            $sync2.on('click', '.owl-item', function () {
                $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
            });
            //adds 'current' class to the thumbnail
            function addClassCurrent( index ) {
                $sync2.find(".owl-item").removeClass("current").eq( index ).addClass("current");
            }
            //syncs positions. argument 'index' represents absolute position of the element
            function syncPosition( index ) {
                //PART 1 (adds 'current' class to thumbnail)
                addClassCurrent( index );
                //PART 2 (counts position)
                var itemsNo = $sync2.find(".owl-item").length; //total items
                var visibleItemsNo = $sync2.find(".owl-item.active").length; //visible items
                //if all items are visible
                if (itemsNo === visibleItemsNo) {
                    return "stayStill";
                }
                //relative index (if 4 elements are visible and the 2nd of them has class 'current', returns index = 1)
                var visibleCurrentIndex = $sync2.find(".owl-item.active").index( $sync2.find(".owl-item.current") );
                //if it's first visible element and if there is hidden element before it
                if (visibleCurrentIndex == 0 && index != 0) {
                        return index - 1;
                }
                //if it's last visible element and if there is hidden element after it
                if (visibleCurrentIndex == (visibleItemsNo - 1) && index != (itemsNo - 1)) {
                        return index - visibleItemsNo + 2;
                }
                return "stayStill";
            }
        });
    }
    /*----------------------------------
    Button  Widget 
    -----------------------------------*/
    $('.button_wrapper_section').each(function () {
        var button_bg_color = $(this).find('a').css('background-color');
        var button_border_color = $(this).find('a').css('border-left-color');
        var button_link_color = $(this).find('a').css('color');
        var button_link_icon_color = $(this).find('a i').css('color');
        var button_bg_hover_color = $(this).find('a').data('hover-bg-color') ? $(this).find('a').data('hover-bg-color') : button_bg_color;
        var button_border_hover_color = $(this).find('a').data('hover-border-color') ? $(this).find('a').data('hover-border-color') : button_border_color ;
        var button_link_hover_color = $(this).find('a').data('hover-link-color') ? $(this).find('a').data('hover-link-color') : button_link_color;
        $(this).find('.widget_button').hover(function(){
            $(this).css({ 'background':button_bg_hover_color, 'border-top-color':button_border_hover_color, 'border-left-color':button_border_hover_color, 'border-right-color':button_border_hover_color, 'border-bottom-color':button_border_hover_color, 'color':button_link_hover_color });
            $(this).find('i').css({ 'color':button_link_hover_color });
        },function(){
            $(this).css({ 'background':button_bg_color, 'border-left-color':button_border_color, 'border-right-color':button_border_color,  'border-top-color':button_border_color, 'border-bottom-color':button_border_color, 'color':button_link_color });
            $(this).find('i').css({ 'color':button_link_icon_color });
        });
    });
    /* blog widget */
    function blog_post_section(){
    $('.blog_post_wrapper').each(function(){
        var title_color = $(this).find('.post_content_wrapper  .title_style2 a').css('color');
        var title_hover_color = $(this).find('.post_content_wrapper  .title_style2 a').data('title-hover');
        var link_color = $(this).find('.post_content_wrapper ').data('link');
        var link_hover_color = $(this).find('.post_content_wrapper ').data('link-hover');

        var button_bg_color = $(this).find('a.readmore_button').css('background-color');
        var button_bg_hover_color = $(this).find('a.readmore_button').data('bg-hover');
        var button_link_color = $(this).find('a.readmore_button').data('link');
        var button_link_hover_color = $(this).find('a.readmore_button').data('link-hover');

       $(this).find('.post_content_wrapper  .meta_post_info a').css({'color':link_color});
        $(this).find('.post_content_wrapper  .meta_post_info a').hover(function(){
            $(this).css({'color':link_hover_color});
        }, function(){
            $(this).css({'color':link_color});
        });

        $(this).find('.post_content_wrapper  .title_style2 a').hover(function(){
            $(this).css({'color':title_hover_color});
        }, function(){
            $(this).css({'color':title_color});
        });
        $(this).find('a.readmore_button').css({'color':button_link_color})
        $(this).find('a.readmore_button').hover(function(){
            $(this).css({'color':button_link_hover_color, 'background-color':button_bg_hover_color});
        }, function(){
             $(this).css({'color':button_link_color, 'background-color':button_bg_color});
        });
    });
}

    /* -----------------------------------
    Blog Gallery Slider
    --------------------------------------*/
    function post_format_gallery(){
        $('.format-gallery').each(function(){
            $(this).find('.gllery_slider').owlCarousel({
                nav:true,
                loop : true,
                navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
                autoplay : true,
                 dots: false,
                autoplayHoverPause : true,
                items :1,
                smartSpeed: 1500,
                onInitialized: function() {
                    $('.gllery_slider').show();
                },
            });
            $(this).find('.bx-wrapper .bx-controls-direction').fadeOut();
            $(this).hover(function(){
                $('.bx-wrapper .bx-controls-direction').stop(true,true).fadeIn();
            },function(){
                $('.bx-wrapper .bx-controls-direction').stop(true,true).fadeOut();
            }); 
        });
    }
     $('.single .single_body .single_img').hover(function(){
        $('.bx-wrapper .bx-controls-direction').stop(true,true).fadeIn();
    },function(){
        $('.bx-wrapper .bx-controls-direction').stop(true,true).fadeOut();
    });
     /* Draggable Slider */
    $('.portfolio_slider_content_wrapper').each(function(){
        var columns = $(this).find('.portfolio_widget_slider').data('columns');
        var buttons_color = $(this).find('.portfolio_widget_slider').data('buttons');
        var auto_play = $(this).find('.portfolio_widget_slider').data('auto-play');
        var loop = $(this).find('.portfolio_widget_slider').data('loop');
        var responsive2_column = ( (columns == '4') || (columns == '3') ) ? '2' :columns;
         var responsive3_column = ( (columns == '4') || (columns == '5') ) ? '3' :columns;
        $(this).find('.portfolio_widget_slider .owl-nav i').css('color', buttons_color);
        $(this).find(".portfolio_widget_slider").owlCarousel({
            nav : true,
            navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
            autoplay :auto_play,
            stopOnHover : true,
            loop : loop,
            items : columns,
            smartSpeed: 1500,
            responsive: {
                480:{
                    items:1,
                },
                768:{
                    items:responsive2_column,
                },
                1024:{
                    items:responsive3_column,
                },
                1366:{
                    items:columns,
                },
            },
            onInitialized: function() {
                $('.portfolio_widget_slider').show();
            }, 
        });
        $(this).find('.portfolio_widget_slider .owl-nav i').css('color', buttons_color);
        var odd_bg_color =   $(this).find('.pf_title_cat_wrapper').data('odd-bg');
        var odd_title_border =   $(this).find('.pf_title_cat_wrapper').data('odd-title-border');
        var odd_title_color =   $(this).find('.pf_title_cat_wrapper').data('odd-title');
        var odd_title_hover_color =   $(this).find('.pf_title_cat_wrapper').data('odd-title-hover');
        var odd_cat_color =   $(this).find('.pf_title_cat_wrapper').data('odd-cat-color');
        var even_bg_color =   $(this).find('.pf_title_cat_wrapper').data('even-bg');
        var even_title_border =   $(this).find('.pf_title_cat_wrapper').data('even-title-border');
        var even_title_color =   $(this).find('.pf_title_cat_wrapper').data('even-title');
        var even_title_hover_color =   $(this).find('.pf_title_cat_wrapper').data('even-title-hover');
        var evencat_color =  $(this).find('.pf_title_cat_wrapper').data('even-cat-color');
        $(this).find('.owl-item:nth-child(odd) .pf_title_cat_wrapper h3 a').css({'color':odd_title_color});
        $(this).find('.owl-item:nth-child(odd) .pf_title_cat_wrapper p').css({'color':odd_cat_color});
        $(this).find('.owl-item:nth-child(odd) .pf_title_cat_wrapper').css({'background-color':odd_bg_color});
        $(this).find('.owl-item:nth-child(odd) .pf_title_cat_wrapper h3 span').css({'background-color':odd_title_border});
        $(this).find('.owl-item:nth-child(odd) .pf_title_cat_wrapper h3 a').hover(function(){
            $(this).css({'color':odd_title_hover_color});
        }, function(){
            $(this).css({'color':odd_title_color});
        });
        $(this).find('.owl-item:nth-child(even) .pf_title_cat_wrapper h3 a').css({'color':even_title_color});
        $(this).find('.owl-item:nth-child(even) .pf_title_cat_wrapper').css({'background-color':even_bg_color});
        $(this).find('.owl-item:nth-child(even) .pf_title_cat_wrapper h3 span').css({'background-color':even_title_border});
        $(this).find('.owl-item:nth-child(even) .pf_title_cat_wrapper h3 a').css({'color':even_title_color});
        $(this).find('.owl-item:nth-child(even) .pf_title_cat_wrapper p').css({'color':evencat_color});
        $(this).find('.owl-item:nth-child(even) .pf_title_cat_wrapper h3 a').hover(function(){
            $(this).css({'color':even_title_hover_color});
        }, function(){
            $(this).css({'color':even_title_color});
        });
        var title_color = $(this).find('.pf_title_cat_style2 h3').css('color');
        var title_hover_color = $(this).find('.pf_title_cat_style2').data('title-hover') ?  $(this).find('.pf_title_cat_style2').data('title-hover') : title_color;
        $(this).find('.pf_title_cat_style2 h3 a').hover(function(){
            $(this).css({'color':title_hover_color});
        }, function(){
            $(this).css({'color':title_color});
        });
    });
    /* Contact Form Button Hover BG */
    $('#contact-form').each(function(){
        var button_bg_color = $(this).find('p.fullwidth #contact_submit').css('background-color');
        var button_link_color = $(this).find('p.fullwidth #contact_submit').css('color');
        var button_hover_bg_color = $(this).find('p.contact_button_wrapper').data('hover-bg');
        var button_hover_link_color = $(this).find('p.contact_button_wrapper').data('hover-link');
        $(this).find('p.fullwidth #contact_submit').hover(function(){
             $(this).css({'color':button_hover_link_color,'background-color' : button_hover_bg_color});
        }, function(){
             $(this).css({'color':button_link_color, 'background-color' : button_bg_color});
        });
    });
       //Alert Boxes
    $('.widget_alert-box').each(function(){
        $(this).next('.widget_alert-box').prev('.widget_alert-box').css('margin-bottom',30);
         $(this).find('.close_alert_icon').click(function(){
            $(this).parent().parent('.widget_alert-box').animate({ opacity: 'hide' }, 450);;
         })        
    })
 /* Client Slider */
    function client_widget_slider(){
        $('.client_image_wrapper').each(function(){
            var button_color = $(this).data('button-color');
            var columns = $(this).data('columns');
            var autoplay = $(this).data('autoplay');
            var margin = $(this).data('margin');
            var colum = $(this).find('#client_widget_slider').data('colum');
            var buttons = $(this).find('#client_widget_slider').data('buttons');
            var animationin = $(this).find('#client_widget_slider').data('animationin');
            var animationout = $(this).find('#client_widget_slider').data('animationout');
            var responsive2_column = ( (columns == '4') || (columns == '3') ) ? '2' :columns;
           $(this).find('#client_widget_slider').owlCarousel({
                nav:buttons,       
                navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
                autoplay : autoplay,
                 dots: false,
                autoplayHoverPause : true,
                autoHeight : false,
                loop : true,
                smartSpeed: 1500,
                margin:margin,
                  onInitialized: function() {
                    $('#client_widget_slider').show();
                    $('.slider_bg_loading_img').hide();
                }, 
                responsive: {
                    0:{
                    items:1,
                    },
                    480:{
                        items:2,
                    },
                    768:{
                        items:3,
                        loop : false,
                    },
                    1024:{
                        items:columns,
                        loop : true,
                    },
                }, 
                  //loop : true,
           });
           $(this).find('.owl-next i, .owl-prev i').css('color', button_color);
        });
    }
    //Team Slider
    function team_slider_widget(){
    $('.team_image_wrapper').each(function(){
        var columns = $(this).data('columns');
        var buttons_color = $(this).data('nav-buttons-color');
        var auto_play = $(this).data('auto-play');
        //var loop = $(this).find('.portfolio_widget_slider').data('loop');
        var responsive2_column = ( (columns == '4') || (columns == '3') ) ? '2' :columns;
        var responsive3_column = ( (columns == '4') || (columns == '5') ) ? '3' :columns;
        var button_active = $(this).data('nav-active-color'); 
        var icon_hover = $(this).find('.image_description_wrapper .team_social_media_icons').data('hover-color');
        var icon_bg_hover = $(this).find('.image_description_wrapper .team_social_media_icons').data('hover-bg-color');
        var icon_color = $(this).find('.image_description_wrapper .team_social_media_icons a').css('color');
        var icon_bg_color = $(this).find('.image_description_wrapper .team_social_media_icons a').css('background-color');
        var team_slider = $(this).owlCarousel({
            nav : false,
            navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
            autoplay :auto_play,
            stopOnHover : true,
            loop : false,
            items : columns,
            smartSpeed: 800,
            margin:30,
            callbacks: true,
            onInitialized: function() {
                $('.team_image_wrapper').show();
            },
            responsive: {
                0:{
                    items:1,
                },
                640:{
                    items:responsive2_column,
                },
                1024:{
                    items:responsive3_column,
                },
                1366:{
                    items:columns
                },
            },
             
        });
        team_slider.owlCarousel({callbacks: true});
        $(this).find('.image_description_wrapper .team_social_media_icons a').hover(function(){
            $(this).css({'color':icon_hover, 'background-color':icon_bg_hover});
            },function(){
            $(this).css({'color':icon_color,'background-color':icon_bg_color});
            });
    });
    }
    // Services
    $('.services_widget_wrapper').each(function(){
        var title_hover_bg = $(this).find('.services_title').data('bg-hover');
        var title_hover_color = $(this).find('.services_title').data('text-hover');
        var title_bg = $(this).find('.services_title').css('background-color');
        var title_color = $(this).find('.services_title').css('color');
        $(this).hover(function(){
            $(this).find('.services_title').css({'background':title_hover_bg, 'color':title_hover_color});
        }, function(){
             $(this).find('.services_title').css({'background':title_bg, 'color':title_color});
        });        
    });
    /* -----------------------------------
    Testimonial Slider 
    ------------------------------------ */
   function recent_news_slider(){
       var owl = $('.recent_posts').each(function(){
            var columns = $(this).data('columns');
            var responsive2_column = ( (columns == '4') || (columns == '3') ) ? '2' :columns;
            $(this).owlCarousel({
                items  : columns,
                autoplay : false,
                margin : 20,
                loop : true,
                smartSpeed: 1500,
                onInitialized: function() {
                    $('.recent_posts').show();
                    $('.slider_bg_loading_img').hide();
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
                        loop : false,
                    },
                    1024:{
                        items:columns,
                        loop : false,
                    },
                },
            });
        });
$('.next').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.prev').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
})
}
    //Woocommerce Slider
function shop_product_slider(){
$('.shop_product_slider_wrapper').each(function(){
    var auto_play = $(this).data('auto-play');
    var loop = $(this).data('loop');
    var items = $(this).data('items');
      var responsive2_column = ( (items == '4') || (items == '5') ) ? '3' :items;
   var owl = $(this).owlCarousel({
        nav:false,    
        navText: false,
        dots: false,
        margin:20,
        autoplay : auto_play,
        autoplayHoverPause : true,
        items :items,
        loop : loop,
        rtl:true,
       onInitialized: function() {   
        $('.slider_bg_loading_img').hide();
        },
        responsive: {
                320:{
                    items:1,
                },
                768:{
                    items:2,
                    loop : false,
                },
                1024:{
                    items:2,
                },
                1366:{
                    items:items
                },
            },
    });  
/*----------------------------------
    toggle
-----------------------------------*/
    $(".toggle_content").hide();
        $("strong.trigger").click(function(){
            $(this).toggleClass("active").next().slideToggle("slow");
        if( $(this).parent().find('strong.active').length ){
            $(this).find('.arrow_buttons').addClass('fa-minus').removeClass('fa-plus');
        }else{
            $(this).find('.arrow_buttons').removeClass('fa-minus').addClass('fa-plus');  
        }  
    });
    $(this).parent().parent().find('.next').click(function() {
        owl.trigger('next.owl.carousel');
    })
// Go to the previous item
    $(this).parent().parent().find('.prev').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
    })
    });
}
/* List Product hover style */
$('.shop_product_list_wrapper').each(function(){
    var link_hover_color = $(this).find('.shop-product-description').data('hover-color');
    var link_color = $(this).find('.shop-product-description h4 a').css('color');
    $(this).find('.shop-product-description h4 a').hover(function(){
        $(this).css({'color':link_hover_color});
    }, function(){
        $(this).css({'color':link_color});
    });
})
/* responsive */
$('.widget_kaya-image-with-title, .widget_kaya-services-widget').parent().addClass('panel-row-style-parent');
$(window).load(function(){
    image_gallery_slider();
    team_slider_widget();
    testimonial_slider_widget();
    shop_product_slider();
    blog_post_section();
    client_widget_slider();
    post_format_gallery();
    recent_news_slider();
});
})(jQuery);
//
// namespacing function object
var shortlist = (function($) {

  // define object literal container for parameters and methods
  var method = {};

  /* append counter to 'shortlist' nav item
  ----------------------------------------- */

  var shortlistNavItem = $('.navbar li a[href$="/shortlist/"]'),
      listCount = $('body').data('count');

  shortlistNavItem.append('&nbsp;(<span class="shortlist-count">0</span>)');

 // log(listCount);
  //$('.shortlist-count').html(listCount);
  /* Method to update the shortlist counter
  ----------------------------------------- */

  method.getItemTotal = function() {
    var counter = $('.shortlist-count'),
        clearAll = $('.shortlist-clear a');

    $.ajax({
      type: 'POST',
      url: kaya_ajax_url.ajaxurl,
       data : {
                action : 'petshop_kaya_items_count',
            },
      success: function(data) {
        counter.text('('+data+')');
      },
      error: function() {
        log('error with getItemTotal function');
      }
    });
  };

  method.itemActions = function(button) {
    $(button).on('click', function(e) {
        var target    = $(this),
          item      = target.closest('.item'),
          itemID    = item.attr('id'),
          itemAction= target.data('action');
        $.ajax({
            type: 'POST',
            url: kaya_ajax_url.ajaxurl,
            data : {
                action : 'petshop_kaya_items_remove_add',
                item_action : itemAction,
                item_id : itemID
            },
            success: function(data) {
              method.getItemTotal();
              log(itemAction + ' item ' + itemID);
              return false;
            },
            error: function(data) {
                alert(data);
              log('error with itemActions function', 'check that "themeDirName" has been correctly set in shortlist.js');
        }
        });
        if (itemAction === 'remove') {
            item.removeClass('item_selected');
        } else {
            item.addClass('item_selected');
        }
      e.preventDefault();
    });

  }; // end
 /* make methods accessible
  -------------------------- */
  return method;


}(jQuery)); // end of shortlist constructor