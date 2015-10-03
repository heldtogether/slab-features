<?php

namespace Slab\Features;

/**
 * Timed Feature class
 *
 * @package default
 * @author Josh Sephton
 */
class TimedFeature implements FeatureInterface {


	/**
	 * @var mixed
	 */
	protected $start_time;


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
	 * @return mixed
	 */
	public function startTime() {

		return $this->start_time;

	}


	/**
	 * Set the time the Feature should be active
	 *
	 * @param mixed $start_time
	 * @return void
	 */
	public function setStartTime($start_time) {

		$this->start_time = $start_time;

	}


}
