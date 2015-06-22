<?php
namespace CajitaArena\Tests;

use CajitaArena\Money;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeInstantiated()
    {
        $m = new Money(1);
        $this->assertEquals(1, $m->getAmount());
    }

    /**
     * @expectedException     Exception
     * @expectedExceptionCode 10101
     */
    public function testException()
    {
        $m = new Money("Hola");
    }

    /**
     * @depends testCanBeInstantiated
     */
    public function testCanBeNegated()
    {
        // Arrange
        $a = new Money(1);

        // Act
        $b = $a->negate();

        // Assert
        $this->assertEquals(-1, $b->getAmount());
    }
}