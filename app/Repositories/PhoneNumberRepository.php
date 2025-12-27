<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Contracts\PhoneNumberRepositoryInterface;
use Illuminate\Support\Collection;

class PhoneNumberRepository implements PhoneNumberRepositoryInterface
{
    public function get(): Collection
    {
        return Customer::all();
    }
}
