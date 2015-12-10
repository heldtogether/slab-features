<?php

namespace Tests\Types;

use Tests\TestCase;

/**
 * Boolean Feature Tests
 *
 * @package default
 * @author Josh Sephton
 */
class BooleanFeatureTest extends TestCase {


	/**
	 * Can create a Feature
	 *
	 * @return void
	 */
	public function testCanCreateFeature() {

		$feature = new \Venice\Types\BooleanFeature();

		$this->assertInstanceOf(
			'\Venice\Types\BooleanFeature',
			$feature
		);

	}


	/**
	 * Can check if a Feature is active
	 *
	 * @return void
	 */
	public function testCanCheckIfFeatureIsActive() {

		$feature = new \Venice\Types\BooleanFeature();

		$this->assertInstanceOf(
			'\Venice\Interfaces\FeatureInterface',
			$feature
		);

	}


	/**
	 * Feature is not active by default
	 *
	 * @return void
	 */
	public function testFeatureIsNotActiveByDefault() {

		$feature = new \Venice\Types\BooleanFeature();

		$this->assertFalse($feature->active());

	}


	/**
	 * Can set Feature as active
	 *
	 * @return void
	 */
	public function testCanSetFeatureAsActive() {

		$feature = new \Venice\Types\BooleanFeature();
		$feature->setActive(true);

		$this->assertTrue($feature->active());

	}


}
