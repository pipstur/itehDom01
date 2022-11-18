<?php

$hostname = "localhost";
$username = "root";
$password = "";
$baza = "zoovrt";
$connection = new mysqli($hostname, $username, $password, $baza) or die("Connect failed: %s\n" . $connection->error);

$sort_kolona = $_POST['kljucSortKolona'];
$sort_poredak = $_POST['kljucSortPoredak'];
?>


<table id="zivotinje-tabela" class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th id="id" name="<?php if ($sort_kolona == 'id' && $sort_poredak == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                } ?>">ID</th>
            <th id="ime" name="<?php if ($sort_kolona == 'ime' && $sort_poredak == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                } ?>">Ime</th>
            <th id="tip" name="<?php if ($sort_kolona == 'tip' && $sort_poredak == 'asc') {
                                    echo 'desc';
                                } else {
                                    echo 'asc';
                                } ?>">Tip</th>
            <th id="godine" name="<?php if ($sort_kolona == 'godine' && $sort_poredak == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    } ?>">Godine</th>
            <th id="naziv" name="<?php if ($sort_kolona == 'naziv' && $sort_poredak == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    } ?>">ZOO</th>
            <th id="adresa" name="<?php if ($sort_kolona == 'adresa' && $sort_poredak == 'asc') {
                                        echo 'desc';
                                    } else {
                                        echo 'asc';
                                    } ?>">Adresa</th>
            <th id="ime_drzave" name="<?php if ($sort_kolona == 'ime_drzave' && $sort_poredak == 'asc') {
                                            echo 'desc';
                                        } else {
                                            echo 'asc';
                                        } ?>">Država</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $query = "select ziv.id, ziv.ime, ziv.tip, ziv.godine, zoo.naziv, zoo.adresa, d.ime_drzave from zivotinja ziv join zoo zoo on ziv.zoo_id = zoo.id join drzava d on zoo.drzava_id=d.id order by " . $sort_kolona . " " . $sort_poredak;

        $rezultat = $connection->query($query);

        while ($zivotinja = mysqli_fetch_assoc($rezultat)) {
        ?>
            <tr class="text-center">
                <td><?php echo $zivotinja['id'] ?></td>
                <td><?php echo $zivotinja['ime'] ?></td>
                <td><?php echo $zivotinja['tip'] ?></td>
                <td><?php echo $zivotinja['godine'] ?></td>
                <td><?php echo $zivotinja['naziv'] ?></td>
                <td><?php echo $zivotinja['adresa'] ?></td>
                <td><?php echo $zivotinja['ime_drzave'] ?></td>
            </tr>
        <?php } ?>

    </tbody>

</table>