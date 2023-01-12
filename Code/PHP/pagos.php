<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Code/Styles/pagos.css">
    <title>Pagos</title>
</head>

<body>
    <!-- POP UP ================ -->
    <div id="btn-form">

    </div>
    <div id="back-form1">
        <div id="form-act">
            <section class="cantact_info">
                <section class="info_title">
                    <h2>AÑADE UN PAGO</h2>
                    <section class="info_items">
                        <p>¡Añade un pago para poder gestionar tus deudas! </p>
                    </section>
                </section>
            </section>
            <form action="" id="act-form" method="POST">
                <h2>Actividad 3</h2>
                <div class=" user_info">
                    <label for="names">Concepto </label>
                    <input type="text" id="concepto" placeholder="Elige un concepto" class="form-control" name="concepto">

                    <label for="description">Importe</label>
                    <input type="number" placeholder="Elige un importe" class="form-control" id="importe" name="descripcionActivitat">

                    <label for="mensaje">Pagador</label>
                    <select name="" id="divisa" class="pagadores">
                        <option selected disabled value="" class="pagador">Elige un pagador</option>
                        <option value="Oscar" class="pagador">Oscar</option>
                        <option value="Joan" class="pagador">Joan</option>
                        <option value="Samuel" class="pagador">Samuel</option>
                    </select>
                    <label for="tipusAct">Miembros</label>
                    <input type="checkbox" value="1"> <label id="user" for="">Oscar</label>
                    <input type="checkbox" value="2"> <label id="user" for="">Joan</label>
                    <input type="checkbox" value="3"> <label id="user" for="">Samuel</label>

                    <button class="btn-card" id="afegirActivitat" name="enviarActivitat">GUARDAR</button>
                </div>
            </form>
        </div>
</body>
<script src="/Code/Scripts/pagos.js"></script>
<?php
include 'footer.php';
?>

</html>