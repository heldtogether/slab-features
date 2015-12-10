<?php namespace Tests\Configs;

use Tests\TestCase;

class JSONFileConfigTest extends TestCase {


	/**
	 * Can create Config
	 *
	 * @return void
	 */
	function testCanCreateConfig() {

		$factory = \Mockery::mock('\Venice\Factory');
		$filesystem = \Mockery::mock('League\Flysystem\Filesystem');

		$config = new \Venice\Configs\JSONFileConfig(
			$factory,
			$filesystem
		);

		$this->assertInstanceOf(
			'Venice\Interfaces\ConfigInterface',
			$config
		);

	}


	/**
	 * Can get features from Config
	 *
	 * @return void
	 */
	public function testCanGetFeaturesFromConfig() {

		$filename = '/test/filename.json';

		$rules = array(
			'feature-1' => true,
			'feature-2' => array(
				'type' => 'timed',
			),
		);

		$factory = \Mockery::mock('\Venice\Factory');
		$factory->shouldReceive('create')
		        ->with('feature-1', $rules['feature-1']);
		$factory->shouldReceive('create')
		        ->with('feature-2', $rules['feature-2']);

		$filesystem = \Mockery::mock('League\Flysystem\Filesystem');
		$filesystem->shouldReceive('read')
		           ->once()
		           ->with($filename)
		           ->andReturn(json_encode($rules));

		$config = new \Venice\Configs\JSONFileConfig(
			$factory,
			$filesystem
		);
		$config->setFilename($filename);

		$config->rules();

	}


}
