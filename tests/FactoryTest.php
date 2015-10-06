<?php namespace Tests;

use Tests\TestCase;

class FactoryTest extends TestCase {


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

		$this->assertInstanceOf(
			'\Slab\Features\Types\BooleanFeature',
			$feature
		);

	}


	/**
	 * Can create True Boolean Feature from rule
	 *
	 * @return void
	 */
	public function testCanCreateTrueBooleanFeatureFromRule() {

		$rule = true;

		$factory = new \Slab\Features\Factory();

		$this->assertTrue($factory->create($rule)->active());

	}


	/**
	 * Can create False Boolean Feature from rule
	 *
	 * @return void
	 */
	public function testCanCreateFalseBooleanFeatureFromRule() {

		$rule = false;

		$factory = new \Slab\Features\Factory();

		$this->assertFalse($factory->create($rule)->active());

	}


	/**
	 * Can create Timed Feature from rule
	 *
	 * @return void
	 */
	public function testCanCreateTimedFeatureFromRule() {

		$rule = array(
			'type' => 'timed',
		);

		$factory = new \Slab\Features\Factory();
		$feature = $factory->create($rule);

		$this->assertInstanceOf(
			'\Slab\Features\Types\TimedFeature',
			$feature
		);

	}


	/**
	 * Can create Timed Feature with start time from rule
	 *
	 * @return void
	 */
	public function testCanCreateTimedFeatureWithStartTimeFromRule() {

		$rule = array(
			'type'       => 'timed',
			'start_time' => '2015-10-05 10:20:30',
		);

		$start_time = new \Carbon\Carbon($rule['start_time']);

		$factory = new \Slab\Features\Factory();
		$feature = $factory->create($rule);

		$this->assertEquals($start_time, $feature->startTime());

	}


	/**
	 * Can create Timed Feature with end time from rule
	 *
	 * @return void
	 */
	public function testCanCreateTimedFeatureWithEndTimeFromRule() {

		$rule = array(
			'type'     => 'timed',
			'end_time' => '2015-10-05 10:20:30',
		);

		$end_time = new \Carbon\Carbon($rule['end_time']);

		$factory = new \Slab\Features\Factory();
		$feature = $factory->create($rule);

		$this->assertEquals($end_time, $feature->endTime());

	}


}
