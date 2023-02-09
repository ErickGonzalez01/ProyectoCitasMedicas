<?php
namespace App;
abstract class Validacion{

    private static $error=[];
    
    private static function setError(string $strMsgError){
        self::$error[]=$strMsgError;
    }
    public static function getErrorder():array{
        return self::$error;
    }
    public static function Validations(array $arrayParamValidate){

        $error=0;

        foreach($arrayParamValidate as $key => $item){

            $arrayExpode= explode("|",$item);

            foreach($arrayExpode as $para){

                $arrayFuncionParam = self::receiveParam($para);

                if($arrayFuncionParam===null){
                    if(call_user_func([Validacion::class,$para],$_POST[$key])===false){
                        $error++;
                    }
                }else{
                    if(call_user_func([Validacion::class,$arrayFuncionParam[1]],[$arrayFuncionParam[0],$_POST[$key]])===false){
                        $error++;
                    }
                } 
            }
        }

        if($error!=0){
            return false;
        }
        return true;

    }
    public static function Val_String(string $value,array $param=[]){
        $error=0;
        foreach($param as $item){

            $arrayFuncionParam = self::receiveParam($item);

            if($arrayFuncionParam===null){
                if(call_user_func([Validacion::class,$item],$value)===false){
                    $error++;
                }
            }else{
                if(call_user_func([Validacion::class,$arrayFuncionParam[1]],[$arrayFuncionParam[0],$value])===false){
                    $error++;
                }
            }           

        }

        if($error==0){
            return true;
        }
        return false;
    }
    public static function receiveParam($item){
        $star = strpos($item,"[");
        $fin=strpos($item,"]");

        if($star>$fin || $star===false || $fin===false){
            return null;
        }
        $extraerParametro=[intval(substr($item,$star+1,($fin-$star)-1)),substr($item,0,$star)];
        return $extraerParametro;

    }

    //Parametros de comparacion

    private static function required($val){
        
        if(empty($val)){
            self::setError("Valor requerido");
            return false;
        }
        return true;
    }

    private static function max_lenght(array $param){
        $strTexto=strlen($param[1]);
        $intLongitud=$param[0];
        if(strlen($param[1])<=$param[0]){
            return true;
        }
        self::setError("La longitud excede lo especificado");
        return false;
    }

    private static function longitud(array $param){
        if(strlen($param[1])==$param[0]){
            return true;
        }
        self::setError("La longitud del parametro es diferente a lo especificado");
        return false;
        //return strlen($param[0])==$param[1] ? true : false;
    }
    
    private static function is_Numeric($value){
        if(!is_numeric($value)){
            self::setError("No es un numero");
            return false;
        }
        return true;
    }
    
}