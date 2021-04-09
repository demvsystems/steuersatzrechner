<?php

namespace Demv\Steuersatzrechner\Steuersaetze;

/**
 * Class Steuersaetze2021
 * @package Demv\Steuersatzrechner\Steuersaetze
 */
final class Steuersaetze2021 extends Steuersaetze
{
    private const SAETZE = [
        0 => 9700,
        1 => 10319,
        2 => 10938,
        3 => 11661,
        4 => 12383,
        5 => 13105,
        6 => 13828,
        7 => 14550,
        8 => 15272,
        9 => 15891,
        10 => 16717,
        11 => 17749,
        12 => 18781,
        13 => 19916,
        14 => 21154,
        15 => 22496,
        16 => 24044,
        17 => 25591,
        18 => 27346,
        19 => 29203,
        20 => 31164,
        21 => 33331,
        22 => 35601,
        23 => 37974,
        24 => 40451,
        25 => 43134,
        26 => 45920,
        27 => 48810,
        28 => 51802,
        29 => 54795,
        30 => 57994,
        31 => 61502,
        32 => 65423,
        33 => 69757,
        34 => 75020,
        35 => 81005,
        36 => 87919,
        37 => 96278,
        38 => 106287,
        39 => 118670,
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
