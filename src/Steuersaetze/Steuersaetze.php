<?php

namespace Demv\Steuersatzrechner\Steuersaetze;

/**
 * Class Steuersaetze
 * @package Demv\Steuersatzrechner\Steuersaetze
 */
class Steuersaetze
{
    /**
     * @var array
     */
    private $saetze = [];

    /**
     * Steuersaetze constructor.
     *
     * @param array $saetze
     */
    public function __construct(array $saetze)
    {
        $this->saetze = $saetze;
    }

    /**
     * @return array
     */
    public function getSaetze(): array
    {
        return $this->saetze;
    }
}