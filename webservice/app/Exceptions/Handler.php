<?php

namespace MongeralAegonApi\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
    	dd($e->getTraceAsString());
    	//pega todas as exceptions ocorridas
    	//e retorna um json com a mensagem de erro, 
    	//e seta o status da requisição para 500
    	if($e instanceof \Exception) {
    		return response()->json("Ocorreu um erro: {$e->getMessage()}", 500);
    	}
    	
    	if($e instanceof NotFoundHttpException) {
    		return response()->json("Ocorreu um erro: {$e->getMessage()}", 404);
    	}
    	
        return parent::render($request, $e);
    }
}
