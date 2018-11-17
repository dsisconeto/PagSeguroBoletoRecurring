<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Http;


class SendRequest
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }


    public function sendRequest()
    {
        $curl = curl_init($this->request->getUri());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 4);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->request->getHeaders());
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this->request->getPost()));
        $response = curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {
            curl_close($curl);
            return $error;
        }
        curl_close($curl);
        return json_decode($response);
    }
}