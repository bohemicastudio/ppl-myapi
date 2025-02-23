<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class ShipmentRouting
{
    public function __construct(
        public readonly string $inputRouteCode,
    ) {}

    /** @return array{inputRouteCode:string} */
    public function toArray(): array
    {
        return [
            'inputRouteCode' => $this->inputRouteCode,
        ];
    }
}
