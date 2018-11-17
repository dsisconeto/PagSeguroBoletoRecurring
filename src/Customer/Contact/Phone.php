<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Customer\Contact;


use DSisconeto\PagSeguroBoletoRecurring\Credentials\ToArrayInterface;


class Phone implements ToArrayInterface
{
    /**
     * @var string
     */
    private $dd;
    /**
     * @var string
     */
    private $number;

    public function __construct(string $dd, string $number)
    {
        $this->dd = $dd;
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getDd(): string
    {
        return $this->dd;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    public function toArray(): array
    {
        return [
            'areaCode' => $this->dd,
            'number' => $this->number,
        ];
    }
}
