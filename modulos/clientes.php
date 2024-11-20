<?php 

  include "../clases/Clientes.php";
  $Clientes = new Clientes();
  
  include "header.php";
  include "menu.php"; 
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Clientes</h2>
          <span class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#modal_agregar_cliente">
          <i class="fa-solid fa-user-plus"></i> Nuevo cliente
          </span>
          <hr>
          <div id="tablaClientes"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include "footer.php";
  include "clientes/modal_agregar.php";
  include "clientes/modal_editar.php";
?>
<script src="../public/js/clientes.js"></script>
    