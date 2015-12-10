<?php

namespace Venice\Types;

use Venice\Interfaces\BucketerInterface;
use Venice\Interfaces\FeatureInterface;

/**
 * Variant Feature class
 *
 * @package default
 * @author Josh Sephton
 */
class VariantFeature implements FeatureInterface {


	/**
	 * @var Venice\Interfaces\BucketerInterface
	 */
	protected $bucketer;


	/**
	 * Construct
	 *
	 * @param Venice\Interfaces\BucketerInterface $bucketer
	 * @return void
	 */
	public function __construct(BucketerInterface $bucketer) {

		$this->bucketer = $bucketer;

	}


	/**
	 * Check if the Feature is active
	 *
	 * @return bool
	 */
	public function active() {

		return true;

	}


	public function variant() {

		return $this->bucketer->variant();

	}


}
