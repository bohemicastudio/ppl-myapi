<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Shipment;

class DirectInjection
{
    public function __construct(
        public readonly bool $directAddressing,
        public readonly ?string $gatewayZipCode = null,
        public readonly ?string $gatewayCity = null,
        public readonly ?string $country = null,
    ) {}

    /** @return array{directAddressing:bool,gatewayZipCode?:string,gatewayCity?:string,country?:string} */
    public function toArray(): array
    {
        return array_filter([
            'directAddressing' => $this->directAddressing,
            'gatewayZipCode' => $this->gatewayZipCode,
            'gatewayCity' => $this->gatewayCity,
            'country' => $this->country,
        ], fn ($value) => $value !== null);
    }
}
