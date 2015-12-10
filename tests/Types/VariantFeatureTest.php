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

		$feature = new \Venice\Types\VariantFeature();

		$this->assertInstanceOf(
			'\Venice\Types\VariantFeature',
			$feature
		);

	}


}
