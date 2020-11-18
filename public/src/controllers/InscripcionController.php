<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Inscripcion;
use Clases\Token;
use PDO;


class InscripcionController {
public function add ($request, $response, $args)
    {
        $idMateria = $args['id'];
        $idUser = '';
        $inscripcion = new Inscripcion;


        $key = "segundoparcial";
        $array= Token::obtenerToken($key);
        $pdo = new PDO('mysql:host=localhost;dbname=segundoparcial;charset=utf8', 'root',"");
        $query = $pdo->query("select * from users");
        $flag = true;
        $resultado = $query->fetchAll();

        foreach($resultado as $key => $value){
            if( strtolower($array[1]) == strtolower($value['email'])){
                $idUser = $value['id'];
                
            }
        }

        $inscripcion->idalumno = $idUser;
        $inscripcion->idmateria = $idMateria;
            
    
        $rta = $inscripcion->save();
        $response->getBody()->write(json_encode($rta));
        return $response;

    }
} 