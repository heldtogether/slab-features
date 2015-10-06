<?php

namespace Slab\Features;

class JSONFileConfig implements ConfigInterface {


	/**
	 * @var string
	 */
	protected $filename;


	/**
	 * Construct
	 *
	 * @param string $filename
	 * @return void
	 */
	public function __construct($filename) {

		$this->filename = $filename;

	}


	/**
	 * Return an array of rules
	 *
	 * @return array
	 */
	public function rules() {

		$rules = NULL;

		$string = file_get_contents($this->filename);

		if ($string) {

			$rules = json_decode($string, true);

		}

		return $rules;

	}


}
