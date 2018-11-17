<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Common;



class Config implements ToArrayInterface
{
    /**
     * @var string
     */
    private $email;
    private $token;

    public function __construct(string $email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'token' => $this->token,
        ];
    }
}
