function validate(){
    var nombre,apellido,telefono,dni
    nombre= document.getElementById ("nombre").value;
    apellido= document.getElementById ("apellido").value;
    telefono= document.getElementById ("telefono").value;
    dni= document.getElementById ("dni").value;
   
    /*expresion= / \w+@\w\.+[a-z]/; (expresion regular para evaluear correo electronico)*/
    if(nombre==="" ||apellido==="" ||telefono==="" ||dni===""){
        alert("debe completar todos los campos")  
        return false;

    }/* puede agregarse el correo electronico hay que usar la expresion regulara comentada mas arriba*/
    else if(nombre.length>30||apellido.length>30 || telefono.length>20 ||dni.length>10){
       
        alert ("los valores son demasiado largos")
       
        return false;
    }
    else if(nombre.length<3||apellido.length<3|| telefono.length<5 ||dni.length<7){
       
        alert ("los valores son demasiado cortos")
       
        return false;
    }
    else if(isNaN(dni)){
        alert("El DNI debe ser un numero")
        return false
    }
    else if(isNaN(telefono)){
        alert("telefono debe ser un numero")
        return false
    }
    
   /* window.location.reload();*/
   
    /*else if(!expresion.test(correo)){
        alert("ingrese una direccion de correo valida")

    } evaluacion de expresion regular de correp electronico*/
    /* agregar longitud maxima de los valores*/
 
}/*if(nombre===""){
    alert("debe completar este campo")
    return false;
}
else if(telefono===""){
    alert("debe completar este campo")
    return false;
}

else if(calles===""){
    alert("debe completar este campo")
    return false;

}
else if(numero_puerta===""){
    alert("debe completar este campo")
    return false;
}
else if(calles===""){
    alert("debe completar este campo")
    return false;
}*/
