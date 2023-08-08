<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum LeadStatus: string implements HasLabel
{
    case NEW = 'new';
    case WAITING_FOR_CONTACT = 'waiting_for_contact';
    case CONTACTED = 'contacted';
    case QUALIFIED = 'qualified';
    case UNQUALIFIED = 'unqualified';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NEW => 'Nouveau',
            self::WAITING_FOR_CONTACT => 'En attente de contact',
            self::CONTACTED => 'Contacté',
            self::QUALIFIED => 'Qualifié',
            self::UNQUALIFIED => 'Non qualifié',
        };
    }
}
