<?php

namespace App\Validators\Phone;


class CameroonValidator extends BaseRegexValidator
{
    protected function regex(): string
    {
        return '/^\(+237\)\s?[2368]\d{7,8}$/';
    }

    protected function code(): string
    {
        return '237';
    }

    protected function name(): string
    {
        return 'Cameroon';
    }
}
