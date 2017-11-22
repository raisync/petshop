<?php
class Petshop_Twitter_Widget extends WP_Widget {
  public function __construct(){
    global $petshop_plugin_name;
    parent::__construct(
      'square-twitter',
      __('Petshop - Twitter',$petshop_plugin_name),
      array('description' => __('Dsiplay latest tweets',$petshop_plugin_name))
      );
  }
  function widget($args, $instance)
  {   
    $instance = wp_parse_args($instance, array(
            'title' => '',
          'twitter_username' => '', 
          'count' => 3, 
          'consumer_key' => '',
          'access_token' => '',
          'consumer_secret' => '', 
          'access_token' => '', 
          'access_token_secret' => '',
          'animation_names' => '',
          'twitter_button_name' => 'SEE MORE TWEETS',
          'twitter_icon_bg_color' => '#f49c41',
          'twitter_icon_color' => '#ffffff',
          'twitter_text_color' => '#8d8d8d',
          'twitter_link_color' => '#4d4d4d',
          'twitter_link_hover_color' => '#f49c41',
        )); 

  echo $args['before_widget'];
  $css = '.twitter_container li > a{ color:'.$instance['twitter_link_color'].'!important; }';
  $css .= '.twitter_container li > a:hover{ color:'.$instance['twitter_link_hover_color'].'!important; }';
  $css = preg_replace( '/\s+/', ' ', $css );
  $output = "<style type=\"text/css\">\n" . $css . "\n</style>";
  echo $output;
   $animation_class = trim( !empty( $instance['animation_names'] ) ) ? 'wow '.$instance['animation_names'] : '';
    if($instance['title']) {
      echo $args['before_title'].$instance['title'].$args['after_title'];
    }    
    if($instance['twitter_username'] && trim($instance['consumer_key']) && trim($instance['consumer_secret']) && trim($instance['access_token']) && trim($instance['access_token_secret']) ) { 
    require_once 'twitteroauth/twitteroauth.php';
    $transName = 'list_tweets';
    $cacheTime = 1;
    if(false === ($twittermsg = get_transient($transName))) {
         // require the twitter auth class
         require_once 'twitteroauth/twitteroauth.php';
         $twitterConnection = new TwitterOAuth(
             trim($instance['consumer_key']),  // Consumer Key
              trim($instance['consumer_secret']),     // Consumer secret
              trim($instance['access_token']),       // Access token
              trim($instance['access_token_secret'])     // Access token secret
              );
         $twittermsg = $twitterConnection->get(
                'statuses/user_timeline',
                array(
                  'screen_name'     => $instance['twitter_username'],
                  'count'           => 2,
                  'exclude_replies' => true
                )
              );
         if($twitterConnection->http_code != 200)
         {
              $twittermsg = get_transient($transName);
         }
         // Save our new transient.
         set_transient($transName, $twittermsg, 60 * $cacheTime);
    }
    $twitter = get_transient($transName);
    if($twitter && is_array($twitter)) {
      //var_dump($twitter);
    ?>
    
          <div class="<?php echo $animation_class; ?> twitter_container" id="tweets_<?php echo $args['widget_id']; ?>" style="color:<?php echo $instance['twitter_text_color']; ?>;">
            <ul>
              <?php foreach($twitter as $tweet): ?>
              <li>
                <a href="https://twitter.com/<?php echo $tweet->user->screen_name; ?>"><i class="fa fa-twitter" style="background-color:<?php echo $instance['twitter_icon_bg_color']; ?>; color:<?php echo $instance['twitter_icon_color']; ?>"> </i><span style="line-height:40px;"><?php echo $tweet->user->screen_name; ?></span></a>
                <span class="description">
                <?php
                $latestTweet = $tweet->text;
                $latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet);
                $latestTweet = preg_replace('/@([a-z0-9_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $latestTweet);
                echo $latestTweet;
                $twitterTime = strtotime($tweet->created_at);
                $timeAgo = $this->ago($twitterTime);
                ?>
                </span>
                <a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>" ><?php echo $timeAgo; ?></a>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php if( $instance['twitter_button_name'] ){ ?>
               <a href="https://twitter.com/<?php echo $tweet->user->screen_name; ?>" class="more_tweets"> <?php echo $instance['twitter_button_name']; ?> </a>
             <?php  } ?>
          </div>
    <?php }}
    
