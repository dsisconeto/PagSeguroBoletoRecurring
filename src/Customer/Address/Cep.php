<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Customer\Address;


class Cep
{
    /**
     * @var string
     */
    private $cep;

    public function __construct(string $cep)
    {
        $this->cep = $cep;
    }

    public function __toString()
    {
        return $this->cep;
    }
}
