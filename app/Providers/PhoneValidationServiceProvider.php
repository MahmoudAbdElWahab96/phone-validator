<?php

namespace App\Providers;

use App\Validators\Phone\CameroonValidator;
use App\Validators\Phone\EthiopiaValidator;
use App\Validators\Phone\MoroccoValidator;
use App\Validators\Phone\MozambiqueValidator;
use App\Validators\Phone\UgandaValidator;
use Illuminate\Support\ServiceProvider;

class PhoneValidationServiceProvider extends ServiceProvider
{
    protected array $validators = [
        CameroonValidator::class,
        EthiopiaValidator::class,
        MoroccoValidator::class,
        MozambiqueValidator::class,
        UgandaValidator::class,
    ];

    public function register(): void
    {
        foreach ($this->validators as $validator) {
            $this->app->bind($validator);
        }

        $this->app->tag($this->validators, 'phone.validators');
    }
}
