<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Shipment;

class Address
{
    public function __construct(
        public readonly string $country,
        public readonly string $zipCode,
        public readonly string $name,
        public readonly string $name2,
        public readonly string $street,
        public readonly string $city,
        public readonly string $contact,
        public readonly ?string $phone = null,
        public readonly ?string $email = null,
    ) {}

    /** @return array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string} */
    public function toArray(): array
    {
        return array_filter([
            'country' => $this->country,
            'zipCode' => $this->zipCode,
            'name' => $this->name,
            'name2' => $this->name2,
            'street' => $this->street,
            'city' => $this->city,
            'contact' => $this->contact,
            'phone' => $this->phone,
            'email' => $this->email,
        ], fn ($value) => $value !== null);
    }
}
