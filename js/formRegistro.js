 
const closeModal=0;
window.addEventListener("load",function(){


    //variables para Registro
    boton=document.getElementById("registrar");
    //variables para modales
    const modal=document.querySelector('.modal');
    const closeModal= document.querySelector('.modal__close');
  

    //Cerrar Modal
    closeModal.addEventListener('click', (e)=>{
    
        e.preventDefault();
        modal.classList.remove('modal--show');
    });
    


    
    //Registro
    boton.addEventListener("click", registroUsuario);


    
    })


 
console.log(closeModal);


function caracteres(palabra){
    console.log("Entro");
    for(cont=0;cont<palabra.length && cont>=0; cont++){
        console.log(palabra.charAt(cont));
        console.log(palabra.charAt(cont)>=106);

    }
}

function registroUsuario(){
    var usuario= document.getElementById("nombre");
    var clave= document.getElementById("password");
    var clave2= document.getElementById("password2");
    var correo= document.getElementById("correo");
    var sexo= document.getElementById("sexo");
    var fecha= document.getElementById("fecha");
    var ciudad= document.getElementById("ciudad");
    var paises= document.getElementById("paises");
    var foto= document.getElementById("foto");


    const modal=document.querySelector('.modal');
   
 

    //Comprobar que los campos no estén vacíos
    mensaje = "";
    if(usuario.value.trim() ==""){
        mensaje +="Debes escribir el nombre del usuario\n"
    } else{
    if(usuario.value.trim().length<3 || usuario.value.trim().length>15){
        mensaje += "El nombre de usuario debe tener mínimo 3 caracteres y máximo 15\n"
    } 

    if(comprobarIngles(usuario.value.trim())==1){
        mensaje+= "Solo puede contener letras del alfabeto inglés y números";
    }
     if((comprobarNumInicio(usuario.value.trim()))){
        mensaje+= "No puede aparecer un número al inicio del nombre";
      
    }
    }
   /* palabra= usuario.value.trim();
    for(cont=0;cont<palabra.length && cont>=0; cont++){

        caracter=palabra.charCodeAt(cont);
        if(!((caracter>=64 && caracter<=90) || (caracter>=97 && caracter<=122) || (caracter>=48 && caracter<=57) )){
            mensaje+= "Solo puede contener letras del alfabeto inglés y números";
        }

    }*/



    if(clave.value.trim() == ""){
       mensaje +="Debes escribir la contraseña \n"
    }else{ 
        if(clave.value.trim().length<6 || clave.value.trim().length>15){
            mensaje += "La contraseña debe tener mínimo 6 caracteres y máximo 5\n"
        }
        if(!comprobarCarContrasenya(clave.value.trim())){
            mensaje +="La contraseña debe contener letras del alfabeto inglés, números o caracteres _ -";
        }
        if(!alMenosCar(clave.value.trim())){
            mensaje +="La contraseña debe contener al menos una mayúscula, una minúscula y un número";
         }
    }


    if(clave2.value.trim() == ""){
        mensaje +="Debes repetir la contraseña \n"
     } else if(!(clave2.value == clave.value)){
        mensaje +="La contraseña repetida no coincide con la contraseña\n"
     }
     

     if(correo.value.trim() == ""){
        mensaje +="Debes escribir el correo \n"
     } else{
        //para la parte local
       if(!parteLocalCar(correo.value.trim())){
            mensaje+= "La parte local del correo solo puede contener letras inglesas, números y los caracteres imprimibles !#$%&'*+-/=?^_`{|}~ ";
        }
        if(punto(correo.value.trim())){
            mensaje+= "La parte local del correo pueden haber dos puntos seguidos ni punto al inicio o al final";
        }
        //para el dominio
        if(!subdominioCar(correo.value.trim())){
            mensaje += "El dominio del correo solo puede contener letras inglesas números y guiones";
        }
        if(guion(correo.value.trim())){
            mensaje += "El dominio no puede contener guion al principio ni al final"
        }
     }




     if(fecha.value.trim() == ""){
        mensaje +="Debes seleccionar una fecha \n"
     }
     if(ciudad.value.trim() == ""){
        mensaje +="Debes escribir una ciudad \n"
     }
     if(foto.value.trim() == ""){
        mensaje +="Debes seleccionar una imagen \n"
     }
    if(mensaje){
        document.getElementById('errores').innerHTML = mensaje; 
        modal.classList.add('modal--show');
    }
    
    
    
    
    /*else{
        localStorage.Usuario=usuario; //Cambiamos donde pone usuario al nombre??
    window.location.replace("index2.html");
    }*/
}


function comprobarIngles(palabra){
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charCodeAt(i);
        if(!((caracter>=64 && caracter<=90) || (caracter>=97 && caracter<=122) || (caracter>=48 && caracter<=57)))
            return false;
    }    
    return true;
}

function comprobarNumInicio(palabra){
    if(palabra.charCodeAt(0)>=48 && palabra.charCodeAt(0)<=57){
        return true;
    }
}

function comprobarCarContrasenya(palabra){
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charCodeAt(i);
        if(!((caracter>=64 && caracter<=90) || (caracter>=97 && caracter<=122) || (caracter>=48 && caracter<=57) || caracter===45 || caracter===95))
            return false;
    }    
    return true;
}



function alMenosCar(palabra){
    var mayus=0;
    var minus=0;
    var num=0;
    for(i=0; i<palabra.length; i++){
        caracter = palabra.charCodeAt(i);      
        if((caracter>=64 && caracter<=90)){
            mayus=1;
        }else if(caracter>=97 && caracter<=122){
            minus=1;
        }else if(caracter>=48 && caracter<=57){
            num=1;
        }
    }
    if(num==1 && mayus==1 && minus==1){
        return true;
    }else{
        return false;
    }
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
    if(palabra.charAt(0)==='.' || palabra.charAt(palabra.length-1)==='.') return true;
    else{
        for(i=0; i<palabra.length; i++){
            caracter = palabra.charAt(i);
            caracter2 = palabra.charAt(i++);

        if(caracter==='.' && caracter2==='.')return true;
         }
         return false;

    }
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
    if(palabra.charAt(0)==='-' || palabra.charAt(palabra.length-1)==='-'){
        return true;
    }else return false;

}