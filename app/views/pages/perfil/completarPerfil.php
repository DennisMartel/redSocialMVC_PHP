<?php require_once RUTA_APP . '/views/components/header.php'; ?>

<div class="contenedor">
    <form action="<?php echo RUTA_PROJECT?>/home/insertarRegistrosPerfil" method="post" class="main-form" enctype="multipart/form-data">
        <h4 class="main-form__title">completa tu perfil</h4>
        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['logueado'] ?>">
        <input type="text" name="nombreCompleto" id="nombre" class="main-form__input" placeholder="nombre completo" required>
        <input type="file" name="fotoPerfil" id="foto" class="main-form__input" required>
        <button class="main-form__submit">finalizar</button>
    </form>
</div>

<?php require_once RUTA_APP . '/views/components/footer.php'; ?>