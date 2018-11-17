````php
<?php

use DSisconeto\PagSeguroBoletoRecurring\Boleto\{
    Boleto,
    Periodicity,
    Recurring
};
use DSisconeto\PagSeguroBoletoRecurring\Customer\{
    Address\Address,
    Address\Cep,
    Contact\Phone,
    Customer,
    Document\Cnpj,
    Document\Cpf
};
use DSisconeto\PagSeguroBoletoRecurring\Http\{
    Request,
    SendRequest
};

use DSisconeto\PagSeguroBoletoRecurring\Common\Config;

$cnpj = new Cnpj('número do cnpj');
$cpf = new Cpf('número do cpf');
$phone = new Phone('dd', 'numero');

$address = new Address(
    'minha rua',
    'numero',
    'bairro',
    new Cep('meu cep'),
    'cidade',
    'estado'
);

$customerCpf = new Customer("Meu Nome", 'meu email', $phone, $cpf, $address);

$customerCnpj = new Customer("Meu Nome", 'meu email', $phone, $cnpj, $address);

$boleto = new Boleto('valor', 'descricao', 'instrução', 'referencia');

$periodicity = new Periodicity(Periodicity::MONTHLY);

$recurring = new Recurring(new DateTime('today'), $periodicity, 10);

$config = new Config('email', 'token');

$request = new Request($config, $customerCpf, $boleto, $recurring);

$sentRequest = new SendRequest($request);

$response = $sentRequest->sendRequest();
````