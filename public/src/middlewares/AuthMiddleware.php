<?php
namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Clases\Token;


class AuthMiddleware{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $jwt = true;
        $key = "primerparcial";

        if(Token::obtenerToken($key, "", "Token incorrecto")==false){
            $response = new Response();
            $rta = array("rta"=>"Acceso denegado");

            $response->getBody()->write(json_encode($rta));
            
            return $response;

        }else{
        }
        
        $response = $handler->handle($request);
    
        $existingContent = (string)$response->getBody();
        return $response;
    }
}