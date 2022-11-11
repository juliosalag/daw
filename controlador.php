<?php 

// Funcion que comprueba si un Usuario esta logueado
function logueado(){
    return isset($_SESSION['usuario']);
}

// Funcion que devuelve el usuario logueado
function nombreLogin(){
    if(logueado())
        return $_SESSION['usuario'];
    else
        return "";
}

?>