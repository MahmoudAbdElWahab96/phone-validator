<?php

namespace App\Services\PhoneValidation\Contracts;

interface PhoneValidatorInterface
{
    public function supports(string $phone): bool;

    public function validate(string $phone): bool;

    public function countryName(): string;

    public function countryCode(): string;

    public function extract(string $phone): string;
}
