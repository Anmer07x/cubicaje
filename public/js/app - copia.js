let boton = document.getElementById("calcular");
let respuesta = document.getElementById("respuesta");

boton.addEventListener("click", hacerSuma);

function trea() {
  try {
    var alto = parseFloat(document.getElementById("num_alto").value) || 0,
      largo = parseFloat(document.getElementById("num_largo").value) || 0,
      ancho = parseFloat(document.getElementById("num_ancho").value) || 0,
      factor = parseFloat(document.getElementById("num_factor").value) || 0,
      cantidad = parseFloat(document.getElementById("num_cantidad").value) || 0;

    document.getElementById("num_vol").value =
      (alto / 100) * (largo / 100) * (ancho / 100) * (1 + factor) * cantidad;
  } catch (e) {}

  try {
    var cantidad =
        parseFloat(document.getElementById("num_cantidad").value) || 0,
      piezas = parseFloat(document.getElementById("num_piezas").value) || 0,
      peso = parseFloat(document.getElementById("num_peso").value) || 0;

    document.getElementById("num_pesoT").value = cantidad * piezas * peso;
  } catch (e) {}
}
