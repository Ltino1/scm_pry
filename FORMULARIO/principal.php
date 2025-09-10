<?php
    require_once 'models/usuario.php';
    $usuario = new Usuario();
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Sincronizar y validar
        $usuario->sincronizar($_POST);
        $errores = $usuario->validarRegistro();
        
        if(empty($errores)){
            // Si no hay errores, puedes procesar el registro (por ahora no hay lógica para esto)
            // Por ejemplo, aquí podrías guardar el usuario en una base de datos.
            // Para este ejemplo, solo redirigimos si todo está bien.
            header('location: principal.php?registro=exitoso');
        }
    }
?>
<?php include_once 'templates/_header.php' ?>
<div class="app">
    <?php include_once 'templates/_sidebar.php' ?>
    <div class="contenido contenedor">
        <h1>Registrar Usuario</h1>
        
        <?php if(!empty($errores)): ?>
            <?php foreach ($errores as $error):?>
                <p class="alerta alerta-error"><?php echo $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(isset($_GET['registro']) && $_GET['registro'] === 'exitoso'): ?>
            <p class="alerta">¡Usuario registrado correctamente!</p>
        <?php endif; ?>

        <form class="formulario" method="POST">
            <div class="form__control">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario->nombre ?? ''); ?>">
            </div>
            <div class="form__control">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($usuario->email ?? ''); ?>">
            </div>
            <div class="form__control">
                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" value="<?php echo htmlspecialchars($usuario->telefono ?? ''); ?>">
            </div>
            <div class="form__control">
                <label for="username">Nombre de usuario:</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($usuario->username ?? ''); ?>">
            </div>
            <div class="form__control">
                <label for="password">Contraseña:</label>
                <input type="password" name="password">
            </div>
            <div class="form__control">
                <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
</div>
<?php include_once 'templates/_footer.php' ?>