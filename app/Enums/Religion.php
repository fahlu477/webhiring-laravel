<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ISLAM()
 * @method static static HINDU()
 * @method static static BUDHA()
 * @method static static KRISTENPROTESTAN()
 * @method static static KRISTENKATOLIK()
 */
final class Religion extends Enum
{
    const ISLAM = 1;
    const HINDU = 2;
    const BUDHA = 3;
    const KRISTENPROTESTAN = 4;
    const KRISTENKATOLIK = 5;

    public static function getDescription($value): string
    {
        if ($value === self::KRISTENPROTESTAN) {
            return 'Kristen Protestan';
        }

        if ($value === self::KRISTENKATOLIK) {
            return 'Kristen Katolik';
        }

        return parent::getDescription($value);
    }
}
