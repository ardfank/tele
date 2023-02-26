<?php
$dt=date("d.m.Y H.i.s");
$act = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$content = file_get_contents("php://input");
file_put_contents("log/falcon.json", "[$dt] $act\n$content\n\n",FILE_APPEND);
?>


