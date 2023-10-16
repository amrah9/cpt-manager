<?php

namespace Rahda\CptManager\Api\Callbacks;

use Rahda\CptManager\Base\BaseController;

class CPTCallback extends BaseController
{
	public function cptManagerPage(): void {
		echo $this->plugin_dir.'<br />';
		echo $this->plugin_url.'<br />';
		echo 'cpt-manager/cpt-manager.php';
		var_dump( $this->is_plugin_active );
		echo 'Manage CPT';
	}
}