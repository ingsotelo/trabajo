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
                    Bienvenido a mi trabajo.
                <hr>
                </h1>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        
                        <?php
                            //Esta pagina recibe los datos de index.php para iniciar sesion.
                            //Recibimos user y password en $_POST
                            $user = $_POST['user'] ?? "";
                            $pass = $_POST['password'] ?? "";
                            $result = valida_pass ($user, $pass);

                            if($result != null){
                                print "<p><h4>BIENVENIDO SU USUARIO Y CONTRASENA SON CORRECTAS.</h4></p>";
                                print "<p>Datos del usuario:</p>";
                                foreach ($result as $r)                             
                                print "<p>$r</p>";
                            }else{
                                print "<p><h4>SUS CREDENCIALES NO SON LAS CORRECTAS. INTENTELO NUEVAMENTE.</h4></p>";
                            }

        
                            function valida_pass ($user, $pass)
                            {
                                if (($myfile = fopen("db.csv", "r")) !== FALSE) {
                                    while (($datos = fgetcsv($myfile, 1000, "|")) !== FALSE) {
                                        if($datos[2]==$user) $user_array = $datos; 
                                    }
                                    fclose($myfile);
                                }

                                if($user_array[3] == sha1($pass)) return $user_array;

                                return null;
                            }
                        ?>
                        <div class="row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="index.php">Volver al Login</a>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Contenido del archivo db.csv</h5>
                                <table style = " width: 100%;">
                                <tr>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Fecha</th>
                                </tr>
                                <?php
                                     if (($myfile = fopen("db.csv", "r")) !== FALSE) {
                                        while (($datos = fgetcsv($myfile, 1000, "|")) !== FALSE) {
                                            echo '<tr>';
                                            for( $i=0; $i<=4; $i++ ){
                                             echo '<td>'.$datos[$i].'</td>';
                                            }
                                            echo '</tr>';
                                        }
                                        fclose($myfile);
                                    }    
                                ?>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>