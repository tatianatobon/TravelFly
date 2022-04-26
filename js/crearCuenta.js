function verificarContrasena(){
    contrasena1=document.getElementById("cr1")
    contrasena2=document.getElementById("cr2")
    if(contrasena1==contrasena2){
        alert("las contraseñas son iguales")
    }
    else{
        alert("las contraseñas son diferentes")
    }
    return contrasena1==contrasena2
}