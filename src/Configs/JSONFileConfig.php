<?php

namespace Slab\Features\Configs;

use League\Flysystem\Filesystem;
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
	 * @var League\Flysystem\Filesystem
	 */
	protected $filesystem;


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
	public function __construct(Factory $factory, Filesystem $filesystem) {

		$this->factory = $factory;
		$this->filesystem = $filesystem;

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

		$string = $this->filesystem->read($this->filename);

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
