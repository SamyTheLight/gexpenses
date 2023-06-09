// Botón para seleccionar el tipo de actividad
const btn_sel = document.getElementById("afegirActivitat1");
// Botón para aceptar la actividad
const btn_acc = document.getElementById("aceptar");
// Obtenemos el despesaTotal
const despesa_total = document.getElementById("despesaTotal").value;
// Obtenemos los inputs del reparto
const inputs_reparto = Array.from(document.getElementsByName("deuda[]"));

const despesa_a_repartir_total = despesa_total - (despesa_total / (inputs_reparto.length + 1));

let despesa_a_repartir = despesa_a_repartir_total;

// Evento change para el menú desplegable
document.getElementById("tipusActivitat1").addEventListener("change", function () {
  const select = this.value;

  // Si el valor seleccionado es "Pago básico", mostramos un div y cambiamos la clase de los botones
  if (select == "Pago básico") {
    const div = document.getElementById("reparto");
    div.classList.replace("oculto", "visible");
    btn_sel.classList.replace("btn-card1", "btn-oculto");
    btn_acc.classList.replace("btn-card2", "visible1");

    inputs_reparto.forEach((input) => {
      input.value = despesa_total / (inputs_reparto.length + 1);
      input.readOnly = true;
    });

  // Si el valor seleccionado es "Pago avanzado por importe" ...
  } else if (select == "Pago avanzado por importe") {
    const div = document.getElementById("reparto");
    div.classList.replace("oculto", "visible");
    btn_sel.classList.replace("btn-card1", "btn-oculto");
    btn_acc.classList.replace("btn-card2", "visible1");

    inputs_reparto.forEach((input) => {
      // debugger;
      input.value = ""; // Vaciar los valores de los inputs
      input.readOnly = false;
      input.addEventListener("input", function (e) {
        let sumatorio = 0;
        inputs_reparto.forEach((input) => {
          let valor = parseFloat(input.value);
          sumatorio += isNaN(valor) ? 0 : valor;
        });
        despesa_a_repartir = despesa_a_repartir_total - sumatorio;
        const input_despesa_repartir = document.getElementById("despesa_a_repartir");
        input_despesa_repartir.value = despesa_a_repartir.toFixed(2);
      });
    });

  // Si el valor seleccionado es "Pago avanzado por proporciones" ...
  } else if (select == "Pago avanzado por proporciones") {
    const div = document.getElementById("reparto");
    div.classList.replace("oculto", "visible");
    btn_sel.classList.replace("btn-card1", "btn-oculto");
    btn_acc.classList.replace("btn-card2", "visible1");

    inputs_reparto.forEach((input) => {
      input.value = ""; // Vaciar los valores de los inputs
      input.readOnly = false;
    });

    const input_despesa_repartir = document.getElementById("despesa_a_repartir");
    input_despesa_repartir.value = despesa_a_repartir_total;
  }
});
