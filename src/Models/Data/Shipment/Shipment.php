<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Shipment;

class Shipment
{
    public function __construct(
        public readonly string $productType,
        public readonly Address $recipient,
        public readonly string $referenceId,
        public readonly ?string $shipmentNumber = null,
        public readonly ?string $note = null,
        public readonly ?string $depot = null,
        public readonly ?string $ageCheck = null,
        public readonly ?int $integratorId = null,
        public readonly ?ShipmentSet $shipmentSet = null,
        public readonly ?Address $backAddress = null,
        public readonly ?Address $sender = null,
        public readonly ?Address $senderMask = null,
        public readonly ?SpecificDelivery $specificDelivery = null,
        public readonly ?CashOnDelivery $cashOnDelivery = null,
        public readonly ?Insurance $insurance = null,
        /** @var array<ExternalNumber> */
        public readonly array $externalNumbers = [],
        /** @var array<Service> */
        public readonly array $services = [],
        public readonly ?Dormant $dormant = null,
        public readonly ?ShipmentRouting $shipmentRouting = null,
        public readonly ?DirectInjection $directInjection = null,
        public readonly ?LabelService $labelService = null,
    ) {}

    /**
     * @return array{
     *     productType: string,
     *     recipient: array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *     referenceId: string,
     *     shipmentNumber?: string,
     *     note?: string,
     *     depot?: string,
     *     ageCheck?: string,
     *     integratorId?: int,
     *     shipmentSet?: array{numberOfShipments:int,shipmentSetItems:array<array{
     *         shipmentNumber:string,
     *         weighedShipmentInfo?:array{weight:float},
     *         externalNumbers:array<array{code:string,externalNumber:string}>,
     *         insurance?:array{insuranceCurrency:string,insurancePrice:float}
     *     }>},
     *     backAddress?: array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *     sender?: array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *     senderMask?: array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *     specificDelivery?: array{specificDeliveryDate?:string,specificDeliveryTimeFrom?:string,specificDeliveryTimeTo?:string,specificTakeDate?:string,parcelShopCode?:string},
     *     cashOnDelivery?: array{codCurrency:string,codPrice:float,codVarSym?:string,iban?:string,swift?:string,specSymbol?:string,account?:string,accountPre?:string,bankCode?:string},
     *     insurance?: array{insuranceCurrency:string,insurancePrice:float},
     *     externalNumbers?: array<array{code:string,externalNumber:string}>,
     *     services?: array<array{code:string}>,
     *     dormant?: array{
     *         shipmentNumber:string,
     *         note?:string,
     *         recipient:array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *         externalNumbers:array<array{code:string,externalNumber:string}>,
     *         services:array<array{code:string}>,
     *         weighedShipmentInfo?:array{weight:float}
     *     },
     *     shipmentRouting?: array{inputRouteCode:string},
     *     directInjection?: array{directAddressing:bool,gatewayZipCode?:string,gatewayCity?:string,country?:string},
     *     labelService?: array{labelless:bool}
     * }
     */
    public function toArray(): array
    {
        return array_filter([
            'productType' => $this->productType,
            'recipient' => $this->recipient->toArray(),
            'referenceId' => $this->referenceId,
            'shipmentNumber' => $this->shipmentNumber,
            'note' => $this->note,
            'depot' => $this->depot,
            'ageCheck' => $this->ageCheck,
            'integratorId' => $this->integratorId,
            'shipmentSet' => $this->shipmentSet?->toArray(),
            'backAddress' => $this->backAddress?->toArray(),
            'sender' => $this->sender?->toArray(),
            'senderMask' => $this->senderMask?->toArray(),
            'specificDelivery' => $this->specificDelivery?->toArray(),
            'cashOnDelivery' => $this->cashOnDelivery?->toArray(),
            'insurance' => $this->insurance?->toArray(),
            'externalNumbers' => array_map(fn ($n) => $n->toArray(), $this->externalNumbers),
            'services' => array_map(fn ($s) => $s->toArray(), $this->services),
            'dormant' => $this->dormant?->toArray(),
            'shipmentRouting' => $this->shipmentRouting?->toArray(),
            'directInjection' => $this->directInjection?->toArray(),
            'labelService' => $this->labelService?->toArray(),
        ], fn ($value) => $value !== null);
    }
}
