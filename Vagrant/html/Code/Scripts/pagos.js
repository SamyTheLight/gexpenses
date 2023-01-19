const formulario = `
<div id="back-form">
            <div id="form-act1">
                <section class="cantact_info1">
                    <section class="info_title1">
                        <h2>REPARTE TUS GASTOS</h2>
                        <section class="info_items1">
                            <p>¡Reparte el gasto con tus amigos! </p>
                        </section>
                    </section>
                </section>
                <form action="" id="act-form1" method="post"">
                <button id="btn-cerrar1">X</button>
                <div id="form-pay">
                    <label for="tipusAct">Tipo de pago</label>
                    <select name="tipusActivitat" id="tipusActivitat1" class="form-control1" name="tipusActivitat">
                        <option value=""selected disabled>Selecciona un pago</option>
                        <option value="Pago básico">Pago básico</option>
                        <option value="Pago avanzado">Pago avanzado</option>
                    </select>
                </div>
                    <button class="btn-card1" id="afegirActivitat1" name="enviarActivitat">SELECCIONAR</button>
            </div>
            </form>
        </div>
`;

const btn_form = document.getElementById('btn-form');
const form_act1 = document.getElementById('form-act');
document.getElementById('afegirActivitat').addEventListener('click', function (e) {
    e.preventDefault();
    btn_form.insertAdjacentHTML('afterend', formulario);
    form_act1.classList.add('form-act');
    document.getElementById('afegirActivitat1').addEventListener('click', function (e) {
        e.preventDefault();
        const select = document.getElementById('tipusActivitat1').options[document.getElementById('tipusActivitat1').selectedIndex].value;
        
        if (select == "Pago básico") {
            
            console.log(1);
        } else if (select == "Pago avanzado") {
            console.log(2);
        }
    });

});


