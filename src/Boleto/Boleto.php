<?php

namespace DSisconeto\PagSeguroBoletoRecurring\Boleto;

use DSisconeto\PagSeguroBoletoRecurring\Common\ToArrayInterface;

class Boleto implements ToArrayInterface
{
    /**
     * @var float
     */
    private $amount;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $instructions;
    /**
     * @var string
     */
    private $reference;

    public function __construct(float $amount, string $description, string $instructions, string $reference)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->instructions = $instructions;
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }


    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getInstructions(): string
    {
        return $this->instructions;
    }


    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'description' => $this->description,
            'instructions' => $this->instructions,
            'reference' => $this->reference,
        ];
    }
}
