import { useState } from "react";

function App() {
  const [datos, setDatos] = useState([]);
  const [titulo, setTitulo] = useState("Clientes");

  const endpoints = {
    Clientes: "http://localhost/reserva/reserva-floripa/servidor/clientes/cliente.php",
    Habitaciones: "http://localhost/reserva/reserva-floripa/servidor/departamentos/departamento.php",
    Propietarios: "http://localhost/reserva/reserva-floripa/servidor/propietarios/propietario.php"
  };

  const cargarDatos = (entidad) => {
    setTitulo(entidad);
    fetch(endpoints[entidad])
      .then((res) => res.json())
      .then((data) => setDatos(data))
      .catch((err) => console.error(`Error al cargar ${entidad.toLowerCase()}:`, err));
  };

  return (
    <div style={{ padding: "1rem" }}>
      <h1>{titulo}</h1>

      <div style={{ marginBottom: "1rem" }}>
        {Object.keys(endpoints).map((entidad) => (
          <button key={entidad} onClick={() => cargarDatos(entidad)} style={{ marginRight: "10px" }}>
            {entidad}
          </button>
        ))}
      </div>

      <ul>
        {datos.map((item, index) => (
          <li key={index}>{JSON.stringify(item)}</li>
        ))}
      </ul>
    </div>
  );
}

export default App;
