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


}
