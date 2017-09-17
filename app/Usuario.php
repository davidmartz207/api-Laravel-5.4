<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	//Table definition
    protected $table='users';
    protected $primaryKey='id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firtsname','lastname','username', 'created_at', 'updated_at'
    ];

    //Metodo para listar 
    public static function lista(){
        //se consultan todos los elementos de la tabla
    	$usuarios = Usuario::all();
         //se devuelve resultados
         if(!is_null($usuarios)){
            return $usuarios;
         }else{
            return false;
         }     
    }


    //Metodo para guardar 
    public static function guardar($usuario){
         //se guardan los elementos
    	 
         if(!is_null($usuario->save())){
            return $usuario;
         }else{
            return false;
         }     
    }

    //Metodo para actualizar 
    public static function actualizar($usuario){
         //se guardan los elementos
    	 
         if(!is_null($usuario->update())){
            return $usuario;
         }else{
            return false;
         }     
    }

    //Metodo para borrar 
    public static function borrar($usuario){
         //se guardan los elementos
    	 
         if(!is_null($usuario->delete())){
            return $usuario;
         }else{
            return false;
         }     
    }

    //Metodo para comprobar la existencia de un usuario
    public static function existe($id){
         //se guardan los elementos
    	 if(Usuario::find($id)){
            return true;
         }else{
            return false;
         }     
    }
}
