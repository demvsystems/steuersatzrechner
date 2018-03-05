<?php

namespace Demv\Steuersatzrechner\Tests;

use Demv\Steuersatzrechner\Steuersatzrechner;
use Demv\Steuersatzrechner\SteuersatzrechnerFactory;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class SteuersatzrechnerFactoryTest
 * @package Demv\Steuersatzrechner\Tests
 */
final class SteuersatzrechnerFactoryTest extends TestCase
{
    public function testAktuell()
    {
        $this->assertInstanceOf(Steuersatzrechner::class, SteuersatzrechnerFactory::aktuell());
    }

    public function testNichtVorhanden()
    {
        $this->assertFalse(SteuersatzrechnerFactory::istVorhanden(2017));
        $this->expectException(Exception::class);
        SteuersatzrechnerFactory::fuerJahr(2017);
    }

    public function test2018()
    {
        $this->assertTrue(SteuersatzrechnerFactory::istVorhanden(2018));
        $this->assertInstanceOf(Steuersatzrechner::class, SteuersatzrechnerFactory::fuerJahr(2018));
    }
}