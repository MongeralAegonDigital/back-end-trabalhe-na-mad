<?php

namespace App\Providers;

use App\Services\AddressService;
use App\Services\EmailService;
use App\Services\UserService;
use App\Services\Impl\AddressServiceImpl;
use App\Services\Impl\EmailServiceImpl;
use App\Services\Impl\PersonalDataServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\PersonalDataService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserService::class, UserServiceImpl::class);
        $this->app->bind(AddressService::class, AddressServiceImpl::class);
        $this->app->bind(PersonalDataService::class, PersonalDataServiceImpl::class);
        $this->app->bind(EmailService::class, EmailServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('cpf', '\App\Utils\CpfValidation@validate');
    }
}
