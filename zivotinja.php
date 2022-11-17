<?php

class Zivotinja
{
    public $id;
    public $ime;
    public $tip;
    public $godine;
    public $zoo_id;

    public function dodajZivotinju($id, $ime, $tip, $godine, $zoo_id)
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $baza = "zoovrt";
        $connection = new mysqli($hostname, $username, $password, $baza) or die("Connect failed: %s\n" . $connection->error);

        $query1 = "insert into zivotinja values ('$id', '$ime', '$tip', '$godine', '$zoo_id')";

        return $connection->query($query1);
    }

    public function izmeniZivotinju($id, $ime, $tip, $godine, $zoo_id)
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $baza = "zoovrt";
        $connection = new mysqli($hostname, $username, $password, $baza) or die("Connect failed: %s\n" . $connection->error);

        $query = "update zivotinja set ime='$ime', tip='$tip', godine='$godine', zoo_id='$zoo_id' where id='$id'";

        return $connection->query($query);
    }
}
