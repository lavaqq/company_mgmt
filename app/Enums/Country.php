<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Country: string implements HasLabel
{
    case GERMANY = 'germany';
    case AUSTRIA = 'austria';
    case BELGIUM = 'belgium';
    case BULGARIA = 'bulgaria';
    case CYPRUS = 'cyprus';
    case CROATIA = 'croatia';
    case DENMARK = 'denmark';
    case SPAIN = 'spain';
    case ESTONIA = 'estonia';
    case FINLAND = 'finland';
    case FRANCE = 'france';
    case GREECE = 'greece';
    case HUNGARY = 'hungary';
    case IRELAND = 'ireland';
    case ITALY = 'italy';
    case LATVIA = 'latvia';
    case LITHUANIA = 'lithuania';
    case LUXEMBOURG = 'luxembourg';
    case MALTA = 'malta';
    case NETHERLANDS = 'netherlands';
    case POLAND = 'poland';
    case PORTUGAL = 'portugal';
    case ROMANIA = 'romania';
    case SLOVAKIA = 'slovakia';
    case SLOVENIA = 'slovenia';
    case SWEDEN = 'sweden';
    case CZECH_REPUBLIC = 'czech_republic';

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
