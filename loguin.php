<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <center>
            <h2>Inicio secion</h2>
            
        </center>
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
            <input type="text" value="" name="campo_contraseña">
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

        // Conecta a la base de datos (asegúrate de tener la conexión $connect definida previamente)
        $conex = $connect->prepare("SELECT * FROM Usuarios WHERE Usuario = '$user' AND Contraseña = '$password' ");
        $conex->bind_param("ss", $user, $password);
        $conex->execute();
        $result = $conex->get_result();

        // Verifica si se encontraron resultados
        if ($result->num_rows > 0) {
            // Usuario y contraseña válidos, redirige a la página de inicio
            header("location: index.php");
        } else {
            // Acceso denegado
            echo "ACCESO DENEGADO";
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