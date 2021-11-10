<?php
// session_start();

var_dump($_COOKIE);

if (isset($_COOKIE['niceCookie'])) {
  setcookie('niceCookie', ++$_COOKIE['niceCookie']);
  echo "Has visitado esta página " . $_COOKIE['niceCookie'] . " veces";
} else {
  setcookie('niceCookie', 1, time() + 1200);
  echo "Has visitado esta página 1 vez";
}

//$_COOKIE['goodCookie'] = isset($_COOKIE['goodCookie']) ? ++$_COOKIE['niceCookie'] : 1;
//echo "Has visitado esta página " . $_COOKIE['goodCookie'] . " veces";

//if (isset($_GET['delete'])) {
//  if (isset ($_COOKIE[session_name()])) {
//    setcookie(session_name(), "", time() - 3600, "/");
//    unset($_COOKIE[session_name()]);
//  }
//  session_unset(); // o bien $_SESSION = array();
//  session_destroy();
//} 