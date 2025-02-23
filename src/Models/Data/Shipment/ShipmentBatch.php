<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class ShipmentBatch
{
    /**
     * @param  array<Shipment>  $shipments
     */
    public function __construct(
        public readonly array $shipments,
        public readonly ?ReturnChannel $returnChannel = null,
        public readonly ?LabelSettings $labelSettings = null,
        public readonly ?string $shipmentsOrderBy = null,
    ) {}

    /** @return array{
     *     shipments:array<array{
     *         productType:string,
     *         recipient:array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *         referenceId:string,
     *         shipmentNumber?:string,
     *         note?:string,
     *         depot?:string,
     *         ageCheck?:string,
     *         integratorId?:int,
     *         shipmentSet?: array{numberOfShipments:int,shipmentSetItems:array<array{
     *             shipmentNumber:string,
     *             weighedShipmentInfo?:array{weight:float},
     *             externalNumbers:array<array{code:string,externalNumber:string}>,
     *             insurance?:array{insuranceCurrency:string,insurancePrice:float}
     *         }>},
     *         backAddress?: array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *         sender?: array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *         senderMask?: array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *         specificDelivery?: array{specificDeliveryDate?:string,specificDeliveryTimeFrom?:string,specificDeliveryTimeTo?:string,specificTakeDate?:string,parcelShopCode?:string},
     *         cashOnDelivery?: array{codCurrency:string,codPrice:float,codVarSym?:string,iban?:string,swift?:string,specSymbol?:string,account?:string,accountPre?:string,bankCode?:string},
     *         insurance?: array{insuranceCurrency:string,insurancePrice:float},
     *         externalNumbers?: array<array{code:string,externalNumber:string}>,
     *         services?: array<array{code:string}>,
     *         dormant?: array{
     *             shipmentNumber:string,
     *             note?:string,
     *             recipient:array{country:string,zipCode:string,name:string,name2:string,street:string,city:string,contact:string,phone?:string,email?:string},
     *             externalNumbers:array<array{code:string,externalNumber:string}>,
     *             services:array<array{code:string}>,
     *             weighedShipmentInfo?:array{weight:float}
     *         },
     *         shipmentRouting?: array{inputRouteCode:string},
     *         directInjection?: array{directAddressing:bool,gatewayZipCode?:string,gatewayCity?:string,country?:string},
     *         labelService?: array{labelless:bool}
     *     }>,
     *     returnChannel?:array{type:string,address?:string},
     *     labelSettings?:array{format:string,dpi?:int,completeLabelSettings?:array{isCompleteLabelRequested:bool,pageSize:string,position?:int}},
     *     shipmentsOrderBy?:string
     * }
     */
    public function toArray(): array
    {
        return array_filter([
            'shipments' => array_map(fn (Shipment $shipment) => $shipment->toArray(), $this->shipments),
            'returnChannel' => $this->returnChannel?->toArray(),
            'labelSettings' => $this->labelSettings?->toArray(),
            'shipmentsOrderBy' => $this->shipmentsOrderBy,
        ], fn ($value) => $value !== null);
    }
}
