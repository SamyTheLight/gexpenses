// Botón para seleccionar el tipo de actividad
const btn_sel = document.getElementById("afegirActivitat1");
// Botón para aceptar la actividad
const btn_acc = document.getElementById("aceptar");

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

    // Si el valor seleccionado es "Pago avanzado" ...
  } else if (select == "Pago avanzado") {
    console.log(2);
  }
});

// Evento click para el botón de aceptar la actividad que nos redirige a la página detallActivitat
btn_acc.addEventListener("click", function (e) {
  e.preventDefault();
  window.location = "detallActivitat.php";
});
