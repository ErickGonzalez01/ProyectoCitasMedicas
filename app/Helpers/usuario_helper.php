<?php

function getFullName(){

    $session = session();
    $user = $session->get("usuario");
    $user2 = $user["nombre"]." ".$user["apellido"];

    return $user2;

}