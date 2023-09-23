<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header>
        <center><h2>Inicio secion</h2></center>
    </header>
    <center>
        <form action="loguin.php" method="post">
            <label for="xxx">
                usuario
            </label>
            <br>
            <input type="text" value="" name="campo_usuario">
            <br>
            <label for="iii">
                contraseña
            </label>
            <br>
            <input type="password" value="" name="campo_contraseña">
            <br>
            <input type="submit" value="loguin" name="btn_acceso">

            <input type="submit" value="ir a reguistro" name="btm_registrarse">
        </form>
    </center>
</body>

</html>
<?php
//
// Verifica si se ha enviado el formulario
if (isset($_POST["btn_acceso"])) {
    // Verifica si los campos de usuario y contraseña no están vacíos
    if (!empty($_POST["campo_usuario"]) && !empty($_POST["campo_contraseña"])) {
        // Sanitiza los valores de usuario y contraseña para evitar SQL injection
        $user = $_POST["campo_usuario"];
        $password = $_POST["campo_contraseña"];

        include "connection.php";
        $funtionBD=connectToDatabase();
        

        // Conecta a la base de datos (asegúrate de tener la conexión $connect definida previamente)
        $conex = $funtionBD->prepare("SELECT * FROM Usuarios WHERE Usuario = ? AND Contraseña = ? ");
        $conex->bind_param("ss", $user, $password);
        $conex->execute();
        $result = $conex->get_result();

        // Verifica si se encontraron resultados
        if ($result->num_rows > 0) {
            // Usuario y contraseña válidos, redirige a la página de inicio
            header("location: Listado.php");
        } else {
            // Acceso denegado
            echo "ACCESO DENEGADO: XFAVOR REGISTRESE";
        }
    } else {
        // Faltan campos por rellenar
        echo "FALTAN CAMPOS POR RELLENAR";
    }
}
?>
<?php
if (!empty($_POST["btm_registrarse"])) {
    header("location: index.php");
}
?>