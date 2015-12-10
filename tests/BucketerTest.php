<?php namespace Tests;

use Tests\TestCase;

class BucketerTest extends TestCase {


	/**
	 * Can create Config
	 *
	 * @return void
	 */
	function testCanCreateBucketer() {

		$experiment = 'experiment-1';
		$variants = ['control', 'variant-1', 'variant-2'];

		$session = \Mockery::mock('\Venice\Interfaces\SessionInterface');

		$bucketer = new \Venice\Bucketer($experiment, $variants, $session);

		$this->assertInstanceOf(
			'Venice\Bucketer',
			$bucketer
		);

	}


	/**
	 * Requests the variant from the Session to check
	 * if it's already been set.
	 *
	 * @return void
	 */
	function testRequestsIfBucketedFromSession() {

		$experiment = 'experiment-1';
		$variant = 'control';
		$variants = ['control', 'variant-1', 'variant-2'];

		$session = \Mockery::mock('\Venice\Interfaces\SessionInterface');
		$session->shouldReceive('variant')->with($experiment)->once()
		        ->andReturn($variant);

		$bucketer = new \Venice\Bucketer($experiment, $variants, $session);
		$this->assertEquals($bucketer->variant(), $variant);

	}


}
