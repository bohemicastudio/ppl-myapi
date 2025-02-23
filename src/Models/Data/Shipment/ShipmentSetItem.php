<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class ShipmentSetItem
{
    /**
     * @param  array<ExternalNumber>  $externalNumbers
     */
    public function __construct(
        public readonly string $shipmentNumber,
        public readonly ?WeighedShipmentInfo $weighedShipmentInfo = null,
        public readonly array $externalNumbers = [],
        public readonly ?Insurance $insurance = null,
    ) {}

    /** @return array{shipmentNumber:string,weighedShipmentInfo?:array{weight:float},externalNumbers:array<array{code:string,externalNumber:string}>,insurance?:array{insuranceCurrency:string,insurancePrice:float}} */
    public function toArray(): array
    {
        return array_filter([
            'shipmentNumber' => $this->shipmentNumber,
            'weighedShipmentInfo' => $this->weighedShipmentInfo?->toArray(),
            'externalNumbers' => array_map(fn ($n) => $n->toArray(), $this->externalNumbers),
            'insurance' => $this->insurance?->toArray(),
        ], fn ($value) => $value !== null);
    }
}
