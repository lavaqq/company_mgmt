<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum DealStatus: string implements HasLabel, HasColor
{
    case NEW = 'new';
    case DISCOVERY = 'discovery';
    case PROPOSAL = 'proposal';
    case NEGOTIATION = 'negotiation';
    case WON = 'won';
    case LOST = 'lost';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NEW => 'Nouveau',
            self::DISCOVERY => 'Découverte',
            self::PROPOSAL => 'Proposition',
            self::NEGOTIATION => 'Négotiation',
            self::WON => 'Gagné',
            self::LOST => 'Perdu',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::NEW => 'gray',
            self::DISCOVERY => 'gray',
            self::PROPOSAL => 'gray',
            self::NEGOTIATION => 'warning',
            self::WON => 'success',
            self::LOST => 'danger',
        };
    }
}
