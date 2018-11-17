<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Customer\Document;

use DSisconeto\PagSeguroBoletoRecurring\Common\ToArrayInterface;


abstract class AbstractDocument implements ToArrayInterface
{

    protected $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    abstract public function getType(): string;

    /**
     * @return mixed
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    public function __toString()
    {
        return $this->number;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'value' => $this->number,
        ];
    }
}
