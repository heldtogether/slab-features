<?php namespace Tests;


class TimedFeatureTest extends TestCase {


	/**
	 * Set up the tests
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		date_default_timezone_set('UTC');
	}


	/**
	 * Can create a Feature
	 *
	 * @return void
	 */
	public function testCanCreateFeature() {

		$feature = new \Slab\Features\TimedFeature();

		$this->assertInstanceOf('\Slab\Features\TimedFeature', $feature);

	}


	/**
	 * Can check if a Feature is active
	 *
	 * @return void
	 */
	public function testCanCheckIfFeatureIsActive() {

		$feature = new \Slab\Features\TimedFeature();

		$this->assertInstanceOf('\Slab\Features\FeatureInterface', $feature);

	}


	/**
	 * Feature is not active by default
	 *
	 * @return void
	 */
	public function testFeatureIsNotActiveByDefault() {

		$feature = new \Slab\Features\TimedFeature();

		$this->assertFalse($feature->active());

	}


	/**
	 * Can set time the Feature should become active
	 *
	 * @return void
	 */
	public function testCanSetTimeFeatureBecomesActive() {

		$start_time = '2015-10-03 00:00:00';

		$feature = new \Slab\Features\TimedFeature();
		$feature->setStartTime($start_time);

		$this->assertEquals($start_time, $feature->startTime());

	}


	/**
	 * Cannot set invalid time as Feature start time
	 *
	 * @return void
	 */
	public function testCannotSetInvalidTimeAsFeatureStartTime() {

		$start_time = 'fbneiowbfiuoebufew';

		$this->setExpectedException('\Slab\Features\InvalidArgumentException');

		$feature = new \Slab\Features\TimedFeature();
		$feature->setStartTime($start_time);

	}


	/**
	 * Can set time the Feature should become inactive
	 *
	 * @return void
	 */
	public function testCanSetTimeFeatureBecomesInactive() {

		$end_time = '2015-10-03 00:00:00';

		$feature = new \Slab\Features\TimedFeature();
		$feature->setEndTime($end_time);

		$this->assertEquals($end_time, $feature->endTime());

	}


	/**
	 * Cannot set invalid time as Feature end time
	 *
	 * @return void
	 */
	public function testCannotSetInvalidTimeAsFeatureEndTime() {

		$end_time = 'fbneiowbfiuoebufew';

		$this->setExpectedException('\Slab\Features\InvalidArgumentException');

		$feature = new \Slab\Features\TimedFeature();
		$feature->setEndTime($end_time);

	}


}
