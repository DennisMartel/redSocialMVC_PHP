<?php require_once RUTA_APP . '/views/components/header.php'; ?>
<?php require_once RUTA_APP . '/views/components/mainNavbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <img src="<?php echo RUTA_PROJECT ?>/img/imagenLogin.jpg" alt="" style="width: 100%; height: 100%;">
        </div>
        <div class="col-6">
            <div class="card mt-sm-2">
                <div class="card-header">
                    Registrate Gratis Aquí
                </div>
                <div class="container">
                    <form class="mt-sm-2 mb-sm-2" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                <input type="text" class="form-control" placeholder="nombre">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control" placeholder="apellido">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="confirmar">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Registrarme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p class="text-muted text-center">creado por <a href="https://github.com/dennismartel" class="nav-link" target="_blank">Dennis Alexander Martel</a></p>
</div>
<?php require_once RUTA_APP . '/views/components/footer.php'; ?>