<?php

namespace MongeralAegonApi\Providers;

use Illuminate\Support\ServiceProvider;
use MongeralAegonApi\Services\Contracts\ProdutoServiceInterface;
use MongeralAegonApi\Services\ProdutoService;
use MongeralAegonApi\Models\Produto;
use MongeralAegonApi\Services\Contracts\CategoriaServiceInterface;
use MongeralAegonApi\Services\CategoriaService;
use MongeralAegonApi\Models\Categoria;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	//Resolve instâncias
    	$produtoService = new ProdutoService(new Produto());
    	$this->app->instance(ProdutoService::class, $produtoService);
    	
    	$categoriaService = new CategoriaService(new Categoria());
    	$this->app->instance(CategoriaService::class, $categoriaService);
    	
    	//Registra a injeção de dependência
        $this->app->bind(ProdutoServiceInterface::class, ProdutoService::class);
        $this->app->bind(CategoriaServiceInterface::class, CategoriaService::class);
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
