<form id="frmEditarReserva" onsubmit="return actualizarReserva()">
  <!-- Modal -->
<div class="modal fade" id="modal_editar_reserva" tabindex="-1" aria-labelledby="modal_editar_reservaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_editar_reservaLabel">Editar Reserva</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="text" id="id_reserva" name="id_reserva" hidden>
          <label for="nombre_reservau">Nombre de la reserva</label>
          <input type="text" class="form-control" id="nombre_reservau" name="nombre_reservau" required>
          <label for="fecha_iniciou">Fecha inicio</label>
          <input type="time" class="form-control" id="fecha_iniciou" name="fecha_iniciou" required>
          <label for="fecha_finu">Fecha fin</label>
          <input type="time" class="form-control" id="fecha_finu" name="fecha_finu" required>
          <label for="fechau">Observacion</label>
          <input type="text" class="form-control" id="obsu" name="obsu" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-warning">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>