<?php namespace Tests\Types;

use Carbon\Carbon;
use Tests\TestCase;

/**
 * Variant Feature Tests
 *
 * @package default
 * @author Josh Sephton
 */
class VariantFeatureTest extends TestCase {


	/**
	 * Set up the tests
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
	}


	/**
	 * Can create a Feature
	 *
	 * @return void
	 */
	public function testCanCreateFeature() {

		$bucketer = \Mockery::mock('\Venice\Interfaces\BucketerInterface');

		$feature = new \Venice\Types\VariantFeature($bucketer);

		$this->assertInstanceOf(
			'\Venice\Types\VariantFeature',
			$feature
		);

	}


	/**
	 * Can check if a Feature is active
	 *
	 * @return void
	 */
	public function testCanCheckIfFeatureIsActive() {

		$bucketer = \Mockery::mock('\Venice\Interfaces\BucketerInterface');

		$feature = new \Venice\Types\VariantFeature($bucketer);

		$this->assertInstanceOf(
			'\Venice\Interfaces\FeatureInterface',
			$feature
		);

	}


	/**
	 * Requests the variant from the Bucketer
	 *
	 * @return void
	 */
	public function testRequestsVariantFromBucketer() {

		$variant = 'control';

		$bucketer = \Mockery::mock('\Venice\Interfaces\BucketerInterface');
		$bucketer->shouldReceive('variant')->once()->andReturn($variant);

		$feature = new \Venice\Types\VariantFeature($bucketer);

		$this->assertEquals($feature->variant(), $variant);

	}


}
