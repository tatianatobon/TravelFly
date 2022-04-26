function verificarContrasena(){
    contrasena1=document.getElementById("cr1").value
    contrasena2=document.getElementById("cr2").value
    if(contrasena1==contrasena2){
        alert("las contraseñas son iguales")
    }
    else{
        alert("las contraseñas son diferentes")
    }
    return contrasena1==contrasena2
}