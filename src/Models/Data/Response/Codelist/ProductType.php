<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Response\Codelist;

class ProductType
{
    public function __construct(
        public readonly string $code,
        public readonly string $name,
    ) {}

    /** @param \stdClass&object{code:string,name:string} $data */
    public static function from(\stdClass $data): self
    {
        return new self(
            code: $data->code,
            name: $data->name,
        );
    }
}
