 <table id="zivotinje-tabela-pretraga-sort" class="table table-bordered">
     <thead class="text-center">
         <tr>
             <th id="id" name="asc">ID</th>
             <th id="ime" name="asc">Ime</th>
             <th id="tip" name="asc">Tip</th>
             <th id="godine" name="asc">Godine</th>
             <th id="naziv" name="asc">Zoo Vrt</th>
             <th id="adresa" name="asc">Adresa</th>
             <th id="ime_drzave" name="asc">Država</th>
         </tr>
     </thead>
     <tbody class="text-center" id="pretrazi-sort-tbl-body">

         <?php

            $query = "select ziv.id, ziv.ime, ziv.tip, ziv.godine, zoo.naziv, zoo.adresa, d.ime_drzave from zivotinja ziv join zoo zoo on ziv.zoo_id = zoo.id join drzava d on zoo.drzava_id = d.id order by ziv.id desc";
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $baza = "zoovrt";
            $connection = new mysqli($hostname, $username, $password, $baza) or die("Connect failed: %s\n" . $connection->error);

            $kriterijum_pretrage = $_POST['POST_ime_tip'];

            $query = "select ziv.id, ziv.ime, ziv.tip, ziv.godine, zoo.naziv, zoo.adresa, d.ime_drzave from zivotinja ziv join zoo zoo on ziv.zoo_id = zoo.id join drzava d on zoo.drzava_id = d.id where
     ziv.ime like '%" . $kriterijum_pretrage . "%' or ziv.tip like '%" . $kriterijum_pretrage . "%'";

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