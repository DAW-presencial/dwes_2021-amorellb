<?php
include_once "Estado.php";
include_once "Communicate.php";

$communicate = new Communicate();
echo $communicate->decirHolaQueTal() . "<br>";
echo $communicate->preguntarEstado() . "<br>";
echo $communicate->decirBien();