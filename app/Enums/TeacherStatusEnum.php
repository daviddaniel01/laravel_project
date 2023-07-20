<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TeacherStatusEnum extends Enum
{
    public const VAN_CONG_TAC = 0;
    public const CHUYEN_DON_VI = 1;
    public const DA_VE_HUU = 2;

    public static function getArrayView(): array
    {
        return [
            'Vẫn công tác' => self::VAN_CONG_TAC,
            'Chuyển đơn vị' => self::CHUYEN_DON_VI,
            'Đã về hưu' => self::DA_VE_HUU,
        ];
    }
    public static function getKeyByValue($value): string
    {
        return array_search($value, self::getArrayView(), true);
    }
}
