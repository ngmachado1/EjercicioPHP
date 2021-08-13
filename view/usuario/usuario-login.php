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
        <form action="?c=usuario&a=Login" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label>Correo</label>
                <input type="text" name="Correo" class="input-form" placeholder="Ingrese su correo electrónico" required>
            </div>
            <div class="form-control">
                <label>Contraseña</label>
                <input type="password" name="Pass" class="input-form" placeholder="Ingrese su contraseña" required>
                <button class="mt-5 btn btn-primary" type="submit">Iniciar sesión</button>
            </div>
        </form>
        <a href="?c=usuario&a=Crud" class="btn btn-secondary">Crear cuenta</a>
    </div>
</div>