<!DOCTYPE html>
<html>
    <head>
        <title>Trabajo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>          
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center mb-3">
                <br>
                    Resultado del Registro
                <hr>
                </h1>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <?php
                        
                        $user = $_POST['user'];
                        $pass = sha1($_POST['password']);
                        $name = strtoupper($_POST['name']);//Convertimos en mayusculas el nombre completo del usuario 
                        $id = 0;
                        $date = date("Y-m-d H:i:s"); 

                        //Validamos que el nombre de usuario no exista en nuestro archivo de texto
                        $id = 0;
                        $okay = true;
                        if (($myfile = fopen("db.csv", "r")) !== FALSE) {
                            while (($datos = fgetcsv($myfile, 1000, "|")) !== FALSE) {
                                if(count($datos) == 5){
                                    $id++;
                                    if($datos[2] == $user){
                                        echo '<p style="color:red;"> El usuario ya existe prueba con otro nombre de usuario.</p><br>';
                                        $okay = false;
                                        break;
                                    }
                                }else{
                                    echo '<p style="color:red;"> El archivo no esta bien formado</p><br>';
                                    $okay = false;
                                    break;
                                }
                            }
                            fclose($myfile);
                        }

                        //Si la validacion pasa entonces guardamos el registro en nuestro archivo
                        if($okay){
                            $myfile = fopen('db.csv','a');
                            fwrite($myfile,"$id|$name|$user|$pass|$date".PHP_EOL);
                            fclose($myfile);
                            echo "<p>Gracias $name, tu usuario $user </p>";
                            echo '<p style="color:green;">Se registro con exito.</p>';
                        }
                    ?>
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-4">
                            <?php
                            if($okay)
                                echo '<a class="btn btn-link" href="index.php">Volver al Login</a>';
                            else
                            echo '<a class="btn btn-link" href="register_user_form.php">Volver al Registro</a>';
                            ?>
                        </div>
                    </div>   
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>