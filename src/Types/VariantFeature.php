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
	 * @var string @experiment
	 */
	protected $experiment;


	/**
	 * @var array $variants
	 */
	protected $rules;


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
	 * @param string $experiment
	 * @param array $rule
	 * @return void
	 */
	public function applyRule($experiment, $rule) {

		$this->experiment = $experiment;

		if (isset($rule['variants'])) {
			$this->variants = $rule['variants'];
		}

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
	public function variant() {

		return $this->bucketer->variant($this->experiment, $this->variants);

	}


}
