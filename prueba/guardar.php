<?php
include "conexion.php";

$curso=$_POST['curso'];
$estudiante=$_POST['estudiante'];
$parcial=$_POST['parcial'];
$materia=$_POST['materia'];
$nota=$_POST['nota'];

$verificar="SELECT * FROM estudiantes WHERE cedula='$estudiante'";
$res=mysqli_query($conn,$verificar);
$nom=mysqli_fetch_array($res);
error_reporting(0);
if($nom['cedula']==$estudiante){
    if($nota!="" and $nota>=0 and $nota<=10){
        $sql="INSERT INTO maestro(curso,estudiante,nota,parcial,materia) VALUES('$curso','$estudiante','$nota','$parcial','$materia')";
        $respuesta=mysqli_query($conn,$sql);
        //$fila=mysqli_fetch_array($respuesta);
}else{
    echo "<script> alert('Datos erroneos'); window.location='inicio.php'</script>";
}
}else{
    echo "<script> alert('no existe estudiante'); window.loction='inicio.php'</script>";
}
?>