<?php

namespace App\Validators\Phone;

class MozambiqueValidator extends BaseRegexValidator
{
    protected function regex(): string
    {
        return '/^\(+258\)\s?[28]\d{7,8}$/';
    }

    protected function code(): string
    {
        return '258';
    }

    protected function name(): string
    {
        return 'Mozambique';
    }
}
