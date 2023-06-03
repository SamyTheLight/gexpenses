// Botón para seleccionar el tipo de actividad
const btn_sel = document.getElementById("afegirActivitat1");
// Botón para aceptar la actividad
const btn_acc = document.getElementById("aceptar");
//Obtenemos el despesaTotal
const despesa_total = document.getElementById("despesaTotal").value;
//Obtenemos los inputs del reparto
const inputs_reparto = Array.from(document.getElementsByName("deuda[]"));

let despesa_a_repartir = document.getElementById("despesaTotal").value;

// Evento click para el botón de selección de actividad
btn_sel.addEventListener("click", function (e) {
  e.preventDefault(); // Evita que el formulario se envíe automáticamente
  const select =
    document.getElementById("tipusActivitat1").options[ 
      document.getElementById("tipusActivitat1").selectedIndex
    ].value;

  // Si el valor seleccionado es "Pago básico", mostramos un div y cambiamos la clase de los botones 
  if (select == "Pago básico") {
    const div = document.getElementById("reparto");
    div.classList.replace("oculto", "visible");
    btn_sel.classList.replace("btn-card1", "btn-oculto");
    btn_acc.classList.replace("btn-card2", "visible1");

    inputs_reparto.forEach( (input)=>{
      input.value = despesa_total / inputs_reparto.length;
    } );

    // Si el valor seleccionado es "Pago avanzado" ...
  } else if (select == "Pago avanzado") {
    const div = document.getElementById("reparto");
    div.classList.replace("oculto", "visible");
    btn_sel.classList.replace("btn-card1", "btn-oculto");
    btn_acc.classList.replace("btn-card2", "visible1");

    
    inputs_reparto.forEach( (input)=>{
      input.readOnly = false;
      input.addEventListener("input", function (e) {
        let sumatorio = 0;
        inputs_reparto.forEach( (input)=>{
          let valor = parseFloat(input.value);
          sumatorio += isNaN(valor) ? 0 : valor;
        } );
        despesa_a_repartir = despesa_total - sumatorio;
        const input_despesa_repartir = document.getElementById("despesa_a_repartir");
        input_despesa_repartir.value = despesa_a_repartir;
      });      
    } );
  }
});

// Evento click para el botón de aceptar la actividad que nos redirige a la página detalle_actividad
btn_acc.addEventListener("click", function (e) {
  e.preventDefault();
  window.location = "detalle_actividad.php";
});

