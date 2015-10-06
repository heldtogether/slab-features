<?php

namespace Slab\Features;

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
	public function __construct($rule = false) {

		$this->setActive($rule);

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
