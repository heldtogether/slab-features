<?php namespace Tests;


class ManagerTest extends TestCase {


	/**
	 * Can get Manager instance
	 *
	 * @return void
	 */
	public function testCanGetManagerInstance() {

		$manager = new \Slab\Features\Manager();

		$this->assertInstanceOf('\Slab\Features\Manager', $manager);

	}


	/**
	 * Manager is singleton
	 *
	 * @return void
	 */
	public function testManagerIsSingleton() {

		$manager = \Slab\Features\Manager::instance();

		$this->assertInstanceOf('\Slab\Features\Manager', $manager);

	}


	/**
	 * Can get a Feature from Manager
	 *
	 * @return void
	 */
	public function testCanGetFeatureFromManager() {

		$feature_name = 'test-feature';

		$this->setExpectedException('\Slab\Features\UnexpectedValueException');

		$manager = new \Slab\Features\Manager();

		$manager->get($feature_name);

	}


	/**
	 * Can set a named Feature
	 *
	 * @return void
	 */
	public function testCanSetANamedFeature() {

		$feature_name = 'test-feature';

		$feature = \Mockery::mock('\Slab\Features\FeatureInterface');

		$manager = new \Slab\Features\Manager();
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

		$feature = \Mockery::mock('\Slab\Features\FeatureInterface');

		$config = \Mockery::mock('\Slab\Features\ConfigInterface');
		$config->shouldReceive('rules')->once();

		$manager = new \Slab\Features\Manager($config);
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
		$feature = \Mockery::mock('\Slab\Features\FeatureInterface');
		$rules = [
			$feature_name => $feature,
		];

		$config = \Mockery::mock('\Slab\Features\ConfigInterface');
		$config->shouldReceive('rules')->once()->andReturn($rules);

		$manager = new \Slab\Features\Manager($config);

		$this->assertEquals($manager->get($feature_name), $feature);

	}


}
