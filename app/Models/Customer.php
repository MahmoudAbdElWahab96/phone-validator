<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Services\PhoneValidation\PhoneValidationService;


class Customer extends Model
{
    protected $table = 'customer';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'phone',
    ];

    protected $appends = ['phone_state'];

    public function getPhoneStateAttribute(): array
    {
        $cacheKey = "customer_phone_state_{$this->id}";

        return Cache::remember($cacheKey, 3600, function () {
            /** @var PhoneValidationService $service */
            $service = app(PhoneValidationService::class);

            return $service->validate($this->phone);
        });
    }
}
