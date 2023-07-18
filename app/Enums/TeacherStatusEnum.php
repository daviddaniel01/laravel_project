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
    public const CONG_TAC = 0;
    public const CHUYEN_DON_VI = 1;
    public const VE_HUU = 2;
}
