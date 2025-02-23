<?php

namespace BohemicaStudio\PplMyApi\Models\Data\PplMyApi\Shipment;

class CashOnDelivery
{
    public function __construct(
        public readonly string $codCurrency,
        public readonly float $codPrice,
        public readonly ?string $codVarSym = null,
        public readonly ?string $iban = null,
        public readonly ?string $swift = null,
        public readonly ?string $specSymbol = null,
        public readonly ?string $account = null,
        public readonly ?string $accountPre = null,
        public readonly ?string $bankCode = null,
    ) {}

    /** @return array{codCurrency:string,codPrice:float,codVarSym?:string,iban?:string,swift?:string,specSymbol?:string,account?:string,accountPre?:string,bankCode?:string} */
    public function toArray(): array
    {
        return array_filter([
            'codCurrency' => $this->codCurrency,
            'codPrice' => $this->codPrice,
            'codVarSym' => $this->codVarSym,
            'iban' => $this->iban,
            'swift' => $this->swift,
            'specSymbol' => $this->specSymbol,
            'account' => $this->account,
            'accountPre' => $this->accountPre,
            'bankCode' => $this->bankCode,
        ], fn ($value) => $value !== null);
    }
}
