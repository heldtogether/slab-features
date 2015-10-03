<?php namespace Tests;


class ManagerTest extends TestCase {


	/**
	 * Can get Manager instance
	 *
	 * @return void
	 */
	public function testCanGetManagerInstance() {

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

		$manager = \Slab\Features\Manager::instance();

		$manager->get($feature_name);

	}


}
