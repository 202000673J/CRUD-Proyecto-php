<?php
//include("connection.php");
//$con = connection();

//$sql = "SELECT * FROM users";
//$query = mysqli_query($con, $sql);
?>

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
            <input type="text" name="name" placeholder="Nombre">
            <input type="text" name="lastname" placeholder="Apellidos">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            
            <input type="submit" value="REGISTRAR USER" name="btn_registrado">
        </form>
    </div>
</body>

</html>
<?php
    
    if (!isset($_POST["btn_registrado"])) {
        if(!empty($_POST["name"]) && !empty($_POST["lastname"]) && !empty($_POST["Username"]) && !empty($_POST["Password"])){
            header("location: loguin.php");

        }
    }else{
        echo "FALTAN CAMPOS POR RELLENAR";
    }
?>