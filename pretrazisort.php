<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Zivotinje ZOO VRT</title>
</head>

<body>

    <div class="pretrazi-sort-div">
        <h2 id="naslov-zivotinje">Životinje - Pretraži/Sortiraj</h2>
        <div class="pretraga-polja">
            <input type="text" id="input-pretraga" placeholder="Unesite ime ili tip životinje...">
        </div>

        <div class="zivotinje-tabela-div">

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
                    <?php require 'pretraga_sort_body.php'; ?>
                </tbody>
            </table>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
</body>

</html>