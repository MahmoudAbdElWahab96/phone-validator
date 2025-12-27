<?php

namespace App\Services\PhoneValidation;

use App\Services\PhoneValidation\Contracts\PhoneValidatorInterface;

class ValidatorResolver
{
    /** @var iterable<PhoneValidatorInterface> */
    private iterable $validators;

    public function __construct()
    {
        $this->validators = app()->tagged('phone.validators');
    }

    public function resolve(string $phone): ?PhoneValidatorInterface
    {
        foreach ($this->validators as $validator) {
            if ($validator->supports($phone)) {
                return $validator;
            }
        }

        return null;
    }

    public function all(): iterable
    {
        return $this->validators;
    }
}
