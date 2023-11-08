<?php

namespace Rahda\CptManager\Base;
class Enqueue extends BaseController
{
	public function register(): void {
		add_action( 'admin_enqueue_scripts', array( $this, 'cpt_manager_admin_scripts' ) );
	}

	public function cpt_manager_admin_scripts(): void {
		global $page_hook;
		if( strpos( $page_hook, 'cpt_manager' ) ) {
			wp_enqueue_style( 'cpt_manager_admin_style', $this->plugin_url . 'assets/css/admin.style.min.css', array(), $this->plugin_version );
			wp_enqueue_script( 'cpt_manager_admin_script', $this->plugin_url . 'assets/js/admin.script.min.js', array(), $this->plugin_version );
		}
	}
}