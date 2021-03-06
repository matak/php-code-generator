<?php
namespace gossi\codegen\tests\parser;

use PHPUnit\Framework\TestCase;
use gossi\codegen\model\PhpInterface;
use gossi\codegen\tests\Fixtures;

/**
 * @group parser
 */
class InterfaceParserTest extends TestCase {

	public function setUp() {
		// they are not explicitely instantiated through new WhatEver(); and such not
		// required through composer's autoload
		require_once __DIR__ . '/../fixtures/DummyInterface.php';
	}

	public function testDummyInterface() {
		$expected = Fixtures::createDummyInterface();
		$actual = PhpInterface::fromFile(__DIR__ . '/../fixtures/DummyInterface.php');
		$this->assertEquals($expected, $actual);
	}

	public function testMyCollectionInterface() {
		$interface = PhpInterface::fromFile(__DIR__ . '/../fixtures/MyCollectionInterface.php');
		$this->assertTrue($interface->hasInterface('phootwork\collection\Collection'));
	}

}
