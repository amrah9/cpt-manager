<?php

namespace Rahda\CptManager\Api\Callbacks;

use Rahda\CptManager\Base\BaseController;

class CPTCallback extends BaseController
{
	public function cptManagerAdminSection()
	{}

	public function cptSanitize( $input )
	{
		
	}

	public function textField( array $args ): void {
		$name = $args['name'];
		$option_name = $args['option_name'];
		$input = get_option( $option_name );
		$input = ( !empty( $input ) ) ? unserialize( $input ) : array();
		$value = '';
		if( isset( $_POST['edit_post'] ) ){
			$value = $input[$_POST['edit_post']][$name];
		}
		echo '<input type="text" class="regular-text" name="'.$option_name.'['.$name.']" id="'.$name.'" value="'.$value.'" placeholder="'.$args['placeholder'].'">';
	}

	public function checkboxField( array $args ): void {
		$name = $args['name'];
		$option_name = $args['option_name'];
		$input = get_option( $option_name );
		$input = ( !empty( $input ) ) ? unserialize( $input ) : array();
		$is_checked = false;
		if( isset( $_POST['edit_post'] ) ){
			$is_checked = isset( $input[$_POST['edit_post']][$name] ) && intval( $input[$_POST['edit_post']][$name] ) === 1;
		}
		echo '<label class="switch"><input name="'.$option_name.'['.$name.']" id="'.$name.'" type="checkbox" '.( $is_checked ? 'checked' : '' ).'><span class="slider round"></span></label>';
	}

	public function cptManagerPage(): void {
		do_action( 'get_post_type_settings_admin_form' );
	}
}