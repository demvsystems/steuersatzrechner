<?php

namespace Demv\Steuersatzrechner;

use Demv\Steuersatzrechner\Steuersaetze\Steuersaetze2018;
use Exception;

/**
 * Class SteuersatzrechnerFactory
 * @package Demv\Steuersatzrechner
 */
final class SteuersatzrechnerFactory
{
    private const SAETZE = [
        2018 => Steuersaetze2018::class
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
     * @param string $jahr
     *
     * @return Steuersatzrechner
     * @throws Exception
     */
    public static function fuerJahr(string $jahr): Steuersatzrechner
    {
        if (!self::istVorhanden($jahr)) {
            throw new Exception(sprintf('Für das Jahr %s liegen keine Steuersätze vor', $jahr));
        }
        $satz = self::SAETZE[$jahr];

        return new Steuersatzrechner(new $satz());
    }

    /**
     * @return Steuersatzrechner
     */
    public static function aktuell(): Steuersatzrechner
    {
        $saetze          = self::SAETZE;
        $aktuellsterSatz = array_pop($saetze);

        return new Steuersatzrechner(new $aktuellsterSatz());
    }
}