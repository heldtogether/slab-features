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
	 * Constuct
	 *
	 * @param array $rule
	 * @return void
	 */
	public function __construct($rule = false) {

		if (isset($rule['start_time'])) {

			$this->setStartTime($rule['start_time']);

		}

		if (isset($rule['end_time'])) {

			$this->setEndTime($rule['end_time']);

		}

	}


	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active() {

		$now = new Carbon();

		if ($this->start_time && $this->end_time) {
			return ($now->gte($this->start_time) && $now->lte($this->end_time));
		} else if ($this->start_time) {
			return $now->gte($this->start_time);
		} else if ($this->end_time) {
			return $now->lte($this->end_time);
		} else {
			return true;
		}

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

		$this->start_time = $date;

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

		$this->end_time = $date;

	}


}
