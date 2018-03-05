<?php

namespace Demv\Steuersatzrechner\Tests;

use Demv\Steuersatzrechner\SteuersatzResult;
use PHPUnit\Framework\TestCase;

/**
 * Class SteuersatzResultTest
 * @package Demv\Steuersatzrechner\Tests
 */
final class SteuersatzResultTest extends TestCase
{
    public function testGetSteuer()
    {
        $result = new SteuersatzResult(1500, 12);
        $this->assertEquals(180, $result->getSteuern());
        $this->assertEquals(1320, $result->getNettoeinkommen());
        $this->assertFalse($result->getSplitting());

        $result = SteuersatzResult::splitting(3333, 33);
        $this->assertEquals(1099.89, $result->getSteuern());
        $this->assertEquals(2233.11, $result->getNettoeinkommen());
        $this->assertTrue($result->getSplitting());
    }
}