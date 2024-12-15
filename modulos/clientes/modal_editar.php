
<form id="frmEditarCliente" onsubmit="return actualizarCliente()">
  <!-- Modal -->
  <div class="modal fade" id="modal_editar_cliente" tabindex="-1" aria-labelledby="modal_editar_clienteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_editar_clienteLabel">Editar cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="id_cliente" name="id_cliente" hidden>
            <label for="apellidoe">Apellido</label>
            <input type="text" class="form-control" id="apellidoe" name="apellidoe" required>
            <label for="nombree">Nombre del cliente</label>
            <input type="text" class="form-control" id="nombree" name="nombree" required>
            <label for="dnie">DNI</label>
            <input type="text" class="form-control" id="dnie" name="dnie" required>
            <label for="direccione">Direccion</label>
            <input type="text" class="form-control" id="direccione" name="direccione" required>
            <label for="telu">Telefono</label>
            <input type="text" class="form-control" id="telu" name="telu" required>
            <label for="tel_altu">Telefono Alternativo</label>
            <input type="text" class="form-control" id="tel_altu" name="tel_altu" required>
            <label for="correoe">Email</label>
            <input type="email" class="form-control" id="correoe" name="correoe" required>
            <label for="fechaNacu">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fechaNacu" name="fechaNacu" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-warning">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>