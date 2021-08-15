<div class="container bg-color">
</div>
<div class="box-sesion width-25">
    <div class="width-75">

        <h1>
            Iniciar sesion
        </h1>
        <h2><?php
            if (isset($_SESSION['err'])) {
                echo $_SESSION['err'];
            }; ?></h2>
        <form action="?c=usuario&a=Login" method="post" enctype="multipart/form-data" id="formulario-login">
            <div class="form-control">
                <label>Correo</label>
                <input type="text" name="Correo" id="correo" class="input-form" placeholder="Ingrese su correo electrónico">
                <span class="correoError error"></span>
            </div>
            <div class="form-control">
                <label>Contraseña</label>
                <input type="password" name="Pass" id="pass" class="input-form" placeholder="Ingrese su contraseña">
                <span class="passError error"></span>
                <button class="mt-5 btn btn-primary" type="submit">Iniciar sesión</button>
            </div>
        </form>
        <a href="?c=usuario&a=Crud" class="btn btn-secondary">Crear cuenta</a>
    </div>
</div>