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


}
