<?php namespace Tests;

use Carbon\Carbon;

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

		$feature = new \Slab\Features\Types\TimedFeature();

		$this->assertInstanceOf(
			'\Slab\Features\Types\TimedFeature',
			$feature
		);

	}


	/**
	 * Can check if a Feature is active
	 *
	 * @return void
	 */
	public function testCanCheckIfFeatureIsActive() {

		$feature = new \Slab\Features\Types\TimedFeature();

		$this->assertInstanceOf(
			'\Slab\Features\Interfaces\FeatureInterface',
			$feature
		);

	}


	/**
	 * Feature is active by default
	 *
	 * @return void
	 */
	public function testFeatureIsNotActiveByDefault() {

		$feature = new \Slab\Features\Types\TimedFeature();

		$this->assertTrue($feature->active());

	}


	/**
	 * Can set time the Feature should become active
	 *
	 * @return void
	 */
	public function testCanSetTimeFeatureBecomesActive() {

		$start_time = '2015-10-03 00:00:00';

		$feature = new \Slab\Features\Types\TimedFeature();
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

		$this->setExpectedException(
			'\Slab\Features\Exceptions\InvalidArgumentException'
		);

		$feature = new \Slab\Features\Types\TimedFeature();
		$feature->setStartTime($start_time);

	}


	/**
	 * Can set time the Feature should become inactive
	 *
	 * @return void
	 */
	public function testCanSetTimeFeatureBecomesInactive() {

		$end_time = '2015-10-03 00:00:00';

		$feature = new \Slab\Features\Types\TimedFeature();
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

		$this->setExpectedException(
			'\Slab\Features\Exceptions\InvalidArgumentException'
		);

		$feature = new \Slab\Features\Types\TimedFeature();
		$feature->setEndTime($end_time);

	}


	/**
	 * Feature is inactive before start date
	 *
	 * @return void
	 */
	public function testFeatureIsInactiveBeforeStartTime() {

		$knownDate = Carbon::create(2015, 10, 03);
		Carbon::setTestNow($knownDate);

		$start_time = '2020-01-01 00:00:00';

		$feature = new \Slab\Features\Types\TimedFeature();
		$feature->setStartTime($start_time);

		$this->assertFalse($feature->active());

	}


	/**
	 * Feature is active after start date
	 *
	 * @return void
	 */
	public function testFeatureIsActiveAfterStartTime() {

		$knownDate = Carbon::create(2015, 10, 03);
		Carbon::setTestNow($knownDate);

		$start_time = '1970-01-01 00:00:00';

		$feature = new \Slab\Features\Types\TimedFeature();
		$feature->setStartTime($start_time);

		$this->assertTrue($feature->active());

	}


	/**
	 * Feature is active before end date
	 *
	 * @return void
	 */
	public function testFeatureIsActiveBeforeEndTime() {

		$knownDate = Carbon::create(2015, 10, 03);
		Carbon::setTestNow($knownDate);

		$end_time = '2020-01-01 00:00:00';

		$feature = new \Slab\Features\Types\TimedFeature();
		$feature->setEndTime($end_time);

		$this->assertTrue($feature->active());

	}


	/**
	 * Feature is inactive after end date
	 *
	 * @return void
	 */
	public function testFeatureIsInactiveAfterEndTime() {

		$knownDate = Carbon::create(2015, 10, 03);
		Carbon::setTestNow($knownDate);

		$end_time = '1970-01-01 00:00:00';

		$feature = new \Slab\Features\Types\TimedFeature();
		$feature->setEndTime($end_time);

		$this->assertFalse($feature->active());

	}


	/**
	 * Feature is inactive, then active, then inactive
	 *
	 * @return void
	 */
	public function testFeatureIsInactiveThenActiveThenInactive() {

		$start_time = '2015-10-04 00:00:00';
		$end_time = '2015-10-06 00:00:00';

		$feature = new \Slab\Features\Types\TimedFeature();
		$feature->setStartTime($start_time);
		$feature->setEndTime($end_time);

		$knownDate = Carbon::create(2015, 10, 03);
		Carbon::setTestNow($knownDate);

		$this->assertFalse($feature->active());

		$knownDate = Carbon::create(2015, 10, 05);
		Carbon::setTestNow($knownDate);

		$this->assertTrue($feature->active());

		$knownDate = Carbon::create(2015, 10, 07);
		Carbon::setTestNow($knownDate);

		$this->assertFalse($feature->active());

	}


}
