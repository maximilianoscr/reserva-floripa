<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <link rel="stylesheet" href="../../public/css/confirmacion.css">
  <title>Confirmaci&oacute;n de Reserva - Reserva·Web</title>
</head>
<body id="comprobante" >
  <header>
    <img src="../../public/img/logo2.png" alt="Reserva·Web" width="80" />
    <h1>CONFIRMACI&Oacute;N DE RESERVA</h1>
  </header>



  <section class="container">
    <h2>Mart&iacute;n Rodr&iacute;guez</h2>
    <div class="info" id="comprobante" >
      
      <div>
        <strong>Fecha de entrada:</strong><br />
        10 de marzo de 2025
      </div>
      <div>
        <strong>Fecha de salida:</strong><br />
        15 de marzo de 2025
      </div>
      <div>
        <strong>Departamento en Canasvieiras:</strong><br />
        2 hu&eacute;spedes
      </div>
      <div>
        <strong>Desayuno incluido</strong>
      </div>
    </div>
    <!--
    <div  style="
    position: relative;
    width: 600px;
    height: 800px;
    background-image: url('../../public/img/portada.webp');
    background-size: cover;
    padding: 40px;
    color: #000;
    font-family: Arial, sans-serif;
">
  <h2 style="text-align: center;">Comprobante de Reserva</h2>
  <p><strong>Cliente:</strong> Juan Pérez</p>
  <p><strong>Departamento:</strong> Edificio Sol 2</p>
  <p><strong>Fecha:</strong> 15/01/2026 al 22/01/2026</p>
  <p><strong>Total:</strong> $85.000</p>
</div>-->
    <p><strong>C&oacute;digo de reserva:</strong> 5829KH</p>

    <button onclick="descargarComprobante()">Descargar Comprobante</button>
 <!--   <button class="btn-contactar">CONTACTAR</button> -->
  </section>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function descargarComprobante() {
  const esCelular = window.innerWidth < 768;

  const opciones = {
    margin: 0,
    filename: 'comprobante_reserva.pdf',
    image: { type: 'jpeg', quality: 1 },
    html2canvas: { scale: 2, logging: true, dpi: 300 },
    jsPDF: {
      unit: 'mm',
      format: 'a4',
      orientation: esCelular ? 'portrait' : 'landscape'
    }
  };

  // Cambiar imagen de fondo
  const comprobante = document.getElementById("comprobante");
  if (esCelular) {
  comprobante.style.fontSize = '14px';
  comprobante.style.padding = '20px';
  } else {
    comprobante.style.fontSize = '16px';
    comprobante.style.padding = '40px';
  }
  comprobante.style.backgroundImage = esCelular
    ? "url('../../public/img/login.webp')"
    : "url('../../public/img/portada.webp')";

  html2pdf().set(opciones).from(comprobante).save();
}

</script>
</html>
