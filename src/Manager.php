<?php

namespace Venice;

use Venice\Interfaces\ConfigInterface;

/**
 * Feature Manager
 *
 * @package default
 * @author Josh Sephton
 */
class Manager {


	/**
	 * @var array
	 */
	protected $configs;


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
	 * @return void
	 */
	public function __construct() {

		$this->configs = [];
		$this->loaded_config = true;
		$this->features = [];

	}


	/**
	 * Add a config
	 *
	 * @param Venice\Interfaces\ConfigInterface $config
	 * @return void
	 */
	public function addConfig(ConfigInterface $config = NULL) {

		$this->configs[] = $config;
		$this->loaded_config = false;

	}


	/**
	 * Get a named Feature
	 *
	 * @param string $name
	 * @return Venice\Interfaces\FeatureInterface $feature
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
	 * @param Venice\Interfaces\FeatureInterface $feature
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

		if ($this->configs && !$this->loaded_config) {

			$this->loaded_config = true;

			$rules = [];

			foreach ($this->configs as $config) {
				$rules = array_merge($rules, $config->rules());
			}

			if ($rules) {
				foreach ($rules as $name => $rule) {
					$this->set($name, $rule);
				}
			}

		}

	}


}
