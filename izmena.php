<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Životinje ZOO VRT</title>
</head>

<body>

    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $baza = "zoovrt";
    $connection = new mysqli($hostname, $username, $password, $baza) or die("Connect failed: %s\n" . $connection->error);

    $query = "select * from zivotinja where id=" . $_GET['id'];

    $rezultat = $connection->query($query);
    $zivotinja = mysqli_fetch_assoc($rezultat);

    ?>
    <div>

        <form method="post" class="text-center" id="update-zivotinja">
            <div class="mb-2">
                <label class="form-label text-light">Ime</label>
                <input type="text" class="form-control text-center" name="ime" value="<?php echo $zivotinja['ime'] ?>">
            </div>
            <div class="mb-2">
                <label class="form-label text-light">Tip</label>
                <input type="text" class="form-control text-center" name="tip" value="<?php echo $zivotinja['tip'] ?>">
            </div>
            <div class="mb-2">
                <label class="form-label text-light">Godine</label>
                <input type="text" class="form-control text-center" name="godine" value="<?php echo $zivotinja['godine'] ?>">
            </div>
            <div class="mb-2">
                <label class="form-label text-light">ZOO </label>
                <select name="zoo" class="form-select text-center">
                    <?php
                    $query_zoo = "select * from zoo";
                    $rezultat_zoo = $connection->query($query_zoo);

                    while ($zoo = mysqli_fetch_assoc($rezultat_zoo)) {
                    ?>
                        <option value="<?php echo $zoo['id']; ?>"><?php echo $zoo['naziv']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success" name="update-button" id="update_button_frm">Izmeni</button>
        </form>
    </div>
    <?php
    require 'zivotinja.php';

    if (isset($_POST['update-button'])) {
        $zivotinja = new Zivotinja();
        if ($zivotinja->izmeniZivotinju($_GET['id'], $_POST['ime'], $_POST['tip'], $_POST['godine'], $_POST['zoo'])) {
            $script = "<script>
            window.location = 'zivotinje.php';</script>";
            echo $script;
        } else {
            echo 'Greška!';
        }
    }
    ?>

</body>

</html>