<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        /** Usado somente em dev*/
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return response()->json($exception->errors(), 422); 
        }

        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            return response()->json('Registro não encontrado.', 404); 
        }
        
        if ($exception instanceof \Illuminate\Database\QueryException) {
            if ($exception->getCode() == 23000) {
                return response()->json(
                    'Este registro já se encontra cadastrado, não é possível realizar outro cadastro', 
                    422
                ); 
            }
        }
        
        return parent::render($request, $exception);
    }
}
