<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Materia;
use Clases\Token;

class MateriaController {
    public function add ($request, $response, $args)
    {
        $flag = true;
        $materias = new Materia();
        $cupos = $_POST['cupos']??"Falta email";
        $cuatrimestre=$_POST['cuatrimestre']??"Falta tipo";
        $materia=$_POST['materia']??"Falta tipo";
        $password = $_POST['clave']??"Falta password";
        
        
        if($cuatrimestre != "1" && $cuatrimestre != "2" && $cuatrimestre != "3"&& $cuatrimestre != "4"){
            echo "Cuatrimestre invalido";
            $flag = false;
        }
        
        $list = Materia::where('id', '>',  0)->get();
        $id = 0;
        foreach($list as $a){
            if($a->id > $id){
                $id = $a->id;
            }
        }
        $id += 1;
    
    if($flag == true){
        $materias->id = $id;
        $materias->cupos = $cupos;
        $materias->nombre = $materia;
        // $materias->tipo = $tipo;
        $materias->cuatrimestre = $cuatrimestre;
            
            // echo "id" . $user->email;
    
            $rta = $materias->save();
    
            // $rta = User::where('id', '>',  0);
            $response->getBody()->write(json_encode($rta));
            return $response;
        }
        return $response;
    }
}