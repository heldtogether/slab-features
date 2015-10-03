<?php

namespace Slab\Features;

/**
 * Basic Feature class
 *
 * @package default
 * @author Josh Sephton
 */
class Feature implements FeatureInterface {


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
