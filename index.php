<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Users CRUD</title>
</head>

<body>
    <div class="users-form">
        <h1>Crear usuario</h1>
        <form action="index.php" method="POST">
            <input type="text" name="name_index" placeholder="Nombre">
            <input type="text" name="last_name_index" placeholder="Apellidos">
            <input type="text" name="username_index" placeholder="Username">
            <input type="password" name="pasword_index" placeholder="Password">

            <input type="submit" value="REGISTRAR USER" name="btn_registrado">
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST["btn_registrado"])) {
    include("insert_user.php");

}

?>