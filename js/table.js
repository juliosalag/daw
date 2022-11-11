
// ARREGLAR ?

function tablaPrecios(){
    // Por página
    const menos5 = 0.1;
    const entre5y11 = 0.08;
    const mas11 = 0.07;

    // Por foto
    const color = 0.05;
    const res300 = 0.02;

    const tabla = document.getElementById("precios");

    for(let i=1; i<16; i++){
        var tr = document.createElement('tr'), numFotos = i*3, col1, col2, col3,  col4;

        col1 = (i<5 ? (i*menos5) : (i<12 ? (entre5y11*(i-4)+0.4) : (mas11*(i-11) + 0.96)));
        col2 = col1 + numFotos * res300;
        col3 = col1 + numFotos * color;
        col4 = col1 + numFotos * (res300 + color);

        tr.appendChild(crearElemento('td', i));
        tr.appendChild(crearElemento('td', numFotos));
        tr.appendChild(crearElemento('td', col1.toFixed(2)));
        tr.appendChild(crearElemento('td', col2.toFixed(2)));
        tr.appendChild(crearElemento('td', col3.toFixed(2)));
        tr.appendChild(crearElemento('td', col4.toFixed(2)));

        tabla.appendChild(tr);
    }
}

function crearElemento(tipo, texto){
    var elemento = document.createElement(tipo);
    var contenido = document.createTextNode(texto);
    elemento.appendChild(contenido);

    return elemento;
}

window.onload = function() {
    console.log("adios");
    tablaPrecios();
}