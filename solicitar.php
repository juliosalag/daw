<?php

    $estilo="form.css";
    $js="table.js";
    
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
        <h2>Tarifas</h2>
        <table>
            <tr>
                <th>Concepto</th>
                <th>Tarifa</th>
            </tr>
            <tr>
                <td>menos de 5 páginas</td>
                <td>0,10 euros por página</td>
            </tr>
            <tr>
                <td>entre 5 y 11 páginas</td>
                <td>0,08 euros por página</td>
            </tr>
            <tr>
                <td>mas de 11 páginas</td>
                <td>0,07 euros por página</td>
            </tr>
            <tr>
                <td>Blanco y negro</td>
                <td>0 euros</td>
            </tr>
            <tr>
                <td>Color</td>
                <td>0,05 euros por foto</td>
            </tr>
            <tr>
                <td>Resolución > 300 dpi</td>
                <td>0,02 euros por foto</td>
            </tr>
        </table>

        <h2>Precios</h2>
        <table id="precios">
            <tr>
                <th colspan="2"></th>
                <th colspan="2">Blanco y Negro</th>
                <th colspan="2">Color</th>
            </tr>
            <tr>
                <td>Número de páginas</td>
                <td>Número de fotos</td>
                <td>150 - 300 dpi</td>
                <td>450 - 900 dpi</td>
                <td>150 - 300 dpi</td>
                <td>450 - 900 dpi</td>
            </tr>
        </table>

        <?php
        /*
        // Por página
        $menos5 = 0.1;
        $entre5y11 = 0.08;
        $mas11 = 0.07;

        // Por foto
        $color = 0.05;
        $res300 = 0.02;
        
        $doc = new DOMDocument();
    
        $tabla = $doc->getElementById('precios');
        echo $tabla;

        for($i=1; $i<16; $i++){
            $tr = $doc->createElement('tr'); 
            $numFotos = $i*3;
            $col1; 
            $col2; 
            $col3;
            $col4;

            $col1 = ($i<5 ? ($i*$menos5) : ($i<12 ? ($entre5y11*($i-4)+0.4) : ($mas11*($i-11) + 0.96)));
            $col2 = $col1 + $numFotos * $res300;
            $col3 = $col1 + $numFotos * $color;
            $col4 = $col1 + $numFotos * ($res300 + $color);

            $tr->appendChild(crearElemento('td', $i));
            $tr->appendChild(crearElemento('td', $numFotos));
            $tr->appendChild(crearElemento('td', number_format($col1, 2)));
            $tr->appendChild(crearElemento('td', number_format($col2, 2)));
            $tr->appendChild(crearElemento('td', number_format($col3, 2)));
            $tr->appendChild(crearElemento('td', number_format($col4, 2)));

            $tabla->appendChild($tr);
        }

        function crearElemento($tipo, $texto){
            $doc = new DOMDocument;
        
            $elemento = $doc->createElement($tipo);
            $contenido = $doc->createTextNode($texto);
            $elemento->appendChild($contenido);

            return $elemento;
        }
        */
        ?>


        <h2>Formulario de solicitud</h2>
        <form action="solicitar2.php" method="post">
            <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" maxlength="200" required>
            <br>
            <label for="titulo">Titulo del álbum: </label><input type="text" name="titulo" id="titulo" maxlength="200" required>
            <br>
            <label for="descripcion">Descripcion del álbum: </label><input type="text" name="descripcion" id="descripcion" placeholder="dedicatoria, descripción de su contenido, etc" maxlength="4000">
            <br>
            <label for="correo">Correo electrónico: </label><input type="email" name="correo" id="correo" maxlength="200" placeholder="del destinatario" required>
            <br>
            <label for="calle">Direccción: </label><input type="text" name="calle" id="calle" placeholder="Calle" required>
            <label for="numeroCalle"></label><input type="text" name="numeroCalle" id="numeroCalle" placeholder="Número" required>
            <label for="numeroPiso"></label><input type="text" name="numeroPiso" id="numeroPiso" placeholder="Piso">
            <label for="codigoPostal"></label><input type="text" name="codigoPostal" id="codigoPostal" placeholder="CP" required>
            <label for="localidad"></label>
            <select name="localidad" id="localidad">
                <option>Localidad 1</option>
                <option>Localidad 2</option>
                <option>Localidad 3</option>
            </select>
            <label for="provincia"></label>
            <select name="provincia" id="provincia">
                <option>Provincia 1</option>
                <option>Provincia 2</option>
                <option>Provincia 3</option>
            </select>
            <br>
            <label for="telefono">Teléfono: </label><input type="text" name="telefono" id="telefono" maxlength="200" placeholder="+## ### ### ###" required>
            <br>
            <label for="colorPortada">Color portada: </label><input type="color" name="colorPortada" id="colorPortada">
            <br>
            <label for="copias">Número copias: </label><input type="number" name="copias" id="copias" min="1" pattern="{0-9}" value="1">
            <br>
            <label for="resolucion">Resolución: </label>
            <select name="resolucion" id="resolucion">
                <option>150 dpi</option>
                <option>300 dpi</option>
                <option>450 dpi</option>
                <option>600 dpi</option>
                <option>750 dpi</option>
                <option>900 dpi</option>
            </select>
            <br>
            <label for="album">Álbum: </label>
            <select name="album" id="album">
                <option>Álbum 1</option>
                <option>Álbum 2</option>
                <option>Álbum 3</option>
            </select>
            <br>
            <label for="fecha">Fecha aproximada de recepción: <input type="date" name="fecha" id="fecha"></label>
            <br>
            <label for="color">Impresión a color: <input type="checkbox" name="color" id="color"></label>
            <br>
            <input type="submit" value="Solicitar álbum">
        </form>
    </main>
    <?php  
    include "inc/footer.php";

?>