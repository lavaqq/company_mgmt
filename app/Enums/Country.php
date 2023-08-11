<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Country: string implements HasLabel
{
    case GERMANY = 'allemagne';
    case AUSTRIA = 'autriche';
    case BELGIUM = 'belgique';
    case BULGARIA = 'bulgarie';
    case CYPRUS = 'chypre';
    case CROATIA = 'croatie';
    case DENMARK = 'danemark';
    case SPAIN = 'espagne';
    case ESTONIA = 'estonie';
    case FINLAND = 'finlande';
    case FRANCE = 'france';
    case GREECE = 'grèce';
    case HUNGARY = 'hongrie';
    case IRELAND = 'irlande';
    case ITALY = 'italie';
    case LATVIA = 'lettonie';
    case LITHUANIA = 'lituanie';
    case LUXEMBOURG = 'luxembourg';
    case MALTA = 'malte';
    case NETHERLANDS = 'pays-bas';
    case POLAND = 'pologne';
    case PORTUGAL = 'portugal';
    case ROMANIA = 'roumanie';
    case SLOVAKIA = 'slovaquie';
    case SLOVENIA = 'slovénie';
    case SWEDEN = 'suède';
    case CZECH_REPUBLIC = 'tchéquie';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::GERMANY => 'Allemagne',
            self::AUSTRIA => 'Autriche',
            self::BELGIUM => 'Belgique',
            self::BULGARIA => 'Bulgarie',
            self::CYPRUS => 'Chypre',
            self::CROATIA => 'Croatie',
            self::DENMARK => 'Danemark',
            self::SPAIN => 'Espagne',
            self::ESTONIA => 'Estonie',
            self::FINLAND => 'Finlande',
            self::FRANCE => 'France',
            self::GREECE => 'Grèce',
            self::HUNGARY => 'Hongrie',
            self::IRELAND => 'Irlande',
            self::ITALY => 'Italie',
            self::LATVIA => 'Lettonie',
            self::LITHUANIA => 'Lituanie',
            self::LUXEMBOURG => 'Luxembourg',
            self::MALTA => 'Malte',
            self::NETHERLANDS => 'Pays-Bas',
            self::POLAND => 'Pologne',
            self::PORTUGAL => 'Portugal',
            self::ROMANIA => 'Roumanie',
            self::SLOVAKIA => 'Slovaquie',
            self::SLOVENIA => 'Slovénie',
            self::SWEDEN => 'Suède',
            self::CZECH_REPUBLIC => 'Tchéquie',
        };
    }
}
