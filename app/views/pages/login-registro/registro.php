<?php require_once RUTA_APP . '/views/components/header.php'; ?>

<div class="contenedor">
    <img src="<?php echo RUTA_PROJECT?>/img/bg.svg" alt="imagen del login" class="imagen-login">
    <form action="<?php echo RUTA_PROJECT?>/home/register" method="post" class="main-form">
        <h4 class="main-form__title">registrate</h4>
        <input type="text" name="usuario" id="usuario" class="main-form__input" placeholder="usuario" required>
        <input type="email" name="email" id="email" class="main-form__input" placeholder="email" required>
        <input type="password" name="contrasena" id="contrasena" class="main-form__input" placeholder="contraseña" required>
        <p class="main-form__paragraph">ya tengo cuenta
            <a href="<?php echo RUTA_PROJECT?>/home/login" class="main-form__link">iniciar sesion</a>
        </p>
        <button class="main-form__submit">registrarme</button>
        <?php 
            if(isset($_SESSION['errorRegistro'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show mt-sm-2" role="alert">
                        '. $_SESSION['errorRegistro'] .'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            } unset($_SESSION['errorRegistro']);
        ?>
    </form>
</div>

<?php require_once RUTA_APP . '/views/components/footer.php'; ?>