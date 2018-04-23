<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    </head>
    <body>
       
        <?php
        // put your code here
            $matricula = $_POST["matricula"];
            $nombre = $_POST["nombre"];
            $apellidoP = $_POST["apellidoPaterno"];
            $apellidoM = $_POST["apellidoMaterno"];

            $mysqli = new mysqli('localhost', 'root', '', 'sicei');
            if(!$mysqli){
                echo "No se pudo realizar la conexión PHP - MySQL"; 
            }
            else{
                              
                $sql = "insert into alumno (matricula, nombre, apellidoPaterno, apellidoMaterno) values('$matricula', '$nombre', '$apellidoP', '$apellidoM') ";
                        
                $resultado = $mysqli->query($sql);
                
                if($resultado){
                    echo "Los datos del alumno se registraron con éxito";
                }
                else{
                    echo "No se pudo realizar el registro del alumno";
                }                
               $mysqli->close();
            }
        ?>
    </body>
</html>
