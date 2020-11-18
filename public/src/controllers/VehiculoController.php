<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Vehiculo;

class VehiculoController {
    public function getAll ($request, $response, $args)
    {
        // $rta = User::get();
        // $rta = User::find(1);
        $rta = Vehiculo::where('precio', '>',  0)
        // ->where('campo', 'operador', 'valor')        
        ->get();

        $response->getBody()->write(json_encode($rta));
        $lista = json_encode($rta);
        echo "hola";
        return $response;
    }

    // public function getOne($request, $response, $args)
    // {
    //     $id = $args['id'];
    //     $user = User::find($id);

    //     $response->getBody()->write(json_encode($user));
    //     return $response;
    // }

    // public function add($request, $response, $args)
    // {
    //     $user = new User;
    //     $user->id = $_POST['id']??"Falta id";
    //     $user->email = $_POST['email']??"Falta email";
    //     $user->tipo = $_POST['tipo']??"Falta tipo";
    //     $user->password = $_POST['password']??"Falta password";
    //     $user->foto = $_POST['foto']??"Falta foto";

    //     // echo "id" . $user->email;

    //     $rta = $user->save();

    //     // $rta = User::where('id', '>',  0);
    //     $response->getBody()->write(json_encode($rta));
    //     return $response;
    // }
    
    // public function update($request, $response, $args)
    // {
    //     $id = $args['id'];
        
    //     $user = User::find($id);
        
    //     $user->nombre = "Marcos";
    //     $user->apellido = "Ferrey";
    //     $rta = $user->save();
        
    //     $response->getBody()->write(json_encode($rta));
        
    //     return $response;
    // }
        
    //     public function delete($request, $response, $args)
    //     {
    //     $id = $args['id'];
    //     $user = User::find($id);

    //     $rta = $user->delete();

    //     $response->getBody()->write(json_encode($rta));
    //     return $response;
    // }
}