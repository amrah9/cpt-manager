<?php

namespace Rahda\CptManager\Api\Templates\Admin;

use Rahda\CptManager\Base\BaseController;

class generals extends BaseController
{
	public function getHeader()
	{
		$out = '<div class="my_cpt_settings_wrapper">';
		return $out;
	}

	public function getFooter()
	{
		$out = "</div>";
		return $out;
	}
}