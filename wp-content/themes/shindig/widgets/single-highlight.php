<?php
add_action('widgets_init', 'pyre_homepage_foot_feat_load_widgets');

function pyre_homepage_foot_feat_load_widgets()
{
	register_widget('Pyre_Latest_Foot_Featured_Media_Widget');
}

class Pyre_Latest_Foot_Featured_Media_Widget extends WP_Widget {
	
	public function __construct()
	    {
		$widget_ops = array('classname' => 'pyre_homepage_media-product-feat', 'description' => 'Highlight Widget');

		$control_ops = array('id_base' => 'pyre_homepage_media-widget-product-feat');
		
        add_action( 'load-widgets.php', array(&$this, 'my_custom_load') );
		
		
		parent::__construct('pyre_homepage_media-widget-product-feat', 'Home: Highlight Widget', $widget_ops, $control_ops);
	}
	
    function my_custom_load() {    
           wp_enqueue_style( 'wp-color-picker' );        
           wp_enqueue_script( 'wp-color-picker' );    
		   
       }
	
	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		$summary_text = $instance['summary_text'];
		
		$link_text = $instance['link_text'];
		$link_link = $instance['link_link'];
		$link_icon = $instance['link_icon'];
		

		
		
		$widget_bg = $instance['widget_bg'];
		$widget_bg_img = $instance['widget_bg_img'];
		$checkbox_pro = $instance['checkbox_pro'];
		
		$main_text_pro = $instance['main_text_pro'];
		
		
		
		echo $before_widget;
		
		 ?>
		
		<div class="<?php echo esc_attr(  $args['widget_id'] ); ?> <?php if($checkbox_pro): ?>light-fonts-pro<?php endif; ?> homepage-widget-blog" <?php if($widget_bg): ?>style="background-color:<?php echo esc_attr( $widget_bg ); ?>;"<?php endif; ?>>
			<div class="width-container">
			
			<?php if($summary_text): ?>
				<div class="summary-text-pro"><?php echo esc_attr( $summary_text ); ?></div>
			<?php endif; ?>
				
			<?php if($title): ?>
				<h1 class="home-widget"><?php echo esc_attr( $title ); ?></h1>
			<?php endif; ?>
			
			
			<div class="main-text-widgetpro"><?php if($main_text_pro): ?><?php echo do_shortcode( $main_text_pro ); ?><?php endif; ?></div>
			
			<?php if($link_text): ?><div class="aligncenter"><a href="<?php echo esc_attr( $link_link ); ?>" class="progression-button"><?php echo esc_attr(  $link_text ); ?><?php if($link_icon): ?><i class="ls-sc-button-icon-right fa <?php echo esc_attr( $link_icon ); ?>"></i><?php endif; ?></a></div><?php endif; ?>
				
			
			
			<div class="clearfix"></div>
			</div>
		</div>
		
		<?php if($widget_bg_img): ?>
			<script type='text/javascript'>jQuery(document).ready(function($) {   $(".<?php echo esc_attr(  $args['widget_id'] ); ?>").backstretch([ "<?php echo esc_url( $widget_bg_img ); ?>" ],{ fade: 750, }); }); </script>
		<?php endif; ?>
		
		
		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		
		$instance['link_text'] = $new_instance['link_text'];
		$instance['link_link'] = $new_instance['link_link'];
		$instance['link_icon'] = $new_instance['link_icon'];
		
		$instance['summary_text'] = $new_instance['summary_text'];
		

		
		$instance['widget_bg'] = $new_instance['widget_bg'];
		$instance['widget_bg_img'] = $new_instance['widget_bg_img'];
		
		$instance['checkbox_pro'] = $new_instance['checkbox_pro'];
		
