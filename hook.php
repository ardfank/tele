<?php
$content = file_get_contents("php://input");
$update = json_decode($content);
$mtext=$update->message->text;
$cid=$update->message->chat->id;
if (strpos(ltrim($mtext), 'http') !== false){
	$sp=strpos($mtext,"http");
	$mtext=substr($mtext,$sp);
	include "vid.php";
}
?>


