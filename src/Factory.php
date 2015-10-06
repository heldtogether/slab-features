<?php

namespace Slab\Features;

class Factory {


	/**
	 * @var array
	 */
	protected $types = array(
		'timed' => '\Slab\Features\TimedFeature',
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
			$feature->setActive($rule);

		} else if ($rule['type'] && isset($this->types[$rule['type']])) {

			$class = $this->types[$rule['type']];
			$feature = new $class($rule);

		}

		return $feature;

	}


}
