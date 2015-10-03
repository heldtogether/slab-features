<?php namespace Tests;


class ManagerTest extends TestCase {


	/**
	 * Can get Manager instance
	 *
	 * @return void
	 */
	public function testCanGetManagerInstance() {

		$manager = \Slab\Features\Manager::instance();

		$this->assertInstanceOf('\Slab\Features\Manager', $manager);

	}


}
