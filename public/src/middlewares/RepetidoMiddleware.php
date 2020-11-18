<?php

namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Clases\Token;
use PDO;

class RepetidoMiddleware{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $email = $_POST['email']??"Falta email";

        $pdo = new PDO('mysql:host=localhost;dbname=segundoparcial;charset=utf8', 'root',"");//objeto que gestiona la conexion a la base de datos
        $query = $pdo->query("select * from users");

        $resultado = $query->fetchAll();

        foreach($resultado as $key => $value){
            if( $email == $value['email']){
                $response = new Response();
                $rta = array("rta"=>"Email repetido");
    
                $response->getBody()->write(json_encode($rta));
                
                return $response;
                   
            }
        }

        
        $response = $handler->handle($request);
    
        return $response;
    }
}