		$instance['main_text_pro'] = $new_instance['main_text_pro'];
		
		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => 'HEADLINE', 'summary_text' => 'EXAMPLE SUB-HEADLINE', 'link_text' => 'Learn more', 'link_link' => '#', 'widget_bg' => '#f2f2f4', 'widget_image_left_pro' => '', 'link_icon' => 'fa-map-marker', 'widget_bg_img' => '', 'checkbox_pro' => 'off', 'main_text_pro' => '[recent_products per_page="3" columns="3"]');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<script type='text/javascript'>
		            jQuery(document).ready(function($) {
		                $('.my-color-picker-footer').wpColorPicker();
		            });
		    </script>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('summary_text'); ?>"><?php _e( 'Sub-headline Text', 'progression' ); ?>:</label>			
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('summary_text'); ?>" name="<?php echo $this->get_field_name('summary_text'); ?>" value="<?php echo $instance['summary_text']; ?>" />
			
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('main_text_pro'); ?>"><?php _e( 'Main Text/Shortcode', 'progression' ); ?>:</label>
	
			
			<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('main_text_pro'); ?>" name="<?php echo $this->get_field_name('main_text_pro'); ?>"><?php echo $instance['main_text_pro']; ?></textarea>
		</p>
	

		<p>
			<label for="<?php echo $this->get_field_id('link_text'); ?>"><?php _e( 'Button Text', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>" value="<?php echo $instance['link_text']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('link_link'); ?>"><?php _e( 'Button Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link_link'); ?>" name="<?php echo $this->get_field_name('link_link'); ?>" value="<?php echo $instance['link_link']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('link_icon'); ?>"><?php _e( 'Button Icon', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link_icon'); ?>" name="<?php echo $this->get_field_name('link_icon'); ?>" value="<?php echo $instance['link_icon']; ?>" />
		</p>
		
		
	
		
		<p>
			<label for="<?php echo $this->get_field_id('widget_bg'); ?>"><?php _e( 'Widget Background Color', 'progression' ); ?>:</label>
			<br>
			<input class="my-color-picker-footer" id="<?php echo $this->get_field_id('widget_bg'); ?>" name="<?php echo $this->get_field_name('widget_bg'); ?>" value="<?php echo $instance['widget_bg']; ?>" />
		</p>
		

		<p>
			<label for="<?php echo $this->get_field_id('widget_bg_img'); ?>"><?php _e( 'Widget Background Image', 'progression' ); ?>:</label>
			<br>
			<!-- Image Thumbnail -->
			<img class="custom_media_image" src="<?php echo $instance['widget_bg_img']; ?>" style="max-width:100px; float:left; margin: 0px     10px 0px 0px; display:inline-block;" />
			<!-- Upload button and text field -->
			<input class="custom_media_url" id="" type="text" name="<?php echo $this->get_field_name('widget_bg_img'); ?>" value="<?php echo $instance['widget_bg_img']; ?>" style="margin-bottom:10px; clear:right;">
			<a href="#" class="button widget_bg_img"><?php _e( 'Add Image', 'progression' ); ?></a>
			<script type="text/javascript">
			jQuery(document).ready(function($){
			$('.widget_bg_img').click(function() {
			        var send_attachment_bkp = wp.media.editor.send.attachment;
			        var button = $(this);
			        wp.media.editor.send.attachment = function(props, attachment) {
			            $(button).prev().prev().attr('src', attachment.url);
			            $(button).prev().val(attachment.url);
			            wp.media.editor.send.attachment = send_attachment_bkp;
			        }
			        wp.media.editor.open(button);
			        return false;       
			    });
			});
			</script>
			<div style=" clear:both;"></div>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('checkbox_pro'); ?>"><?php _e( 'Check box for light text', 'progression' ); ?>:</label>
			<input class="checkbox" type="checkbox" <?php checked($instance['checkbox_pro'], 'on'); ?> id="<?php echo $this->get_field_id('checkbox_pro'); ?>" name="<?php echo $this->get_field_name('checkbox_pro'); ?>" /> 
			
		</p>
	
		
	<?php }
}
?>