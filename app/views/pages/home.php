<?php require_once RUTA_APP . '/views/components/header.php'; ?>
<?php require_once RUTA_APP . '/views/components/navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-xl-4 col-l-4 col-md-12 col-sm-12 mt-3">
            <div class="profile-card">
                <div class="profile-card__background">
                    <div class="profile-card__imagen-center">
                        <img src="<?php echo RUTA_PROJECT . '/' . $data['perfil']->fotoPerfil?>" alt="" class="profile-card__imagen">
                    </div>
                    <div class="profile-card__separation"></div>
                </div>
                <a href="" class="nav-link">
                    <p class="profile-card__name"><?php echo $data['perfil']->nombreCompleto ?></p>
                </a>
                <div class="profile-cards__stadistics">
                    <a href="" class="nav-link profile-cards__stadistics-link">me gusta <br> 0</a>
                    <a href="" class="nav-link profile-cards__stadistics-link">publicaciones <br>0</a>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-l-8 col-md-12 col-sm-12 mt-3">
            <div class="card-publicar">
                <form action="" method="post" class="card-publicar__form-publicacion">
                    <textarea name="descripcion" class="card-publicar__pensamiento" placeholder="¿Ques estas pensando?"></textarea>
                    <div class="card-publicar__upload-image">
                        <i class="fa fa-image card-publicar__icon"></i>
                        <input type="file" name="" id="" class="card-publicar__upload-input">
                        <button type="submit" class="card-publicar__submit">publicar</button>
                    </div>
                </form>
            </div>
            <section class="main-section">
                <div class="main-publicaciones">
                    <img src="<?php echo RUTA_PROJECT . '/' . $data['perfil']->fotoPerfil?>" alt="" class="main-publicaciones__foto-perfil">
                    <h4 class="main-publicaciones__nombre-perfil"><?php echo $data['perfil']->nombreCompleto ?></h4>
                    <p class="main-publicaciones__fecha-publicacion"><?php echo date('y/m/d'); ?></p>
                </div>
                <div class="main-publicaciones__otros">
                        <h6 class="main-publicaciones__descripcion-publicacion">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae aliquam aperiam quos quia iste quod laboriosam, magni ipsam dignissimos cum? Et numquam quis fuga, ullam rerum sequi architecto reiciendis inventore.</h6>
                        <img src="<?php echo RUTA_PROJECT?>/img/imagenLogin.jpg" alt="" class="main-publicaciones__img-publicacion">
                    </div>
                    <div class="main-publicaciones__btn-like">
                        <a href="" class="main-publicaciones__link nav-link"><i class="fa fa-heart-o"></i> me gusta <span>0</span></a>
                    </div>
                    <div class="main-publicaciones__comentar">
                        <form action="" method="post" class="main-publicaciones__form-comentar">
                            <textarea name="descripcion" class="main-publicacion__comentar" placeholder="¿Que piensas sobre la publicacion?"></textarea>
                            <button type="submit" class="main-publicacion__btn-comentar">agregar comentario</button>
                        </form>
                    </div>
                    <div class="main-publicaciones__mis-comentarios">
                        <img src="<?php echo RUTA_PROJECT . '/' . $data['perfil']->fotoPerfil?>" alt="" class="main_publicaciones__foto-pertenece">
                        <div class="main-publicaciones__responsable">
                            <h6 class="main-publicaciones__nombre-pertenece"><?php echo $data['perfil']->nombreCompleto?></h6>
                            <p class="main_publicaciones__comentario-pertenece">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor, veritatis? Possimus facere molestias inventore numquam nemo illo, dolore quo sed autem nobis facilis eius placeat. Qui nam at accusantium odit!</p>    
                        </div>
                    </div>
                    <hr>
                    <div class="main-publicaciones__mis-comentarios">
                        <img src="<?php echo RUTA_PROJECT . '/' . $data['perfil']->fotoPerfil?>" alt="" class="main_publicaciones__foto-pertenece">
                        <div class="main-publicaciones__responsable">
                            <h6 class="main-publicaciones__nombre-pertenece"><?php echo $data['perfil']->nombreCompleto?></h6>
                            <p class="main_publicaciones__comentario-pertenece">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor, veritatis? Possimus facere molestias inventore numquam nemo illo, dolore quo sed autem nobis facilis eius placeat. Qui nam at accusantium odit!</p>    
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>


<?php require_once RUTA_APP . '/views/components/footer.php'; ?>