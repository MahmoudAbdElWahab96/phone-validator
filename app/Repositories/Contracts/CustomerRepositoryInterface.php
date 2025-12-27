<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface CustomerRepositoryInterface
{
    public function get(): Collection;
}
