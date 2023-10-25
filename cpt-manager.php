<?php
/**
 * @package           Cpt-Manager
 * @author            Amin Rahdar
 * @copyright         2023
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Cpt Manager
 * Plugin URI:        https://www.x.com/cpt-manager
 * Description:       A plugin to add custom post types and taxonomies
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            Amin Rahdar
 * Author URI:        https://www.x.com/amin-rahdar
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       cpt_plugin
 * Domain Path:       /assets/lang
 */
if(!defined('ABSPATH')) die();

add_action('init', 'load_my_cpt_textdomain', 1);
function load_my_cpt_textdomain(): void {
	load_plugin_textdomain( 'cpt_plugin', false, dirname(plugin_basename(__FILE__)) . '/assets/lang/' );
}

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

if( class_exists( "Rahda\\CptManager\\CptManagerInit" ) ){
	Rahda\CptManager\CptManagerInit::register_services();
}

function register_cpt_manager_activate_hook()
{
    if( class_exists( "Rahda\\CptManager\\Base\\Activate" ) ) {
        rahda\CptManager\Base\Activate::activate();
    }
}
register_activation_hook( __FILE__, 'register_cpt_manager_activate_hook' );

function register_cpt_manager_deactivate_hook()
{
    if( class_exists( "Rahda\\CptManager\\Base\\Deactivate" ) ) {
        rahda\CptManager\Base\Deactivate::deactivate();
    }
}
register_deactivation_hook( __FILE__, 'register_cpt_manager_deactivate_hook' );

