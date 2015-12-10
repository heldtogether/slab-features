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
	 * @param bool $rule
	 * @return void
	 */
	public function __construct() {

		$this->setActive(false);

	}

	/**
	 * Apply the rule to the feature
	 *
	 * @param array $rule
	 * @return void
	 */
	public function applyRule($rule = false) {

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
