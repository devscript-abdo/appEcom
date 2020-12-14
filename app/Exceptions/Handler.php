<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;
use Throwable;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /* protected function unauthenticated($request, AuthenticationException $exception)
     {
         if ($request->expectsJson()) {
              return response()->json(['error' => 'Unauthenticated.'], 401);
          }
         $guard = Arr::get($exception->guards(), 0);
         var_dump($guard,'from Handler');
         // die();
         switch ($guard) {
             case 'admin':
                 $login = 'admin.login';
                 break;
             default:
                 $login = 'user.login';
                 break;
         }
         return redirect()->guest(route($login));
     }*/

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        /*if ($exception instanceof \ErrorException) {
             return response()->json([
                 'data' => 'Resource not found'
             ], 404);
         }*/
        /* if ($exception instanceof ModelNotFoundException) {
               return response()->json([
                   'data' => 'Resource not found'
               ], 404);
           }*/

        /* if ($exception instanceof InvalidFilterQuery) {
                   return response()->json([
                       'data' => 'Resource not found'
                   ], 404);
         }*/

        /* if ($exception instanceof MethodNotAllowedHttpException) {
             return response()->json([
                 'data' => 'sorry this method is not Allowed from Browser Directly'
             ], 404);
         }*/
        return parent::render($request, $exception);
    }
}
