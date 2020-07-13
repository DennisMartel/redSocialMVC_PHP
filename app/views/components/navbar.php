<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(113, 75, 153);">
    <div class="container">
        <a class="navbar-brand" href="#"><?php echo NAME_PROJECT ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_PROJECT?>/home">
                        inicio
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-users"></i><span class="badge badge-success ml-sm-1">1</span></a>
                </li>
                -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_PROJECT?>/usuarios">
                        usuarios
                        <i class="fa fa-users"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_PROJECT?>/mensajes">
                        mensajes
                        <i class="fa fa-envelope"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_PROJECT?>/notificaciones">
                        notificaciones
                        <i class="fa fa-bell"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo RUTA_PROJECT . '/' . $data['perfil']->fotoPerfil?>" 
                                alt="foto perfil" 
                                style="width: 30px; height: 30px; border-radius: 50%" 
                            />
                            <?php echo ucwords($_SESSION['usuario']);?>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo RUTA_PROJECT?>/perfil/<?php echo $data['usuario']->usuario . '/' . $data['usuario']->idUsuario?>">perfil</a>
                            <a class="dropdown-item" href="<?php echo RUTA_PROJECT?>/home/logout">cerrar sesion</a>
                        </div>
                    </div>
                </li>
            </ul>
            <form class="form-inline ml-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="buscar personas" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>