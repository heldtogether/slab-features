<?php namespace Tests;

use Tests\TestCase;

/**
 * Feature Manager Tests
 *
 * @package default
 * @author Josh Sephton
 */
class ManagerTest extends TestCase {


	/**
	 * Can get Manager instance
	 *
	 * @return void
	 */
	public function testCanGetManagerInstance() {

		$manager = new \Venice\Manager();

		$this->assertInstanceOf('\Venice\Manager', $manager);

	}


	/**
	 * Can get a Feature from Manager
	 *
	 * @return void
	 */
	public function testCanGetFeatureFromManager() {

		$feature_name = 'test-feature';

		$this->setExpectedException(
			'\Venice\Exceptions\UnexpectedValueException'
		);

		$manager = new \Venice\Manager();

		$manager->get($feature_name);

	}


	/**
	 * Can set a named Feature
	 *
	 * @return void
	 */
	public function testCanSetANamedFeature() {

		$feature_name = 'test-feature';

		$feature = \Mockery::mock('\Venice\Interfaces\FeatureInterface');

		$manager = new \Venice\Manager();
		$manager->set($feature_name, $feature);

		$this->assertEquals($feature, $manager->get($feature_name));

	}


	/**
	 * Manager loads Config if provided
	 *
	 * @return void
	 */
	public function testManagerLoadsConfigIfProvided() {

		$feature_name = 'test-feature';

		$feature = \Mockery::mock('\Venice\Interfaces\FeatureInterface');

		$config = \Mockery::mock('\Venice\Interfaces\ConfigInterface');
		$config->shouldReceive('rules')->once()->andReturn([]);

		$manager = new \Venice\Manager();
		$manager->addConfig($config);
		$manager->set($feature_name, $feature);
		$manager->get($feature_name);

	}


	/**
	 * Manager sets Feature from Config
	 *
	 * @return void
	 */
	public function testManagerSetsFeatureFromConfig() {

		$feature_name = 'test-feature';
		$feature = \Mockery::mock('\Venice\Interfaces\FeatureInterface');
		$rules = [
			$feature_name => $feature,
		];

		$config = \Mockery::mock('\Venice\Interfaces\ConfigInterface');
		$config->shouldReceive('rules')->once()->andReturn($rules);

		$manager = new \Venice\Manager();
		$manager->addConfig($config);

		$this->assertEquals($manager->get($feature_name), $feature);

	}


}
