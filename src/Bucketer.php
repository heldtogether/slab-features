<?php

namespace Venice;

use Venice\Interfaces\SessionInterface;

/**
 * Bucketer class
 *
 * @package default
 * @author Josh Sephton
 */
class Bucketer {


	/**
	 * @var string
	 */
	protected $experiment;

	/**
	 * @var array
	 */
	protected $variants;

	/**
	 * Venice\Interfaces\SessionInterface
	 */
	protected $session;


	/**
	 * Construct
	 *
	 * @param string $experiment
	 * @param array $variants
	 * @param Venice\Interfaces\SessionInterface $session
	 * @return void
	 */
	public function __construct(
		$experiment,
		array $variants,
		SessionInterface $session
	) {

		$this->experiment = $experiment;
		$this->variants = $variants;
		$this->session = $session;

	}


	public function variant() {

		return $this->session->variant($this->experiment);

	}


}
