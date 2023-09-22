<?php
if (!empty($_POST["name_index"]) and !empty($_POST["last_name_index"]) and !empty($_POST["username_index"]) and !empty($_POST["pasword_index"])) {

    include("connection.php"); // Asegúrate de que este archivo incluya tu función de conexión a la base de datos
    $con = connectToDatabase();

    $name = $_POST['name_index'];
    $lastname = $_POST['last_name_index'];
    $username = $_POST['username_index'];
    $password = $_POST['pasword_index'];

    // Utiliza una sentencia preparada para la inserción
    $sql = "INSERT INTO Usuarios (Usuario, Contraseña, Nombre, Apellido) VALUES (?,?,?,?)";

    if ($stmt = mysqli_prepare($con, $sql)) {
        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $name, $lastname);

        // Ejecuta la consulta
        if (mysqli_stmt_execute($stmt)) {
            // La inserción fue exitosa, redirige a la página de inicio
            echo "Cuenta registra";
            header("Location: loguin.php");
            exit;
        } else {
            echo "Error en la ejecución de la consulta: " . mysqli_stmt_error($stmt);
        }

        // Cierra la consulta preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($con);
    }

    // Cierra la conexión
    mysqli_close($con);
} else {
    echo "Faltan campos x rellenar";
}
?>
