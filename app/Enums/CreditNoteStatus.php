<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CreditNoteStatus: string implements HasLabel
{
    case CREATION = 'creation';
    case SENDED = 'sended';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::CREATION => 'En création',
            self::SENDED => 'Envoyée',
        };
    }
}
