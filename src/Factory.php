<?php

namespace Slab\Features;

use Slab\Features\Types\BooleanFeature;

class Factory {


	/**
	 * @var array
	 */
	protected $types = array(
		'timed' => '\Slab\Features\Types\TimedFeature',
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
	 * @return Slab\Features\FeatureInterface
	 */
	public function create($rule) {

		$feature = NULL;

		if (is_bool($rule)) {

			$feature = new BooleanFeature($rule);

		} else if ($rule['type'] && isset($this->types[$rule['type']])) {

			$class = $this->types[$rule['type']];
			$feature = new $class($rule);

		}

		return $feature;

	}


}
