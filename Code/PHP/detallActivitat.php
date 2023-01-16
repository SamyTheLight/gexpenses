<?php
include 'nav.php';



$query = "SELECT Fecha FROM activitat  where usuario_id='" . $_SESSION['id_usuario'] . "' ORDER BY Fecha DESC";
$stmt = $conexion->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="/Code/Styles/detallActivitat.css">
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

            </div>







        </div>


    </div>


</body>
<?php
include 'footer.php';
?>

</html>