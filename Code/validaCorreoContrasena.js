function validaCorreo(){
    var expReg= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    var esValido = expReg.test(correo);
    if(esValido == true){
        alert("El correo electronico es valido")
    } else {
        alert("El correo electronico no es valido")
    }
}

function validaContrasena(valor){
    //valida contraseñas de al menos una letra, al menos
    // un numero, al menos una letra mayúscula, al menos 
    //8 caracteres, no permite espacios.
    var expReg =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{8,}$/;
    if(myregex.test(contraseña)){
        alert(valor+" es valido :-) !");
        return true;        
    }else{
       alert(valor+" NO es valido!");
        return false;        
    }  
}