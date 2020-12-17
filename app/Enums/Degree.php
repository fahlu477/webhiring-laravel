<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SD()
 * @method static static SMP()
 * @method static static SMA()
 * @method static static S1()
 * @method static static S2()
 * @method static static S3()
 */
final class Degree extends Enum
{
    const SD  = 1;
    const SMP = 2;
    const SMA = 3;
    const S1  = 4;
    const S2  = 5;
    const S3  = 6;

    public static function getDescription($value): string
    {
        if ($value === self::SD) {
            return 'Sekolah Dasar';
        }

        if ($value === self::SMP) {
            return 'Sekolah Menengah Pertama';
        }

        if ($value === self::SMA) {
            return 'Sekolah Menengah Atas';
        }

        if ($value === self::S1) {
            return 'Strata 1 / Sarjana';
        }

        if ($value === self::S2) {
            return 'Strata 2 / Magister';
        }

        if ($value === self::S3) {
            return 'Strata 3 / Doktor';
        }

        return parent::getDescription($value);
    }
}
