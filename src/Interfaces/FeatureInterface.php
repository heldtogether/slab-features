<?php

namespace Venice\Interfaces;

/**
 * Feature Interface
 *
 * @package default
 * @author Josh Sephton
 */
interface FeatureInterface {


	/**
	 * Apply the rule to the feature
	 *
	 * @param string $experiment
	 * @param array $rule
	 * @return void
	 */
	public function applyRule($experiment, $rule);


	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active();


}
