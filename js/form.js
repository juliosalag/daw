// in-your-face.openview.focus

const closeModal=0;
window.addEventListener("load",function(){

    //Variables para modales
    const modal=document.querySelector('.modal');
    const closeModal= document.querySelector('.modal__close');

    //Cerrar Modal
    closeModal.addEventListener('click', (e)=>{
    
        e.preventDefault();
        modal.classList.remove('modal--show');
    });
});

// Funciones de Usuario

function iniciarSesion(){
    const usuario = document.getElementById("nombre");
    const clave = document.getElementById("password");
    const clave2 = document.getElementById("password2");
    const modal = document.querySelector('.modal');

    var mensaje = "";
   
    //Comprobar que los campos no estén vacíos
    if(usuario.value.trim() === "")
        mensaje += "<p>Debes escribir el nombre del usuario</p>";
    
    if(clave.value.trim() === "")
        mensaje += "<p>Debes escribir la contraseña</p>"
        
    if(mensaje){
        document.getElementById('errores').innerHTML = mensaje;    
        modal.classList.add('modal--show');
    }
    else
        window.location.replace("index2.html");   
}

function registrarUsuario(){
    const usuario = document.getElementById("nombre");
    const clave = document.getElementById("password"); // Terminar una comprobacion
    const clave2 = document.getElementById("password2");
    const correo = document.getElementById("correo"); // Falta hacer
    const fecha = document.getElementById("fecha"); // Falta hacer

    const modal = document.querySelector('.modal');

    var mensaje = "";

    // Validacion del Usuario //
    if(usuario.value.trim() === "")
        mensaje += "<p>Debes escribir el nombre del usuario</p>";
    else{
        if(usuario.value.trim().length<3 || usuario.value.trim().length>15)
            mensaje += "<p>El nombre de usuario debe tener mínimo 3 caracteres y máximo 15</p>";
        if(!comprobarIngles(usuario.value.trim()))
            mensaje += "<p>El nombre de usuario solo puede contener letras del alfabeto inglés y números</p>";
        if(comprobarNumInicio(usuario.value.trim()))
            mensaje += "<p>En el nombre de usuario no puede aparecer un número al inicio del nombre</p>";           
    }


    // Validacion de la Contraseña //
    if(clave.value.trim() === "")
        mensaje += "<p>Debes escribir la contraseña</p>";
    else{
        if(clave.value.trim().length<6 || clave.value.trim().length>15)
            mensaje += "<p>La contraseña debe tener mínimo 6 caracteres y máximo 15</p>";
        if(!comprobarContraseña(clave.value.trim()))
            mensaje += "<p>La contraseña solo puede contener letras del alfabeto inglés, números, el guin y el guion bajo (subrayado)</p>";
        if(!alMenos1(clave.value.trim()))
            mensaje += "<p>La contraseña debe contener al menos 1 mayúscula, 1 minúscula y un número</p>";
    }


    // Validacion de Repetir la Contraseña //
    if(clave2.value.trim() === "")
        mensaje += "<p>Debes repetir la contraseña</p>";
    else if(!(clave2.value === clave.value))
        mensaje += "<p>La contraseña repetida no coincide con la contraseña</p>";
       

    // Validacion Correo Electronico
    if(correo.value.trim() == "")
        mensaje += "<p>Debes escribir el correo</p>";
    else{
        // Dividimos la parte local del dominio
        correoFormateado = correo.value.trim().split('@');
        if(correoFormateado.length != 2)
            mensaje += "<p>El correo tiene que tener 1 @</p>";
        else{            
            // Para la parte local
            if(correoFormateado[0].length < 1 || correoFormateado[0].length > 64)
                mensaje += "<p>El tamaño de la parte local del correo es incorrecta (1-64 caracteres)</p>";
            if(!parteLocalCar(correoFormateado[0]))
                mensaje += "<p>El correo solo puede contener letras inglesas, números y los caracteres imprimibles !#$%&'*+-/=?^_`{|}~</p>";
            if(punto(correoFormateado[0]))
                mensaje += "<p>En el correo no pueden haber dos puntos seguidos ni punto al inicio o al final</p>";
            // Para el dominio
            if(correoFormateado[1].length < 1 || correoFormateado[1].length > 255)
                mensaje += "<p>El tamaño del dominio del correo es incorrecta (1-255 caracteres)</p>";
            if(!subdominioCar(correoFormateado[1]))
                mensaje += "<p>El dominio del correo solo puede contener letras inglesas números y guiones</p>";
            if(guion(correoFormateado[1]))
                mensaje += "<p>El dominio no puede contener guion al principio ni al final</p>"
        }
    }
    /*
    const esCorreoElectronico = correoElectronico => /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{1,}))$/.test(correoElectronico);
    console.log(esCorreoElectronico(correo.value));
    */
    

    // Validacion Fecha Nacimiento (dd/mm/yyyy)
    if(fecha.value.trim() === "")
        mensaje += "<p>Debes escribir la fecha de nacimiento</p>";
    else{
        fechaFormateada = fecha.value.trim().split('/');
        if(fechaFormateada.length != 3)
            mensaje += "<p>La fecha de nacimiento tiene un formato incorrecto</p>";
        else{
            fechaCreada = new Date(fechaFormateada[2], (fechaFormateada[1]-1), fechaFormateada[0]);
            if(!(fechaCreada.getFullYear() == fechaFormateada[2] && (fechaCreada.getMonth()+1) == fechaFormateada[1] && fechaCreada.getDate() == fechaFormateada[0]))
                mensaje += "<p>La fecha de nacimiento esta mal introducida</p>";
            if((Date.now() - fechaCreada)/(1000*60*60*24*365) < 18)
                mensaje += "<p>Tienes que ser mayor de edad</p>";
        }
    }
    
    
    // Mostrar mensaje de errores
    if(mensaje){
        document.getElementById('errores').innerHTML = mensaje;    
        modal.classList.add('modal--show');
    }
    else
        window.location.replace("index2.html"); 

}

