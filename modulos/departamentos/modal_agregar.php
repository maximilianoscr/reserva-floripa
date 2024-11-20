<?php  
  //$select = $Departamentos->selectReservas($_SESSION['id_usuario']);
?>

<form id="frmAgregarDepartamento" onsubmit="return agregarDepartamento()">
  <div class="modal fade" id="modal_agregar_departamento" tabindex="-1" aria-labelledby="modal_agregar_departamentoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_agregar_departamentoLabel">Agregar departamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="titulo">Titulo del departamento</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
            <label for="altura">Altura</label>
            <input type="text" class="form-control" id="altura" name="altura" required>
            <label for="tipo_habitacion">Tipo de habitacion</label>
            <select class="form-select" id="tipo_habitacion" name='tipo_habitacion'><!-- ESTO TENGO QUE CAMBIAR -->
                <option value="1">Sencilla</option>
                <option value="2">Doble</option>
                <option value="3">Suite</option>
            </select>
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            <label for="x_mapa">Latitud</label>
            <input type="text" class="form-control" id="x_mapa" name="x_mapa" >
            <label for="y_mapa">Longitud</label>
            <input type="text" class="form-control" id="y_mapa" name="y_mapa" >
            <label for="capacidad">Capacidad en personas</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" required>
            <label for="color">Color</label>
            <input type="color" class="form-control form-control-color" id="color" name="color" value="#ff0000">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-purple">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>
