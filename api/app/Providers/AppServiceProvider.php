<?php

namespace App\Providers;

use App\Services\AddressService;
use App\Services\CategoryService;
use App\Services\CepService;
use App\Services\EmailService;
use App\Services\UserService;
use App\Services\Impl\AddressServiceImpl;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\CepServiceImpl;
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
        $this->app->bind(CategoryService::class, CategoryServiceImpl::class);
        $this->app->bind(CepService::class, CepServiceImpl::class);
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
