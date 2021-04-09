<?php

namespace Demv\Steuersatzrechner;

use Demv\Steuersatzrechner\Steuersaetze\Steuersaetze2018;
use Demv\Steuersatzrechner\Steuersaetze\Steuersaetze2021;
use Exception;

/**
 * Class SteuersatzrechnerFactory
 * @package Demv\Steuersatzrechner
 */
final class SteuersatzrechnerFactory
{
    private const SAETZE = [
        2018 => Steuersaetze2018::class,
        2021 => Steuersaetze2021::class,
    ];

    /**
     * @param string $jahr
     *
     * @return bool
     */
    public static function istVorhanden(string $jahr): bool
    {
        return array_key_exists($jahr, self::SAETZE);
    }

    /**
     * @param int $jahr
     *
     * @return Steuersatzrechner
     * @throws Exception
     */
    public static function fuerJahr(int $jahr): Steuersatzrechner
    {
        if (!self::istVorhanden($jahr)) {
            throw new Exception(sprintf('Für das Jahr %s liegen keine Steuersätze vor', $jahr));
        }
        $satz = self::SAETZE[$jahr];

        return new Steuersatzrechner(new $satz());
    }

    /**
     * @param int $jahr
     *
     * @return Steuersatzrechner
     * @throws Exception
     */
    public static function aktuellsterFuerJahr(int $jahr): Steuersatzrechner
    {
        $input = $jahr;
        $min   = array_keys(self::SAETZE)[0];
        while ($jahr >= $min) {
            if (self::istVorhanden($jahr)) {
                return self::fuerJahr($jahr);
            }
            $jahr--;
        }

        throw new Exception(sprintf('Für das Jahr %s liegen keine Steuersätze vor', $input));
    }

    /**
     * @return Steuersatzrechner
     * @throws Exception
     */
    public static function aktuell(): Steuersatzrechner
    {
        return self::aktuellsterFuerJahr((int) date('Y'));
    }
}
