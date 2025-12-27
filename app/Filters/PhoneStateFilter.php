<?php

namespace App\Filters;

class PhoneStateFilter
{
    public function matches(array $state, ?string $country, ?string $stateName): bool
    {
        if ($country && $state['country_code'] !== $country) {
            return false;
        }

        if ($stateName && strtolower($state['state']) !== strtolower($stateName)) {
            return false;
        }

        return true;
    }
}
