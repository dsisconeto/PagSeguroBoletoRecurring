<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Boleto;

use DateTime;
use DSisconeto\PagSeguroBoletoRecurring\Common\ToArrayInterface;

class Recurring implements ToArrayInterface
{
    /**
     * @var DateTime
     */
    private $firstDue;
    /**
     * @var Periodicity
     */
    private $periodicity;
    /**
     * @var int
     */
    private $numberPayments;

    public function __construct(
        DateTime $firstDue,
        Periodicity $periodicity,
        int $numberPayments
    )
    {

        $this->firstDue = $firstDue;
        $this->periodicity = $periodicity;
        $this->numberPayments = $numberPayments;
    }

    /**
     * @return DateTime
     */
    public function getFirstDue(): DateTime
    {
        return $this->firstDue;
    }

    /**
     * @return Periodicity
     */
    public function getPeriodicity(): Periodicity
    {
        return $this->periodicity;
    }

    /**
     * @return int
     */
    public function getNumberPayments(): int
    {
        return $this->numberPayments;
    }

    public function toArray(): array
    {
        return [
            'numberOfPayments' => $this->numberPayments,
            'firstDueDate' => $this->firstDue->format('Y-m-d'),
            'periodicity' => (string)$this->periodicity
        ];
    }
}
