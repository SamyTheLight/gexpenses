<?php
session_start();
include 'nav.php'





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Home</title>
</head>

<body>
    <h1><?php echo "<h1>Bienvenido - " . $_SESSION['usuario'] . "</h1>"; ?></h1>

    <div class=act-card>
        <div class="card">
            <div class="card-body">
                <h4>AÑADE UNA ACTIVIDAD</h4>
                <form id="act-form">
                    <div class="form-group">
                        <input type="text" id="name" placeholder="Nombre de la actividad" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" id="description" placeholder="Descripción de la actividad" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="divisa" id='divisa' class="form-control">
                            <option value="$">$</option>
                            <option value="€">€</option>
                            <option value="¥">¥</option>
                        </select>
                    </div>
                    <input type="submit" value="ENVIAR" class="btn-card">
                </form>
            </div>
        </div>
        <div id="act-list">
            <table id="table-act">
                <tr>
                    <td>NOMBRE</td>
                    <td>DESCRIPCIÓN</td>
                    <td>DIVISA</td>
                </tr>

            </table>
        </div>
    </div>


    <script src="Home.js"></script>
</body>

</html>



<?php

include 'footer.php';
?>