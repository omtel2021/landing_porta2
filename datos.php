<?php 
// recibe datos de formulario
//include 'conect.php'; // incluye php de conexion a bd
//("localhost","root","contraseña","nombre de base","puerto")
include 'conect.php';

$conexion = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname","$dbport") or die("error conectando con el servidor");
if(!$conexion){

echo '<script> alert (" Error al conectar a la base de datos ") </script>'; 


}


 // funcion evalua longitud de string


 function validStrLen($str, $min, $max){
    $len = strlen($str);
    if($len < $min){
        
        
        echo '<script> alert (" valor demasiado corto ") </script>'; 

        

        //return "El valor es demasiado corto, el minimo es $min caracteres ($max max)";
        return FALSE;

       
    }
    elseif($len > $max){
        //return "El valor es demasiado largo, maximum is $max caracteres ($min min).";
        echo '<script> alert (" valor demasiado largo ") </script>'; 
     
        return FALSE;

       
    }
    return TRUE;
}

// verificamos que los datos existan y no esten vacios
if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["telefono"]) && isset($_POST["dni"]) ) {
   
    if(empty($_POST["nombre"]) && empty($_POST["apellido"]) && empty($_POST["telefono"]) && empty($_POST["dni"])){

        
    

        echo '<script> alert (" Debe llenar todos los campos ") </script>'; 

        return false;

    }
    elseif(validStrLen($_POST["nombre"],3,20)==TRUE && validStrLen ($_POST["apellido"],4,20)==TRUE && validStrLen($_POST["telefono"],5,20)==TRUE && validStrLen($_POST["dni"],7,10)==TRUE ){

               
        $nombre = $_POST["nombre"];
        $apellido= $_POST["apellido"];
        $telefono = $_POST["telefono"];
        $dni = $_POST["dni"];
        $compañia=$_POST["compañia"];
       
    }

  
    
    
   
    }
    
   
    

 

//revisar si telefono coincide para dejar mensaje de telefono registrado

$check=mysqli_query($conexion,"SELECT * from $db_table WHERE nombre='$nombre' and apellido='$apellido' and telefono='$telefono' and dni=$dni ");
$checkrows=mysqli_num_rows($check);
$checkphone=mysqli_query($conexion,"SELECT * from $db_table WHERE  telefono='$telefono'  ");
$checkphon_num=mysqli_num_rows($checkphone);

if($checkphon_num>0){
    
    echo "<script language='javascript'>";
    echo 'alert("El numero ya se encuentra registrado");';
    echo 'window.history.go(-1);';
    echo  'window.location.reload';
    echo "</script>";
   return false;

}



if($checkrows >0){

    echo "<script language='javascript'>";
    echo 'alert("El usuario ya se encuentra registrado");';
    echo 'window.history.go(-1);';
    echo  'window.location.reload';
    echo "</script>";
   return false;




}


if( empty( $nombre)||empty( $apellido)||empty( $dni)){

   echo "<script language='javascript'>";
   echo '<script> alert (" Existen campos vacios ") </script>';
   echo 'window.history.go(-1);';
   echo  'window.location.reload';
   echo "</script>";
    return false;
}

else{

// envia datos a la base de datos
//agregar los valore en INSERT y en VALUES
$insert= "INSERT INTO $db_table (nombre,apellido,telefono,dni,compañia) 
VALUES ('$nombre','$apellido','$telefono','$dni','$compañia') " ;

//ejecutar consulta

$resultado= mysqli_query($conexion,$insert);

if(!$resultado){
    

    mysqli_close($conexion);
    echo "<script language='javascript'>";
    echo '<script> alert (" Error al enviar formulario , intente mas tarde ") </script>';
    echo 'window.history.go(-1)';
    echo "</script>";
}
else{
    
   // echo '<script> alert (" El registro se relizó con éxito ") </script>';
    //echo '<script> confirm (" El registro se relizó con éxito ") </script>';
  
   mysqli_close($conexion);

  echo "<script language='javascript'>";
  echo 'alert("El registro se realizo con exito");';
  echo 'window.history.go(-1);';
  echo  'window.location.reload';
  echo "</script>";
 
    
   
}


}

    





//cerrar conexion

//header("Location:https://https://www.google.com.ar");

