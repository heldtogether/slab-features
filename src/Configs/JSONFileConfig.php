<?php

namespace Slab\Features\Configs;

use Slab\Features\Factory;
use Slab\Features\Interfaces\ConfigInterface;

/**
 * JSON File Config
 *
 * @package default
 * @author Josh Sephton
 */
class JSONFileConfig implements ConfigInterface {


	/**
	 * @var Slab\Features\Factory
	 */
	protected $factory;


	/**
	 * @var string
	 */
	protected $filename;


	/**
	 * Construct
	 *
	 * @param Slab\Features\Factory $factory
	 * @return void
	 */
	public function __construct(Factory $factory) {

		$this->factory = $factory;

	}


	/**
	 * Set the source file of the config
	 *
	 * @param string $filename
	 * @return void
	 */
	public function setFilename($filename) {

		$this->filename = $filename;

	}


	/**
	 * Return an array of rules
	 *
	 * @return array
	 */
	public function rules() {

		$rules = NULL;
		$json = NULL;

		$string = file_get_contents($this->filename);

		if ($string) {
			$json = json_decode($string, true);
		}

		if ($json) {

			$rules = array();

			foreach ($json as $name => $rule) {
				$rules[$name] = $this->factory->create($rule);
			}

		}

		return $rules;

	}


}
