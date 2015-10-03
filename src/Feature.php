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
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active() {

		return false;

	}


}
