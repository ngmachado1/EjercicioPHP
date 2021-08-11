<div class="container bg-color">
    <h1 class="page-header">
        page-header -> <?php echo $usuario->id != null ? $usuario->Nombre : 'Nuevo Registro'; ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href="?c=usuario">Usuarios</a></li>
        <li class="active"><?php echo $usuario->id != null ? $usuario->Nombre : 'Nuevo Registro'; ?></li>
    </ol>

</div>


<div class="box-sesion">
    <div class="width-75">
        <h1>
            <?= $usuario->id != null ?  "Editar Registro" : "Nuevo Registro" ?>
        </h1>
        <form action="?c=usuario&a=Guardar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $usuario->id; ?>" />
            <div class="form-control">
                <label>Nombre</label>
                <input type="text" class="input-form" name="Nombre" value="<?php echo $usuario->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
            </div>
            <div class="form-control">
                <label>Apellido</label>
                <input type="text" class="input-form" name="Apellido" value="<?php echo $usuario->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido" required>
            </div>
            <div class="form-control">
                <label>Correo</label>
                <input type="text" class="input-form" name="Correo" value="<?php echo $usuario->Correo; ?>" class="form-control" placeholder="Ingrese su correo electrónico" required>
            </div>
            <div class="form-control">
                <label>Contraseña</label>
                <input type="password" class="input-form" name="Pass" value="<?php echo $usuario->Pass; ?>" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
            <?= $usuario->id != null ?  
            '<button class="mt-5 btn btn-primary" type="submit">Guardar</button>' : 
            '<button class="mt-5 btn btn-primary" type="submit">Registrarse</button>' ?>
        </form>
        <?= $usuario->id != null ?  
        '<a href="index.php" class="btn btn-secondary">Volver</a>' :
        '<a href="index.php" class="btn btn-secondary">Iniciar sesion</a>' ?>
    </div>
</div>

<script>

</script>