<?php

namespace Venice\Types;

use Venice\Bucketer;
use Venice\Interfaces\FeatureInterface;

/**
 * Variant Feature class
 *
 * @package default
 * @author Josh Sephton
 */
class VariantFeature implements FeatureInterface {


	/**
	 * @var Venice\Bucketer
	 */
	protected $bucketer;


	/**
	 * Construct
	 *
	 * @param Venice\Bucketer $bucketer
	 * @return void
	 */
	public function __construct(Bucketer $bucketer) {

		$this->bucketer = $bucketer;

	}


	/**
	 * Apply the rule to the feature
	 *
	 * @param array $rule
	 * @return void
	 */
	public function applyRule($rule) {

		//

	}


	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active() {

		return true;

	}


	/**
	 * Get the variant for the current session.
	 *
	 * @return string
	 */
	public function variant($experiment, array $variants) {

		return $this->bucketer->variant($experiment, $variants);

	}


}
