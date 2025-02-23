<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class ShipmentSet
{
    /**
     * @param  array<ShipmentSetItem>  $shipmentSetItems
     */
    public function __construct(
        public readonly int $numberOfShipments,
        public readonly array $shipmentSetItems,
    ) {}

    /** @return array{numberOfShipments:int,shipmentSetItems:array<array{shipmentNumber:string,weighedShipmentInfo?:array{weight:float},externalNumbers:array<array{code:string,externalNumber:string}>,insurance?:array{insuranceCurrency:string,insurancePrice:float}}>} */
    public function toArray(): array
    {
        return [
            'numberOfShipments' => $this->numberOfShipments,
            'shipmentSetItems' => array_map(fn ($item) => $item->toArray(), $this->shipmentSetItems),
        ];
    }
}
