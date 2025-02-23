<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class Service
{
    public function __construct(
        public readonly string $code,
    ) {}

    /** @return array{code:string} */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
        ];
    }
}
