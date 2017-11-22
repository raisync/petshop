<?php
class Petshop_Toggle_Tabs_Accordion_Widget extends WP_Widget{
  public function __construct(){
    global $petshop_plugin_name;
    parent::__construct('toggle-tabs-accordion',
     ucfirst($petshop_plugin_name).' '.__(' - Toggle Tabs ',$petshop_plugin_name),
      array('description' => __('Displays accordion, tabs and toggle from "Tab Items" CPT',$petshop_plugin_name))
    );
  }
  public function widget($args,$instance){
    global $petshop_plugin_name;
      $instance = wp_parse_args( $instance,array(
        'title' => '',
        'select_type' => '',
        'select_tabs_type' => __('horizontal',$petshop_plugin_name),
        'tabs_acordion_order' => '',
        'tabs_acordion_orderby' => '',
        'taba_accordion_cat' => '',
        'limit' => '',
        'tabs_bg_color' => '#f3f3f3',
        'tabs_content_bg_color' => '',
        'tabs_content_color' => '#737373',
        'tabs_title_color' => '#151515',
        'tabs_border_color' => '#e5e5e5',
        'tabs_content_link_color' => '#333',
        'tabs_active_bg_color' => '#3f51b5',
        'tabs_active_title_color' => '#ffffff',
        'tabs_active_border_color' => '#223289',

        'tabs_hover_bg_color' => '#333333',
        'tabs_hover_title_color' => '#ffffff',
        'tabs_hover_border_color' => '#3f51b5',

        'animation_names' => '',
        'tabs_content_bg_border_color' => '#f3f3f3',
        'tabs_font_size' => '15',
        'tabs_letter_spacing' => '0',
        'tabs_font_weight' => __('normal',$petshop_plugin_name),
        'disable_tab_title' => '',
        'tabs_padding_top' => '15',
        'tabs_padding_bottom' => '15',
        'tabs_padding_left' => '30',
        'tabs_padding_right' => '30',
        'vtabs_position_right' => '',
      ));
      // Accordion Script
      $tabs_rand_class = rand(1,500);
      $toggle_rand_class = rand(1,500);
      $accordion_rand = rand(1,500);
      $active_bg_color = $instance['tabs_active_bg_color'] ? 'background-color:'.$instance['tabs_active_bg_color'].'!important;' :'';
      $active_border_color = $instance['tabs_active_border_color'] ? 'border:1px solid '.$instance['tabs_active_border_color'].'!important;' :'';  
      $tabs_rand = rand(1,1000);
      if( $instance['select_type'] == 'accordion' ){
        wp_enqueue_script('jquery-ui-accordion');  ?>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $( "#accordion<?php echo $accordion_rand; ?>" ).accordion({
              autoHeight: true,
              collapsible: false,
              heightStyle: "content"
            });
          });
        </script>
      <?php  } // Tabs Script ?>
      <?php    if( $instance['select_type'] == 'tabs' ){ ?>
      <script type="text/javascript">
      var $j = jQuery.noConflict();
        jQuery.noConflict();
        jQuery(document).ready(function($) { 
           $j('.widget_toggle-tabs-accordion').each(function(){
           $j("#tabid-<?php echo $tabs_rand; ?> .tab_content").hide(); //Hide all content
           $j("#tabid-<?php echo $tabs_rand; ?> ul.tabContaier > li:first").addClass("tab-active").show();
            $j("#tabid-<?php echo $tabs_rand; ?> .tab_content:first").stop(true,true).fadeIn(0);
            $j("#tabid-<?php echo $tabs_rand; ?> ul.tabContaier > li").click(function() {
                $j("#tabid-<?php echo $tabs_rand; ?> ul.tabContaier > li").removeClass("tab-active");
                $j(this).addClass("tab-active");
                $j("#tabid-<?php echo $tabs_rand; ?> .tab_content").stop(true,true).fadeOut(0);
                var activeTab = $(this).find("a").attr("href");
                $j(activeTab).stop(true,true).fadeIn(800);
                return false;
            });
          }); 
        });
      </script>
      <?php
      } ?>
      <style type="text/css">
        .toggle-<?php echo $toggle_rand_class; ?> .trigger.active, .toggle-<?php echo $toggle_rand_class; ?> .trigger:hover, #accordion<?php echo $accordion_rand; ?> strong.ui-state-active, #accordion<?php echo $accordion_rand; ?> strong:hover, .tabs-<?php echo $tabs_rand_class; ?>.horizontal_tabs > ul > li.tab-active a, .tabs-<?php echo $tabs_rand_class; ?>.tabs-<?php echo $tabs_rand_class; ?>.vertical_tabs > ul > li.tab-active a{
          <?php echo $active_bg_color; ?>
          color: <?php echo $instance['tabs_active_title_color'] ?>!important;
        }
        .horizontal_tabs > ul > li a:hover, .vertical_tabs > ul > li a:hover{
          background: <?php echo $instance['tabs_hover_bg_color'] ?>!important;
          color:<?php echo $instance['tabs_hover_title_color']?>!important;
          border-bottom: 3px solid <?php echo $instance['tabs_hover_border_color'] ?>;
        }
        ul.tabContaier li a:hover{
          background: <?php echo $instance['tabs_hover_bg_color'] ?>!important;
          color:<?php echo $instance['tabs_hover_title_color']?>!important;
          border-bottom: 3px solid <?php echo $instance['tabs_hover_border_color'] ?>;
        }
        #accordion<?php echo $accordion_rand; ?> .accordion_animation > p,  .toggle-<?php echo $toggle_rand_class; ?> .description_box > p,.tabs-<?php echo $tabs_rand_class; ?> .tabDetails > p{
          color: <?php echo $instance['tabs_content_color'] ?>!important;
        }
        ul.tabContaier li a{
          border-bottom: 3px solid <?php echo $instance['tabs_border_color'] ?>;
        }
        ul.tabContaier li.tab-active a{
          border-bottom: 3px solid <?php echo $instance['tabs_active_border_color'] ?>;
        }
      </style>
      <?php  // Switch case in tabs type and add classes
      echo $args['before_widget'];
        switch ($instance['select_type']) {
          case 'accordion':
            $ids='accordion'.$accordion_rand.'';
            $class = '';
          break;
          case 'tabs':
            $ids='tabid-'.$tabs_rand.'';
            $class = ' tabContaier tabs-'.$tabs_rand_class.'';
          break;
          case 'toggle':
            $ids='';
            $class = 'toggle-'.$toggle_rand_class.'';
          break;
          default:
            $ids='';
            $class = '';
          break;
        }
        $tabs_bg_color = $instance['tabs_bg_color'] ? 'background-color:'.$instance['tabs_bg_color'].';':'';
        $animation_class = trim( $instance['animation_names']  ) ? 'wow '.$instance['animation_names'] : ''; 
        echo '<div class="'.$animation_class.' '.$instance['select_type'].'_wrapper '.$instance['select_type'].' '.$class.' '.$instance['select_tabs_type'].'_tabs" id="'.$ids.'">';
        // Adding ul when tabs active 
        if( ($instance['tabs_content_bg_color'] != '') || ( $instance['tabs_content_bg_border_color'] !='' ) ){
          $tab_content_bg = 'background-color:'.$instance['tabs_content_bg_color'].';';
          $tabs_content_padding = '';
        }else{
          $tabs_content_padding = 'padding-left:0px; padding-right:0px; padding-bottom:0px;';
          $tab_content_bg = '';
        }
        $tabs_content_border_color = $instance['tabs_content_bg_border_color'] ? '1' : '0'; 
        if ($instance['select_type'] == 'tabs') { echo '<ul class="tabContaier">'; }
        $array_val = ( !empty( $instance['taba_accordion_cat'] )) ? explode(',', $instance['taba_accordion_cat']) : '';
        if( $array_val ) {
        $loop = new WP_Query(array( 'post_type' => 'toogletabs',   'orderby' => $instance['tabs_acordion_orderby'], 'posts_per_page' =>$instance['limit'],'order' => $instance['tabs_acordion_order'],  'tax_query' => array('relation' => 'AND', array( 'taxonomy' => 'toggletabs_category',   'field' => 'id', 'terms' => $array_val  ) )));
        }else{
        $loop = new WP_Query(array('post_type' => 'toogletabs' , 'taxonomy' => 'toggletabs_category', 'term' => $instance['taba_accordion_cat'], 'orderby' => $instance['tabs_acordion_orderby'], 'posts_per_page' =>$instance['limit'],'order' => $instance['tabs_acordion_order'] ));
        }
        if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
        global $post;
        if( $instance['select_type'] == 'accordion' ){ // Accordion 
    echo '<strong style="font-size: '.$instance['tabs_font_size'].'px; '.$tabs_bg_color.'; letter-spacing:'.$instance['tabs_letter_spacing'].'px; font-weight:'.$instance['tabs_font_weight'].';  color:'.$instance['tabs_title_color'].'; padding:'.$instance['tabs_padding_top'].'px '.$instance['tabs_padding_right'].'px '.$instance['tabs_padding_bottom'].'px '.$instance['tabs_padding_left'].'px '; ?> "><?php echo the_title(); ?></strong>
        <div style="background-color:<?php echo $instance['tabs_content_bg_color']; ?>; color:<?php echo $instance['tabs_content_color']; ?>; border:<?php echo $tabs_content_border_color; ?>px solid <?php echo $instance['tabs_content_bg_border_color'] ?>;"><div class="accordion_animation description_box" style="color:<?php echo $instance['tabs_content_color']; ?>;"><?php echo the_content(); ?></div></div> 
        <?php } 
        elseif( $instance['select_type'] == 'toggle' ){ // Toggle ?>
          <div class="toggle_container_wrapper">
            <strong class="trigger" style="font-size:<?php echo $instance['tabs_font_size']; ?>px; letter-spacing:<?php echo $instance['tabs_letter_spacing']?>px; font-weight:<?php echo $instance['tabs_font_weight'] ?>; <?php echo $tabs_bg_color; ?> color:<?php echo $instance['tabs_title_color']; ?>; border:1px solid <?php echo $instance['tabs_border_color'] ?>; padding:<?php echo $instance['tabs_padding_top'].'px '.$instance['tabs_padding_right'].'px '.$instance['tabs_padding_bottom'].'px '.$instance['tabs_padding_left'].'px '; ?> " ><span><?php echo the_title(); ?>
            </span>
            <i class="fa fa-plus arrow_buttons"></i></strong>
            <div class="toggle_content"><div class="block description_box" style="background-color:<?php echo $instance['tabs_content_bg_color']; ?>; color:<?php echo $instance['tabs_content_color']; ?>; border:<?php echo $tabs_content_border_color; ?>px solid <?php echo $instance['tabs_content_bg_border_color'] ?>;"><?php echo the_content(); ?></div>
            </div>
          </div>
        <?php }
        elseif ($instance['select_type'] == 'tabs') { // Tabs
         // $string = mb_strtolower( preg_replace("/[^!@#$%^&*().]/u'", "-", get_the_title()));
          $tabs_border_color = $instance['tabs_border_color'] ? '1' : '0';
          if( $instance['disable_tab_title'] != 'on' ){
          $tab_title = ''.get_the_title().'';
          }else{
          $tab_title = '';
          }
          echo '<li><a style="'.$tabs_bg_color.' color:'.$instance['tabs_title_color'].';  font-size:'.$instance['tabs_font_size'].'px; letter-spacing:'.$instance['tabs_letter_spacing'].'px; font-weight:'.$instance['tabs_font_weight'].'; padding:'.$instance['tabs_padding_top'].'px '.$instance['tabs_padding_right'].'px '.$instance['tabs_padding_bottom'].'px '.$instance['tabs_padding_left'].'px;" href="#tab_'.$post->ID.'_'.$tabs_rand.'">'.$tab_title.'</a></li>';
        } ?>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        if ($instance['select_type'] == 'tabs') { echo '</ul>'; // End Tabs UL
        if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post(); // Tabs Content loop 
        global $post;
        //$string = mb_strtolower( preg_replace("/[^A-Za-z0-9 !@#$%^&*().]/u'", "-", get_the_title())); ?>
        <div id="<?php echo 'tab_'.$post->ID.'_'.$tabs_rand; ?>" class="tab_content ">
          <div class="tabDetails description_box" style="<?php echo $tab_content_bg . ' ' .$tabs_content_padding; ?> color:<?php echo $instance['tabs_content_color']; ?>; border:<?php echo $tabs_content_border_color; ?>px solid <?php echo $instance['tabs_content_bg_border_color'] ?>;"><?php echo the_content(); ?></div>
        </div>
        <?php endwhile;
       wp_reset_postdata();
        endif; // End Tabs Loop
        }
      echo  '</div>';
    echo $args['after_widget'];
  }
  public function form($instance){
    global $petshop_plugin_name;
    $tabs_terms=  get_terms('toggletabs_category','');
    if( $tabs_terms ){
          foreach ($tabs_terms as $tabs_term) { 
            $tab_cat_ids[] = $tabs_term->term_id;
            $tab_cats_name[] = $tabs_term->name.' - '.$tabs_term->term_id;
          }
    }else{ $tab_cats_name[] = ''; $tab_cat_ids[] = ''; }
    $instance = wp_parse_args( $instance,array(
     'title' => '',
      'select_type' => '',
      'select_tabs_type' => __('horizontal',$petshop_plugin_name),
      'tabs_acordion_order' => '',
      'tabs_acordion_orderby' => '',
      'taba_accordion_cat' => '',
      'limit' => '',
      'tabs_bg_color' => '#f3f3f3',
      'tabs_content_bg_color' => '',
      'tabs_content_color' => '#737373',
      'tabs_title_color' => '#151515',
      'tabs_border_color' => '#e5e5e5',
      'tabs_content_link_color' => '#333',
      'tabs_active_bg_color' => '#3f51b5',
      'tabs_active_title_color' => '#ffffff',
      'tabs_active_border_color' => '#223289',

      'tabs_hover_bg_color' => '#333333',
      'tabs_hover_title_color' => '#ffffff',
      'tabs_hover_border_color' => '#3f51b5',

      'animation_names' => '',
      'tabs_content_bg_border_color' => '#f3f3f3',
      'tabs_font_size' => '15',
      'tabs_letter_spacing' => '0',
      'tabs_font_weight' => __('normal',$petshop_plugin_name),
      'disable_tab_title' => '',
      'tabs_padding_top' => '15',
      'tabs_padding_bottom' => '15',
      'tabs_padding_left' => '30',
      'tabs_padding_right' => '30',
      'vtabs_position_right' => '',
    )); ?>
    <script type="text/javascript">
      (function($) {
        "use strict";
        $(function() {
          $("#<?php echo $this->get_field_id('select_type') ?>").change(function () {
            $("#<?php echo $this->get_field_id('select_tabs_type') ?>").parent().hide();
            //$(".<?php echo $this->get_field_id('tabs_active_border_color') ?>").hide();
            //$(".<?php echo $this->get_field_id('tabs_border_color') ?>").hide();
            $("#<?php echo $this->get_field_id('disable_tab_title') ?>").parent().hide();
            $("#<?php echo $this->get_field_id('vtabs_position_right') ?>").parent().hide();
            var selectlayout = $("#<?php echo $this->get_field_id('select_type') ?> option:selected").val(); 
            switch(selectlayout)
            {
            case 'tabs':
            tabs_display();
            $("#<?php echo $this->get_field_id('select_tabs_type') ?>").parent().show();
            $(".<?php echo $this->get_field_id('tabs_active_border_color') ?>").show();
           // $(".<?php echo $this->get_field_id('tabs_border_color') ?>").show();
            $("#<?php echo $this->get_field_id('disable_tab_title') ?>").parent().show();
            $("#<?php echo $this->get_field_id('tabs_letter_spacing') ?>").parent().show();
            $("#<?php echo $this->get_field_id('tabs_font_size') ?>").parent().addClass('one_fourth_last').removeClass('one_fourth').next().addClass('one_fourth').removeClass('one_fourth_last').attr('style','clear:both').next().attr('style','');
            break;
            case 'toggle':
            $("#<?php echo $this->get_field_id('tabs_font_size') ?>").parent().addClass('one_fourth').removeClass('one_fourth_last').next().addClass('one_fourth_last').removeClass('one_fourth').attr('style','').next().attr('style','clear:both');
            $(".<?php echo $this->get_field_id('tabs_letter_spacing') ?>").show();
            //$(".<?php echo $this->get_field_id('tabs_border_color') ?>").show();
            break;
            case 'accordion':
            $("#<?php echo $this->get_field_id('tabs_font_size') ?>").parent().addClass('one_fourth').removeClass('one_fourth_last').next().addClass('one_fourth_last').removeClass('one_fourth').attr('style','').next().attr('style','clear:both');
            $("#<?php echo $this->get_field_id('tabs_letter_spacing') ?>").show();
            break; 
            }
          }).change();
          function tabs_display(){
            $("#<?php echo $this->get_field_id('select_tabs_type') ?>").change(function () {
              $("#<?php echo $this->get_field_id('vtabs_position_right') ?>").parent().hide();
              $("#<?php echo $this->get_field_id('tabs_position') ?>").parent().parent().hide(); 
              var tab_selected = $("#<?php echo $this->get_field_id('select_tabs_type') ?> option:selected").val();
              switch(tab_selected){
                case 'horizontal':
                $("#<?php echo $this->get_field_id('tabs_position') ?>").parent().parent().show(); 
                break;
                case 'vertical':
                $("#<?php echo $this->get_field_id('vtabs_position_right') ?>").parent().show();
                break; 
              }
            }).change();
          }
        });
      })(jQuery);
    </script>
    <script type='text/javascript'>
      jQuery(document).ready(function($) {
          jQuery('.toggle_tabs_color_pickr').each(function(){
            jQuery(this).wpColorPicker();
          });
      });
    </script>
    <div class="input-elements-wrapper">
      <p class="one_fourth"> 
        <label for="<?php echo $this->get_field_id('select_type') ?>"><?php _e('Select Type',$petshop_plugin_name) ?>
        </label>
        <select id="<?php echo $this->get_field_id('select_type') ?>" name="<?php echo $this->get_field_name
           ('select_type') ?>">
          <option value="accordion" id="<?php echo $this->get_field_id('select_type') ?>" <?php selected( 'accordion',$instance['select_type'] ) ?> ><?php esc_html_e('Accordion', $petshop_plugin_name) ?>
          </option>
          <option value="tabs" id="<?php echo $this->get_field_id('select_type') ?>" <?php selected( 'tabs',$instance['select_type'] ) ?> ><?php esc_html_e('Tabs', $petshop_plugin_name) ?></option>
          <option value="toggle" id="<?php echo $this->get_field_id('select_type') ?>" <?php selected( 'toggle',$instance['select_type'] ) ?> ><?php esc_html_e('Toggle ', $petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('select_tabs_type') ?>"><?php _e('Select Tabs Type',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('select_tabs_type') ?>" name="<?php echo $this->get_field_name
          ('select_tabs_type') ?>">
          <option value="horizontal" id="<?php echo $this->get_field_id('select_tabs_type') ?>" <?php selected( 'horizontal',$instance['select_tabs_type'] ) ?> >
          <?php esc_html_e('Horizontal Tabs', $petshop_plugin_name) ?></option>
          <option value="vertical" id="<?php echo $this->get_field_id('select_tabs_type') ?>" <?php selected( 'vertical',$instance['select_tabs_type'] ) ?> >
          <?php esc_html_e('Vertical Tabs', $petshop_plugin_name) ?></option>
        </select>
      </p>
    </div>
    <div class="input-elements-wrapper">
      <p>
        <label for="<?php echo $this->get_field_id('taba_accordion_cat') ?>"> <?php _e('Enter Category IDs : ',$petshop_plugin_name) ?> </label>
        <input type="text" name="<?php echo $this->get_field_name('taba_accordion_cat') ?>" id="<?php echo $this->get_field_id
        ('taba_accordion_cat') ?>" class="widefat" value="<?php echo $instance['taba_accordion_cat'] ?>" />
        <em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petshop_plugin_name); ?> </strong> <?php echo implode
        (', ', $tab_cats_name); ?></em><br />
        <stong><?php _e('Note:',$petshop_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petshop_plugin_name); ?>
      </p>
    </div>
    <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('tabs_bg_color') ?>"><?php _e('Tabs Bg Color',$petshop_plugin_name); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_bg_color') ?>" id="<?php echo $this->get_field_id('tabs_bg_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_bg_color']) ?>" />
      </p>
      <p class="one_fourth <?php echo $this->get_field_id('tabs_border_color') ?>">
        <label for="<?php echo $this->get_field_id('tabs_border_color') ?>"><?php _e('Tabs Border Color',$petshop_plugin_name); ?>  </label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_border_color') ?>" id="<?php echo $this->get_field_id('tabs_border_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_border_color']) ?>" />
      </p>
      <p class="one_fourth <?php echo $this->get_field_id('tabs_title_color') ?>">
        <label for="<?php echo $this->get_field_id('tabs_title_color') ?>"><?php _e('Tabs Title Color',$petshop_plugin_name); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_title_color') ?>" id="<?php echo $this->get_field_id
        ('tabs_title_color') ?>"  class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_title_color']) ?>" />
      </p>
       <p class="one_fourth_last <?php echo $this->get_field_id('tabs_hover_bg_color') ?>">
          <label for="<?php echo $this->get_field_id('tabs_hover_bg_color') ?>"><?php _e('Tabs Hover Bg Color',$petshop_plugin_name); ?></label>
          <input type="text" name="<?php echo $this->get_field_name('tabs_hover_bg_color') ?>" id="<?php echo $this->get_field_id
          ('tabs_hover_bg_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_hover_bg_color']) ?>" />
        </p>
    </div>
    <div class="input-elements-wrapper">
      <p class="one_fourth <?php echo $this->get_field_id('tabs_hover_border_color') ?>">
          <label for="<?php echo $this->get_field_id('tabs_hover_border_color') ?>"><?php _e('Tabs Hover Border Color',$petshop_plugin_name); ?>
          </label>
          <input type="text" name="<?php echo $this->get_field_name('tabs_hover_border_color') ?>" id="<?php echo $this->get_field_id('tabs_hover_border_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_hover_border_color']) ?>" />
        </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tabs_hover_title_color') ?>"><?php _e('Tabs Hover Title Color',$petshop_plugin_name); ?></label>
          <input type="text" name="<?php echo $this->get_field_name('tabs_hover_title_color') ?>" id="<?php echo $this->get_field_id
          ('tabs_hover_title_color') ?>"  class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_hover_title_color']) ?>" />
      </p>
      <p class="one_fourth <?php echo $this->get_field_id('tabs_active_bg_color') ?>">
        <label for="<?php echo $this->get_field_id('tabs_active_bg_color') ?>"><?php _e('Tabs Active Bg Color',$petshop_plugin_name); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_active_bg_color') ?>" id="<?php echo $this->get_field_id
        ('tabs_active_bg_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_active_bg_color']) ?>" />
      </p>
      <p class="one_fourth_last <?php echo $this->get_field_id('tabs_active_border_color') ?>">
        <label for="<?php echo $this->get_field_id('tabs_active_border_color') ?>"><?php _e('Tabs Active Border Color',$petshop_plugin_name); ?>
        </label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_active_border_color') ?>" id="<?php echo $this->get_field_id('tabs_active_border_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_active_border_color']) ?>" />
      </p>
    </div>
    <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('tabs_active_title_color') ?>"><?php _e('Tabs Active Title Color',$petshop_plugin_name); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_active_title_color') ?>" id="<?php echo $this->get_field_id
        ('tabs_active_title_color') ?>"  class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_active_title_color']) ?>" />
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('tabs_font_size') ?>"><?php _e('Tabs Font Size',$petshop_plugin_name); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_font_size') ?>" id="<?php echo $this->get_field_id('tabs_font_size') ?>"  value="<?php echo esc_attr($instance['tabs_font_size']) ?>" class="small-text" /><small><?php _e('px', $petshop_plugin_name); ?></small>
      </p>
       <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('tabs_letter_spacing') ?>">  <?php _e('Tabs Letter Spacing',$petshop_plugin_name) ?>  </label>
        <input type="text" id="<?php echo $this->get_field_id('tabs_letter_spacing') ?>" class="small-text" name="<?php echo $this->get_field_name('tabs_letter_spacing') ?>" value = "<?php echo esc_attr($instance['tabs_letter_spacing']) ?>" />
        <small><?php _e('px',$petshop_plugin_name);?></small>
      </p>
    </div>
     <p>
        <label for="<?php echo $this->get_field_id('tabs_font_weight') ?>"> <?php _e('Tabs Font Weight',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('tabs_font_weight') ?>" name="<?php echo $this->get_field_name
          ('tabs_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['tabs_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['tabs_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
        </select>
      </p> 
    <div class="input-elements-wrapper">
      <p class="one_half">
        <label for="<?php echo $this->get_field_id('tabs_padding_top') ?>"><?php _e('Tabs Padding',$petshop_plugin_name); ?></label>
        <?php _e('Top',$petshop_plugin_name); ?> <input type="text" name="<?php echo $this->get_field_name('tabs_padding_top') ?>" id="<?php echo $this->get_field_id('tabs_padding_top') ?>"  value="<?php echo $instance['tabs_padding_top'] ?>" class="small-text" /> 
        <?php _e('Right',$petshop_plugin_name); ?> <input type="text" name="<?php echo $this->get_field_name('tabs_padding_right') ?>" id="<?php echo $this->get_field_id('tabs_padding_right') ?>"  value="<?php echo $instance['tabs_padding_right'] ?>" class="small-text" /> 
        <?php _e('Bottom',$petshop_plugin_name); ?> <input type="text" name="<?php echo $this->get_field_name('tabs_padding_bottom') ?>" id="<?php echo $this->get_field_id('tabs_padding_bottom') ?>"  value="<?php echo $instance['tabs_padding_bottom'] ?>" class="small-text" />
        <?php _e('Left',$petshop_plugin_name); ?> <input type="text" name="<?php echo $this->get_field_name('tabs_padding_left') ?>" id="<?php echo $this->get_field_id('tabs_padding_left') ?>"  value="<?php echo $instance['tabs_padding_left'] ?>" class="small-text" /> 
        <small><?php _e('px', $petshop_plugin_name); ?></small>
      </p>
    </div>
    <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('tabs_content_bg_color') ?>"><?php _e('Tabs Content BG Color',$petshop_plugin_name); ?>      </label>
          <input type="text" name="<?php echo $this->get_field_name('tabs_content_bg_color') ?>" id="<?php echo $this->get_field_id('tabs_content_bg_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_content_bg_color']) ?>" />
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('tabs_content_bg_border_color') ?>"><?php _e('Tabs Content BG Border Color',$petshop_plugin_name); ?>   </label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_content_bg_border_color') ?>" id="<?php echo $this->get_field_id('tabs_content_bg_border_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_content_bg_border_color']) ?>" />
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('tabs_content_color') ?>"><?php _e('Tabs Content Color',$petshop_plugin_name); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_content_color') ?>" id="<?php echo $this->get_field_id('tabs_content_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_content_color']) ?>" />
      </p>
      <p class="one_fourth_last">
        <label for="<?php echo $this->get_field_id('tabs_content_link_color') ?>"><?php _e('Tabs Content Link Color',$petshop_plugin_name); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('tabs_content_link_color') ?>" id="<?php echo $this->get_field_id('tabs_content_link_color') ?>" class="toggle_tabs_color_pickr" value="<?php echo esc_attr($instance['tabs_content_link_color']) ?>" />
      </p>
     </div>
    <div class="input-elements-wrapper">
      <p class="one_fourth">  
        <label for="<?php echo $this->get_field_id('tabs_acordion_order') ?>"><?php _e('Order',$petshop_plugin_name)?></label>
        <select id="<?php echo $this->get_field_id('tabs_acordion_order') ?>" name="<?php echo $this->get_field_name('tabs_acordion_order') ?>">
          <option value="ASC" <?php selected('ASC', $instance['tabs_acordion_order']) ?>><?php esc_html_e('Ascending', $petshop_plugin_name) ?>  </option>
          <option value="DESC" <?php selected('DESC', $instance['tabs_acordion_order']) ?>><?php esc_html_e('Descending', $petshop_plugin_name) ?> </option>
        </select>
      </p> 
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('tabs_acordion_orderby') ?>"><?php _e('Orderby',$petshop_plugin_name)?></label>
        <select id="<?php echo $this->get_field_id('tabs_acordion_orderby') ?>" name="<?php echo $this->get_field_name('tabs_acordion_orderby') ?>">
          <option value="date" <?php selected('date', $instance['tabs_acordion_orderby']) ?>><?php esc_html_e('Date', $petshop_plugin_name) ?> </option>
          <option value="menu_order" <?php selected('menu_order', $instance['tabs_acordion_orderby']) ?>><?php esc_html_e('Menu Order', '') ?></option>
          <option value="title" <?php selected('title', $instance['tabs_acordion_orderby']) ?>><?php esc_html_e('Title', $petshop_plugin_name) ?></option>
          <option value="rand" <?php selected('rand', $instance['tabs_acordion_orderby']) ?>><?php esc_html_e('Random', $petshop_plugin_name) ?></option>
          <option value="author" <?php selected('author', $instance['tabs_acordion_orderby']) ?>><?php esc_html_e('Author', $petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('limit') ?>"><?php _e('Limit',$petshop_plugin_name); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('limit') ?>" id="<?php echo $this->get_field_id('limit') ?>"  value="<?php echo esc_attr($instance['limit']) ?>" />
      </p>
    </div>
    <div class="input-elements-wrapper">
      <p>
        <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  
        </label>
        <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
      <p>
    </div>    
    <?php
  }
}
petshop_kaya_register_widgets('toggle-tabs-accordion', __FILE__);
?>