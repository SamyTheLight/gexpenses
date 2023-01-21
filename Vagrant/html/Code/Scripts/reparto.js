document
  .getElementById("afegirActivitat1")
  .addEventListener("click", function (e) {
    e.preventDefault();
    const select =
      document.getElementById("tipusActivitat1").options[
        document.getElementById("tipusActivitat1").selectedIndex
      ].value;

    if (select == "Pago básico") {
      const div = document.getElementById("reparto");
      div.classList.replace("oculto", "visible");
    } else if (select == "Pago avanzado") {
      console.log(2);
    }
  });
