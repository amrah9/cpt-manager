<?php

namespace Rahda\CptManager\Api\Templates\Admin;

class post_type_settings extends generals
{
	public function show(): void {
		settings_errors();
		echo $this->getHeader();
		echo '<form action="options.php" method="post">';
		settings_fields( 'cpt_manager_settings' );
		do_settings_sections( 'cpt_manager' );
		submit_button( esc_html__( 'Add Post Type', 'cpt_manager' ) );
		echo '</form>';
		echo $this->getFooter();
	}
}