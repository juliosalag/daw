<?php

    $estilo="foto.css";

    include "controlador.php";
    
    include "inc/cabecerahtml.php";
    include "inc/inicioheader.php";

    session_start();
    $nav="nav_no_inicio";
    if(nombreLogin())
        $nav="navinicio";
    else
        header("Location:aviso.php");
    
    include "inc/$nav.php";
?>

    <main>
        <h2>Usuario</h2>
        <a href="#" class="boton">Editar perfil</a>
        <a href="#" class="boton">Borrar cuenta</a>
        <a href="#" class="boton">Ver álbumes</a>
        <a href="nuevoalbum.php" class="boton">Crear álbum</a>
        <a href="solicitar.php" class="boton">Solicitar álbum impreso</a>
        <a href="cerrarSesion.php" class="boton">Cerrar sesión</a>
    </main>

    <?php  
    include "inc/footer.php";

?>