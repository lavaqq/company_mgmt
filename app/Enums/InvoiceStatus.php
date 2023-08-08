<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum InvoiceStatus: string implements HasLabel
{
    case CREATION = 'creation';
    case SENDED = 'sended';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CREATION => 'En création',
            self::SENDED => 'Envoyée',
            self::PAID => 'Payée',
            self::CANCELLED => 'Annulée',
        };
    }
}
