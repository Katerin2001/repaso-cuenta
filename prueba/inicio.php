<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form action="guardar.php" method="POST">
        <label for="">CURSO:</label>
        <input type="text" name="curso"><BR></BR>
        <label for="">ESTUDIANTE:</label>
        <input type="text" name="estudiante"><BR></BR>
        <label for="">NOTA:</label>
        <input type="text" name="nota"><br><br>
        <label for="">PARCIAL:</label>
        <input type="text" name="parcial"><BR></BR>
        <label for="">MATERIA</label>
        <input type="text" name="materia">

        <input type="submit" value="GUARDAR">
    </form>
    <br><br><br>

    <form action="inicio.php" method="POST">
        <label for="">BUSCAR:</label>
        <input type="text" name="buscar"><br>
        <input type="submit" value="BUSCAR">
    </form>
    <table>
        <thead>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>NOTA P1</th>
            <th>NOTA P2</th>
            <h1>CURSO</h1>
            <tbody>
                <?php
                include "buscar.php";
                while($fila = mysqli_fetch_array($respuesta)){?>
                    <tr>
                        <th><?=$fila['nombre_est']?></th>
                        <th><?=$fila['nombre_mat']?></th>
                        <th><?=$fila['parcial']?></th>
                        <th><?=$fila['nota']?></th>
                        <th><?=$fila['nombre']?></th>
                    </tr>
               <?php } ?> 
            </tbody>
        </thead>
    </table>
</body>
</html>