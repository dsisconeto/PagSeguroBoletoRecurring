<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Customer;

use DSisconeto\PagSeguroBoletoRecurring\Common\ToArrayInterface;
use DSisconeto\PagSeguroBoletoRecurring\Customer\Address\Address;
use DSisconeto\PagSeguroBoletoRecurring\Customer\Contact\Phone;
use DSisconeto\PagSeguroBoletoRecurring\Customer\Document\AbstractDocument;


class Customer implements ToArrayInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var Phone
     */
    private $phone;
    /**
     * @var AbstractDocument
     */
    private $document;
    /**
     * @var Address
     */
    private $address;

    public function __construct(
        string $name,
        string $email,
        Phone $phone,
        AbstractDocument $document,
        Address $address
    )
    {

        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->document = $document;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    /**
     * @return AbstractDocument
     */
    public function getDocument(): AbstractDocument
    {
        return $this->document;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone->toArray(),
            'address' => $this->address->toArray(),
            'document' => $this->document->toArray(),
        ];
    }
}
