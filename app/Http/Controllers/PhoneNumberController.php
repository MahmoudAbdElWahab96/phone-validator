<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneFilterRequest;
use App\Services\FilterPhoneNumbersService;
use App\Services\PhoneValidation\PhoneValidationService;

class PhoneNumberController extends Controller
{
    public function __invoke(
        PhoneFilterRequest $request,
        FilterPhoneNumbersService $service,
        PhoneValidationService $phoneService
    ) {
        $perPage = (int) $request->query('per_page', 15);
        $perPage = min(max($perPage, 5), 100);

        $phoneNumbers = $service->execute(
            $request->country(),
            $request->state(),
            $perPage
        );

        return view('phones.index', [
            'phoneNumbers'    => $phoneNumbers,
            'countries'       => $phoneService->countries(),
            'selectedCountry' => $request->country(),
            'selectedState'   => $request->state(),
        ]);
    }
}
