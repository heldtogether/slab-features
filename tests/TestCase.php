<?php namespace Tests;

use Mockery;


class TestCase extends \PHPUnit_Framework_TestCase {


	/**
	 * Tear down the tests
	 *
	 * @return void
	 */
	public function tearDown() {
		parent::tearDown();
		Mockery::close();
	}


}
