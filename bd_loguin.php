create database bd_loguin
USE bd_loguin;

CREATE TABLE Usuarios (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Usuario VARCHAR(50) NOT NULL unique,
    Contraseña VARCHAR(255) NOT NULL,
    Nombre VARCHAR(100),
    Apellido VARCHAR(100)
);

-- Crea la tabla "Tareas" para almacenar las notas/tareas
CREATE TABLE Tareas (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Contenido TEXT,
    Usuario VARCHAR(50) NOT NULL unique,
    FOREIGN KEY (Usuario) REFERENCES Usuarios(Usuario)
);
insert
select * from Usuarios
select * from tareas

INSERT INTO Usuarios VALUES(2,"mon","mon","don","look");
select * 
from Usuarios inner join tareas on Usuarios.=tareas
INSERT INTO Usuarios (Usuario, Contraseña, Nombre, Apellido)
VALUES ('nuevo_usuario', 'contraseña', 'Nombre', 'Apellido');

SELECT * FROM Usuarios WHERE Usuario = "CARLOS" AND Contraseña = "CARLOS";

SELECT * FROM Usuarios