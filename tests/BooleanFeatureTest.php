<?php namespace Tests;


class BooleanFeatureTest extends TestCase {


	/**
	 * Can create a Feature
	 *
	 * @return void
	 */
	public function testCanCreateFeature() {

		$feature = new \Slab\Features\BooleanFeature();

		$this->assertInstanceOf('\Slab\Features\BooleanFeature', $feature);

	}


	/**
	 * Can check if a Feature is active
	 *
	 * @return void
	 */
	public function testCanCheckIfFeatureIsActive() {

		$feature = new \Slab\Features\BooleanFeature();

		$this->assertInstanceOf('\Slab\Features\FeatureInterface', $feature);

	}


	/**
	 * Feature is not active by default
	 *
	 * @return void
	 */
	public function testFeatureIsNotActiveByDefault() {

		$feature = new \Slab\Features\BooleanFeature();

		$this->assertFalse($feature->active());

	}


	/**
	 * Can set Feature as active
	 *
	 * @return void
	 */
	public function testCanSetFeatureAsActive() {

		$feature = new \Slab\Features\BooleanFeature();
		$feature->setActive(true);

		$this->assertTrue($feature->active());

	}


}
