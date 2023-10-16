<?php

namespace Rahda\CptManager\Pages;

use Rahda\CptManager\Base\BaseController;
use Rahda\CptManager\Api\SettingsApi;
use Rahda\CptManager\Api\Callbacks\CPTCallback;

class Dashboard extends BaseController{

	public SettingsApi $settings_api;
	public CPTCallback $CPT_callback;
	public array $pages = array();

	public function register(): void {
		$this->settings_api = new SettingsApi();
		$this->CPT_callback = new CPTCallback();
		$this->setPages();
		$this->settings_api->AddPages( $this->pages )->withSubPage( esc_html__( 'Manage CPT', 'cpt_plugin' ) )->register();
	}

	public function setPages(): void {
		$this->pages = array( [
			'page_title' => esc_html__('CPT Manager', 'cpt_plugin'),
			'menu_title' => esc_html__('CPT Manager', 'cpt_plugin'),
			'capability' => 'manage_options',
			'menu_slug'  => 'cpt_manager',
			'callback'   => array( $this->CPT_callback, 'cptManagerPage' ),
			'icon_url'   => 'dashicons-text-page',
			'position'   => 5
		] );
	}
}