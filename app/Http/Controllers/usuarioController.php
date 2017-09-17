<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;


class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consulta la lista 
        return response()->json(Usuario::lista());
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); 
        $error=0;
        $mensaje="";
        $respuesta ="";
        foreach ($data as $key => $value) {

            $usuario = new Usuario();
            $usuario->id = $value['id'];
            $usuario->firtsname = $value['firtsname'];
            $usuario->lastname = $value['lastname'];
            $usuario->username = $value['username'];
            $usuario->created_at = $value['created_at'];
            $usuario->updated_at = $value['updated_at'];

            //verificamos que los campos no esten vacíos
            if (empty($usuario->id)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios ID <br>";  
            }elseif (empty($usuario->firtsname)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios FIRTSNAME <br>";  
            }elseif (empty($usuario->lastname)) {
                  $error=1;
                  $mensaje .= "Todos los campos son obligatorios LASTNAME <br>";  
            }elseif (empty($usuario->username)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios USERNAME <br>";  
            }elseif (empty($usuario->created_at)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios CREATED_AT <br>";  
            }elseif (empty($usuario->updated_at)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios UPDATED_AT <br>"; 
            //verificamos que el id que se está enviando no exista 
            }elseif (Usuario::existe($usuario->id)) {
                $error = 1;
                $mensaje = "ID de usuario ya existe <br>";
            }

            if ($error==0) {
                 $respuesta =$usuario->guardar($usuario);
            }else{
                 $respuesta  = array('ERROR' => $mensaje ); 
            } 

        }

        return response()->json($respuesta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all(); 
        $error=0;
        $mensaje="";
        $respuesta ="";
        foreach ($data as $key => $value) {
            //buscamos el usuario a editar
            if (!Usuario::existe($value['id'])) {
                $error = 1;
                $mensaje = "ID de usuario no existe <br>";
            }else{
                $usuario = Usuario::find($value['id']);
            }

            $usuario->firtsname = $value['firtsname'];
            $usuario->lastname = $value['lastname'];
            $usuario->username = $value['username'];
            $usuario->created_at = $value['created_at'];
            $usuario->updated_at = $value['updated_at'];

            //verificamos que los campos no esten vacíos
            if (empty($usuario->id)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios ID <br>";  
            }elseif (empty($usuario->firtsname)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios FIRTSNAME <br>";  
            }elseif (empty($usuario->lastname)) {
                  $error=1;
                  $mensaje .= "Todos los campos son obligatorios LASTNAME <br>";  
            }elseif (empty($usuario->username)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios USERNAME <br>";  
            }elseif (empty($usuario->created_at)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios CREATED_AT <br>";  
            }elseif (empty($usuario->updated_at)) {
                $error=1;
                $mensaje .= "Todos los campos son obligatorios UPDATED_AT <br>"; 
            //verificamos que el id que se está enviando no exista 
            }

            //si no hay error ejecutamos
            if ($error==0) {
                 $respuesta =$usuario->actualizar($usuario);
            }else{
                 $respuesta  = array('ERROR' => $mensaje ); 
            } 

        }

        return response()->json($respuesta);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            //elimina en específico
            $error=0;
            $mensaje="";
            $respuesta=[];
            //buscamos el usuario
            if (!Usuario::existe($id)) {
                $error = 1;
                $mensaje = "ID de usuario no existe <br>";
            }else{
                $usuario = Usuario::find($id);
            }

            //si no hay error ejecutamos
            if ($error==0) {
                 $respuesta =$usuario->borrar($usuario);
            }else{
                 $respuesta  = array('ERROR' => $mensaje ); 
            } 
        

        return response()->json($respuesta);
    }
}
