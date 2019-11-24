<?php

/**
 * Fired during plugin activation
 *
 * @since      1.0.0
 *
 * @package    Wordpress_Coming_Soon_Page
 * @subpackage Wordpress_Coming_Soon_Page/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wordpress_Coming_Soon_Page
 * @subpackage Wordpress_Coming_Soon_Page/includes
 */
class Mwb_Wordpress_Coming_Soon_Page_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		global $wpdb;

		// check if it is a multisite network

		if (is_multisite()) 
		{

			// check if the plugin has been activated on the network or on a single site

			if (is_plugin_active_for_network(__FILE__)) 
			{

				// get ids of all sites

				$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");

				foreach ($blogids as $blog_id) 
				{

					switch_to_blog($blog_id);

					// create tables for each site

					update_option("wcsp_enable_imgurl","bg2");

					restore_current_blog();

				}

			}

			else

			{
				// activated on a single site, in a multi-site

				update_option("mwb_wcsp_enable_imgurl","bg2");

			}

		}

		else

		{

			// activated on a single site

			update_option("mwb_wcsp_enable_imgurl","bg2");

		}
	

	}

}
