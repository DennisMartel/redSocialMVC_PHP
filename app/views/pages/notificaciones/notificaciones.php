<?php require_once RUTA_APP . '/views/components/header.php'; ?>
<?php require_once RUTA_APP . '/views/components/navbar.php'; ?>

<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="text-muted text-center">notificaciones <?php echo $data['notificaciones'] ?> </h2>
            <hr>
            <?php
            foreach ($data['misNotificaciones'] as $misNotificaciones) :
            ?>
                <div class="alert alert-primary" role="alert">
                    <a href="" style="color: red; text-decoration: none;"><?php echo $misNotificaciones->usuario ?></a>
                    <?php echo $misNotificaciones->nombreNotificacion ?>
                    <a href="<?php echo RUTA_PROJECT?>/notificaciones/eliminarNotificacion/<?php echo $misNotificaciones->idNotificacion?>" style="color: green; text-decoration: none; float:right;"><i class="fa fa-trash"></i></a>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>

<?php require_once RUTA_APP . '/views/components/footer.php'; ?>