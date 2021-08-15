<div class="container bg-color">
</div>
<div class="box-sesion width-25">
    <div class="width-75">
        <h1>
            <?= $usuario->id != null ?  "Editar Registro" : "Nuevo Registro" ?>
        </h1>
        <form action="?c=usuario&a=Guardar" method="post" id="formulario-reg" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $usuario->id; ?>" />
            <div class="form-control">
                <label>Nombre</label>
                <input type="text" class="input-form" id="nombre" name="Nombre" value="<?php echo $usuario->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre">
                <span class="nombreError error"></span>
            </div>
            <div class="form-control">
                <label>Apellido</label>
                <input type="text" class="input-form" id="apellido" name="Apellido" value="<?php echo $usuario->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido">
                <span class="apellidoError error"></span>
            </div>
            <div class="form-control">
                <label>Correo</label>
                <input type="text" class="input-form" id="correo" name="Correo" value="<?php echo $usuario->Correo; ?>" class="form-control" placeholder="Ingrese su correo electrónico">
                <span class="correoError error"></span>
            </div>
            <div class="form-control">
                <label>Contraseña</label>
                <input type="password" class="input-form" id="pass" name="Pass" value="<?php echo $usuario->Pass; ?>" class="form-control" placeholder="Ingrese su contraseña">
                <span class="passError error"></span>
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

</body>

</html>