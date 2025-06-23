
<form id="frmVerCliente">
  <!-- Modal -->
  <div class="modal fade" id="modal_ver_cliente" tabindex="-1" aria-labelledby="modal_ver_clienteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_ver_clienteLabel">Visualizando cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="id_cliente" name="id_cliente" hidden>
            <label>Apellido</label>
            <input type="text" class="form-control" id="Vapellido" name="apellido" readonly>
            <label>Nombre del cliente</label>
            <input type="text" class="form-control" id="Vnombre" name="nombre" readonly>
            <label>DNI</label>
            <input type="text" class="form-control" id="Vdni" name="dni" readonly>
            <label>Direccion</label>
            <input type="text" class="form-control" id="Vdireccion" name="direccion" readonly>
            <label>Telefono</label>
            <input type="text" class="form-control" id="Vtel" name="tel" readonly>
            <label>Telefono Alternativo</label>
            <input type="text" class="form-control" id="Vtel_alt" name="tel_alt" readonly>
            <label>Email</label>
            <input type="email" class="form-control" id="Vcorreo" name="correo" readonly>
            <label>Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="VfechaNac" name="fechaNac" readonly>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</form>
