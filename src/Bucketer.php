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
	 * Venice\Interfaces\SessionInterface
	 */
	protected $session;


	/**
	 * Construct
	 *
	 * @param Venice\Interfaces\SessionInterface $session
	 * @return void
	 */
	public function __construct(SessionInterface $session) {

		$this->session = $session;

	}


	/**
	 * Determine the variant
	 *
	 * @return string
	 */
	public function variant($experiment, array $variants) {

		$variant = $this->session->variant($experiment);

		if (!$variant) {
			$limit = count($variants);
			$index = mt_rand(0, $limit-1);
			$variant = $variants[$index];

			$this->session->setVariant($experiment, $variant);
		}

		return $variant;

	}


}