    echo $args['after_widget'];
  }
  
  function ago($time)
  {
     $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
     $lengths = array("60","60","24","7","4.35","12","10");

     $now = time();
         $difference     = $now - $time;
         $tense         = "ago";
     for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
         $difference /= $lengths[$j];
     }
     $difference = round($difference);
     if($difference != 1) {
         $periods[$j].= "s";
     }
     return "$difference $periods[$j] ago ";
  }
 function form($instance)
  {
global $petshop_plugin_name;
 $instance = wp_parse_args($instance, array(
          'title' => '',
          'twitter_username' => '', 
          'count' => 3, 
          'consumer_key' => '',
          'access_token' => '',
          'consumer_secret' => '', 
          'access_token' => '', 
          'access_token_secret' => '',
          'animation_names' => '',
          'twitter_button_name' => 'SEE MORE TWEETS',
          'twitter_icon_bg_color' => '#f49c41',
          'twitter_icon_color' => '#ffffff',
          'twitter_text_color' => '#8d8d8d',
          'twitter_link_color' => '#4d4d4d',
          'twitter_link_hover_color' => '#f49c41',

        )); 
?>
 <script type='text/javascript'>
    (function($) {
      "use strict";
      $(function() {
        $('.twitter_color_settings').each(function(){
          $(this).wpColorPicker();
        });
      });
    })(jQuery);
    </script>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Twitter Title:',$petshop_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('twitter_username'); ?>"><?php _e('Twitter User Name:',$petshop_plugin_name) ?></label>
    <input class="widefat" type="text"  id="<?php echo $this->get_field_id('twitter_username'); ?>" name="<?php echo $this->get_field_name('twitter_username'); ?>" value="<?php echo $instance['twitter_username']; ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('consumer_key'); ?>"><?php _e('Consumer Key:',$petshop_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" value="<?php echo $instance['consumer_key']; ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('consumer_secret'); ?>"><?php _e('Consumer Secret:',$petshop_plugin_name) ?></label>
    <input class="widefat" type="text"  id="<?php echo $this->get_field_id('consumer_secret'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" value="<?php echo $instance['consumer_secret']; ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('access_token'); ?>"><?php _e('Access Token:',$petshop_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('access_token'); ?>" name="<?php echo $this->get_field_name('access_token'); ?>" value="<?php echo $instance['access_token']; ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('access_token_secret'); ?>"><?php _e('Access Token Secret:',$petshop_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('access_token_secret'); ?>" name="<?php echo $this->get_field_name('access_token_secret'); ?>" value="<?php echo $instance['access_token_secret']; ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('twitter_button_name'); ?>"><?php _e('Twitter Button Name',$petshop_plugin_name) ?></label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_button_name'); ?>" name="<?php echo $this->get_field_name('twitter_button_name'); ?>" value="<?php echo $instance['twitter_button_name']; ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
  
  <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('twitter_icon_bg_color') ?>">  <?php _e('Twitter Icon BG Color',$petshop_plugin_name)?>  </label>
         <input type="text" class="twitter_color_settings" id="<?php echo $this->get_field_id('twitter_icon_bg_color') ?>" value="<?php echo esc_attr($instance['twitter_icon_bg_color']) ?>" name="<?php echo $this->get_field_name('twitter_icon_bg_color') ?>" /> 
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('twitter_icon_color') ?>">  <?php _e('Twitter Icon Color',$petshop_plugin_name)?>  </label>
         <input type="text" class="twitter_color_settings" id="<?php echo $this->get_field_id('twitter_icon_color') ?>" value="<?php echo esc_attr($instance['twitter_icon_color']) ?>" name="<?php echo $this->get_field_name('twitter_icon_color') ?>" />
      </p>
      
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('twitter_text_color') ?>">  <?php _e('Text Color',$petshop_plugin_name)?>  </label>
         <input type="text" class="twitter_color_settings" id="<?php echo $this->get_field_id('twitter_text_color') ?>" value="<?php echo esc_attr($instance['twitter_text_color']) ?>" name="<?php echo $this->get_field_name('twitter_text_color') ?>" /> 
      </p>
      <p class="one_fourth_last">
        <label for="<?php echo $this->get_field_id('twitter_link_color') ?>">  <?php _e('Link Color',$petshop_plugin_name)?>  </label>
         <input type="text" class="twitter_color_settings" id="<?php echo $this->get_field_id('twitter_link_color') ?>" value="<?php echo esc_attr($instance['twitter_link_color']) ?>" name="<?php echo $this->get_field_name('twitter_link_color') ?>" />  
      </p>
      <p class="one_fourth" style="clear:both;">
        <label for="<?php echo $this->get_field_id('twitter_link_hover_color') ?>">  <?php _e('Link Hover Color',$petshop_plugin_name)?>  </label>
         <input type="text" class="twitter_color_settings" id="<?php echo $this->get_field_id('twitter_link_hover_color') ?>" value="<?php echo esc_attr($instance['twitter_link_hover_color']) ?>" name="<?php echo $this->get_field_name('twitter_link_hover_color') ?>" />  
      </p>
</div>
  <p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p>   
<?php
}
}
petshop_kaya_register_widgets('twitter', __FILE__); 
 ?>