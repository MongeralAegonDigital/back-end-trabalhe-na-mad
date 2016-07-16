<?php

namespace MongeralAegonApi\Providers;

use Illuminate\Support\ServiceProvider;
use MongeralAegonApi\Services\Contracts\ProdutoServiceInterface;
use MongeralAegonApi\Services\ProdutoService;
use MongeralAegonApi\Models\Produto;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	//Resolve inst�ncias
    	$produtoService = new ProdutoService(new Produto());
    	
    	$this->app->instance(ProdutoService::class, $produtoService);
    	
    	//Registra a inje��o de depend�ncia
        $this->app->bind(ProdutoServiceInterface::class, ProdutoService::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
