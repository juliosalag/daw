<?php
    
    include "controlador.php";

    $estilo="form.css";
    
    include "inc/cabecerahtml.php";
    include "inc/inicioheader.php";

    session_start();
    $nav="nav_no_inicio";
    if(nombreLogin())
        $nav="navinicio";
    
    include "inc/$nav.php";
?>

    <main>
        <form action="resultados.php?resultado=<?php urlencode('1')?>" method="get">
            <label for="titulo">Titulo: </label><input type="text" name="titulo" id="titulo">
            <label for="fechaDesde">Fecha entre: </label><input type="date" name="fechaDesde" id="fechaDesde">
            <label for="fechaHasta"> y </label><input type="date" name="fechaHasta" id="fechaHasta">
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
            <input type="submit" value="Buscar"  />
  
        </form>
    </main>

<?php 
    include "inc/footer.php";

?>