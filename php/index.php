<?php

require_once('./data.php');
require_once('./class.php');

$data = $countryCode;
$arrayPaysFormated = [];

$dbh = new PDO('mysql:host=localhost;dbname=lmksystem_test', "root", "");
$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$dbh->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );

$sth  = $dbh->prepare('SELECT id, nom, FROM user LIMIT 1');
$sth->execute();
$result = $sth->fetchAll();


for ($i = 0; $i < count($data); $i++) {
  $dataPays = $data[$i];

  $paysFormated = new Pays($dataPays[0], $dataPays[2], $dataPays[3]);
  $paysFormated->stripedColor($i);
  $arrayPaysFormated[] = $paysFormated;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    table {
      width: 100%;
    }

    thead th,
    tbody td {
      text-align: center;
      width: 33%;
    }
  </style>
</head>

<body>
  <main>
    <table class="table table-hover">
      <thead>
        <tr>
          <th colspan="3">List of pays</th>
        </tr>
      </thead>
      <thead>
        <tr>
          <th>Id</th>
          <th>Code</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($arrayPaysFormated as $pays) { ?>
          <tr <?php echo (isset($pays['color']) ? 'style="background-color: ' . $pays['color'] . ' "' : ''); ?>>
            <td><?php echo $pays['id'] ?></td>
            <td><?php echo $pays['code'] ?></td>
            <td><?php echo $pays['name'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>