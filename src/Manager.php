<?php

namespace Slab\Features;

use Slab\Core\Util\SingletonTrait;

class Manager {


	use SingletonTrait;


	/**
	 * @var Slab\Features\Config
	 */
	protected $config;


	/**
	 * @var bool
	 */
	protected $loaded_config;


	/**
	 * @var array
	 */
	protected $features;


	/**
	 * Construct
	 *
	 * @param Slab\Features\Interfaces\ConfigInterface $config
	 * @return void
	 */
	public function __construct(Interfaces\ConfigInterface $config = NULL) {

		$this->config = $config;
		$this->loaded_config = false;

	}


	/**
	 * Get a named Feature
	 *
	 * @param string $name
	 * @return Slab\Features\Interfaces\FeatureInterface $feature
	 */
	public function get($name) {

		if (!is_string($name)) {
			throw new Exceptions\InvalidArgumentException();
		}

		$this->loadConfig();

		if (isset($this->features[$name])) {
			return $this->features[$name];
		} else {
			throw new Exceptions\UnexpectedValueException();
		}

	}


	/**
	 * Set a named Feature
	 *
	 * @param string $name
	 * @param Slab\Features\Interfaces\FeatureInterface $feature
	 */
	public function set($name, Interfaces\FeatureInterface $feature) {

		if (!is_string($name)) {
			throw new Exceptions\InvalidArgumentException();
		}

		$this->loadConfig();

		$this->features[$name] = $feature;

	}


	/**
	 * Load config
	 *
	 * @return void
	 */
	protected function loadConfig() {

		if ($this->config && !$this->loaded_config) {

			$this->loaded_config = true;

			$rules = $this->config->rules();

			if ($rules) {

				foreach ($rules as $name => $rule) {

					$this->set($name, $rule);

				}

			}

		}

	}


}
