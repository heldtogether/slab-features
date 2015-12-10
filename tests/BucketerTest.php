<?php namespace Tests;

use Tests\TestCase;

class BucketerTest extends TestCase {


	/**
	 * Can create Config
	 *
	 * @return void
	 */
	function testCanCreateBucketer() {

		$bucketer = new \Venice\Bucketer();

		$this->assertInstanceOf(
			'Venice\Bucketer',
			$bucketer
		);

	}


}
