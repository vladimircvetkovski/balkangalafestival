<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'progression_studios_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function progression_studios_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
		array(
			'name' 		=> 'Breadcrumb NavXT',
			'slug' 		=> 'breadcrumb-navxt',
			'required' 	=> false,
		),
		
        array(
            'name'                  => 'prettyPhoto Media', // The plugin name
            'slug'                  => 'prettyphoto-media', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/tgm-plugin-activation/plugins/prettyphoto-media.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
		
		// This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'                  => 'Light Shortcode', // The plugin name
            'slug'                  => 'light-shortcode', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/tgm-plugin-activation/plugins/light-shortcode.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
		
        array(
            'name'                  => 'Revolution Slider', // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/tgm-plugin-activation/plugins/revslider.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
		
        array(
            'name'                  => 'Progression Custom Post Types', // The plugin name
            'slug'                  => 'progression-custom', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/tgm-plugin-activation/plugins/progression-custom.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
		
  		array(
  			'name' 		=> 'One Click Demo Import',
  			'slug' 		=> 'one-click-demo-import',
  			'required' 	=> false,
  		),
		

		array(
			'name' 		=> 'Post Type Archive Link',
			'slug' 		=> 'post-type-archive-links',
			'required' 	=> false,
		),
		
		array(
			'name' 		=> 'Post Types Order',
			'slug' 		=> 'post-types-order',
			'required' 	=> false,
		),
		
		array(
			'name' 		=> esc_html__('WooCommerce', 'multifondo-progression' ),
			'slug' 		=> 'woocommerce',
			'required' 	=> false,
		),
		
		array(
			'name' 		=> 'Category Order and Taxonomy Terms Order',
			'slug' 		=> 'taxonomy-terms-order',
			'required' 	=> false,
		)

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
 	$config = array(
 		'id'           => 'shindig-progression',                 // Unique ID for hashing notices for multiple instances of TGMPA.
 		'default_path' => '',                      // Default absolute path to bundled plugins.
 		'menu'         => 'tgmpa-install-plugins', // Menu slug.
 		'parent_slug'  => 'themes.php',            // Parent menu slug.
 		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
 		'has_notices'  => true,                    // Show admin notices or not.
 		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
 		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
 		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
 		'message'      => '',                      // Message to output right before the plugins table.


 		'strings'      => array(
 			'page_title'                      => esc_html__( 'Install Required Plugins', 'shindig-progression' ),
 			'menu_title'                      => esc_html__( 'Install Plugins', 'shindig-progression' ),
 			'installing'                      => esc_html__( 'Installing Plugin: %s', 'shindig-progression' ), // %s = plugin name.
 			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'shindig-progression' ),
 			'notice_can_install_required'     => _n_noop(
 				'This theme requires the following plugin: %1$s.',
 				'This theme requires the following plugins: %1$s.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'notice_can_install_recommended'  => _n_noop(
 				'This theme recommends the following plugin: %1$s.',
 				'This theme recommends the following plugins: %1$s.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'notice_cannot_install'           => _n_noop(
 				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
 				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'notice_ask_to_update'            => _n_noop(
 				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
 				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'notice_ask_to_update_maybe'      => _n_noop(
 				'There is an update available for: %1$s.',
 				'There are updates available for the following plugins: %1$s.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'notice_cannot_update'            => _n_noop(
 				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
 				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'notice_can_activate_required'    => _n_noop(
 				'The following required plugin is currently inactive: %1$s.',
 				'The following required plugins are currently inactive: %1$s.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'notice_can_activate_recommended' => _n_noop(
 				'The following recommended plugin is currently inactive: %1$s.',
 				'The following recommended plugins are currently inactive: %1$s.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'notice_cannot_activate'          => _n_noop(
 				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
 				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
 				'shindig-progression'
 			), // %1$s = plugin name(s).
 			'install_link'                    => _n_noop(
 				'Begin installing plugin',
 				'Begin installing plugins',
 				'shindig-progression'
 			),
 			'update_link' 					  => _n_noop(
 				'Begin updating plugin',
 				'Begin updating plugins',
 				'shindig-progression'
 			),
 			'activate_link'                   => _n_noop(
 				'Begin activating plugin',
 				'Begin activating plugins',
 				'shindig-progression'
 			),
 			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'shindig-progression' ),
 			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'shindig-progression' ),
 			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'shindig-progression' ),
 			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'shindig-progression' ),  // %1$s = plugin name(s).
 			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'shindig-progression' ),  // %1$s = plugin name(s).
 			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'shindig-progression' ), // %s = dashboard link.
 			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'shindig-progression' ),

 			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
 		),

 	);

 	tgmpa( $plugins, $config );
 }
    