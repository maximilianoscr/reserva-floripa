<?php  
  $selecte = $Departamentos->selectReservasEditar($_SESSION['id_usuario']);
?>

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
          <input type="text" id="id_departamento" name="id_departamento" hidden>
            <label for="titulou">Titulo del departamento</label>
            <input type="text" class="form-control" id="titulou" name="titulou" required>
            <label for="direccionu">Direccion</label>
            <input type="text" class="form-control" id="direccionu" name="direccionu" required>
            <label for="alturau">Altura</label>
            <input type="text" class="form-control" id="alturau" name="alturau" required>
            <label for="tipo_habitacionu">Tipo de habitacion</label>
            <select class="form-select" id="tipo_habitacionu" name='tipo_habitacionu'><!-- ESTO TENGO QUE CAMBIAR -->
                <option value="1">Sencilla</option>
                <option value="2">Doble</option>
                <option value="3">Suite</option>
            </select>
            <label for="descripcionu">Descripcion</label>
            <input type="text" class="form-control" id="descripcionu" name="descripcionu" required>
            <label for="x_mapau">Latitud</label>
            <input type="text" class="form-control" id="x_mapau" name="x_mapau" >
            <label for="y_mapau">Longitud</label>
            <input type="text" class="form-control" id="y_mapau" name="y_mapau" >
            <label for="capacidadu">Capacidad en personas</label>
            <input type="number" class="form-control" id="capacidadu" name="capacidadu" required>
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