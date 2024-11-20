<?php  
  $select = $Clientes->selectReservas($_SESSION['id_usuario']);
?>

<form id="frmAgregarCliente" onsubmit="return agregarCliente()">
  <div class="modal fade" id="modal_agregar_cliente" tabindex="-1" aria-labelledby="modal_agregar_clienteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_agregar_clienteLabel">Agregar cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            <label for="dni">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" required>
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
            <label for="tel">Telefono</label>
            <input type="text" class="form-control" id="tel" name="tel" required>
            <label for="tel_alt">Telefono Alternativo</label>
            <input type="text" class="form-control" id="tel_alt" name="tel_alt" required>
            <label for="correo">Correo</label>
            <input type="correo" class="form-control" id="correo" name="correo" required>
            <label for="fechaNac">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fechaNac" name="fechaNac" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-purple">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>