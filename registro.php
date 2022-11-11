<?php

    $estilo="form.css";
    $estilo2="modal.css";

    include "controlador.php";
    
    include "inc/cabecerahtml.php";
    include "inc/inicioheader.php";

    session_start();
    $nav="nav_no_inicio";
    if(nombreLogin())
        $nav="navinicio";
    
    include "inc/$nav.php";

    $message = "";
    $name = "";
    $pass = "";
    $pass2 = "";

    if(isset($_POST["nombre"]) && isset($_POST["password"])){
        $name = $_POST["nombre"];
        $pass = $_POST["password"];
        $pass2 = $_POST["password2"];

        if(isset($name) && isset($pass) && isset($pass2)){
        
            if (empty($name)) 
                $message = $message."<p>Es necesario un nombre de usuario</p>";
            if(empty($pass))
                $message = $message."<p>Es necesaria una contraseña</p>";
            if(empty($pass2) || $pass != $pass2)
                $message = $message."<p>Es necesario repetir la contraseña</p>";

            if($message == "")
                header("Location: inicio.php");
            
        }
    }
?>

    <main>
        <h2>Crear cuenta</h2>
        <form action="" method="post">
            <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" value="<?php echo $name; ?>">
            <label for="password">Contraseña: </label><input type="password" name="password" id="password" value="<?php echo $pass; ?>">
            <label for="password2">Repetir contraseña: </label><input type="password" name="password2" id="password2" value="<?php echo $pass2; ?>">
            <label for="correo">Correo electrónico: </label><input type="text" name="correo" id="correo">
            <label for="sexo">Sexo: </label>
            <select name="sexo" id="sexo">
                <option>Mujer</option>
                <option>Hombre</option>
                <option>Otro</option>
            </select>
            <label for="fecha">Fecha de nacimiento (dd/mm/yyyy): </label><input type="text" name="fecha" id="fecha">
            <label for="ciudad">Ciudad: </label><input type="text" name="ciudad" id="ciudad">
            <label for="paises">Pais: </label>
            <select name="paises" id="paises">
                <option>Alemania</option>
                <option>Andorra</option>
                <option>Dinamarca</option>
                <option>España</option>
                <option>Irlanda</option>
                <option>Islandia</option>
                <option>Italia</option>
                <option>Malta</option>
                <option>Portugal</option>
                <option>Uruguay</option>
            </select>
            <label for="foto">Foto: </label><input type="file" name="foto" id="foto" >
            <input type="submit" value="Crear cuenta" id="registrar">
            <p style="padding-top: 1em;"><?php if($message!="") { echo $message; } ?></p>
        </form>

    </main>
    
    <?php  
    include "inc/footer.php";

?>