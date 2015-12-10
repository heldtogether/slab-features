<?php

namespace Venice\Interfaces;

/**
 * Session Interface
 *
 * @package default
 * @author Josh Sephton
 */
interface SessionInterface {


	/**
	 * Get the variant for the given experiment from
	 * the session
	 *
	 * @param string $experiment
	 * @return string
	 */
	public function variant($experiment);


	/**
	 * Set the variant for the given experiment
	 *
	 * @param string $experiment
	 * @param string $variant
	 * @return void
	 */
	public function setVariant($experiment, $variant);


}
