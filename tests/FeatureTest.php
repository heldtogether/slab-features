<?php namespace Tests;


class FeatureTest extends TestCase {


	/**
	 * Can create a Feature
	 *
	 * @return void
	 */
	public function testCanCreateFeature() {

		$feature = new \Slab\Features\Feature();

		$this->assertInstanceOf('\Slab\Features\Feature', $feature);

	}


	/**
	 * Can check if a Feature is active
	 *
	 * @return void
	 */
	public function testCanCheckIfFeatureIsActive() {

		$feature = new \Slab\Features\Feature();

		$this->assertInstanceOf('\Slab\Features\FeatureInterface', $feature);

	}


	/**
	 * Feature is not active by default
	 *
	 * @return void
	 */
	public function testFeatureIsNotActiveByDefault() {

		$feature = new \Slab\Features\Feature();

		$this->assertFalse($feature->active());

	}


	/**
	 * Can set Feature as active
	 *
	 * @return void
	 */
	public function testCanSetFeatureAsActive() {

		$feature = new \Slab\Features\Feature();
		$feature->setActive(true);

		$this->assertTrue($feature->active());

	}


}
