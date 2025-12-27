<?php

namespace App\Validators\Phone;

class UgandaValidator extends BaseRegexValidator
{
    protected function regex(): string
    {
        return '/^\(+256\)\s?\d{9}$/';
    }

    protected function code(): string
    {
        return '256';
    }

    protected function name(): string
    {
        return 'Uganda';
    }
}
