<?php

namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Clases\Token;
use PDO;

class SoloAdminMiddleware{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $key = "segundoparcial";
        $array= Token::obtenerToken($key);
        $pdo = new PDO('mysql:host=localhost;dbname=segundoparcial;charset=utf8', 'root',"");
        $query = $pdo->query("select * from users");
        $flag = true;
        $resultado = $query->fetchAll();

        foreach($resultado as $key => $value){
            if( strtolower($array[1]) == strtolower($value['email'])){
                if($value['tipo'] != 'admin'){
                    $flag = false;
                }
                
            }
        }

        $flag = true;


        if ($flag == false){
            $response = new Response();
            $rta = array("rta"=>"Tipo invalido");
            $response->getBody()->write(json_encode($rta));
            
            return $response;
        }
        
        $response = $handler->handle($request);
    
        return $response;
    }
}