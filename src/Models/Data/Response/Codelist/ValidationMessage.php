<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Response\Codelist;

class ValidationMessage
{
    public function __construct(
        public readonly string $code,
        public readonly string $message,
        public readonly string $type,
    ) {}

    /** @param \stdClass&object{code:string,message:string,type:string} $data */
    public static function from(\stdClass $data): self
    {
        return new self(
            code: $data->code,
            message: $data->message,
            type: $data->type,
        );
    }
}
