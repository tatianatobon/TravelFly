let searchParams = new URLSearchParams(new URL(window.location).search)
console.log(searchParams)
if(searchParams.has("recibido")){
    if(searchParams.get("recibido") == 2){
        console.log("respuesta = 2 ")
        openurl("inicio.html")
    }
}
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