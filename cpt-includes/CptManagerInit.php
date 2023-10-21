<?php

namespace Rahda\CptManager;

use Rahda\CptManager\Api\Actions;
use Rahda\CptManager\Base\Enqueue;
use Rahda\CptManager\Pages\Dashboard;

final class CptManagerInit
{
	public static function get_services(): array {
		return [
			Dashboard::class,
			Enqueue::class,
			Actions::class
		];
	}

	public static function register_services(): void {
		foreach ( self::get_services() as $class ){
			$service = new $class;
			if( method_exists( $service, 'register' ) )
			{
				$service->register();
			}
		}
	}
}