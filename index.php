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
                    Iniciar Sesion
                <hr>
                </h1>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="post_login.php">
                            <div class="form-group row">
                                <label for="user" class="col-sm-4 col-form-label text-md-right">Usuario:</label>
                                <div class="col-md-6">
                                    <input id="user" type="text" class="form-control" name="user"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Acceder</button>
                                    <a class="btn btn-link" href="register_user_form.php">Registrarme</a>
                                </div>
                            </div>           
                        </form>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>



