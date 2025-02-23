<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Response;

class ShipmentBatchDetailItem
{
    /**
     * @param  'Accepted'|'InProcess'|'Complete'  $state
     * @param  'Main'|'ShipmentSet'|'Dormant'  $relationType
     */
    public function __construct(
        public readonly string $state,
        public readonly string $relationType,
        public readonly ?string $shipmentNumber = null,
        public readonly ?string $labelUrl = null,
    ) {}
}
