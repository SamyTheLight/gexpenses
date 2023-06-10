// Botón para seleccionar el tipo de actividad
const btn_sel = document.getElementById("afegirActivitat1");
// Botón para aceptar la actividad
const btn_acc = document.getElementById("aceptar");
// Obtenemos el despesaTotal
const despesa_total = document.getElementById("despesaTotal").value;
// Obtenemos los inputs del reparto
const inputs_reparto = Array.from(document.getElementsByName("deuda[]"));

// la deuda total a repartir es igual a la deuda total menos la parte proporcional del pagador
const despesa_a_repartir_total =
  despesa_total - despesa_total / (inputs_reparto.length + 1);

// Evento change para el menú desplegable
document
  .getElementById("tipusActivitat1")
  .addEventListener("change", function () {
    const select = this.value;
    showProporciones(select); //solo para mostrar los inputs de proporciones

    let despesa_a_repartir = despesa_a_repartir_total;

    const div = document.getElementById("reparto");
    div.classList.replace("oculto", "visible");
    btn_acc.classList.replace("btn-card2", "visible1");

    // Si el valor seleccionado es "Pago básico", mostramos un div y cambiamos la clase de los botones
    if (select == "Pago básico") {
      inputs_reparto.forEach((input) => {
        input.value = despesa_a_repartir / inputs_reparto.length;
        input.readOnly = true;
      });
      // Si el valor seleccionado es "Pago avanzado por importe" ...
    } else if (select == "Pago avanzado por importe") {
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
          const input_despesa_repartir =
            document.getElementById("despesa_a_repartir");
          input_despesa_repartir.value = despesa_a_repartir.toFixed(2);
        });
      });

      // Si el valor seleccionado es "Pago avanzado por proporciones" ...
    } else if (select == "Pago avanzado por proporciones") {
      const inputs_proporcion = Array.from(
        document.getElementsByName("proporcion[]")
      );

      inputs_reparto.forEach((i)=>{
        i.value = 0;
      });

      inputs_proporcion.forEach((input) => {
        input.addEventListener("input", function () {
          let total_partes = 0;
          inputs_proporcion.forEach((i) => {
            total_partes +=
              parseFloat(i.value) == NaN ? 0 : parseFloat(i.value);
          });

          inputs_proporcion.forEach((i) => {
            let partes_proporcionales =
              parseFloat(i.value) == NaN ? 0 : parseFloat(i.value);

              //deuda_proporcional es lo que hay que escribir en el input de deuda[] adyacente al input de proporcion[] que se está trabajando
            let deuda_proporcional =
              (partes_proporcionales * despesa_a_repartir_total) /
              total_partes;

            let input_deuda = i.nextElementSibling;
            if (
              input_deuda &&
              input_deuda.nodeName === "INPUT" &&
              input_deuda.name === "deuda[]"
            ) {
              input_deuda.value = deuda_proporcional;
            }
          });
        });
      });

      const input_despesa_repartir =
        document.getElementById("despesa_a_repartir");
      input_despesa_repartir.value = despesa_a_repartir_total.toFixed(2);
    }
  });

function showProporciones(valor_select) {
  const inputs_proporcion = Array.from(
    document.getElementsByName("proporcion[]")
  );

  if (valor_select == "Pago avanzado por proporciones") {
    inputs_proporcion.forEach(function (input) {
      input.style.display = "";
    });
  } else {
    inputs_proporcion.forEach(function (input) {
      input.style.display = "none";
    });
  }
}
