<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TaskStatus: string implements HasLabel
{
    case DONE = 'done';
    case STUCK = 'stuck';
    case WORKING_ON_IT = 'working_on_it';
    case IN_PROGRESS = 'in_progress';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DONE => 'Fini',
            self::STUCK => 'Bloqué',
            self::WORKING_ON_IT => 'Travaille dessus',
            self::IN_PROGRESS => 'En cours',
        };
    }
}
