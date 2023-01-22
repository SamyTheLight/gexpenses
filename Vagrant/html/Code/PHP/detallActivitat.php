<?php
include 'nav.php';

include 'ConexionDB.php';

if (!isset($_SESSION)) {
    session_start();
}

// $query = "SELECT Fecha FROM activitat  where usuario_id='" . $_SESSION['id_usuario'] . "' ORDER BY Fecha DESC";
// $stmt = $conexion->query($query);
// $registros = $stmt->fetchAll(PDO::FETCH_OBJ);

$queryPago1 = $conexion->prepare("SELECT concepto,cantidad,pagador FROM pagos ORDER BY fecha DESC ");

$queryPago1->execute();

$registros11 = $queryPago1->fetchAll(PDO::FETCH_OBJ);


// foreach ($registros1 as $row) : 
//     echo($row);
// endforeach; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="/html/Code/Styles/detallActivitat.css">
    <title>Detall Activitat</title>
</head>

<body>
    <div class="details">
        <div class="activityDetails">


            <div class="date">
                <h3>2023-01-11 18:23:15.437</h3>
            </div>
            <div class="buttonPayment">
                <button type="submit">Añadir Gasto +</button>
            </div>
            <div class="import">
                <h3>Importe</h3>
            </div>

            <div class="members">

                <span class="material-icons">person</span>
                <?php
                if (isset($_GET['aceptat'])) {
                ?>
                <?php
                    if ($_GET['aceptat'] === '1') {
                    ?>
                < <span class="material-icons">person</span>


                    <?php
                    }
                        ?>

                    <?php
                }
                    ?>

            </div>
            <div class="paymentsList">
                <table class="registros">
                    <tr>
                        <th class="concepto"><b>Concepto</b></th>
                        <th id="cantidad"><b>Cantidad</b></th>
                        <th class="pagador"><b>Pagador</b></th>
                    </tr>
                    <?php foreach ($registros11 as $rowPago) : ?>
                    <tr>
                        <th class=""><?php echo ($rowPago->concepto) ?></th>
                        <th id="description"><?php echo $rowPago->cantidad ?></th>
                        <th class="divisa"><?php echo $rowPago->pagador ?></th>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>


    </div>


</body>
<?php
include 'footer.php';
?>