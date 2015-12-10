<?php

namespace Venice\Configs;

use League\Flysystem\Filesystem;
use Venice\Factory;
use Venice\Interfaces\ConfigInterface;

/**
 * JSON File Config
 *
 * @package default
 * @author Josh Sephton
 */
class JSONFileConfig implements ConfigInterface {


	/**
	 * @var Venice\Factory
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
	 * @param Venice\Factory $factory
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

			foreach ($json as $experiment => $rule) {
				$rules[$experiment] = $this->factory->create(
					$experiment,
					$rule
				);
			}

		}

		return $rules;

	}


}
