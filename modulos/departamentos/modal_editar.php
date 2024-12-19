<form id="frmEditarDepartamento" onsubmit="return actualizarDepartamento()">
  <!-- Modal -->
  <div class="modal fade" id="modal_editar_departamento" tabindex="-1" aria-labelledby="modal_editar_departamentoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_editar_departamentoLabel">Editar departamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="id_depto" name="id_depto" hidden>
            <label for="titulou">Titulo del departamento</label>
            <input type="text" class="form-control" id="titulou" name="titulou" required>
            <label for="direccionu">Direccion</label>
            <input type="text" class="form-control" id="direccionu" name="direccionu" >
            <label for="alturau">Altura</label>
            <input type="text" class="form-control" id="alturau" name="alturau" >
            <label for="habitacionesu">Cantidad habitaciones</label>
            <input type="number" class="form-control" id="habitacionesu" name="habitacionesu" required>
            <label for="descripcionu">Descripcion</label>
            <input type="text" class="form-control" id="descripcionu" name="descripcionu" required>
            <label for="x_mapau">Ubicacion</label>
            <input type="text" class="form-control" id="x_mapau" name="x_mapau" >
            <label for="capacidadu">Capacidad en personas</label>
            <input type="number" class="form-control" id="capacidadu" name="capacidadu" required>
            <label for="preciou">Precio por d&iacute;a</label>
            <input type="text" class="form-control" id="preciou" name="preciou" required>
            <label for="coloru">Color</label>
            <input type="color" class="form-control form-control-color" id="coloru" name="coloru" value="#ff0000">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-warning">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>