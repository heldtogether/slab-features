<?php

namespace Slab\Features;

use Slab\Core\Util\SingletonTrait;

class Manager {


	use SingletonTrait;


	/**
	 * @var array
	 */
	protected $features;


	/**
	 * Get a named Feature
	 *
	 * @param string $name
	 * @return Slab\Features\FeatureInterface $feature
	 */
	public function get($name) {

		if (!is_string($name)) {
			throw new InvalidArgumentException();
		}

		if (isset($this->features[$name])) {
			return $this->features[$name];
		} else {
			throw new UnexpectedValueException();
		}

	}


	/**
	 * Set a named Feature
	 *
	 * @param string $name
	 * @param Slab\Features\FeatureInterface $feature
	 */
	public function set($name, FeatureInterface $feature) {

		if (!is_string($name)) {
			throw new InvalidArgumentException();
		}

		$this->features[$name] = $feature;

	}


}
