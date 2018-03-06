<?php

namespace Demv\Steuersatzrechner\Steuersaetze;

/**
 * Class Steuersaetze2018
 * @package Demv\Steuersatzrechner\Steuersaetze
 */
final class Steuersaetze2018 extends Steuersaetze
{
    private const SAETZE = [
        0  => 9400,
        1  => 10000,
        2  => 10600,
        3  => 11300,
        4  => 12000,
        5  => 12700,
        6  => 13400,
        7  => 14100,
        8  => 14800,
        9  => 15400,
        10 => 16200,
        11 => 17200,
        12 => 18200,
        13 => 19300,
        14 => 20500,
        15 => 21800,
        16 => 23300,
        17 => 24800,
        18 => 26500,
        19 => 28300,
        20 => 30200,
        21 => 32300,
        22 => 34500,
        23 => 36800,
        24 => 39200,
        25 => 41800,
        26 => 44500,
        27 => 47300,
        28 => 50200,
        29 => 53100,
        30 => 56200,
        31 => 59600,
        32 => 63400,
        33 => 67600,
        34 => 72700,
        35 => 78500,
        36 => 85200,
        37 => 93300,
        38 => 103000,
        39 => 115000,
        40 => null,
    ];

    /**
     * Steuersaetze2018 constructor.
     */
    public function __construct()
    {
        parent::__construct(self::SAETZE);
    }
}