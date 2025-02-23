<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Response\Codelist;

class ServicePriceLimit
{
    public function __construct(
        public readonly string $service,
        public readonly string $currency,
        public readonly string $country,
        public readonly string $product,
        public readonly float $minValue,
        public readonly float $maxValue,
    ) {}

    /** @param \stdClass&object{service:string,currency:string,country:string,product:string,minValue:float,maxValue:float} $data */
    public static function from(\stdClass $data): self
    {
        return new self(
            service: $data->service,
            currency: $data->currency,
            country: $data->country,
            product: $data->product,
            minValue: $data->minValue,
            maxValue: $data->maxValue,
        );
    }
}
