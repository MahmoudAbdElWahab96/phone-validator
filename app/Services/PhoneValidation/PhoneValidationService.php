<?php

namespace App\Services\PhoneValidation;

class PhoneValidationService
{
    public function __construct(
        private ValidatorResolver $resolver
    ) {}

    public function validate(string $phone): array
    {
        $validator = $this->resolver->resolve($phone);

        if (!$validator) {
            return [
                'country' => 'Unknown',
                'country_code' => null,
                'state' => 'nok',
                'phone_number' => $phone,
            ];
        }

        return [
            'country' => $validator->countryName(),
            'country_code' => (string) $validator->countryCode(),
            'state' => $validator->validate($phone) ? 'ok' : 'nok',
            'phone_number' => $validator->extract($phone),
        ];
    }

    public function countries(): array
    {
        return collect($this->resolver->all())
            ->map(fn($v) => [
                'name' => $v->countryName(),
                'code' => $v->countryCode(),
            ])
            ->values()
            ->toArray();
    }
}
