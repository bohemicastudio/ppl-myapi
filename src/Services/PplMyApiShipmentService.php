<?php

namespace BohemicaStudio\PplMyApi\Services;

use BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment\ShipmentBatch;
use BohemicaStudio\PplMyApi\Models\Data\Response\ShipmentBatchDetail;
use BohemicaStudio\PplMyApi\PplMyApi;
use GuzzleHttp\Utils;

class PplMyApiShipmentService
{
    public function __construct(
        private readonly PplMyApi $apiService,
    ) {}

    /**
     * @return string URL of the created shipment batch
     */
    public function createShipmentBatch(ShipmentBatch $shipmentBatch): string
    {
        return $this->apiService->request('/shipment/batch', 'POST', $shipmentBatch->toArray())->getHeader('Location')[0];
    }

    /**
     * Works only if there is only one shipment in the batch, otherwise use request method and parse the response yourself.
     */
    public function getShipmentBatchDetail(string $shipmentBatchUrl): ShipmentBatchDetail
    {
        /**
         * @var \stdClass&object{items:non-empty-array<object{
         *      referenceId:string,
         *      importState:'Accepted'|'InProcess'|'Complete',
         *      shipmentNumber:?string,
         *      labelUrl:?string,
         *      relatedItems:array<object{importState:'Accepted'|'InProcess'|'Complete',relationType:'ShipmentSet'|'Dormant',shipmentNumber:?string,labelUrl:?string}>,
         * }>, completeLabel:object{labelUrls:array<string>}|null} $body
         */
        $body = Utils::jsonDecode($this->apiService->request($shipmentBatchUrl)->getBody()->getContents());

        return ShipmentBatchDetail::fromRequest($body);
    }
}
