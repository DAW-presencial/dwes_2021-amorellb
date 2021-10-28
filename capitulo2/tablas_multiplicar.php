<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<style>
    table {
        border: 2px solid black;
        text-align: center
    }
</style>
<?php
/*// Non table-like multiplication tables
$var = 1;
for ($i = 1; $i <= 10; $i++) {
    echo "<b>Tabla del $var</b>  <br>";
    for ($j = 1; $j <= 10; $j++) {
        $res = $j * $var;
        echo "$var * $j = $res <br>";
    }
    if ($var < 10) {
        echo "<br>";
        echo "<br> ------------------------------- <br>";
        echo "<br>";
    }
    $var++;
}*/

// Table-like multiplication tables
$var = 0;
echo "<table><th>*</th>";
for ($i = 0; $i <= 10; $i++) {
  echo "<th>$i</th>";
}
for ($i = 0; $i <= 10; $i++) {
  echo "<tr>";
  echo "<td style='font-weight: bold'>$i</td>";
  for ($j = 0; $j <= 10; $j++) {
    $res = $j * $var;
    echo "<td style='border: 1px solid black'> $res </td>";
  }
  echo "</tr>";
  $var++;
}
echo "</table>";
?>
</body>
</html>