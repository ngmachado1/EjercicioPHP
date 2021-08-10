<h2>Hola! <?= $_SESSION['Correo']; ?></h2>

    <a class="btn btn-primary pull-right" href="?c=usuario&a=Crud">Agregar</a>
<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?= $r->id; echo "-" .$r->Nombre; ?></td>
            <td><?= $r->Apellido; ?></td>
            <td><?= $r->Correo; ?></td>
            <td>
                <a  class="btn btn-warning" href="?c=usuario&a=Crud&id=<?= $r->id; ?>">Editar</a>
                <a  class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=usuario&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<a href="?c=usuario&a=Logout" class="button">salir</a>
</body>

</script>


</html>
