<?php

namespace BohemicaStudio\PplMyApi\Enums;

enum ProductList: string
{
    case ParcelCzechBusiness = 'BUSS';
    case ParcelCzechBusinessCod = 'BUSD';
    case ParcelCzechMorning = 'DOPO';
    case ParcelCzechMorningCod = 'DOPD';
    case ParcelConnectPlus = 'COPL';
    case ParcelCzechPrivate = 'PRIV';
    case ParcelCzechPrivateCod = 'PRID';
    case ParcelConnect = 'CONN';
    case ParcelConnectCod = 'COND';
    case ParcelReturnCzech = 'RETD';
    case ParcelCzechSmart = 'SMAR';
    case ParcelCzechSmartCod = 'SMAD';
    case ParcelSmartEurope = 'SMEU';
    case ParcelSmartEuropeCod = 'SMED';
    case ParcelReturnConnectImport = 'RECI';
    case ParcelReturnConnectEu = 'RECE';

    public function getLabel(): string
    {
        return match ($this) {
            self::ParcelCzechBusiness => 'PPL Parcel CZ Business',
            self::ParcelCzechBusinessCod => 'PPL Parcel CZ Business - dobírka',
            self::ParcelCzechMorning => 'PPL Parcel CZ Dopolední balík',
            self::ParcelCzechMorningCod => 'PPL Parcel CZ Dopolední balík - dobírka',
            self::ParcelConnectPlus => 'PPL Parcel Connect Plus',
            self::ParcelCzechPrivate => 'PPL Parcel CZ Private',
            self::ParcelCzechPrivateCod => 'PPL Parcel CZ Private - dobírka',
            self::ParcelConnect => 'PPL Parcel Connect',
            self::ParcelConnectCod => 'PPL Parcel Connect - dobírka',
            self::ParcelReturnCzech => 'PPL Parcel Return CZ',
            self::ParcelCzechSmart => 'PPL Parcel CZ Smart',
            self::ParcelCzechSmartCod => 'PPL Parcel CZ Smart - dobírka',
            self::ParcelSmartEurope => 'PPL Parcel Smart Europe',
            self::ParcelSmartEuropeCod => 'PPL Parcel Smart Europe - dobírka',
            self::ParcelReturnConnectImport => 'PPL Parcel Return Connect Import',
            self::ParcelReturnConnectEu => 'PPL Parcel Return Connect EU',
        };
    }
}
