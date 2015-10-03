<?php

namespace Slab\Features;

use Carbon\Carbon;

/**
 * Timed Feature class
 *
 * @package default
 * @author Josh Sephton
 */
class TimedFeature implements FeatureInterface {


	/**
	 * @var Carbon\Carbon
	 */
	protected $start_time;


	/**
	 * @var Carbon\Carbon
	 */
	protected $end_time;


	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active() {

		return false;

	}


	/**
	 * Get the start time of the Feature
	 *
	 * @return Carbon\Carbon
	 */
	public function startTime() {

		return $this->start_time;

	}


	/**
	 * Set the time the Feature should be active
	 *
	 * @param string $start_time
	 * @return void
	 */
	public function setStartTime($start_time) {

		try {
			$date = new Carbon($start_time);
		} catch (\Exception $e) {
			throw new InvalidArgumentException();
		}

		$this->start_time = $start_time;

	}


	/**
	 * Get the end time of the Feature
	 *
	 * @return Carbon\Carbon
	 */
	public function endTime() {

		return $this->end_time;

	}


	/**
	 * Set the time the Feature should become inactive
	 *
	 * @param string $end_time
	 * @return void
	 */
	public function setEndTime($end_time) {

		try {
			$date = new Carbon($end_time);
		} catch (\Exception $e) {
			throw new InvalidArgumentException();
		}

		$this->end_time = $end_time;

	}


}
