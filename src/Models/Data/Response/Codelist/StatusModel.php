<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Response\Codelist;

class StatusModel
{
    public function __construct(
        public readonly string $code,
        public readonly string $name,
        public readonly ?string $description,
    ) {}

    /** @param \stdClass&object{code:string,name:string,description:?string} $data */
    public static function from(\stdClass $data): self
    {
        return new self(
            code: $data->code,
            name: $data->name,
            description: $data->description ?? null,
        );
    }
}
