<?php
if( !function_exists('petshop_kaya_customize_register') ){
	add_action('customize_register', 'petshop_kaya_customize_register');
	function petshop_kaya_customize_register($wp_customize) {
	    $wp_customize->remove_section( 'title_tagline' );
	    $wp_customize->remove_section( 'nav' );
	    $wp_customize->remove_section( 'static_front_page' );
		$wp_customize->remove_section( 'nav_menus' );
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'themes' );
		$wp_customize->remove_section( 'sidebar-widgets-footer_column_1' );
		$wp_customize->remove_section( 'sidebar-widgets-footer_column_2' );
		$wp_customize->remove_section( 'sidebar-widgets-footer_column_3' );
		$wp_customize->remove_section( 'sidebar-widgets-footer_column_4' );
		$wp_customize->remove_section( 'sidebar-widgets-footer_column_5' );
		$wp_customize->remove_section( 'sidebar-widgets-sidebar-1' );
		$wp_customize->remove_section( 'header_image' );
		//$wp_customize->remove_panel( 'widgets' );
		$wp_customize->remove_panel( 'background_image' );
	}
}
	// Sanitize Functions number validation	
	function petshop_kaya_check_number( $input ) {
	    $input = absint( $input );
		return ( $input ? $input : '00' );
	}
	function petshop_kaya_opacity_number_validate( $input ){
			return $input;
	}	
	function petshop_kaya_text_filed_sanitize( $input ) {
	    return  ( $input ? $input : '&nbsp;' );
	}
	function petshop_kaya_input_filed_sanitize( $input ) {
	    return  ( $input );
	}
	function petshop_kaya_color_filed_sanitize( $input ) {
	    return $input;
	}
	function petshop_kaya_checkbox_field_sanitize( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return 0;
	    }
	}
	function petshop_kaya_radio_buttons_sanitize( $input, $setting ) {
	    global $wp_customize;
	     $control = $wp_customize->get_control( $setting->id );
	     if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}
	function petshop_kaya_sanitize_email( $email ) {
		if(is_email( $email )){
			return $email;
		}else{
			return '';
		}
	} 
