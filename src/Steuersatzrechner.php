<?php

namespace Demv\Steuersatzrechner;

use Demv\Steuersatzrechner\Steuersaetze\Steuersaetze;

/**
 * Class Steuersatzrechner
 * @package Demv\Steuersatzrechner
 */
final class Steuersatzrechner
{
    /**
     * @var Steuersaetze
     */
    private $saetze;

    /**
     * SteuersatzRechner constructor.
     *
     * @param Steuersaetze $saetze
     */
    public function __construct(Steuersaetze $saetze)
    {
        $this->saetze = $saetze;
    }

    /**
     * @param float $einkommen
     *
     * @return SteuersatzResult
     */
    public function fuerEinkommen(float $einkommen): SteuersatzResult
    {
        $satz = 0;
        foreach ($this->saetze->getSaetze() as $steuersatz => $grenze) {
            $satz = $steuersatz;
            if ($einkommen < $grenze) {
                break;
            }
        }

        return new SteuersatzResult($einkommen, $satz);
    }

    /**
     * @param float $einkommen1
     * @param float $einkommen2
     *
     * @return SteuersatzResult
     */
    public function fuerPaar(float $einkommen1, float $einkommen2): SteuersatzResult
    {
        $result = $this->fuerEinkommen(($einkommen1 + $einkommen2) / 2);

        return SteuersatzResult::splitting($einkommen1 + $einkommen2, $result->getSteuersatz());
    }
}