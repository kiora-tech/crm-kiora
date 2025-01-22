<?php

namespace App\Enum;

enum Badge: string
{
    case HAUT = 'HAUT';
    case MOYEN = 'MOYEN';
    case BAS = 'BAS';

    public function getBadgeClass(): string
    {
        return match ($this) {
            self::HAUT => 'bg-danger',
            self::MOYEN => 'bg-warning',
            self::BAS => 'bg-success',
        };
    }
}
