<?php namespace Tests;


class FactoryTest extends TestCase {


	/**
	 * Can create Factory instance
	 *
	 * @return void
	 */
	public function testCanCreateFactory() {

		$factory = new \Slab\Features\Factory();

		$this->assertInstanceOf('\Slab\Features\Factory', $factory);

	}


}
