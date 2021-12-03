<?php
include_once "Comunicacion.php";

$comunicacion = new Comunicacion();
echo $comunicacion->decirHola() . ", que tal. " . $comunicacion->decirAdios();