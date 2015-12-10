<?php namespace Tests\Sessions;

use Tests\TestCase;

class CookieSessionTest extends TestCase {


	/**
	 * Can create Session
	 *
	 * @return void
	 */
	function testCanCreateSession() {

		$session = new \Venice\Sessions\CookieSession();

		$this->assertInstanceOf(
			'Venice\Interfaces\SessionInterface',
			$session
		);

	}


}
