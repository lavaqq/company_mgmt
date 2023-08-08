<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CountryCode: string implements HasLabel
{
    case AT = 'at';
    case BE = 'be';
    case BG = 'bg';
    case CY = 'cy';
    case CZ = 'cz';
    case DE = 'de';
    case DK = 'dk';
    case EE = 'ee';
    case EL = 'el';
    case ES = 'es';
    case FI = 'fi';
    case FR = 'fr';
    case HR = 'hr';
    case HU = 'hu';
    case IE = 'ie';
    case IT = 'it';
    case LT = 'lt';
    case LU = 'lu';
    case LV = 'lv';
    case MT = 'mt';
    case NL = 'nl';
    case PL = 'pl';
    case PT = 'pt';
    case RO = 'ro';
    case SE = 'se';
    case SI = 'si';
    case SK = 'sk';
    case XI = 'xi';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