// Funciones Auxiliares

function comprobarIngles(palabra){
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charCodeAt(i);
        if(!((caracter>=64 && caracter<=90) || (caracter>=97 && caracter<=122) || (caracter>=48 && caracter<=57)))
            return false;
    }    
    return true;
}

function comprobarContraseña(palabra){
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charCodeAt(i);
        if(!((caracter>=64 && caracter<=90) || (caracter>=97 && caracter<=122) || (caracter>=48 && caracter<=57) || caracter===45 || caracter===95))
            return false;
    }    
    return true;
}

function alMenos1(palabra){
    var mayus=0, minus=0, num=0;
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charCodeAt(i);      
        if((caracter>=64 && caracter<=90))
            mayus=1;
        else if(caracter>=97 && caracter<=122)
            minus=1;
        else if(caracter>=48 && caracter<=57)
            num=1;
    }
    return num===1 && mayus===1 && minus===1;
}

function comprobarNumInicio(palabra){
    return palabra.charCodeAt(0)>=48 && palabra.charCodeAt(0)<=57;
}

function parteLocalCar(palabra){
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charCodeAt(i);
        if(!((caracter>=64 && caracter<=90) || (caracter>=97 && caracter<=122) || (caracter>=48 && caracter<=57) || caracter===33 || (caracter>=35 && caracter<=39) || caracter===42 || caracter===43 || (caracter>=45 && caracter<=47)|| caracter===61 || caracter===63 || (caracter>=94 && caracter<=96) || (caracter>=123 && caracter<=126)))
            return false;
    }    
    return true;
}

function punto(palabra){
    if(palabra.charAt(0)==='.' || palabra.charAt(palabra.length)==='.') return true;
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charAt(i);
        caracter2 = palabra.charAt(i++);
        if(caracter==='.' && caracter2==='.')return true;
    }
    return false;
}

function subdominioCar(palabra){
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charCodeAt(i);
        if(!((caracter>=64 && caracter<=90) || (caracter>=97 && caracter<=122) || (caracter>=48 && caracter<=57) || caracter===45))
            return false;
    }    
    return true;
}

function guion(palabra){
    if(palabra.charAt(0)==='-' || palabra.charAt(palabra.length-1)==='-')
        return true;
    return false;
}