<?php

namespace App\Validators\Phone;

class MoroccoValidator extends BaseRegexValidator
{
    protected function regex(): string
    {
        return '/^\(+212\)\s?[5-9]\d{8}$/';
    }

    protected function code(): string
    {
        return '212';
    }

    protected function name(): string
    {
        return 'Morocco';
    }
}
