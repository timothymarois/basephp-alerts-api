<?php namespace App\Middleware;

class Response
{

    public function handle($request, $next)
    {
        return $next($request);
    }


    public function terminate($request, $response)
    {
        $body = (array) $response->getBody();

        $response->setBody([
            'errors'  => config('api.error','false'),
            'message' => config('api.message',''),
            'runtime' => '{APP_TIME}',
            'version' => 'v1',
            'results' => $body
        ]);

        return $response;
    }

}
