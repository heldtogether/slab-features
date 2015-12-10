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


	/**
	 * Requests the variant from the Session to check
	 * if it's already been set. (Random index = 0)
	 *
	 * @return void
	 */
	function testAssignsToBucketIfNotAlreadyBucketed_Control() {

		$experiment = 'experiment-1';
		$variant = 'control';
		$variants = ['control', 'variant-1', 'variant-2'];

		$session = \Mockery::mock('\Venice\Interfaces\SessionInterface');
		$session->shouldReceive('variant')->with($experiment)->once()
		        ->andReturn(false);
		$session->shouldReceive('setVariant')->with($experiment, $variant)
		        ->once();

		mt_srand(500); // mt_rand() == 0

		$bucketer = new \Venice\Bucketer($experiment, $variants, $session);
		$this->assertEquals($bucketer->variant(), $variant);

	}


	/**
	 * Requests the variant from the Session to check
	 * if it's already been set. (Random index = 1)
	 *
	 * @return void
	 */
	function testAssignsToBucketIfNotAlreadyBucketed_Variant1() {

		$experiment = 'experiment-1';
		$variant = 'variant-1';
		$variants = ['control', 'variant-1', 'variant-2'];

		$session = \Mockery::mock('\Venice\Interfaces\SessionInterface');
		$session->shouldReceive('variant')->with($experiment)->once()
		        ->andReturn(false);
		$session->shouldReceive('setVariant')->with($experiment, $variant)
		        ->once();

		mt_srand(0); // mt_rand() == 1

		$bucketer = new \Venice\Bucketer($experiment, $variants, $session);
		$this->assertEquals($bucketer->variant(), $variant);

	}


	/**
	 * Requests the variant from the Session to check
	 * if it's already been set. (Random index = 2)
	 *
	 * @return void
	 */
	function testAssignsToBucketIfNotAlreadyBucketed_Variant2() {

		$experiment = 'experiment-1';
		$variant = 'variant-2';
		$variants = ['control', 'variant-1', 'variant-2'];

		$session = \Mockery::mock('\Venice\Interfaces\SessionInterface');
		$session->shouldReceive('variant')->with($experiment)->once()
		        ->andReturn(false);
		$session->shouldReceive('setVariant')->with($experiment, $variant)
		        ->once();

		mt_srand(99999999999999999999999); // mt_rand() == 2

		$bucketer = new \Venice\Bucketer($experiment, $variants, $session);
		$this->assertEquals($bucketer->variant(), $variant);

	}


}
