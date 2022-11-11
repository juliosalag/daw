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

  <?php
  
  if( isset($_GET["img"]) ){
    $img=($_GET['img'])%2;
    switch ($img) {
        case '1':
            $img = "img1.jpg";
            $titulo="Campo de flores";
            $fecha="23/04/2019";
            $lugar="Andorra";
            $autor="Pepito";
            $album="Viajes";
        break;
        case '0':
            $img = "img4.jpg";
            $titulo="Dia de fotos";
            $fecha="13/09/2021";
            $lugar="Alemania";
            $autor="Julio";
            $album="Viaje a Berlín";
        break;
    }
}
  
  ?>
        <article>
            <img src="src/<?=$img?>" alt="Camara de fotos">
            <section>
                <h3><?=$titulo?></h3>
                <p><?=$fecha?> - <?=$lugar?></p>
                <p>Autor: <?=$autor?></p>
                <p>Album: <?=$album?></p>
            </section>
        </article>
    </main>

    <?php  
    include "inc/footer.php";

?>