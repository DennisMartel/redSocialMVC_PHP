<?php require_once RUTA_APP . '/views/components/header.php'; ?>
<?php require_once RUTA_APP . '/views/components/navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card mt-sm-2">
                <div class="card-header">
                    <center>
                        <img src="<?php echo RUTA_PROJECT ?>/img/imagenLogin.jpg" alt="imagen publicacion" style="width: 100px; height:100px; border-radius: 50%;">
                    </center>    
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="">likes</a></li>
                    <li class="list-group-item"><a href="">publicaciones</a></li>
                    <li class="list-group-item"><a href="">comentarios</a></li>
                    <li class="list-group-item"><a href="">amigos</a></li>
                    <li class="list-group-item"><a href="">seguidores</a></li>
                    <li class="list-group-item"><a href="">siguiendo</a></li>
                </ul>
            </div>
        </div>
        <div class="col-8">
            <div class="card mt-sm-2" style="padding: 10px;">
                <form action="" method="post">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="¿Que estas pensando?" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" style="float: right;">Publicar</button>
                    </div>
                </form>
            </div>
            <div class="card mt-sm-2" style="padding: 10px;">
                <img src="<?php echo RUTA_PROJECT ?>/img/imagenLogin.jpg" alt="imagen publicacion" style="width: 100%; height: 350px;">
                <div class="form-group">
                    <a href="" style="font-size: 25px;"><i class="fa fa-thumbs-up"></i><span class="badge badge-success ml-sm-1">1</span></a>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="comentar" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" style="float: right;">comentar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once RUTA_APP . '/views/components/footer.php'; ?>