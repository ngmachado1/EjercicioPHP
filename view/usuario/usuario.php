    <div class="container bg-color">
    </div>

    <div class="box-sesion width-80">
        <h1>Hola! <?= $_SESSION['Correo']; ?></h1>
        <table class="table" id="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->model->Listar() as $r) : ?>
                    <tr>
                        <td><?= $r->id; ?></td>
                        <td><?= $r->Nombre; ?></td>
                        <td><?= $r->Apellido; ?></td>
                        <td><?= $r->Correo; ?></td>
                        <td class="center">
                            <a class="btn-warning m4" href="?c=usuario&a=Crud&id=<?= $r->id; ?>"><i class="far fa-edit"></i></a>
                            <a class="btn-danger m4" onclick="javascript:return confirm('¿Seguro de eliminar este usuario?');" href="?c=usuario&a=Eliminar&id=<?php echo $r->id; ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="right">
            <a class="btn2 btn-primary" href="?c=usuario&a=Crud">Agregar</a>
            <a href="?c=usuario&a=Logout" class="btn2 btn-secondary">salir</a>
        </div>
    </div>

</body>



</html>