<h2>Hola! <?= $_SESSION['Correo']; ?></h2>


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
            <td><?= $r->id . "-" . $r->Nombre; ?></td>
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
<a class="btn btn-primary" href="?c=usuario&a=Crud">Agregar</a>
<a href="?c=usuario&a=Logout" class="btn btn-secondary">salir</a>
</body>

</script>


</html>
