<?php

function getFullName(){
return session()->nombre ." ". session()->apellido;
}