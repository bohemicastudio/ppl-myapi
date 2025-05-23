<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Shipment;

class WeighedShipmentInfo
{
    public function __construct(
        public readonly float $weight,
    ) {}

    /** @return array{weight:float} */
    public function toArray(): array
    {
        return [
            'weight' => $this->weight,
        ];
    }
}
