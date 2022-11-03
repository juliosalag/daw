function tablaPrecios(){
    // Por página
    const menos5 = 0.1;
    const entre5y11 = 0.08;
    const mas11 = 0.07;

    // Por foto
    const color = 0.05;
    const res300 = 0.02;

    const tabla = document.getElementById("tarifas");

    for(let i=1; i<16; i++){
        var tr = document.createElement('tr'), numFotos = i*3, col1, col2, col3,  col4;

        col1 = i * (i<5 ? menos5 : ((i>4 && i<12) ? entre5y11 : mas11));
        col2 = col1 + numFotos * res300;
        col3 = col1 + numFotos * color;
        col4 = col1 + numFotos * (res300 + color);

        tr.innerHTML = `<td>${i}</td><td>${numFotos}</td><td>${col1.toFixed(2)}</td><td>${col2.toFixed(2)}</td><td>${col3.toFixed(2)}</td><td>${col4.toFixed(2)}</td>`;
        tabla.appendChild(tr);
    }
}

tablaPrecios();