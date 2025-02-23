<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Response\Codelist;

class CountryModel
{
    public function __construct(
        public readonly string $code,
        public readonly string $name,
        public readonly bool $cashOnDelivery,
    ) {}

    /** @param \stdClass&object{code:string,name:string,cashOnDelivery:bool} $data */
    public static function from(\stdClass $data): self
    {
        return new self(
            code: $data->code,
            name: $data->name,
            cashOnDelivery: $data->cashOnDelivery,
        );
    }
}
