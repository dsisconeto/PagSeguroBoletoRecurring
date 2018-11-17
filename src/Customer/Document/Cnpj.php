<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Customer\Document;

class Cnpj extends AbstractDocument
{
    /**
     * @return mixed
     */
    public function getType(): string
    {
        return 'cnpj';
    }
}
