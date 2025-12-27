<?php

namespace App\Validators\Phone;


class EthiopiaValidator extends BaseRegexValidator
{
    protected function regex(): string
    {
        return '/^\(+251\)\s?[1-59]\d{8}$/';
    }

    protected function code(): string
    {
        return '251';
    }

    protected function name(): string
    {
        return 'Ethiopia';
    }
}
