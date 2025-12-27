<?php

namespace App\Services;

use App\Filters\PhoneStateFilter;
use App\Repositories\Contracts\CustomerRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterPhoneNumbersService
{
    public function __construct(
        private CustomerRepositoryInterface $repository,
        private PhoneStateFilter $filter
    ) {}

    public function execute(
        ?string $country,
        ?string $state,
        int $perPage = 15
    ): LengthAwarePaginator {
        $customers = $this->repository->get();

        $filtered = $customers->filter(function ($customer) use ($country, $state) {
            return $this->filter->matches(
                $customer->phone_state,
                $country,
                $state
            );
        })->values();

        $mapped = $filtered->map(function ($customer) {
            $phoneState = $customer->phone_state;

            return [
                'country'      => $phoneState['country'] ?? 'Unknown',
                'state'        => $phoneState['state'] ?? 'N/A',
                'country_code' => $phoneState['country_code'] ?? 'N/A',
                'phone_number' => $phoneState['phone_number'] ?? $customer->phone,
            ];
        });

        $page = LengthAwarePaginator::resolveCurrentPage();
        $items = $mapped->forPage($page, $perPage)->values();

        return new LengthAwarePaginator(
            $items,
            $mapped->count(),
            $perPage,
            $page,
            [
                'path'  => request()->url(),
                'query' => request()->query(),
            ]
        );
    }
}
