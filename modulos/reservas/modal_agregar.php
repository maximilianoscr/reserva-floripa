
<!-- Modal -->
<form id="frmAgregarReserva" onsubmit="return agregarReserva()">
  <div class="modal fade" id="modal_agregar_reserva" tabindex="-1" aria-labelledby="modal_agregar_reservaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_agregar_reservaLabel">Agregar reserva</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="nombre_reserva">Nombre del reserva</label>
          <input type="text" class="form-control" id="nombre_reserva" name="nombre_reserva" required>
          <label for="cliente">Cliente</label>
          <input type="text" class="form-control" id="cliente" name="cliente" required>
          <label for="fecha_inicio">Fecha inicio</label>
          <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
          <label for="fecha_fin">Fecha fin</label>
          <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
          <label for="fecha">Observacion</label>
          <input type="text" class="form-control" id="fecha" name="fecha" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-purple">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>