<?php
namespace App\Middlewares;

class JsonMiddleware{

    public function __invoke($request, $handler)
    {
        $response = $handler->handle($request);
        // $response->getBody()->write('AFTER');
    
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }
    
}