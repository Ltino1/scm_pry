<?php
    //Require / Include
    require_once 'models/Usuario.php';
    $usuario = new Usuario();
    $errores = [];
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        // VALIDAR LOS DATOS DEL USUARIO      
        $usuario->sincronizar($_POST);
        $errores = $usuario->validarLogin();
        if(empty($errores)){
            $logged = $usuario->login();
            if($logged){
                header('location: principal.php');
            }
            else{
                $errores[] = "Usuario o password";
            }
        }
    }
?>
<?php include_once 'templates/_header.php' ?>
<div class="login">
    <div class="login__contenido">
        <?php foreach ($errores as $error):?>
            <p class="alerta alerta-error"><?php echo $error; ?></p>
        <?php endforeach; ?>
        <form class="formulario" method="post">
            <div class="form__control">
                <label for="usuario">Usuario:</label>
                <input type="text" name="username" id="username" 
                    autocomplete="off" value="<?php echo $usuario->username; ?>">
            </div>
            <div class="form__control">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" value="Ingresar">
        </form>
    </div>
</div>
<?php include_once 'templates/_footer.php' ?>