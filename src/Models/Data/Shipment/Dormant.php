<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class Dormant
{
    /**
     * @param  array<ExternalNumber>  $externalNumbers
     * @param  array<Service>  $services
     */
    public function __construct(
        public readonly string $shipmentNumber,
        public readonly ?string $note,
        public readonly Address $recipient,
        public readonly array $externalNumbers = [],
        public readonly array $services = [],
        public readonly ?WeighedShipmentInfo $weighedShipmentInfo = null,
    ) {}

    /** @return array{shipmentNumber:string,note?:string,recipient:array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},externalNumbers:array<array{code:string,externalNumber:string}>,services:array<array{code:string}>,weighedShipmentInfo?:array{weight:float}} */
    public function toArray(): array
    {
        return array_filter([
            'shipmentNumber' => $this->shipmentNumber,
            'note' => $this->note,
            'recipient' => $this->recipient->toArray(),
            'externalNumbers' => array_map(fn ($n) => $n->toArray(), $this->externalNumbers),
            'services' => array_map(fn ($s) => $s->toArray(), $this->services),
            'weighedShipmentInfo' => $this->weighedShipmentInfo?->toArray(),
        ], fn ($value) => $value !== null);
    }
}
