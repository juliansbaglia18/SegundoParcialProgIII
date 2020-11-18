<?php

namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Clases\Token;
use PDO;

class ExistenMiddleware{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $email = $_POST['email']??"Falta email";
        $nombre = $_POST['nombre']??"Falta email";
        $clave = $_POST['clave']??"Falta clave";

        $pdo = new PDO('mysql:host=localhost;dbname=segundoparcial;charset=utf8', 'root',"");//objeto que gestiona la conexion a la base de datos
        $query = $pdo->query("select * from users");

        $resultado = $query->fetchAll();
        $flag = false;

        if($email == "Falta email"){
            foreach($resultado as $key => $value){
                if(strtolower($nombre) == strtolower($value['nombre']) && strtolower($clave) == strtolower($value['clave'])){
                    $flag = true;
                }
            }
        }else{
            foreach($resultado as $key => $value){
                    if(strtolower($email) == strtolower($value['email']) && $clave == strtolower($value['clave'])){
                        $flag = true;
                    }
                }

        }

        if($flag == false){

            $response = new Response();
            $rta = array("rta"=>"Datos invalidos repetido");
            
            $response->getBody()->write(json_encode($rta));
            
            return $response;
        }

        
        $response = $handler->handle($request);
    
        return $response;
    }
}