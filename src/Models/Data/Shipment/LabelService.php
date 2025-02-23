<?php

namespace BohemicaStudio\PplMyApi\Models\Data\Shipment;

class LabelService
{
    public function __construct(
        public readonly bool $labelless,
    ) {}

    /** @return array{labelless:bool} */
    public function toArray(): array
    {
        return [
            'labelless' => $this->labelless,
        ];
    }
}
