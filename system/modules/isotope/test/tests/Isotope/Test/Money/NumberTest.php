<?php

namespace Isotope\Test;

use Isotope\Number;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $objNumber = new Number(20000);
        $this->assertInstanceOf('Isotope\Number', $objNumber);
    }

    public function testGetAmountPositive()
    {
        $objNumber = new Number(50000);
        $this->assertSame(50000, $objNumber->getAmount());
    }

    public function testGetAmountNegative()
    {
        $objNumber = new Number(-50000);
        $this->assertSame(-50000, $objNumber->getAmount());
    }

    public function testAdd()
    {
        $objNumber = new Number(50000);
        $objNumberToAdd = new Number(120000);

        $objNew = $objNumber->add($objNumberToAdd);

        $this->assertSame(50000, $objNumber->getAmount());
        $this->assertSame(120000, $objNumberToAdd->getAmount());
        $this->assertSame(170000, $objNew->getAmount());
    }

    public function testSubtract()
    {
        $objNumber = new Number(50000);
        $objNumberToSubtract = new Number(30000);

        $objNew = $objNumber->subtract($objNumberToSubtract);

        $this->assertSame(50000, $objNumber->getAmount());
        $this->assertSame(30000, $objNumberToSubtract->getAmount());
        $this->assertSame(20000, $objNew->getAmount());
    }

    public function testMultiply()
    {
        $objNumber = new Number(50000);
        $objNumberToMultiplyWith = new Number(30000);

        $objNew = $objNumber->multiply($objNumberToMultiplyWith);

        $this->assertSame(50000, $objNumber->getAmount());
        $this->assertSame(30000, $objNumberToMultiplyWith->getAmount());
        $this->assertSame(150000, $objNew->getAmount());
    }

    public function testDivide()
    {
        $objNumber = new Number(270000);
        $objNumberToDivideBy = new Number(130000);

        $objNew = $objNumber->divide($objNumberToDivideBy);

        $this->assertSame(270000, $objNumber->getAmount());
        $this->assertSame(130000, $objNumberToDivideBy->getAmount());
        $this->assertSame(20769, $objNew->getAmount());
    }

    public function testToString()
    {
        $objNumber = new Number(20769);
        $this->assertSame('2.0769', (string) $objNumber);
        $this->assertSame(2.0769, $objNumber->getAsFloat());
    }

    public function testCreate()
    {
        $this->assertSame(130000, Number::create('13')->getAmount());
        $this->assertSame(130100, Number::create('13.01')->getAmount());
        $this->assertSame(130991, Number::create('13.0991')->getAmount());
        $this->assertSame(130991, Number::create('13,0991576')->getAmount());
        $this->assertSame(130999, Number::create('13.0999976')->getAmount());
        $this->assertSame(1309999760, Number::create('13.0999.976')->getAmount());
        $this->assertSame(1309999760, Number::create('13\'0999.976')->getAmount());
        $this->assertSame(1309999760, Number::create(130999.976)->getAmount());
        $this->assertSame(1309999799, Number::create(130999.97999999)->getAmount());
    }

    /**
     * @dataProvider createExceptionProvider
     * @expectedException InvalidArgumentException
     */
    public function testCreateExceptions($data)
    {
        Number::create($data);
    }

    public function createExceptionProvider()
    {
        return array(
            array('abc'),
            array(''),
            array('13a01.00')
        );
    }
}