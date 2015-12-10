<?php

namespace Venice\Types;

use Venice\Interfaces\FeatureInterface;

/**
 * Boolean Feature class
 *
 * @package default
 * @author Josh Sephton
 */
class BooleanFeature implements FeatureInterface {


	/**
	 * @var bool
	 */
	protected $active;


	/**
	 * Constuct
	 *
	 * @return void
	 */
	public function __construct() {

		$this->setActive(false);

	}

	/**
	 * Apply the rule to the feature
	 *
	 * @param string $experiment
	 * @param array $rule
	 * @return void
	 */
	public function applyRule($experiment, $rule) {

		$this->active = $rule;

	}


	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active() {

		return $this->active;

	}


	/**
	 * Set the active state of the feature
	 *
	 * @param bool $active
	 * @return void
	 */
	public function setActive($active) {

		$this->active = $active;

	}


}
