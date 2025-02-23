<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class LabelSettings
{
    public function __construct(
        public readonly string $format = 'Pdf',
        public readonly ?int $dpi = null,
        public readonly ?CompleteLabelSettings $completeLabelSettings = null,
    ) {}

    /** @return array{format:string,dpi?:int,completeLabelSettings?:array{isCompleteLabelRequested:bool,pageSize:string,position?:int}} */
    public function toArray(): array
    {
        return array_filter([
            'format' => $this->format,
            'dpi' => $this->dpi,
            'completeLabelSettings' => $this->completeLabelSettings?->toArray(),
        ], fn ($value) => $value !== null);
    }
}
