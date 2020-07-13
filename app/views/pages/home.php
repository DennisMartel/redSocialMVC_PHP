<?php require_once RUTA_APP . '/views/components/header.php'; ?>
<?php require_once RUTA_APP . '/views/components/navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-xl-4 col-l-4 col-md-12 col-sm-12 mt-3">
            <!-- profile column -->
            <div class="profile-card">
                <div class="profile-card__background">
                    <div class="profile-card__imagen-center">
                        <img src="<?php echo RUTA_PROJECT . '/' . $data['perfil']->fotoPerfil ?>" alt="" class="profile-card__imagen">
                    </div>
                    <div class="profile-card__separation"></div>
                </div>
                <a href="<?php echo RUTA_PROJECT?>/perfil/<?php echo $data['usuario']->usuario . '/' . $data['usuario']->idUsuario?>" class="nav-link">
                    <p class="profile-card__name"><?php echo $data['perfil']->nombreCompleto ?></p>
                </a>
                <div class="profile-cards__stadistics">
                    <a href="" class="nav-link profile-cards__stadistics-link">me gusta <br>0</a>
                    <a href="" class="nav-link profile-cards__stadistics-link">publicaciones <br>0</a>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-l-8 col-md-12 col-sm-12 mt-3">
            <!-- main column -->
            <div class="card-publicar">
                <form action="<?php echo RUTA_PROJECT ?>/publicacion/publicar" method="POST" class="card-publicar__form-publicacion" enctype="multipart/form-data">
                    <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['logueado'] ?>">
                    <textarea name="descripcion" class="card-publicar__pensamiento" placeholder="¿Ques estas pensando?" required></textarea>
                    <div class="card-publicar__upload-image">
                        <i class="fa fa-image card-publicar__icon"></i>
                        <input type="file" name="foto" class="card-publicar__upload-input" required>
                        <button type="submit" class="card-publicar__submit">publicar</button>
                    </div>
                </form>
            </div>
            <?php foreach ($data['publicaciones'] as $datosPublicacion) : ?>
                <section class="main-section">
                    <div class="main-publicaciones">
                        <img src="<?php echo RUTA_PROJECT . '/' . $datosPublicacion->fotoPerfil ?>" alt="" class="main-publicaciones__foto-perfil">
                        <h4 class="main-publicaciones__nombre-perfil"><?php echo $datosPublicacion->nombreCompleto ?></h4>
                        <p class="main-publicaciones__fecha-publicacion"><?php echo $datosPublicacion->registrado ?></p>
                        <?php if ($datosPublicacion->idUsuario == $_SESSION['logueado']) : ?>
                            <a href="<?php echo RUTA_PROJECT ?>/publicacion/eliminarPublicacion/<?php echo $datosPublicacion->idPublicacion ?>" class="btn btn-success"><i class="fa fa-trash"></i></a>
                        <?php endif; ?>
                    </div>
                    <div class="main-publicaciones__otros">
                        <h6 class="main-publicaciones__descripcion-publicacion"><?php echo $datosPublicacion->descripcion ?>
                        </h6>
                        <img src="<?php echo RUTA_PROJECT . '/' . $datosPublicacion->foto ?>" alt="" class="main-publicaciones__img-publicacion">
                    </div>
                    <div class="main-publicaciones__btn-like">
                        <a href="<?php echo RUTA_PROJECT ?>/publicacion/megusta/<?php echo $_SESSION['logueado'] . '/' .  $datosPublicacion->idPublicacion ?>" class="main-publicaciones__link nav-link" style="
                        <?php 
                        foreach($data['likes'] as $datosLike) :
                            if($datosLike->idPublicacion == $datosPublicacion->idPublicacion):
                                echo 'color: red';
                            endif;
                        endforeach;
                        ?>
                        ">
                            <i class="fa fa-heart"></i>
                            <span><?php echo $datosPublicacion->num_likes?></span>
                        </a>
                    </div>
                    <div class="main-publicaciones__comentar">
                        <form action="<?php echo RUTA_PROJECT?>/publicacion/comentar" method="post" class="main-publicaciones__form-comentar">
                            <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['logueado']?>">
                            <input type="hidden" name="idPublicacion" value="<?php echo $datosPublicacion->idPublicacion?>">
                            <textarea name="comentario" class="main-publicacion__comentar" placeholder="¿Que piensas sobre la publicacion?"></textarea>
                            <button type="submit" class="main-publicacion__btn-comentar">agregar comentario</button>
                        </form>
                    </div>
                    <?php foreach ($data['comentarios'] as $datosComentario) : ?>
                    <?php if($datosComentario->idPublicacion == $datosPublicacion->idPublicacion) :?>
                        <div class="main-publicaciones__mis-comentarios">
                        <img src="<?php echo RUTA_PROJECT . '/' . $datosComentario->fotoPerfil ?>" alt="" class="main_publicaciones__foto-pertenece">
                        <div class="main-publicaciones__responsable">
                            <h6 class="main-publicaciones__nombre-pertenece"><?php echo $datosComentario->usuario ?>
                            </h6>
                            <p class="main_publicaciones__comentario-pertenece"><?php echo $datosComentario->comentario?></p>
                        </div>
                        <div class="main-publicaciones__actions">
                            <h6 class="main-publicaciones__actions-date"><?php echo $datosComentario->registrado?></h6>
                            <?php if ($datosComentario->idUsuario == $_SESSION['logueado']) : ?>
                                <a href="<?php echo RUTA_PROJECT?>/publicacion/eliminarComentario/<?php echo $datosComentario->idComentario?>" class="main-publicaciones__actions-delete"><i class="fa fa-trash"></i></a>
                            <?php endif; ?>
                        </div>
                        <hr>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php require_once RUTA_APP . '/views/components/footer.php'; ?>