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


	/**
	 * Can get features from Config
	 *
	 * @return void
	 */
	public function testCanGetFeaturesFromConfig() {

		$factory = \Mockery::mock('\Slab\Features\Factory');

		$config = new \Slab\Features\Configs\JSONFileConfig($factory);
		$config->setFilename('filename');

		/**
		 * Find way of substituting mock `file_get_contents()` function.
		 */

	}


}
