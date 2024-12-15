<?php

include "../clases/Clientes.php";
$Clientes = new Clientes();
$items = $Clientes->mostrarClientes(1);
$select_clientes="<label for='id_cliente'>Selecciona un cliente</label>".
                "<select name='id_cliente' id='id_cliente' class='form-select' required>'";
                $select_clientes.='<option value=-1>SELECCIONAR UN CLIENTE</option>'; 
foreach($items as $id => $dato){
  $select_clientes.='<option value='. $dato['id_cliente'] . '>' . 
                               $dato['apellido'] .", ".$dato['nombre']." (".$dato['id_cliente'].")".
                    '</option>'; 
}
$select_clientes.= '</select>';

?>
<form id="frmAgregarReserva" onsubmit="return agregarReserva()">
  <div class="modal fade" id="modal_agregar_reserva" tabindex="-1" aria-labelledby="modal_agregar_reservaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_agregar_reservaLabel">Agregar reserva</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="nombre_reserva">Titulo del reserva</label>
          <input type="text" class="form-control" id="nombre_reserva" name="nombre_reserva" required>
          <?php echo $select_clientes ; ?>
          <label for="fecha_inicio">Fecha inicio</label>
          <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
          <label for="fecha_fin">Fecha fin</label>
          <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
          <label for="id_depto">Selecciona el departamento</label>
          <select name="id_depto" id="id_depto" class="form-select" required="">
            <option value="">Por favor, cargar ingreso y egreso</option>
          </select>
          <label for="total">Valor total</label>
          <input type="text" class="form-control" id="total" name="total" required>
          <label for="parcial">Pago</label>
          <input type="text" class="form-control" id="parcial" name="parcial" required>
          <label for="obs">Observacion</label>
          <input type="text" class="form-control" id="obs" name="obs" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button id='cargar' type='submit' class="btn btn-warning">Cargar</button>
        </div>
      </div>
    </div>
  </div>
</form>