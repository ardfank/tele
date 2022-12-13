<?php
// 643980945:AAHrLThQ0-TCWPbptE1dy2VEX9NlUXI3KTg
$content = file_get_contents("php://input");
$update = json_decode($content);
$mtext=$update->message->text;
$cid=$update->message->chat->id;
// file_get_contents("https://api.telegram.org/bot643980945:AAHrLThQ0-TCWPbptE1dy2VEX9NlUXI3KTg/sendMessage?chat_id=$cid&text=".urlencode($mtext)."&parse_mode=Markdown");
if (strpos(ltrim($mtext), 'http') !== false){
	include "vid.php";
}
file_put_contents("log/notif.json", "$content");
?>


