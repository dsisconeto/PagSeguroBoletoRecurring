<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Credentials;



class Credentials implements ToArrayInterface
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

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
}
