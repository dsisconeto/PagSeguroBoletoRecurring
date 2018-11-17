<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Customer\Address;

use DSisconeto\PagSeguroBoletoRecurring\Common\ToArrayInterface;

class Address implements ToArrayInterface
{
    /**
     * @var string
     */
    private $street;
    /**
     * @var string
     */
    private $number;
    /**
     * @var string
     */
    private $district;
    /**
     * @var Cep
     */
    private $cep;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $state;

    public function __construct(
        string $street,
        string $number,
        string $district,
        Cep $cep,
        string $city,
        string $state
    )
    {
        $this->street = $street;
        $this->number = $number;
        $this->district = $district;
        $this->cep = $cep;
        $this->city = $city;
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @return Cep
     */
    public function getCep(): Cep
    {
        return $this->cep;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }


    public function toArray(): array
    {
        return [
            'street' => $this->street,
            'number' => $this->number,
            'district' => $this->district,
            'postalCode' => (string) $this->cep,
            'city' => $this->city,
            'state' => $this->state
        ];
    }
}
