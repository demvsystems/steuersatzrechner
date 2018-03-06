<?php

namespace Demv\Steuersatzrechner\Tests;

use Demv\Steuersatzrechner\Steuersaetze\Steuersaetze;
use Demv\Steuersatzrechner\Steuersatzrechner;
use Demv\Steuersatzrechner\SteuersatzResult;
use PHPUnit\Framework\TestCase;

/**
 * Class SteuersatzrechnerTest
 * @package Demv\Steuersatzrechner\Tests
 */
final class SteuersatzrechnerTest extends TestCase
{
    const TESTSAETZE = [
        0  => 10000,
        1  => 20000,
        2  => 30000,
        4  => 40000,
        8  => 50000,
        12 => 60000,
        18 => 70000,
        26 => 80000,
        33 => 90000,
        35 => null,
    ];

    /**
     * @var Steuersatzrechner
     */
    private $rechner;

    protected function setUp()
    {
        $this->rechner = new Steuersatzrechner(new Steuersaetze(self::TESTSAETZE));
    }

    public function testFuerEinkommen()
    {
        $expectations = [
            8000   => 0,
            10000  => 1,
            12000  => 1,
            35688  => 4,
            42500  => 8,
            77777  => 26,
            123456 => 35,
        ];

        foreach ($expectations as $einkommen => $steuersatz) {
            $this->assertEquals(new SteuersatzResult($einkommen, $steuersatz), $this->rechner->fuerEinkommen($einkommen));
        }
    }

    public function testFuerPaar()
    {
        $expectations = [
            [
                'einkommen1' => 30000,
                'einkommen2' => 15000,
                'steuersatz' => 2
            ],
            [
                'einkommen1' => 70000,
                'einkommen2' => 15000,
                'steuersatz' => 8
            ],
            [
                'einkommen1' => 70000,
                'einkommen2' => 0,
                'steuersatz' => 4
            ],
            [
                'einkommen1' => 50000,
                'einkommen2' => 50000,
                'steuersatz' => 12
            ],
        ];

        foreach ($expectations as $expectation) {
            $einkommen1 = $expectation['einkommen1'];
            $einkommen2 = $expectation['einkommen2'];
            $steuersatz = $expectation['steuersatz'];

            $this->assertEquals(SteuersatzResult::splitting($einkommen1 + $einkommen2, $steuersatz),
                                $this->rechner->fuerPaar($einkommen1, $einkommen2));
        }
    }
}