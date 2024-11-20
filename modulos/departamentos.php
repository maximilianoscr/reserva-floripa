<?php 

  include "../clases/Departamentos.php";
  $Departamentos = new Departamentos();
  
  include "header.php";
  include "menu.php"; 
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Departamentos</h2>
          <span class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#modal_agregar_departamento">
          <i class="fa-solid fa-hotel"></i> Nuevo departamento
          </span>
          <hr>
          <div id="tablaDepartamentos"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include "footer.php";
  include "departamentos/modal_agregar.php";
  include "departamentos/modal_editar.php";
?>
<script src="../public/js/departamentos.js"></script>
    