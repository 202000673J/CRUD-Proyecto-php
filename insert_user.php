<?php
include("connection.php");
$con = connectToDatabase();


$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users(nombre,apellido,usuario,contraseña) VALUES('$name','$lastname','$username','$password')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>