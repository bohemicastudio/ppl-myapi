<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Shipment;

class ReturnChannel
{
    public function __construct(
        public readonly string $type = 'Ftp',
        public readonly ?string $address = null,
    ) {}

    /** @return array{type:string,address?:string} */
    public function toArray(): array
    {
        return array_filter([
            'type' => $this->type,
            'address' => $this->address,
        ], fn ($value) => $value !== null);
    }
}
