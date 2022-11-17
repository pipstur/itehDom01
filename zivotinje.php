<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Životinje ZOO VRT</title>
</head>

<body>

    <div class="zivotinje-div">

        <h2 id="naslov-zivotinje">Životinje - Dodaj/Izmeni/Obriši</h2>

        <div class="zivotinje-tabela-div">
            <table id="zivotinje-tabela" class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Tip</th>
                        <th>Godine</th>
                        <th>Zoo Vrt</th>
                        <th>Adresa</th>
                        <th>Drzava</th>
                        <th>Operacija</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php

                    $query = "select ziv.id, ziv.ime, ziv.tip, ziv.godine, zoo.naziv, zoo.adresa, d.ime_drzave from zivotinja ziv join zoo zoo on ziv.zoo_id = zoo.id join drzava d on zoo.drzava_id = d.id order by ziv.id desc";
                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $baza = "zoovrt";
                    $connection = new mysqli($hostname, $username, $password, $baza) or die("Connect failed: %s\n" . $connection->error);
                    $rezultat = $connection->query($query);

                    include 'modal_nova.php';
                    require 'zivotinja.php';

                    while ($zivotinja = mysqli_fetch_assoc($rezultat)) {
                    ?>
                        <tr>
                            <td><?php echo $zivotinja['id'] ?></td>
                            <td><?php echo $zivotinja['ime'] ?></td>
                            <td><?php echo $zivotinja['tip'] ?></td>
                            <td><?php echo $zivotinja['godine'] ?></td>
                            <td><?php echo $zivotinja['naziv'] ?></td>
                            <td><?php echo $zivotinja['adresa'] ?></td>
                            <td><?php echo $zivotinja['ime_drzave'] ?></td>
                            <td>
                                <button type="button" class="btn btn-success" id="add-button" data-bs-toggle="modal" data-bs-target="#nova">Dodaj</button>
                                <a href="izmena.php?id=<?php echo $zivotinja['id'] ?>"><button type="button" class="btn btn-light" id="edit-button">Izmeni</button></a>
                                <a href="obrisi_zivotinju.php?id=<?php echo $zivotinja['id'] ?>"> <button type="button" class="btn btn-danger" id="dlt-button">Obriši</button></a>
                            </td>
                        </tr>


                    <?php }

                    if (isset($_POST['save-button'])) {

                        $zivotinja = new Zivotinja();

                        if ($zivotinja->dodajZivotinju(null, $_POST['ime'], $_POST['tip'], $_POST['godine'], $_POST['zoo'])) {
                            $script = "<script>
                            window.location = 'zivotinje.php';</script>";
                            echo $script;
                        } else {
                            echo 'Greška!';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>