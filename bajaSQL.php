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
        <div class="container">
        <?php
        // put your code here
        if( isset($_POST["matricula"]) ){
            //Se capturo una matricula para cambiar, 
            //se realiza la transacción para cambiar el registro
            
            
            $mysqli = new mysqli('localhost', 'root', '', 'sicei');
            if(!$mysqli){
                echo "No se pudo realizar la conexión PHP - MySQL"; 
            }
            else{
                $matricula = $_POST["matricula"];
                $sql = "select matricula, nombre,apellidoPaterno, apellidoMaterno from alumno where matricula = '".$matricula."'";                   
                
                $resultado = $mysqli->query($sql);


                if($resultado->num_rows>0){
                    //Aquí pondriamos un formulario para capturar datos de alumnos.
                     $fila =  $resultado->fetch_array(MYSQLI_ASSOC) ;
                     
                
                    ?>
                    
                        <br>
                        <h2>Cambios en alumnos</h2>
                        <br>
                        <form action="deleteSQL.php" method="post" enctype="multipart/form-data" name="personal" id="personal" class="needs-validation" novalidate >              
                            <div class="form-group">
                                <label for="matricula" >Matricula:</label>
                                <input class="form-control" id="matricula" name="matricula" type="text" value=" <?php echo $fila["matricula"] ?> " />                             
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input class="form-control" id="nombre" name="nombre" type="text" value=" <?php echo $fila["nombre"] ?> " />
                            </div>

                            <div class="form-group">
                                <label for="apellidoPaterno">Apellido paterno</label>
                                <input class="form-control"  id="apellidoPaterno" name="apellidoPaterno" type="text" value=" <?php echo $fila["apellidoPaterno"] ?> " />
                           </div>

                            <div class="form-group">
                                <label for="apellidoMaterno">Apellido Materno:</label>
                                <input class="form-control" id="apellidoMaterno" name="apellidoMaterno" type="text" value=" <?php echo $fila["apellidoMaterno"] ?> "  />  
                            </div>
                        <input value="Borrar" type="submit" class="btn btn-primary" /> 
                        </form>             
                     
                    <?php
                }
                else{
                    echo "No existen alumnos con la matricula capturada";
                    echo "<p></p>";
                    echo "<p><a class='btn btn-primary btn-lg' href='index.html' role='button'>Inicio</a></p>";
                    
                }
            }
            
        }
        else{
            //No se ha capturado una matricula para cambiar...
            
            ?>           
        
               
                    <br>
                    <h2>Búsqueda del alumno a eliminar por matricula</h2>
                    <br>
                    <form action="bajaSQL.php" method="post" enctype="multipart/form-data" name="personal" id="personal" class="needs-validation" novalidate >              
                            <div class="form-group">
                                <label for="matricula" >Matricula:</label>
                                <input class="form-control" id="matricula" name="matricula" type="text" placeholder="Matricula" />                             
                            </div>                       
                        <input value="Buscar" type="submit" class="btn btn-primary" /> 
                    </form>             
                
            <?php
        }
        
        ?>
      </div>
    </body>
</html>
