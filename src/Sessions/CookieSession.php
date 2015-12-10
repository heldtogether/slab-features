<?php

namespace Venice\Sessions;

use Venice\Interfaces\SessionInterface;

/**
 * Cookie Session class
 *
 * @package default
 * @author Josh Sephton
 */
class CookieSession implements SessionInterface {


	/**
	 * Get the variant for the given experiment from
	 * the session
	 *
	 * @param string $experiment
	 * @return string
	 */
	public function variant($experiment) {

		if (isset($_COOKIE[$experiment])) {
			return $_COOKIE[$experiment];
		} else {
			return NULL;
		}

	}


	/**
	 * Set the variant for the given experiment
	 *
	 * @param string $experiment
	 * @param string $variant
	 * @return void
	 */
	public function setVariant($experiment, $variant) {

		setcookie($experiment, $variant, time() + (365 * 24 * 3600), '/');

	}


}
