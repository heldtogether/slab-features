<?php

namespace Venice\Types;

use Venice\Interfaces\FeatureInterface;

/**
 * Variant Feature class
 *
 * @package default
 * @author Josh Sephton
 */
class VariantFeature implements FeatureInterface {


	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active() {

		return true;

	}


}
