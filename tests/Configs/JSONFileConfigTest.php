<?php namespace Tests\Configs;

use Tests\TestCase;

class JSONFileConfigTest extends TestCase {


	/**
	 * Can create Config
	 *
	 * @return void
	 */
	function testCanCreateConfig() {

		$factory = \Mockery::mock('\Slab\Features\Factory');

		$config = new \Slab\Features\Configs\JSONFileConfig($factory);

		$this->assertInstanceOf(
			'Slab\Features\Interfaces\ConfigInterface',
			$config
		);

	}


}
