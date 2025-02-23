<?php

namespace BohemicaStudio\PplMyApi\Services;

use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\AgeCheckType;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\CountryModel;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\CurrencyModel;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\ExternalNumberType;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\ProductType;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\ProofOfIdentityType;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\ServiceModel;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\ServicePriceLimit;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\ShipmentPhase;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\StatusModel;
use BohemicaStudio\PplMyApi\Models\Data\Response\Codelist\ValidationMessage;
use BohemicaStudio\PplMyApi\PplMyApi;
use GuzzleHttp\Utils;
use Illuminate\Support\Collection;

class PplMyApiCodelistService
{
    public function __construct(
        private readonly PplMyApi $apiService,
    ) {}

    /**
     * @return Collection<int,AgeCheckType>
     */
    public function getAgeCheckTypes(): Collection
    {
        $response = $this->apiService->request('/codelist/ageCheck', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:string,name:string}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => AgeCheckType::from($item));
    }

    /**
     * @return Collection<int,ProductType>
     */
    public function getProducts(): Collection
    {
        $response = $this->apiService->request('/codelist/product', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:string,name:string}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => ProductType::from($item));
    }

    /**
     * @return Collection<int,ExternalNumberType>
     */
    public function getExternalNumberTypes(): Collection
    {
        $response = $this->apiService->request('/codelist/externalNumber', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:string,name:string}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => ExternalNumberType::from($item));
    }

    /**
     * @return Collection<int,CountryModel>
     */
    public function getCountries(?bool $cashOnDelivery = null): Collection
    {
        $params = [
            'Limit' => 1000,
            'Offset' => 0,
        ];

        if ($cashOnDelivery !== null) {
            $params['cashOnDelivery'] = $cashOnDelivery ? 'true' : 'false';
        }

        $response = $this->apiService->request('/codelist/country', 'GET', $params);

        /** @var list<\stdClass&object{code:string,name:string,cashOnDelivery:bool}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => CountryModel::from($item));
    }

    /**
     * @return Collection<int,CurrencyModel>
     */
    public function getCurrencies(): Collection
    {
        $response = $this->apiService->request('/codelist/currency', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:string,name:string}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => CurrencyModel::from($item));
    }

    /**
     * @return Collection<int,ServiceModel>
     */
    public function getServices(): Collection
    {
        $response = $this->apiService->request('/codelist/service', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:string,name:string,cashOnDelivery:bool}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => ServiceModel::from($item));
    }

    /**
     * @return Collection<int,ServicePriceLimit>
     */
    public function getServicePriceLimits(
        ?string $service = null,
        ?string $currency = null,
        ?string $country = null,
        ?string $product = null,
    ): Collection {
        $params = [
            'Limit' => 1000,
            'Offset' => 0,
        ];

        if ($service !== null) {
            $params['Service'] = $service;
        }
        if ($currency !== null) {
            $params['Currency'] = $currency;
        }
        if ($country !== null) {
            $params['Country'] = $country;
        }
        if ($product !== null) {
            $params['Product'] = $product;
        }

        $response = $this->apiService->request('/codelist/servicePriceLimit', 'GET', $params);

        /** @var list<\stdClass&object{service:string,currency:string,country:string,product:string,minValue:float,maxValue:float}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => ServicePriceLimit::from($item));
    }

    /**
     * @return Collection<int,ShipmentPhase>
     */
    public function getShipmentPhases(): Collection
    {
        $response = $this->apiService->request('/codelist/shipmentPhase', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:int,name:string}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => ShipmentPhase::from($item));
    }

    /**
     * @return Collection<int,StatusModel>
     */
    public function getStatuses(): Collection
    {
        $response = $this->apiService->request('/codelist/status', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:string,name:string,description:?string}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => StatusModel::from($item));
    }

    /**
     * @return Collection<int,ValidationMessage>
     */
    public function getValidationMessages(): Collection
    {
        $response = $this->apiService->request('/codelist/validationMessage', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:string,message:string,type:string}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => ValidationMessage::from($item));
    }

    /**
     * @return Collection<int,ProofOfIdentityType>
     */
    public function getProofOfIdentityTypes(): Collection
    {
        $response = $this->apiService->request('/codelist/proofOfIdentityType', 'GET', [
            'Limit' => 1000,
            'Offset' => 0,
        ]);

        /** @var list<\stdClass&object{code:string,name:string}> $data */
        $data = Utils::jsonDecode($response->getBody()->getContents());

        return collect($data)
            ->map(fn ($item) => ProofOfIdentityType::from($item));
    }
}
