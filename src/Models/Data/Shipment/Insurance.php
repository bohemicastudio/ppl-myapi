<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class Insurance
{
    public function __construct(
        public readonly string $insuranceCurrency,
        public readonly float $insurancePrice,
    ) {}

    /** @return array{insuranceCurrency:string,insurancePrice:float} */
    public function toArray(): array
    {
        return [
            'insuranceCurrency' => $this->insuranceCurrency,
            'insurancePrice' => $this->insurancePrice,
        ];
    }
}
