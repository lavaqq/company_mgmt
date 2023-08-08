<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum LeadOrigin: string implements HasLabel
{

    case UNKNOWN = "unknown";
    case INBOUND = "inbound";
    case OUTBOUND = "outbound";

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UNKNOWN => 'Inconnu',
            self::INBOUND => 'Entrant',
            self::OUTBOUND => 'Sortant',
        };
    }
}
