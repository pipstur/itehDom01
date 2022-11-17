  <?php

  $query = "select ziv.id, ziv.ime, ziv.tip, ziv.godine, zoo.naziv, zoo.adresa, d.ime_drzave from zivotinja ziv join zoo zoo on ziv.zoo_id = zoo.id join drzava d on zoo.drzava_id = d.id order by ziv.id desc";
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $baza = "zoovrt";
  $connection = new mysqli($hostname, $username, $password, $baza) or die("Connect failed: %s\n" . $connection->error);
  $rezultat = $connection->query($query);

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

    </tr>


  <?php }   ?>