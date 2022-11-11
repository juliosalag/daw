<?php

    $estilo="form.css";
    
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
        <form action="resultados.php?resultado=<?php urlencode('1')?>" method="get" style="padding-bottom: 3em;">
            <label for="titulo">Titulo: </label><input type="text" name="titulo" id="titulo" value="<?php echo $_GET["titulo"]?>">
            <label for="fechaDesde">Fecha entre: </label><input type="date" name="fechaDesde" id="fechaDesde" value="<?php echo $_GET["fechaDesde"]?>">
            <label for="fechaHasta"> y </label><input type="date" name="fechaHasta" id="fechaHasta" value="<?php echo $_GET["fechaHasta"]?>">
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


        <h2>Últimas fotos</h2>
        <div class="fotos">
           
            <article>
                <a href="foto.php?img=<?php echo urlencode('1')?>">
                    <img src="src/img1.jpg" alt="Campo de flores">
                    <section>
                        <h3>Campo de flores</h3>
                        <p>23/04/2019 - Andorra</p>
                    </section>
                </a>
            </article>

            <article>
            <a href="foto.php?img=<?php echo urlencode('2')?>">
                    <img src="src/img2.jpg" alt="Flores">
                    <section>
                        <h3>Flor</h3>
                        <p>24/04/2019 - Andorra</p>
                    </section>
                </a>
            </article>

            <article>
            <a href="foto.php?img=<?php echo urlencode('3')?>">
               
                    <img src="src/img3.jpg" alt="Ordenador portatil">
                    <section>
                        <h3>Trabajando</h3>
                        <p>25/05/2020 - España</p>
                    </section>
                </a>
            </article>

            <article>
            <a href="foto.php?img=<?php echo urlencode('4')?>">
                    <img src="src/img4.jpg" alt="Camara de fotos">
                    <section>
                        <h3>Dia de fotos</h3>
                        <p>13/09/2021 - Alemania</p>
                    </section>
                </a>
            </article>

            <article>
            <a href="foto.php?img=<?php echo urlencode('5')?>">
                    <img src="src/img5.jpg" alt="Señora cogiendo un corazon">
                    <section>
                        <h3>Amor al arte</h3>
                        <p>10/12/2021 - Dinamarca</p>
                    </section>
                </a>
            </article>
        </div>
    </main>


    
    <?php 
    include "inc/footer.php";

?>