if( !function_exists('petshop_kaya_controls_register') ){
	function petshop_kaya_controls_register( $wp_customize ){
	// border customizer controll
	if(class_exists('WP_Customize_Control')){		
		class Petshop_Kaya_Customize_Divider_Control extends WP_Customize_Control{
			public $type = 'divider';
			public function render_content(){
				echo '<div class="customize_divider"> </div>';
			}
		}
	}
	// Ui Slider
	if(class_exists('WP_Customize_Control')){	
		class Petshop_Kaya_Customize_Sliderui_Control extends WP_Customize_Control {
			public $type = 'slider';
			public function petshop_kaya_enqueue() {
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-slider' );
			wp_enqueue_style("jquery-ui");
			}
			public function render_content() { ?>
				<label>
					<span class="customize-control-title">	<?php echo esc_html( $this->label ); ?>	</span>
					<input type="text" class="kaya-slider" id="input_<?php echo esc_attr($this->id); ?>" disabled value="<?php echo esc_attr( $this->value() ); ?>" <?php esc_attr( $this->link() ); ?>/>
				</label>
				<div id="slider_<?php echo esc_attr($this->id); ?>" class="custom_slider"></div>
				<script>
					jQuery(document).ready(function($) {
						$( '[id="slider_<?php echo esc_attr( $this->id ); ?>"]' ).slider({
							value : <?php echo trim( $this->value() ) ?  $this->value() : '0'; ?>,
							min   : <?php echo esc_attr( $this->choices['min'] ); ?>,
							max   : <?php echo esc_attr( $this->choices['max'] ); ?>,
							step  : <?php echo esc_attr( $this->choices['step'] ); ?>,
							slide : function( event, ui ) { $( '[id="input_<?php echo esc_attr( $this->id ); ?>"]' ).val(ui.value).keyup(); }
						});
						$( '[id="input_<?php echo esc_attr( $this->id ); ?>"]' ).val( $( '[id="slider_<?php echo esc_attr( $this->id ); ?>"]' ).slider( "value" ) );
					});
				</script>
			<?php
			}
		}
	}
	if(class_exists('WP_Customize_Control')){
		class Petshop_Kaya_Customize_Imageupload_Control extends WP_Customize_Control {
			public $type = 'customize_upload';
			public function render_content(){
				$image = '';
				$value = $this->value();
				
				if(!empty($value)) {
					if(ctype_digit($value) || is_int($value)) {
						$image = wp_get_attachment_image_src($value, "full");
						$image = $image[0];
					} else {
						$image = $this->value();
					}				
				}			
		        ?>
		        <label>
		        	<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
		        	<div class="customize_img_upload">
						<div class="customizer_media_image">
							<img src="<?php echo esc_url( $image ); ?>">
						</div>
						<input type="hidden">
						<div class="buttons">
							<a href="#" class='upload_media_image button'><?php esc_html_e('Upload Image','petshop') ?></a>
							<a href="#" class='remove_media_image button'><?php esc_html_e('Remove','petshop') ?></a>
						</div> 
					</div>
		        </label>	        
		        <?php
		    }
		}
	}
	/**
* Pages Controll  
*/
class Kaya_Customize_Page_Control extends WP_Customize_Control
{
	private $pages = false;
	public $type = 'page';
    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->pages = get_pages($options);
        parent::__construct( $manager, $id, $args );
    }
	public function render_content()
    {
        if(!empty($this->pages))
        {
            ?>
                <label class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
                    <select <?php $this->link(); ?> name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>">
                    <option value="select-page"><?php _e('Select Page','petshop') ?></option>
                    <?php
                        foreach ( $this->pages as $page )
                        {
                            echo '<option value='.$page->ID.'>'.$page->post_title.'</option>';
                        }
                    ?>
                    </select>                
            <?php
        }
    }
}
	if(class_exists('WP_Customize_Control')){		
		class Petshop_Kaya_Customize_Subtitle_control extends WP_Customize_Control {
			public $type = 'sub-title';
			public function render_content(){
				echo '<h4 class="customizer_sub_section">'.esc_html($this->label).'</h4>';
			}
		}
	}
	if(class_exists('WP_Customize_Control')){
		class Petshop_Kaya_Customize_Textarea_Control extends WP_Customize_Control {
			public $type = 'text-area';
			public function render_content(){ ?>
				<label class="customize-control-title"> <?php echo esc_html( $this->label ); ?></label>
				<textarea rows="6" <?php $this->link(); ?> ><?php echo esc_textarea( $this->value() ); ?></textarea>
			<?php }
		}
	}
	if(class_exists('WP_Customize_Control')){	
		class Petshop_Kaya_Customize_Description_Control extends WP_Customize_Control {
			public $type = 'description';
			public $html_tags = false;
			public function render_content(){
				if( $this->html_tags == true ){
					echo '<span class="title_description">'.$this->label.'</span>';
				}else{
					echo '<span class="title_description">'.esc_html( $this->label ).'</span>';
				}
			}
		}
	}
	if(class_exists('WP_Customize_Control')) {
		class Julia_Kaya_Customize_Multiselect_Control extends WP_Customize_Control
		{
		public $type = 'multi-select';
		public function render_content()
		{ ?>
			<label class="customize-control-title"><?php echo esc_html($this->label); ?></label>
			<select <?php $this->link(); ?> multiple="multiple" style="">
				<?php 

					foreach ( $this->choices as $value => $label ) {
						$selected = ( in_array($value, $this->value()) ) ? selected(1,1,false) : '';
						echo '<option value="'.esc_attr( $value ).'" '.$selected.'>'.$label.'</option>';	
					}

				?>
			</select>	
		<?php }
		}
	}
	if(class_exists('WP_Customize_Control')){
		class Petshop_Kaya_Customize_Images_Radio_Control extends WP_Customize_Control {
			public $type = 'img_radio';
			public function render_content() {
				if ( empty( $this->choices ) )
				return;
				$name = 'customize-image-radios-' . $this->id;	 ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php foreach ( $this->choices as $value => $label ) { ?>
					<?php $selected = ( $this->value() == $value ) ? 'kaya-radio-img-selected' : ''; ?>
					<label for="<?php echo esc_attr( $name ); ?>_<?php echo esc_attr( $value ); ?>" class="kaya-radio-img <?php echo esc_attr( $selected ); ?>">
						<input id="<?php echo esc_attr( $name ); ?>_<?php echo esc_attr( $value ); ?>" class="img_radio" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
						<img src="<?php echo esc_url( $label['img_src'] ); ?>" alt="<?php echo esc_attr( $label['label'] ); ?>" title="<?php echo esc_attr( $label['label'] ); ?>" />
					</label>
					<?php
				} // end foreach
			}	
		}
	}
/**
* Page Sidebar control
*/
class Julia_Kaya_Customize_Sidebar_Control extends WP_Customize_Control
{
	public $type = 'sidebar';
	public function render_content()
    { 
	    	 ?>
	        <label class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
	       	<?php
	       	global $wp_customize, $wp_registered_sidebars;
	       	if( $wp_customize){
	    	   	for ($i=1; $i <= 5 ; $i++) { 
						unset($GLOBALS['wp_registered_sidebars']['footer_column_'.$i]);				
					}
				}
				if ( empty( $wp_registered_sidebars ) )
				return; ?>
				<select <?php $this->link(); ?> name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>">
			        <?php
	                   foreach ( $wp_registered_sidebars as $sidebar )
	                    {
	                        echo '<option value="'.$sidebar['id'].'">'.$sidebar['name'].'</option>';
	                    }
	                ?>
	            </select> <?php
 	}
}
	/**
	* Pages Controll  
	*/
	if(class_exists('WP_Customize_Control')){
		class Petshop_Kaya_Customize_Page_Control extends WP_Customize_Control
		{
			private $pages = false;
			public $type = 'page';
			public $page_slug = true;
		    public function __construct($manager, $id, $args = array(), $options = array())
		    {
		        $this->pages = get_pages($options);
		        parent::__construct( $manager, $id, $args );
		    }
			public function render_content()
		    {
		        if(!empty($this->pages))
		        {
		            ?>
		                <label class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
		                  <select <?php $this->link(); ?> name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>">
                    <option value="select-page"><?php _e('Select Page','petshop') ?></option>
                    <?php
                    	$slug = ( $this->page_slug == true ) ? 'post_name' :'ID';
                        foreach ( $this->pages as $page )
                        {
                            echo '<option value='.$page->{$slug}.'>'.$page->post_title.'</option>';
                        }
                    ?>
                    </select>  
		        <?php }
		    }
		}
	}
	// Google Fonts Seclect
	if(class_exists('WP_Customize_Control')){
		class Petshop_Kaya_Customize_google_fonts_Control extends WP_Customize_Control 
		{
			public $type = 'googlefonts';
			public function render_content(){ ?>
				<label class="customize-control-title"><?php echo esc_html($this->label); ?></label>
				<?php $list_fonts       = array();
				$list_font_weights 		= array();
				$webfonts_array    		= file( get_template_directory_uri().'/lib/includes/customizer/fonts.json');
				$webfonts          		= implode( '', $webfonts_array );
				$list_fonts_decode 		= json_decode( $webfonts, true );
				$list_fonts['default'] 	= 'Theme Default';
				foreach ( $list_fonts_decode['items'] as $key => $value ) {
					$item_family                     = $list_fonts_decode['items'][$key]['family'];
					$list_fonts[$item_family]        = $item_family; 
					$list_font_weights[$item_family] = $list_fonts_decode['items'][$key]['variants'];
				} ?>
				<select <?php $this->link(); ?> style="">
					<?php
					$defaylt_fonts = array ('0' => __('Select Font','petshop'),
					'Arial,Helvetica,sans-serif' => 'Arial, Helvetica, sans-serif',
					"'Arial Black', adget,sans-serif" => "'Arial Black', Gadget, sans-serif",
					"'Bookman Old Style',serif" => "'Bookman Old Style', serif",
					"'Comic Sans MS',cursive" => "'Comic Sans MS', cursive",
					"Courier,monospace" => "Courier, monospace",
					"Garamond,serif" => "Garamond, serif",
					"Georgia,serif" => "Georgia, serif",
					"Impact,Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
					"'Lucida Console',Monaco,monospace" => "'Lucida Console', Monaco, monospace",
					"'Lucida Sans Unicode','Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
					"'MS Sans Serif',Geneva,sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
					"'MS Serif','New York',sans-serif" => "'MS Serif', 'New York', sans-serif",
					"'Palatino Linotype','Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
					"Tahoma,Geneva,sans-serif" => "Tahoma, Geneva, sans-serif",
					"'Times New Roman',Times, serif" => "'Times New Roman', Times, serif",
					"'Trebuchet MS',Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
					"Verdana, Geneva,sans-serif" => "Verdana, Geneva, sans-serif");

					$array = array('System Fonts' => $defaylt_fonts, 'Google Fonts' => $list_fonts);
					foreach ($array as $key => $val){	   
						echo '<optgroup label="'.$key.'">';
						    foreach ($val as $k => $v){
							    echo '<option value="'.$k.'">'.$v.'</option>';
							}
					    echo '</optgroup>';
					}
					?>
				</select>	
			<?php }
			}
		}
	}
	add_action('customize_register','petshop_kaya_controls_register');
}
if( !function_exists('petshop_kaya_globel_font_family') ){
	function petshop_kaya_globel_font_family(){
		$frame_border_text_font_family = get_theme_mod('frame_border_text_font_family') ? get_theme_mod('frame_border_text_font_family') : 'Nova Square';
		$google_all_desc_font = get_theme_mod('google_all_desc_font') ? get_theme_mod('google_all_desc_font') : 'Lora';
		$header_text_logo_font_family = get_theme_mod('header_text_logo_font_family') ? get_theme_mod('header_text_logo_font_family') : 'Exo';
		$google_bodyfont=get_theme_mod( 'google_body_font' ) ? get_theme_mod( 'google_body_font' ) : 'Nova Square';
		$google_menufont=get_theme_mod( 'google_menu_font') ? get_theme_mod( 'google_menu_font') : 'Open Sans';
		$google_generaltitlefont=get_theme_mod( 'google_heading_font' ) ? get_theme_mod( 'google_heading_font') : 'Exo';
		$text_logo_tagline_font_family=get_theme_mod( 'text_logo_tagline_font_family' ) ? get_theme_mod( 'text_logo_tagline_font_family') : 'Lora';
		$customizer_font_names = array($header_text_logo_font_family, $google_bodyfont, $google_menufont, $google_generaltitlefont, $text_logo_tagline_font_family );
		$defaylt_fonts = array ('0','Arial,Helvetica,sans-serif',"'Arial Black', gadget,sans-serif" , "'Bookman Old Style',serif" ,"'Comic Sans MS',cursive" ,"Courier,monospace" ,"Garamond,serif" ,"Georgia,serif" ,"Impact,Charcoal, sans-serif" ,"'Lucida Console',Monaco,monospace" ,"'Lucida Sans Unicode','Lucida Grande', sans-serif" ,	"'MS Sans Serif',Geneva,sans-serif" ,"'MS Serif','New York',sans-serif" ,"'Palatino Linotype','Book Antiqua', Palatino, serif" ,"Tahoma,Geneva,sans-serif" ,"'Times New Roman',Times, serif" ,"'Trebuchet MS',Helvetica, sans-serif" ,"Verdana, Geneva,sans-serif");
		$body_query_args = array(
			'family' => urlencode( $google_generaltitlefont ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $google_bodyfont ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $header_text_logo_font_family ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $google_menufont ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $google_all_desc_font ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $text_logo_tagline_font_family ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%26subset%3Dlatin%2Clatin-ext',
			'subset' => 'latin,latin-ext',
		);
		wp_enqueue_style( 'google-font-family', add_query_arg( $body_query_args, "//fonts.googleapis.com/css" ), array(), null );
		if($frame_border_text_font_family){
			$frame_border_query_args = array(
				'family' => urlencode( $frame_border_text_font_family ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C',
				'subset' => 'latin,latin-ext',
			);
			wp_enqueue_style( 'google-frame-border-font-family', add_query_arg( $frame_border_query_args, "//fonts.googleapis.com/css" ), array(), null );
		}
	}
	add_action('wp_enqueue_scripts','petshop_kaya_globel_font_family');
}	