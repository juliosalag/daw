
<?php
$estilo="form.css";

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
        <h2>Nuevo Album</h2>
        <form action="usuario.html" method="post">
            <label for="titulo">Titulo: </label><input type="text" name="titulo" id="titulo">
            <label for="descripcion">Descripcion: </label><input type="text" name="descripcion" id="descripcion">
            <input type="submit" id="nuevoAlbum" value="Crear nuevo album">
        </form>
</main>


<?php  
    include "inc/footer.php";

?>