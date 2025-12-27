<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PhoneNumberRepositoryInterface
{
    public function get(): Collection;
}
