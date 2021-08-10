<h1 class="page-header">
    <?php echo $usuario->id != null ? $usuario->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=usuario">Cliente</a></li>
  <li class="active"><?php echo $usuario->id != null ? $usuario->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=usuario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $usuario->id; ?>" />    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $usuario->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $usuario->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido" required>
    </div>  
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Correo" value="<?php echo $usuario->Correo; ?>" class="form-control" placeholder="Ingrese su correo electrónico" required>
    </div>
    <div class="form-group">
        <label>Contraseña</label>
        <input type="password" name="Pass" value="<?php echo $usuario->Pass; ?>" class="form-control" placeholder="Ingrese su contraseña" required>
    </div>
            
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>

</script>