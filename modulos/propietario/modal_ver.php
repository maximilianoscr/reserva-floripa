
<form id="frmVerPropietario">
  <!-- Modal -->
  <div class="modal fade" id="modal_ver_propietario" tabindex="-1" aria-labelledby="modal_ver_propietarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_ver_propietarioLabel">Visualizando propietario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="id_propietario" name="id_propietario" hidden>
            <label>Apellido y nombres</label>
            <input type="text" class="form-control" id="Vdescripcion" name="descripcion" readonly>
            <label>Email</label>
            <input type="email" class="form-control" id="Vcorreo" name="correo" readonly>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</form>
