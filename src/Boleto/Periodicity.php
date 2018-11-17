<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Boleto;


class Periodicity
{
    const MONTHLY = 'monthly';
    /**
     * @var string
     */
    private $periodicity;

    public function __construct(string $periodicity)
    {
        if ($this->isNotValid($periodicity)) {
            throw new \InvalidArgumentException('perido invalido');
        }

        $this->periodicity = $periodicity;
    }

    public function isNotValid($periodicity): bool
    {
        switch ($periodicity) {
            case self::MONTHLY:
                return false;
            default:
                return true;
        }
    }

    public function __toString()
    {
        return $this->periodicity;
    }
}
