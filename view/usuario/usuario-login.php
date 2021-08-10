<div class="container">

    <div class="box-sesion">
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
                <input type="password" name="Pass" class="input-form" placeholder="Ingrese su correo electrónico" required>
                <div class="form-control">
                <button type="submit">Iniciar sesion</button>
        </form>
        <a href="?c=usuario&a=Crud">Registrarse</a>

    </div>
</div>