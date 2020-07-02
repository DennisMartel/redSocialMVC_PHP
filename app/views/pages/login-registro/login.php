<?php require_once RUTA_APP . '/views/components/header.php'; ?>

<div class="contenedor">
    <img src="<?php echo RUTA_PROJECT?>/img/bg.svg" alt="imagen del login" class="imagen-login">
    <form action="<?php echo RUTA_PROJECT?>/home/login" method="post" class="main-form">
        <h4 class="main-form__title">iniciar sesion</h4>
        <input type="text" name="usuario" id="usuario" class="main-form__input" placeholder="usuario" required>
        <input type="password" name="contrasena" id="contrasena" class="main-form__input" placeholder="contraseña" required>
        <p class="main-form__paragraph">no tengo cuenta 
            <a href="<?php echo RUTA_PROJECT?>/home/register" class="main-form__link">registrarme</a>
        </p>
        <button class="main-form__submit">iniciar sesion</button>
        <?php 
            //alerta si hay error al loguearse
            if(isset($_SESSION['errorLogin'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show mt-sm-2" role="alert">
                        '. $_SESSION['errorLogin'] .'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            } unset($_SESSION['errorLogin']);

            //alerta de registro exitoso
            if(isset($_SESSION['registroCompleto'])) {
                echo '<div class="alert alert-success alert-dismissible fade show mt-sm-2" role="alert">
                        '. $_SESSION['registroCompleto'] .'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            } unset($_SESSION['registroCompleto']);
        ?>
    </form>
</div>

<?php require_once RUTA_APP . '/views/components/footer.php'; ?>