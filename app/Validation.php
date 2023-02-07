<?php

namespace App;
class Validation{
    private $validacion=[
        "requiere",
        "is_numero",
        "is_empty",
        "alphaNumeric",
        "leng[]"
    ];
    public function GetPost(string $key=null){
        return $key ? $_POST[$key] : $_POST;
    }


}