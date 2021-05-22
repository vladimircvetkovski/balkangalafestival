<div class="social-ico">
	<?php if (get_theme_mod( 'location_link_progression', '' )) : ?><a href="<?php echo get_theme_mod('location_link_progression'); ?>" target="_blank"><i class="fa fa-map-marker"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'facebook_link_progression', '1' )) : ?><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'twitter_link_progression', '1' )) : ?><a href="https://twitter.com/home?status=<?php echo urlencode( get_theme_mod('social_description_pro', 'Easily customize your share description with the Shindig theme! ') ); ?><?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'google_link_progression', '1' )) : ?><a href="https://plus.google.com/share?url=<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'pinterest_link_progression')) : ?><a href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url( home_url( '/' ) ); ?>&media=<?php if (get_theme_mod( 'share_main_image', get_template_directory_uri() . '/images/page-title.jpg'  )) : ?><?php echo get_theme_mod( 'share_main_image', get_template_directory_uri() . '/images/page-title.jpg' ); ?><?php endif; ?>&description=<?php echo get_theme_mod('social_description_pro', 'Easily customize your share description with the Shindig theme! '); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
	<?php if (get_theme_mod( 'mail_link_progression' )) : ?><a href="mailto:orkestarkob@gmail.com?subject=Contact%20from%20Balkan%20Gala%20Festival%20Website" target="_blank"><i class="fa fa-envelope"></i></a><?php endif; ?>	
</div>
<div itemscope itemtype="http://schema.org/Product" id="hidden-share">
	 <h1 itemprop="name"><?php bloginfo('name'); ?></h1>
	 <?php if (get_theme_mod( 'share_main_image', get_template_directory_uri() . '/images/page-title.jpg'  )) : ?><img itemprop="image" src="<?php echo get_theme_mod( 'share_main_image', get_template_directory_uri() . '/images/page-title.jpg' ); ?>" alt="<?php bloginfo('name'); ?>" /><?php endif; ?>
	 <?php if (get_theme_mod( 'social_description_pro', 'Easily customize your share description with the Shindig theme!')) : ?> <p itemprop="description"><?php echo get_theme_mod('social_description_pro', 'Easily customize your share description with the Shindig theme! '); ?></p>
	<?php endif; ?>
</div>