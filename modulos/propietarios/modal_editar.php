
<form id="frmEditarPropietario" onsubmit="return actualizarPropietario()">
  <!-- Modal -->
  <div class="modal fade" id="modal_editar_propietario" tabindex="-1" aria-labelledby="modal_editar_propietarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_editar_propietarioLabel">Editar propietario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="id_propietario" name="id_propietario" hidden>
            <label for="descripcionu">Apellido y nombres</label>
            <input type="text" class="form-control" id="descripcionu" name="descripcionu" required>
            <label for="correou">Email</label>
            <input type="email" class="form-control" id="correou" name="correou" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-warning">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>
