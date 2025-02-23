<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Response;

class ShipmentBatchDetail
{
    /**
     * @param  'Accepted'|'InProcess'|'Complete'  $state
     * @param  array<ShipmentBatchDetailItem>  $items
     */
    public function __construct(
        public readonly string $referenceId,
        public readonly string $state,
        public readonly ?string $labelUrl,
        public readonly array $items,
    ) {}

    /**
     * @param \stdClass&object{items:non-empty-array<object{
     *      referenceId:string,
     *      importState:'Accepted'|'InProcess'|'Complete',
     *      shipmentNumber:?string,
     *      labelUrl:?string,
     *      relatedItems:array<object{importState:'Accepted'|'InProcess'|'Complete',relationType:'ShipmentSet'|'Dormant',shipmentNumber:?string,labelUrl:?string}>,
     * }>, completeLabel:object{labelUrls:array<string>}|null} $data
     */
    public static function fromRequest(\stdClass $data): self
    {
        $item = $data->items[0] ?? throw new \Exception('No items found in the response');

        return new self(
            referenceId: $item->referenceId,
            state: $item->importState,
            labelUrl: $data->completeLabel?->labelUrls[0] ?? null,
            items: [
                new ShipmentBatchDetailItem(
                    $item->importState,
                    'Main',
                    $item->shipmentNumber ?? null,
                    $item->labelUrl ?? null,
                ),
                ...array_map(fn ($i) => new ShipmentBatchDetailItem(
                    $i->importState,
                    $i->relationType,
                    $item->shipmentNumber ?? null,
                    $i->labelUrl ?? null,
                ), $item->relatedItems),
            ],
        );
    }

    public function isFullyCompleted(): bool
    {
        return $this->state === 'Complete' && count(array_filter($this->items, fn (ShipmentBatchDetailItem $item) => $item->state === 'Complete')) === count($this->items);
    }
}
