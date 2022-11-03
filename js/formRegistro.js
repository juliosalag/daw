 
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
    }else if(usuario.value.trim().length<3 || usuario.value.trim().length>15){
        mensaje += "El nombre de usuario debe tener mínimo 3 caracteres y máximo 5\n"
    } else if(usuario.value.indexOf('ñ') !== -1 ){
        console.log("HAY ÑÑÑÑÑÑ");
    }



    if(clave.value.trim() == ""){
       mensaje +="Debes escribir la contraseña \n"
    }else if(clave.value.trim().length<6 || clave.value.trim().length>15){
        mensaje += "La contraseña debe tener mínimo 6 caracteres y máximo 5\n"
    }


    if(clave2.value.trim() == ""){
        mensaje +="Debes repetir la contraseña \n"
     } else if(!(clave2.value == clave.value)){
        mensaje +="La contraseña repetida no coincide con la contraseña\n"
     }
     if(correo.value.trim() == ""){
        mensaje +="Debes escribir el correo \n"
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






