<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Notas por Materia</title>
</head>
<body>
    <h1>Buscador de Notas por Materia</h1>
    
    <form action="" method="POST">
        <label for="materia">Materia:</label>
        <input type="text" name="materia" id="materia">
        <input type="submit" value="Buscar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'conexion.php'; // Asegúrate de que este archivo contenga la configuración de la conexión a la base de datos

        $materia = $_POST['materia'];

        $sql = "SELECT est.cedula, est.nombre_est, est.apellido_est, mat.nombre_mat, m.nota, m.parcial
                FROM maestro m
                INNER JOIN estudiantes est ON m.estudiante = est.cedula
                INNER JOIN materias mat ON m.materia = mat.id_mat
                WHERE mat.nombre_mat = :materia";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':materia', $materia, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            echo "<h2>Resultados:</h2>";
            echo "<table border='1'>
                  <tr>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Materia</th>
                  <th>Nota</th>
                  <th>Parcial</th>
                  </tr>";

            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['cedula'] . "</td>";
                echo "<td>" . $row['nombre_est'] . "</td>";
                echo "<td>" . $row['apellido_est'] . "</td>";
                echo "<td>" . $row['nombre_mat'] . "</td>";
                echo "<td>" . $row['nota'] . "</td>";
                echo "<td>" . $row['parcial'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados para la materia especificada.";
        }
    }
    ?>
</body>
</html>
