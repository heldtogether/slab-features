<?php

namespace Venice;

use Venice\Types\BooleanFeature;

/**
 * Feature Factory
 *
 * @package default
 * @author Josh Sephton
 */
class Factory {


	/**
	 * @var array
	 */
	protected $types = array(
		'timed' => '\Venice\Types\TimedFeature',
		'variant' => '\Venice\Types\VariantFeature',
	);


	/**
	 * Create a new Feature
	 *
	 * The rule should be like:
	 *
	 * $rule = array(
	 *   'type'   => $type,
	 *   'param1' => ...,
	 * );
	 *
	 * @param mixed $data
	 * @return Venice\FeatureInterface
	 */
	public function create($rule) {

		$feature = NULL;

		if (is_bool($rule)) {

			$feature = new BooleanFeature();
			$feature->applyRule($rule);

		} else if ($rule['type'] && isset($this->types[$rule['type']])) {

			$class = $this->types[$rule['type']];
			$feature = new $class();
			$feature->applyRule($rule);

		}

		return $feature;

	}


}
