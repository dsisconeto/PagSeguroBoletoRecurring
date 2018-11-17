<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Http;

use DSisconeto\PagSeguroBoletoRecurring\Boleto\Boleto;
use DSisconeto\PagSeguroBoletoRecurring\Boleto\Recurring;
use DSisconeto\PagSeguroBoletoRecurring\Common\Config;
use DSisconeto\PagSeguroBoletoRecurring\Customer\Customer;

class Request
{
    private $headers = [
        'ContentType' => 'application/json;charset=ISO-8859-1',
        'Accept' => 'application/json;charset=ISO-8859-1'
    ];

    /**
     * @var Config
     */
    private $config;
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Boleto
     */
    private $boleto;
    /**
     * @var Recurring
     */
    private $recurring;

    public function __construct(
        Config $config,
        Customer $customer,
        Boleto $boleto,
        Recurring $recurring
    )
    {

        $this->config = $config;
        $this->customer = $customer;
        $this->boleto = $boleto;
        $this->recurring = $recurring;
    }


    public function getPost(): array
    {
        $post = [];
        $post['customer'] = $this->customer->toArray();
        $post = array_merge($post, $this->recurring->toArray());
        $post = array_merge($post, $this->boleto->toArray());
        return $post;
    }

    public function getUri(): string
    {
        $query = http_build_query($this->config);
        return "https://ws.pagseguro.uol.com.br/recurring-payment/boletos?$query";
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
