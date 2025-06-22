<?php  
  //$select = $Clientes->selectReservas($_SESSION['id_usuario']);
?>

<form id="frmAgregarPropietario" onsubmit="return agregarPropietario()">
  <div class="modal fade" id="modal_agregar_propietario" tabindex="-1" aria-labelledby="modal_agregar_propietarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_agregar_propietarioLabel">Agregar propietario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="descripcion">Apellido y Nombres</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            <label for="correo">Correo</label>
            <input type="correo" class="form-control" id="correo" name="correo" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-purple">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>
