<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Shipment;

class CompleteLabelSettings
{
    public function __construct(
        public readonly bool $isCompleteLabelRequested = true,
        public readonly string $pageSize = 'A4',
        public readonly ?int $position = null,
    ) {}

    /** @return array{isCompleteLabelRequested:bool,pageSize:string,position?:int} */
    public function toArray(): array
    {
        return array_filter([
            'isCompleteLabelRequested' => $this->isCompleteLabelRequested,
            'pageSize' => $this->pageSize,
            'position' => $this->position,
        ], fn ($value) => $value !== null);
    }
}
