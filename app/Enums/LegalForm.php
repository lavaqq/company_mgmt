<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum LegalForm: string implements HasLabel
{
    case SA = 'sa';
    case SAS = 'sas';
    case SNC = 'snc';
    case SCS = 'scs';
    case SCOP = 'scop';
    case SCM = 'scm';
    case SELARL = 'selarl';
    case SCI = 'sci';
    case EURL = 'eurl';
    case SASU = 'sasu';
    case SEP = 'sep';
    case SELAS = 'selas';
    case SELAFA = 'selafa';
    case SEM = 'sem';
    case SCA = 'sca';
    case SRL = 'srl';
    case SARL = 'sarl';
    case SPRL = 'sprl';
    case INDEPENDENT = 'independant';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SA => 'SA (Société Anonyme)',
            self::SAS => 'SAS (Société par Actions Simplifiée)',
            self::SNC => 'SNC (Société en Nom Collectif)',
            self::SCS => 'SCS (Société en Commandite Simple)',
            self::SCOP => 'SCOP (Société Coopérative et Participative)',
            self::SCM => 'SCM (Société Civile de Moyens)',
            self::SELARL => "SELARL (Société d'Exercice Libéral à Responsabilité Limitée)",
            self::SCI => 'SCI (Société Civile Immobilière)',
            self::EURL => 'EURL (Entreprise Unipersonnelle à Responsabilité Limitée)',
            self::SASU => 'SASU (Société par Actions Simplifiée Unipersonnelle)',
            self::SEP => 'SEP (Société en Participation)',
            self::SELAS => "SELAS (Société d'Exercice Libéral par Actions Simplifiée)",
            self::SELAFA => "SELAFA (Société d'Exercice Libéral à Forme Anonyme)",
            self::SEM => "SEM (Société d'Economie Mixte)",
            self::SCA => 'SCA (Société en Commandite par Actions)',
            self::SRL => 'SRL (Société à Responsabilité Limitée)',
            self::SARL => 'SARL (Société à Responsabilité Limitée)',
            self::SPRL => 'SPRL (Société Privée à Responsabilité Limitée)',
            self::INDEPENDENT => 'Indépendant',
        };
    }
}
