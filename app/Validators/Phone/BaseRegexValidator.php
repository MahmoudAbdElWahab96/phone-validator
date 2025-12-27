<?php

namespace App\Validators\Phone;

use App\Services\PhoneValidation\Contracts\PhoneValidatorInterface;

abstract class BaseRegexValidator implements PhoneValidatorInterface
{
    abstract protected function regex(): string;
    abstract protected function code(): string;
    abstract protected function name(): string;

    public function supports(string $phone): bool
    {
        return str_starts_with($phone, '(' . $this->code() . ')');
    }

    public function validate(string $phone): bool
    {
        return preg_match($this->regex(), $phone) === 1;
    }

    public function extract(string $phone): string
    {
        return trim(preg_replace('/^\(\d+\)\s*/', '', $phone));
    }

    public function countryName(): string
    {
        return $this->name();
    }

    public function countryCode(): string
    {
        return '+' . $this->code();
    }
}
