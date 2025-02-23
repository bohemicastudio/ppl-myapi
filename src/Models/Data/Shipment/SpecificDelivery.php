<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Shipment;

class SpecificDelivery
{
    public function __construct(
        public readonly ?\DateTimeInterface $specificDeliveryDate = null,
        public readonly ?\DateTimeInterface $specificDeliveryTimeFrom = null,
        public readonly ?\DateTimeInterface $specificDeliveryTimeTo = null,
        public readonly ?\DateTimeInterface $specificTakeDate = null,
        public readonly ?string $parcelShopCode = null,
    ) {}

    /** @return array{specificDeliveryDate?:string,specificDeliveryTimeFrom?:string,specificDeliveryTimeTo?:string,specificTakeDate?:string,parcelShopCode?:string} */
    public function toArray(): array
    {
        return array_filter([
            'specificDeliveryDate' => $this->specificDeliveryDate?->format('Y-m-d\TH:i:s'),
            'specificDeliveryTimeFrom' => $this->specificDeliveryTimeFrom?->format('Y-m-d\TH:i:s'),
            'specificDeliveryTimeTo' => $this->specificDeliveryTimeTo?->format('Y-m-d\TH:i:s'),
            'specificTakeDate' => $this->specificTakeDate?->format('Y-m-d\TH:i:s'),
            'parcelShopCode' => $this->parcelShopCode,
        ], fn ($value) => $value !== null);
    }
}
