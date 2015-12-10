<?php namespace Tests;

use Tests\TestCase;

/**
 * Feature Factory Tests
 *
 * @package default
 * @author Josh Sephton
 */
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

		$factory = new \Venice\Factory();

		$this->assertInstanceOf('\Venice\Factory', $factory);

	}


	/**
	 * Can create Boolean Feature from rule
	 *
	 * @return void
	 */
	public function testCanCreateBooleanFeatureFromRule() {

		$rule = true;

		$factory = new \Venice\Factory();
		$feature = $factory->create('experiment-1', $rule);

		$this->assertInstanceOf(
			'\Venice\Types\BooleanFeature',
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

		$factory = new \Venice\Factory();
		$feature = $factory->create('experiment-1', $rule);

		$this->assertTrue($feature->active());

	}


	/**
	 * Can create False Boolean Feature from rule
	 *
	 * @return void
	 */
	public function testCanCreateFalseBooleanFeatureFromRule() {

		$rule = false;

		$factory = new \Venice\Factory();
		$feature = $factory->create('experiment-1', $rule);

		$this->assertFalse($feature->active());

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

		$factory = new \Venice\Factory();
		$feature = $factory->create('experiment-1', $rule);

		$this->assertInstanceOf(
			'\Venice\Types\TimedFeature',
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

		$factory = new \Venice\Factory();
		$feature = $factory->create('experiment-1', $rule);

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

		$factory = new \Venice\Factory();
		$feature = $factory->create('experiment-1', $rule);

		$this->assertEquals($end_time, $feature->endTime());

	}


}
