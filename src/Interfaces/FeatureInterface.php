<?php

namespace Slab\Features\Interfaces;

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


}
