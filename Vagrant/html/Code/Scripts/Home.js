//Formulario Pop Up donde se muestra la información para añadir una actividad
const formulario = `
<div id="back-form">
            <div id="form-act">
                <section class="cantact_info">
                    <section class="info_title">
                        <h2>AÑADE UNA ACTIVIDAD</h2>
                        <section class="info_items">
                            <p>¡Añade una actividad para poder disfrutar de nuestra web! </p>
                        </section>
                    </section>
                </section>
                <form action="" id="act-form" method="POST"">
                <button id="btn-cerrar">X</button>
        <h2>Añade una actividad</h2>
        <div class=" user_info">
                    <label for="names">Nombre de la actividad </label>
                    <input type="text" id="names" placeholder="Nombre de la actividad" class="form-control" name="nomActivitat">

                    <label for="description">Descripción</label>
                    <input type="text" placeholder="Descripción de la actividad" class="form-control" name="descripcionActivitat">

                    <label for="mensaje">Divisa</label>
                    <select name="divisa" id="divisa" class="form-control" name="divisa">
                        <option value="$">$</option>
                        <option value="€">€</option>
                        <option value="¥">¥</option>
                    </select>
                    <label for="tipusAct">Tipo de actividad</label>
                    <select name="tipusActivitat" id="tipusActivitat" class="form-control" name="tipusActivitat">
                        <option value="Viajes">Viajes</option>
                        <option value="Comida">Comida</option>
                        <option value="Deportes">Deportes</option>
                        <option value="Ocio">Ocio</option>
                    </select>

                    <button class="btn-card" id="afegirActivitat" name="enviarActivitat">AÑADIR ACTIVIDAD</button>
            </div>
            </form>
        </div>
`;

//Seleccionamos los elementos DOM necesarios para mostrar y ocultar el Pop Up
const btn_cerrar = document.getElementById("btn-cerrar");
const btn_form = document.querySelector(".btn-form");
const div = document.querySelector(".face");
const face_card = document.querySelector(".img-card");

// Se añade un event listener al botón 'form-btn' que inserta el formulario en el DOM 
//cuando se hace clic en él.
document.getElementById("form-btn").addEventListener("click", function () {
  btn_form.insertAdjacentHTML("afterend", formulario);
  const act = document.getElementById("tipusActivitat");
  //Se añade otro event listener al botón 'afegirActivitat' que redirige 
  //a la página invitaciones.
  document
    .getElementById("afegirActivitat")
    .addEventListener("click", function (e) {
      let selectedOption = act.options[act.selectedIndex];
      window.location.href = "Invitaciones.php";
    });
});
