<?php

namespace Demv\Steuersatzrechner;

/**
 * Class SteuersatzResult
 * @package Demv\Steuersatzrechner
 */
final class SteuersatzResult
{
    /**
     * @var float
     */
    private $einkommen;
    /**
     * @var int
     */
    private $steuersatz;

    /**
     * @var bool
     */
    private $splitting = false;

    /**
     * @param float $einkommen
     * @param int   $steuersatz
     *
     * @return SteuersatzResult
     */
    public static function splitting(float $einkommen, int $steuersatz): self
    {
        $result            = new self($einkommen, $steuersatz);
        $result->splitting = true;

        return $result;
    }

    /**
     * SteuersatzResult constructor.
     *
     * @param float $einkommen
     * @param int   $steuersatz
     */
    public function __construct(float $einkommen, int $steuersatz)
    {
        $this->einkommen  = $einkommen;
        $this->steuersatz = $steuersatz;
    }

    /**
     * @return bool
     */
    public function getSplitting(): bool
    {
        return $this->splitting;
    }

    /**
     * @return float
     */
    public function getEinkommen(): float
    {
        return $this->einkommen;
    }

    /**
     * @return int
     */
    public function getSteuersatz(): int
    {
        return $this->steuersatz;
    }

    /**
     * @return float
     */
    public function getSteuern(): float
    {
        return $this->einkommen * $this->steuersatz / 100;
    }

    /**
     * @return float
     */
    public function getNettoeinkommen(): float
    {
        return $this->getEinkommen() - $this->getSteuern();
    }
}