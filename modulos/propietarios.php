<?php 

  include "../clases/Propietarios.php";
  $Propietarios = new Propietarios();
  
  include "header.php";
  include "menu.php"; 
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Propietarios</h2>
          <span class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#modal_agregar_departamento">
          <i class="fa-solid fa-hotel"></i> Nuevo departamento
          </span>
          <hr>
          <div id="tablaPropietarios"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include "footer.php";
  include "propietarios/modal_agregar.php";
  include "propietarios/modal_editar.php";
?>
<script src="../public/js/propietarios.js"></script>
    