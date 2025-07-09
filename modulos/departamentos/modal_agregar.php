<?php 
    include "../clases/Propietarios.php";
    $Propietarios = new Propietarios();
    $props = $Propietarios->mostrarPropietarios($_SESSION['id_usuario']);
    $select_propietarios="<label for='id_propietario'>Selecciona un propietario</label>".
                "<select name='id_propietario' id='id_propietario' class='form-select' required>'";
                $select_propietarios.='<option value=-1>Propietarios</option>'; 
    foreach($props as $id => $dato){
      $select_propietarios.='<option value='. $dato['id_propietario'] . '>' . 
                                  $dato['descripcion']." (".$dato['correo'].")".
                        '</option>'; 
    }
    $select_propietarios.= '</select>';
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
            <?php echo $select_propietarios; ?>
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" >
            <label for="altura">Altura</label>
            <input type="text" class="form-control" id="altura" name="altura" >
            <label for="habitaciones">Cantidad habitaciones</label>
            <input type="number" class="form-control" id="habitaciones" name="habitaciones" required>
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            <label for="x_mapa">Ubicacion</label>
            <input type="text" class="form-control" id="x_mapa" name="x_mapa" >
            <label for="capacidad">Capacidad en personas</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" required>
            <label for="precio">Precio por d&iacute;a</label>
            <input type="text" class="form-control" id="precio" name="precio" required>
            <label for="color">Color</label>
            <input type="color" class="form-control form-control-color" id="color" name="color" value="#ff0000">
        <!--    <label for="imagen">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" > -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button class="btn btn-purple">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>
