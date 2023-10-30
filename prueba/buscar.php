<?php
include "conexion.php";
$buscar=$_POST['buscar'];

$sql="SELECT m.*,e.*,c.*,ma.* FROM maestro m, estudiantes e, cursos c, materias ma
WHERE c.id=m.curso
and e.cedula=m.estudiante
and ma.id_mat=m.materia
and c.id='$buscar'";
$respuesta=mysqli_query($conn,$sql);
?>