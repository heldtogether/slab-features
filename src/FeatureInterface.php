<?php

namespace Slab\Features;

/**
 * Feature Interface
 *
 * @package default
 * @author Josh Sephton
 */
interface FeatureInterface {


	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active();


	/**
	 * Set the active state of the feature
	 *
	 * @param bool $active
	 * @return void
	 */
	public function setActive($active);


}
