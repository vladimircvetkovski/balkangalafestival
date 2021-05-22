<?php
add_action('widgets_init', 'pyre_homepage_blog_load_widgets');

function pyre_homepage_blog_load_widgets()
{
	register_widget('Pyre_Latest_Blog_Media_Widget');
}

class Pyre_Latest_Blog_Media_Widget extends WP_Widget {
	
	public function __construct()
	    {
		$widget_ops = array('classname' => 'pyre_homepage_media', 'description' => 'Latest Blog Posts');

		$control_ops = array('id_base' => 'pyre_homepage_media-widget');
		
		add_action( 'load-widgets.php', array(&$this, 'my_custom_load') );
		
		
		parent::__construct('pyre_homepage_media-widget', 'Home: Blog Posts', $widget_ops, $control_ops);
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
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		$columns = $instance['columns'];
		$link_icon = $instance['link_icon'];
		$link_text = $instance['link_text'];
		$link_link = $instance['link_link'];
		$summary_text = $instance['summary_text'];
		
		$checkbox_pro = $instance['checkbox_pro'];
		
		$widget_bg = $instance['widget_bg'];
				
		
		echo $before_widget;
	 ?>
		

		
		<div class="<?php echo esc_attr(  $args['widget_id'] ); ?> homepage-widget-blog <?php if($checkbox_pro): ?>light-fonts-pro<?php endif; ?>" <?php if($widget_bg): ?>style="background-color:<?php echo esc_attr( $widget_bg ); ?>;"<?php endif; ?>>
			<div class="width-container">
				<?php if($summary_text): ?>
						<div class="summary-text-pro"><?php echo esc_attr( $summary_text ); ?></div>
				<?php endif; ?>
				
				<?php if($title): ?>
					<h1 class="home-widget"><?php echo esc_attr( $title ); ?></h1>
				<?php endif; ?>
			
				<?php 
				global $more;    // Declare global $more (before the loop).
				?>
				<?php
				$recent_posts = new WP_Query(array(
					'showposts' => $posts,
					'cat' => $categories,
					'post__not_in'=>get_option("sticky_posts"),
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => 'blankcategory',
							'operator' => 'NOT IN'
						)
					)
				));
				if($recent_posts->have_posts()):
					$count = 1;
					$count_2 = 1;
				?>
				<?php while($recent_posts->have_posts()): $recent_posts->the_post(); 
				if($count >= $columns+1) { $count = 1; }
				?>
				<?php 
				$more = 0;       // Set (inside the loop) to display content above the more tag.
				?>
				<div class="grid<?php echo esc_attr( $columns ); ?>column-progression<?php if($count == $columns): echo ' lastcolumn-progression'; endif; ?>">
					<?php get_template_part( 'content', get_post_format() ); ?>
				</div>
				<?php if($count == $columns): ?><div class="clearfix"></div><?php endif; ?>
				<?php $count ++; $count_2++; endwhile; ?>
				<div class="clearfix"></div>
				
				<?php if($link_text): ?><div class="aligncenter"><a href="<?php echo esc_attr( $link_link ); ?>" class="progression-button progression-button-portfolio progression-blog"><?php echo esc_attr(  $link_text ); ?><?php if($link_icon): ?><i class="ls-sc-button-icon-right fa <?php echo esc_attr(  $link_icon ); ?>"></i><?php endif; ?></a></div><?php endif; ?>
					
				<div class="clearfix"></div>
			</div><!-- close .width-container -->
		</div><!-- close #homepage-widget -->
		
		<?php endif; ?>
		
		
		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['categories'] = $new_instance['categories'];
		$instance['posts'] = $new_instance['posts'];
		$instance['columns'] = $new_instance['columns'];
		$instance['link_icon'] = $new_instance['link_icon'];
		$instance['link_text'] = $new_instance['link_text'];
		$instance['link_link'] = $new_instance['link_link'];
		$instance['widget_bg'] = $new_instance['widget_bg'];
		$instance['summary_text'] = $new_instance['summary_text'];
		
		$instance['checkbox_pro'] = $new_instance['checkbox_pro'];
		
		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => 'Latest News', 'summary_text' => '', 'categories' => 'all', 'posts' => 3, 'columns' => 3, 'link_text' => 'More News', 'link_link' => '#', 'widget_bg' => '#f2f2f4', 'link_icon' => '', 'checkbox_pro' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<script type='text/javascript'>
		            jQuery(document).ready(function($) {
		                $('.my-color-picker-blog').wpColorPicker();
		            });
		        </script>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('summary_text'); ?>"><?php _e( 'Summary Text', 'progression' ); ?>:</label>
	
			
			<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('summary_text'); ?>" name="<?php echo $this->get_field_name('summary_text'); ?>"><?php echo $instance['summary_text']; ?></textarea>
		</p>
	
		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Filter by Category', 'progression' ); ?>:</label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_attr( $category->cat_name );?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e( 'Number of posts', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e( 'Number of columns (1-4)', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('columns'); ?>" name="<?php echo $this->get_field_name('columns'); ?>" value="<?php echo $instance['columns']; ?>" />
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
			<input class="my-color-picker-blog" id="<?php echo $this->get_field_id('widget_bg'); ?>" name="<?php echo $this->get_field_name('widget_bg'); ?>" value="<?php echo $instance['widget_bg']; ?>" />
		</p>
		

		<p>
			<label for="<?php echo $this->get_field_id('checkbox_pro'); ?>"><?php _e( 'Check box for light text', 'progression' ); ?>:</label>
			<input class="checkbox" type="checkbox" <?php checked($instance['checkbox_pro'], 'on'); ?> id="<?php echo $this->get_field_id('checkbox_pro'); ?>" name="<?php echo $this->get_field_name('checkbox_pro'); ?>" /> 
			
		</p>
	
		
		
		
	<?php }
}
?>