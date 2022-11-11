<?php
    
    //Iniciar una nueva sesión o reanudar la existente
    session_start(); 

    include "controlador.php";

    $estilo="form.css";
    $estilo2="modal.css";
    $js="form.js";
    include "inc/cabecerahtml.php";
    include "inc/inicioheader.php";
    
    $nav="nav_no_inicio";
    /*if(logueado())
        $nav="navinicio";*/

    include "inc/$nav.php";

    $message = "";

    if(isset($_POST["nombre"]) && isset($_POST["password"])){
        $name = $_POST["nombre"];
        $pass = $_POST["password"];

        if(isset($name) && isset($pass)){
        
            if (empty($name)) 
                $message = "Es necesario un nombre de usuario";
            else if(empty($pass))
                $message = "Es necesaria una contraseña";
            else if(!login($name, $pass))
                $message = "Usuario no validado";
            else
                header("Location: index.php");
            
        }
    }

    // Funcion que loguea un Usuario
    function login($user, $password){
        $arr = array(
            'juan' => 'juan',
            'maria' => 'maria',
            'ana' => 'ana',
            'julio' => 'julio'
        );
        
        foreach ($arr as $key => $value) 
            if($user == $key && $password == $value){
                $_SESSION['usuario'] = $user;
                return true;
            }
            
        return false;
    }

?>

    <main>
        <h2>Iniciar sesión</h2>
        <form action="" method="post">
            <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre">
            <label for="password">Contraseña: </label><input type="password" name="password" id="password">
            <input type="submit" id="inicio" value="Iniciar Sesion">
            <p style="padding-top: 1em;"><?php if($message!="") { echo $message; } ?></p>
        </form>
    
    </main>

    <?php  
    include "inc/footer.php";

?>