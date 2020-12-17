<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BELUMKAWIN()
 * @method static static KAWIN()
 * @method static static CERAI()
 */
final class MaritalStatus extends Enum
{
    const BELUMKAWIN = 1;
    const KAWIN = 2;
    const CERAI = 3;

    public static function getDescription($value): string
    {
        if ($value === self::BELUMKAWIN) {
            return 'Belum Kawin';
        }

        return parent::getDescription($value);
    }
}
