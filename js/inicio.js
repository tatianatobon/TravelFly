cambiarvista()
function cambiarvista(){
    
    for (let i = 1; i <= 4; i++) {
        document.getElementById("vista"+i).style.display="none"
        if(document.getElementById("btn"+i).checked){
            document.getElementById("vista"+i).style.display=""
        }    
        
    }
    
    
}