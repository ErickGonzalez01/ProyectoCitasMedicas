<?php

namespace App;

use DateTime;
use Exception;

abstract class Validacion
{

    private static $error = [];

    private static function createMessague($parametro)
    {
        switch ($parametro) {
            case "required":
                return " El parametro establecido es requerido";
                break;
            case "max_lenght":
                return " El parametro no cumple con la longitud establecida o es mayor";
                break;
            case "longitud":
                return " El parametro no cumple con la longitud especificada";
                break;
            case "is_Numeric":
                return " El parametro especificado no es un numero valido";
                break;
            case "timeVal":
                return " El formato de la hora no es valida";
                break;
            case "alphabet":
                return " La cadena introducida no es un string valido";
                break;
            case "min_length":
                return " La cadena no cumple la longitud minima";
                break;
            case "dateVal":
                return " La fecha espesificada no es valida";
                break;
        }
    }

    private static function setError($key, $msg)
    {
        self::$error[$key] = $msg;
    }
    public static function getErrorder(): array
    {
        return self::$error;
    }
    /**
     * Validaions Method recibe un array de parametro que contiene el key de la variable los parametro a validar como un array bidimencional
     * Este metodo optiene los key de la suer global $_POS => seguido los parametro como una cadena de strin separados por |
     * Parametros a validar:
     *required, max_lenght, longitud, is_Numeric, timeVal, alphabet, min_length, dateVal
     */
    public static function Validations(array $arrayParamValidate,array $arrayMsg=null):bool
    {

        $error = 0;

        foreach ($arrayParamValidate as $key => $item) {

            $arrayExpode = explode("|", $item);

            foreach ($arrayExpode as $para) {

                $arrayFuncionParam = self::receiveParam($para);

                if ($arrayFuncionParam === null) {
                    if(method_exists(self::class,$para)){
                        if (call_user_func([Validacion::class, $para], $_POST[$key]) === false) {
                            $error++;
                            if($arrayMsg!=null){
                                self::setError($key,$arrayMsg[$key][$para]);
                                continue;
                            }
                            self::setError($key,self::createMessague($para));
                        }
                    }else{
                        throw new Exception("El metodo de validacion no existe << ".$para." >>");
                    }
                } else {
                    if(method_exists(self::class,$arrayFuncionParam[1])){
                        if (call_user_func([Validacion::class, $arrayFuncionParam[1]], [$arrayFuncionParam[0], $_POST[$key]]) === false) {
                            $error++;
                            if($arrayMsg!=null){
                                self::setError($key,$arrayMsg[$key][$arrayFuncionParam[1]]);
                                continue;
                            }
                            self::setError($key,self::createMessague($arrayFuncionParam[1]));
                        }
                    }else{
                        throw new Exception("El metodo de validacion no existe << ".$arrayFuncionParam[1]." >>");
                    }                    
                }
            }
        }

        if ($error != 0) {
            return false;
        }
        return true;
    }
    public static function Val_String(string $value, array $param = [])
    {
        $error = 0;
        foreach ($param as $item) {

            $arrayFuncionParam = self::receiveParam($item);

            if ($arrayFuncionParam === null) {
                if (call_user_func([Validacion::class, $item], $value) === false) {
                    $error++;
                }
            } else {
                if (call_user_func([Validacion::class, $arrayFuncionParam[1]], [$arrayFuncionParam[0], $value]) === false) {
                    $error++;
                }
            }
        }

        if ($error == 0) {
            return true;
        }
        return false;
    }
    public static function receiveParam($item)
    {
        $star = strpos($item, "[");
        $fin = strpos($item, "]");

        if ($star > $fin || $star === false || $fin === false) {
            return null;
        }
        $extraerParametro = [substr($item, $star + 1, ($fin - $star) - 1), substr($item, 0, $star)];
        return $extraerParametro;
    }

    //Parametros de comparacion

    private static function required($val)
    {

        if (empty($val)) {//devuelve true si la cadena es "0"
            if($val==="0"){
                return true;
            }
            return false;
            
        }
        return true;
    }

    private static function max_lenght(array $param)
    {
        $strTexto = strlen($param[1]);// el valor que se va a validar
        $intLongitud = $param[0]; // el parametro con el que se va a validar
        if (strlen($param[1]) <= $param[0]) {
            return true;
        }
        //self::setError("La longitud excede lo especificado");
        return false;
    }

    private static function longitud(array $param)
    {
        if (strlen($param[1]) == $param[0]) {
            return true;
        }
        //self::setError("La longitud del parametro es diferente a lo especificado");
        return false;
        //return strlen($param[0])==$param[1] ? true : false;
    }

    private static function is_Numeric($value)
    {
        if (!is_numeric($value)) {
            //self::setError("No es un numero");
            return false;
        }
        return true;
    }

    private static function timeVal(array $value){
        $time = Date($value[0],strtotime($value[1]));
        if($time == $value[1]){
            return true;
        }
        return false;
    }

    private static function dateVal(array $value){
        $time = Date($value[0],strtotime($value[1]));
        if($time == $value[1]){
            return true;
        }
        return false;
    }

    private static function alphabet(string $strCadena){
        $strCharPermitidos="abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚáéíóúüÜ.";

        for ($i=0; $i<strlen($strCadena); $i++){
           if (strpos($strCharPermitidos, substr($strCadena,$i,1))===false){              
              return false;
           }
        }        
        return true;
    }
    private static function min_length(array $arrayCadenaParam){
        if(!is_numeric($arrayCadenaParam[0])){
            return false;
        }
        $intLongitudMinima=intval($arrayCadenaParam[0]);
        $strCadenaValue=$arrayCadenaParam[1];
        if($intLongitudMinima>strlen($strCadenaValue)){
            return false;
        }
        return true;
    }

    private static function is_bool($boolArgument){
        if(is_bool($boolArgument)){
            return true;
        }elseif($boolArgument ==="true"){
            return true;
        }elseif($boolArgument ==="false"){
            return true;
        }
        return false;
    }

    private static function mayor_que_numeric(array $arrayArgumet){
        if(!is_numeric($arrayArgumet[0]) || !is_numeric($arrayArgumet[1])){
            return false;
        }
        if(intval($arrayArgumet[1])>=intval($arrayArgumet[0])){
            return true;
        }
        return false;
    }
}
