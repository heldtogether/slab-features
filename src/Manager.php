<?php

namespace Slab\Features;

use Slab\Core\Util\SingletonTrait;

class Manager {


	use SingletonTrait;


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

		throw new UnexpectedValueException();

	}


}
