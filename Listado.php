<?php
// Inicializa una sesión PHP si aún no está iniciada
session_start();

// Verifica si se ha enviado un formulario
if (isset($_POST["btn_add"])) {
    $text = $_POST["input_text"];

    if (!empty($text)) {
        // Agrega el texto a una variable de sesión para almacenar los elementos
        $_SESSION["items"][] = $text;
    }
}

// Verifica si se ha enviado una solicitud para eliminar un elemento
if (isset($_GET["delete"])) {
    $index = $_GET["delete"];

    // Elimina el elemento de la lista utilizando el índice
    if (isset($_SESSION["items"][$index])) {
        unset($_SESSION["items"][$index]);
    }
}

// Verifica si se ha enviado una solicitud para editar un elemento
if (isset($_POST["edit_index"]) && isset($_POST["new_text"])) {
    $index = $_POST["edit_index"];
    $new_text = $_POST["new_text"];

    // Actualiza el elemento de la lista con el nuevo texto
    if (isset($_SESSION["items"][$index])) {
        $_SESSION["items"][$index] = $new_text;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Elementos</title>
</head>

<body>
    <center>
        <h1>Lista de Tareas</h1>
        <form action="Listado.php" method="post">
            <input type="text" name="input_text" placeholder="Ingrese un elemento">
            <button type="submit" name="btn_add">Agregar</button>
        </form>
        <ul>
            <?php
            if (isset($_SESSION["items"]) && count($_SESSION["items"]) > 0) {
                foreach ($_SESSION["items"] as $index => $item) {
                    echo '<li>' . 
                         '<input type="text" value="' . $item . '" onchange="updateItem(' . $index . ', this.value)">' . 
                         ' <a href="?delete=' . $index . '">X</a></li>';
                }
            } else {
                echo '<p class="empty">La lista está vacía.</p>';
            }
            ?>
        </ul>
    </center>
    <script>
        function updateItem(index, newText) {
            // Envia una solicitud POST para actualizar el elemento en el servidor
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "Listado.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("edit_index=" + index + "&new_text=" + newText);
        }
    </script>
</body>

</html>
