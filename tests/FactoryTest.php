<?php namespace Tests;


class FactoryTest extends TestCase {


	/**
	 * Can create Factory instance
	 *
	 * @return void
	 */
	public function testCanCreateFactory() {

		$factory = new \Slab\Features\Factory();

		$this->assertInstanceOf('\Slab\Features\Factory', $factory);

	}


	/**
	 * Can create Boolean Feature from rule
	 *
	 * @return void
	 */
	public function testCanCreateBooleanFeatureFromRule() {

		$rule = true;

		$factory = new \Slab\Features\Factory();
		$feature = $factory->create($rule);

		$this->assertInstanceOf('\Slab\Features\BooleanFeature', $feature);

	}


}
