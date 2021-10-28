<?php
function mi_autocargador($Coche) {
  include $Coche. '.php';
}

spl_autoload_register('mi_autocargador');

$coche1 = new Coche('rojo', '2000', 'v6', 'mondeo', 'ford');
$coche1->showParams();