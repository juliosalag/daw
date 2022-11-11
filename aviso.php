<?php
    
    include "controlador.php";
    
    include "inc/cabecerahtml.php";
    include "inc/inicioheader.php";

    session_start();
    $nav="nav_no_inicio";
    if(nombreLogin())
        $nav="navinicio";
    
    include "inc/$nav.php";
?>

    <main>
        <div class="center">
            <p id="disculpas">Lo sentimos, no puedes acceder a este contenido sin iniciar sesion</p>
            <img src="src/cara.jpg" alt="Cara super triste">
            <div class="botones">
                <a href="registro.php" class="boton">Crear cuenta</a>   
                <a href="inicio.php" class="boton">Iniciar sesion</a>
            </div>
        </div>
    </main>

    <?php  
    include "inc/footer.php";

?>