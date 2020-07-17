<?php require_once RUTA_APP . '/views/components/header.php'; ?>
<?php require_once RUTA_APP . '/views/components/navbar.php'; ?>

<div class="container">
    <div class="card mt-2">
        <div class="card-body">
            <h3 class="text-center text-muted">resultados busqueda</h3>
            <hr>
            <div class="lista-de-usuarios-registrados">
            <?php foreach($data['busqueda'] as $usuariosRegistrados): ?>
                <div class="elemento-usuario-registrado">
                    <img src="<?php echo RUTA_PROJECT . '/' . $usuariosRegistrados->fotoPerfil ?>" alt="" class="image-big-user mr-2">
                    <h4 class="text-muted"><?php echo $usuariosRegistrados->nombreCompleto ?></h4>
                        <div class="nombre-usuario-registrado">
                            <a href="<?php echo RUTA_PROJECT ?>/perfil/<?php echo $usuariosRegistrados->usuario ?>"><?php echo $usuariosRegistrados->usuario ?></a>
                        </div>
                </div>
                <hr>
            <?php endforeach ?>
        </div>
        </div>
    </div>
</div>

<?php require_once RUTA_APP . '/views/components/footer.php'; ?>