<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class ExternalNumber
{
    public function __construct(
        public readonly string $code,
        public readonly string $externalNumber,
    ) {}

    /** @return array{code:string,externalNumber:string} */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'externalNumber' => $this->externalNumber,
        ];
    }
}
