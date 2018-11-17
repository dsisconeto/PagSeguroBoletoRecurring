<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Http;

use DSisconeto\PagSeguroBoletoRecurring\Boleto\Boleto;
use DSisconeto\PagSeguroBoletoRecurring\Boleto\Recurring;
use DSisconeto\PagSeguroBoletoRecurring\Credentials\Credentials;
use DSisconeto\PagSeguroBoletoRecurring\Customer\Customer;

class Request
{
    private $headers = [
        'ContentType' => 'application/json;charset=ISO-8859-1',
        'Accept' => 'application/json;charset=ISO-8859-1'
    ];

    /**
     * @var Credentials
     */
    private $credentials;
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
        Credentials $credentials,
        Customer $customer,
        Boleto $boleto,
        Recurring $recurring
    )
    {

        $this->credentials = $credentials;
        $this->customer = $customer;
        $this->boleto = $boleto;
        $this->recurring = $recurring;
    }


    public function send()
    {
        $curl = curl_init($this->getUri());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 4);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this->getPost()));
        $response = curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {
            curl_close($curl);
            return $error;
        }
        curl_close($curl);
        $response = json_decode($response);
        curl_close($curl);
        return $response;
    }


    private function getPost(): array
    {
        $post = [];
        $post['customer'] = $this->customer->toArray();
        $post = array_merge($post, $this->recurring->toArray());
        $post = array_merge($post, $this->boleto->toArray());
        return $post;
    }

    private function getUri(): string
    {
        $query = http_build_query($this->credentials);
        return "https://ws.pagseguro.uol.com.br/recurring-payment/boletos?$query";
    }

    /**
     * @return array
     */
    private function getHeaders(): array
    {
        return $this->headers;
    }
}
