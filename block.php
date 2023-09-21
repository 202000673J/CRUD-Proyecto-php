<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <center>
        <h1>REGISTRO DEL NUEVO CLIENTE</h1>
        </center>
    </header>
    <section>
        <center>
        <?php
        error_reporting(0);
        include('sql_conec.php');
        ?>
        <form action="nuevo_cliente.php" method="post">
            <table width="600" border="0" cellspacing="3" cellpadding="3">
                <tr>
                    <td>CÓDIGO</td>
                    <td>
                        <input type="text" name="txtCodigo">
                    </td>
                </tr>
                <tr>
                    <td>NOMBRE</td>
                    <td colspan="3">
                        <input type="text" name="txtNombre" size="65">
                    </td>
                </tr>
                <tr>
                    <td>APELLIDO PATERNO</td>
                    <td>
                        <input type="text" name="txtApellidoPaterno">
                    </td>
                    <td>APELLIDO MATERNO</td>
                    <td>
                        <input type="text" name="txtApellidoMaterno">
                    </td>
                </tr>
        
                
                <tr>
                    <td>DIRECCION</td>
                    <td colspan="3">
                        <input type="text" name="txtDireccion" size="65">
                    </td>
                </tr>
                <tr>
                    <td>TELEFONO</td>
                    <td>
                        <input type="text" name="txtFono">
                    </td>
                    <td>DISTRITO</td>
                    <td>
                        <select name="selDistrito">
                            <?php 
                                $sql ='SELECT ID_DISTRITO, DESCRIPCION FROM DISTRITO';
                                $resultado = mysqli_query($conec,$sql);

                            foreach ($resultado as $fila) :
                            ?>
                                <option value="<?php echo $fila['ID_DISTRITO'];
                                                ?>"><?php echo $fila['DESCRIPCION'];
                                                    ?>
                                                    </option>
                            <?php endforeach;
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>CORREO ELECTRÓNICO</td>
                    <td colspan="3">
                        <input type="text" name="txtCorreo" size="65">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Registrar" name="btnAgregar"></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if (isset($_POST['btnAgregar'])) {
                            $codigo = $_POST['txtCodigo'];
                            $nombre = $_POST['txtNombre'];
                            $apellidoPaterno = $_POST['txtApellidoPaterno'];
                            $apellidoMaterno = $_POST['txtApellidoMaterno'];
                            $direccion = $_POST['txtDireccion'];
                            $telefono = $_POST['txtFono'];
                            $codigoDistrito = $_POST['selDistrito'];
                            $correo = $_POST['txtCorreo'];
                            $rs = mysqli_query($conec,"INSERT INTO CLIENTE
                                              VALUES('$codigo','$nombre','$apellidoPaterno','$apellidoMaterno',
                                              '$direccion','$telefono','$codigoDistrito','$correo' )");

                            if ($rs) {
                                echo "<script>alert('Nuevo Cliente Registrado!!!')</script>";
                            } else {
                                echo "<script>alert('Ocurrio un error')</script>" . mysqli_error($conec);
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
        </center>                    
    </section>
    <footer>
        <center>
        <h4>Todos los derecho reservados -jean carlos- @2023</h4>
        </center>
    </footer>
</body>

</html>