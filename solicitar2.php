<?php
    
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

        <h2>Álbum a imprimir:</h2>
        
        <article class="solicitado">
            <?php 
            echo"<p> Nombre: ". $_POST['nombre'] . "</p>
            <p> Titulo: ". $_POST['titulo'] . "</p>  
            <p> Descripción: ". $_POST['descripcion']. "</p>
            <p> Correo electrónico: ". $_POST['correo']. "</p>
            <p> Calle: ". $_POST['numeroCalle']. "</p>
            <p> Piso: ". $_POST['numeroPiso']. "</p>
            <p> Código Postal: ". $_POST['codigoPostal']. "</p>
            <p> Localiad: ". $_POST['localidad']. "</p>
            <p> Provincia: ". $_POST['provincia']. "</p>
            <p> Telefono: ". $_POST['telefono']. "</p>
            <p> Color Portada: ". $_POST['colorPortada']. "</p>
            <p> Nº de copias: ". $_POST['copias']. "</p>
            <p> Resolucion: ". $_POST['resolucion']. "</p>
            <p> Álbum: ". $_POST['album']. "</p>
            <p> Fecha: ". $_POST['fecha']. "</p>
            <p> Color: ". (isset($_POST['color']) ? "Si" : "No") . "</p>";
            
            $numPaginas = 10;
            $numFotos = $numPaginas * 3;
            $res = ($_POST['resolucion'] == "150 dpi" || $_POST['resolucion'] == "300 dpi" ? 300 : 450);
            $color = (isset($_POST['color']) ? true : false);


            // Por página
            $menos5 = 0.1;
            $entre5y11 = 0.08;
            $mas11 = 0.07;

            // Por foto
            $color = ($color) ? 0.05 : 0;
            $res300 = ($res >= 300) ? 0.02 : 0;

            $precioBase = ($numPaginas<5 ? ($numPaginas*$menos5) : ($numPaginas<12 ? ($entre5y11*($numPaginas-4)+0.4) : ($mas11*($numPaginas-11) + 0.96)));
            
            $precioTotal = $precioBase + $numFotos * ($res300 + $color);

            echo "<h3>Precio: " . $precioTotal . " euros</h3>";
            ?>
        </article>

    </main>

    <?php  
    include "inc/footer.php";

?>