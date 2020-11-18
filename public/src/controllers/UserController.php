<?php
namespace App\Controllers;

use App\Models\User;
use Clases\Archivos;
use Clases\Token;
use function Clases;

class UserController {
    public function getAll ($request, $response, $args)
    {
        $rta = User::where('id', '>',  0)
        ->get();

        $response->getBody()->write(json_encode($rta));
        $lista = json_encode($rta);
        return $response;
    }

    public function getOne($request, $response, $args)
    {
        $id = $args['id'];
        $user = User::find($id);

        $response->getBody()->write(json_encode($user));
        return $response;
    }

    public function add($request, $response, $args)
    {
        $flag = true;
        $user = new User;
        $email = $_POST['email']??"Falta email";
        $nombre=$_POST['nombre']??"Falta tipo";
        $tipo=$_POST['tipo']??"Falta tipo";
        $password = $_POST['clave']??"Falta password";
        
        
        if($tipo != "admin" && $tipo != "alumno"&& $tipo != "profesor"){
            echo "Tipo de usuario invalido";
            $flag = false;
        }
        
        $list = User::where('id', '>',  0)->get();
        $id = 0;
        foreach($list as $a){
            if($a->id > $id){
                $id = $a->id;
            }
        }
        $id += 1;

    if($flag == true){
        $user->id = $id;
        $user->email = $email;
        $user->nombre = $nombre;
        $user->tipo = $tipo;
        $user->clave = $password;
            
            // echo "id" . $user->email;
    
            $rta = $user->save();
    
            // $rta = User::where('id', '>',  0);
            $response->getBody()->write(json_encode($rta));
            return $response;
        }
        return $response;
    }
    
    public function update($request, $response, $args)
    {
        $id = $args['id'];
        
        $user = User::find($id);
        
        $user->nombre = "Marcos";
        $user->apellido = "Ferrey";
        $rta = $user->save();
        
        $response->getBody()->write(json_encode($rta));
        
        return $response;
    }
        
        public function delete($request, $response, $args)
        {
        $id = $args['id'];
        $user = User::find($id);

        $rta = $user->delete();

        $response->getBody()->write(json_encode($rta));
        return $response;
    }
    public function login($request, $response, $args)
    {
        $key = "segundoparcial";

        $email = $_POST['email']??"Falta email";
        $nombre = $_POST['nombre']??"Falta nombre";
        $password = $_POST['clave']??"Falta password";
     
        $auxArray = array();
        if($nombre == "Falta nombre")
        {
            array_push($auxArray, $password);
            array_push($auxArray, $email);
        }else{
            array_push($auxArray, $password);
            array_push($auxArray, $email);

        }

       $rta = Token::crearToken($auxArray, $key);

       $response->getBody()->write(json_encode($rta));

        return $response;
    }
    public function practica1($request, $response, $args)
    {
        echo "Soy la practica";
        return $response;
    }
}