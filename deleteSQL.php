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
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script> 
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style> 
    </head>
    <body>
        <div class="container">
        <?php
        // put your code here
            echo "<h2>Cambios en alumnos</h2>";
            
            $mysqli = new mysqli('localhost', 'root', '', 'sicei');
            if(!$mysqli){
                echo "No se pudo realizar la conexión PHP - MySQL"; 
            }
            else{
                $matricula = $_POST["matricula"];
                
                $sql = "delete from alumno where matricula = '$matricula'";
                        
                
                $resultado = $mysqli->query($sql);
                
                if($resultado ){ 
                        echo "Registro eliminado con éxito";
                }
                else {
                        echo "No se realizo con éxito la eliminación";
                }
                
                          
                $mysqli->close();  
                
            }
            

        ?>
            <p></p>
            <p><a class="btn btn-primary btn-lg" href="index.html" role="button">Inicio</a></p>
        </div>
    </body>
</html>
