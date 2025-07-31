<?php 
  include "header.php";
  include "menu.php"; 
  
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Reservas</h2>
          

          <div class="row">
            <div class="col">
              <span class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#modal_agregar_reserva">
                <i class="fa-regular fa-calendar-plus"></i> Nueva reserva
              </span>
            </div>
            <div class="col"></div>
            <div class="col">
              <div class="input-group mb-3">
                <input type="date" class="form-control" id="fechaBuscar">
                <span class="btn btn-purple" onclick="buscarPorFecha()">
                  <i class="fa-solid fa-magnifying-glass"></i> Buscar
                </span>
              </div>
            </div>
          </div>

          <hr>
          <div id="tablaReservas"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Plantilla del comprobante -->
<div id="comprobante" class="comprobante-pdf" style="display: none; padding:0.5%;">
    <header>
      <img src="../public/img/logo2.png" alt="Reserva·Web" width="80" />
      <h1>CONFIRMACIÓN DE RESERVA</h1>
    </header>

    <section class="container">
      <h2 id="nombreCliente"></h2>
      <div class="info" id="contenidoComprobante">
        <!-- contenido dinámico generado por JS -->
      </div>
      <p><strong id="codigoReserva">Código de reserva: 5829KH</strong></p>
    </section>
</div>
<?php 
  include "reservas/modal_agregar.php";
  include "reservas/modal_editar.php";
  include "footer.php";
?>

<script src="../public/js/reservas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    