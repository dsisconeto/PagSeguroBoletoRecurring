<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Customer\Document;

class Cpf extends AbstractDocument
{
    /**
     * @return mixed
     */
    public function getType(): string
    {
        return 'cpf';
    }
}