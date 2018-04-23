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
        
        
        <!-- Necesarias   -->   
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>       
        
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>     
        
    </head>
    <body>
        
             <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="cambioSQL.php">Cambios</a>
                    <a class="navbar-brand" href="bajaSQL.php">Bajas</a>
                  </div>
                </div>
              </nav>
        
        <div class="container">
        
        <?php
        // put your code here
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        
        $mysqli = new mysqli('localhost', 'root', '', 'sicei');
        if(!$mysqli){
            echo "No se pudo realizar la conexión PHP - MySQL"; 
        }
        else{
            $sql = "select nombre, clave from usuario where nombre = '"
                    .$usuario."' and clave = '". $clave."'";                   
            
            $resultado = $mysqli->query($sql);
            
            if($resultado->num_rows>0){   
                //Aquí pondriamos un formulario para capturar datos de alumnos.
               
        ?>        
           <div class="container">
               <br>
                <form action="altaSQL.php" method="post" enctype="multipart/form-data" name="personal" id="personal" class="needs-validation" novalidate >              
                        <div class="form-group">
                            <label for="matricula" >Matricula:</label>
                            <input class="form-control" id="matricula" name="matricula" type="text" placeholder="Matricula" /> 
                            <div class="valid-feedback">
                                Ahora sí!
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" />
                        </div>

                        <div class="form-group">
                            <label for="apellidoPaterno">Apellido paterno</label>
                            <input class="form-control"  id="apellidoPaterno" name="apellidoPaterno" type="text" placeholder="Apellido paterno" />
                       </div>

                        <div class="form-group">
                            <label for="apellidoMaterno">Apellido Materno:</label>
                            <input class="form-control" id="apellidoMaterno" name="apellidoMaterno" type="text" placeholder="Apellido materno"  />  
                        </div>
                    <input value="Guardar" type="submit" class="btn btn-primary" /> 
                </form>             
        </div>     
        <?php        
            }
            else{
                echo "<br>";
                echo "No existe usuario con los datos capturados";
                echo "<br>";
                echo "<p><a class='btn btn-primary btn-lg' href='index.html' role='button'>Inicio</a></p>";
            }            
            $resultado->free();           
            $mysqli->close();            
        }        
        ?>


</
    </body>
</html>
