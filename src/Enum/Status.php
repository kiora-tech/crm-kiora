<?php

namespace App\Enum;

enum Status: string
{
    case NOUVEAU = 'Nouveau';
    case CONTACTER = 'Contacter';
    case QUALIFIER = 'Qualifier';
    case PROPOSITION = 'Proposition';
    case NEGOCIATION = 'Negociation';
    case GAGNER = 'Gagner';
    case PERDU = 'Perdu';

    public function getStatusClass(): string
    {
        return match ($this) {
            self::NOUVEAU => 'bg-primary',
            self::CONTACTER => 'bg-secondary',
            self::QUALIFIER => 'bg-success',
            self::PROPOSITION => 'bg-warning',
            self::NEGOCIATION => 'bg-warning',
            self::GAGNER => 'bg-success',
            self::PERDU => 'bg-danger',
        };
    }
}