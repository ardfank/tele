<?php
function hf($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}
$res = shell_exec("/usr/bin/yt-dlp -j -S '+size,+br' '$mtex'");
$re = json_decode($res);
if (isset($re->formats)){
	$is = $re->webpage_url;
	$isi = str_replace("_","\_",urlencode($is));
	file_get_contents("https://api.telegram.org/BOT/sendMessage?chat_id=$cid&text=$isi&parse_mode=Markdown");
	$i=0;$ky=[];
	foreach($re->formats as $fo){
		$ext = $fo->ext;
		$rs=$fo->resolution;
		$ac=$fo->acodec;
		if((strpos($ext,'html')) === false && (strpos($rs,'audio')) === false && $ac !== "none"){
			$nm=(isset($fo->format_note))?$fo->format_note:$fo->format;
			$fs=(isset($fo->filesize))?(int)$fo->filesize:$fo->filesize_approx;
			$ur=urlencode($fo->url);
			$ky['inline_keyboard'][]=[['text'=>"$nm $ext (".hf($fs)." ; ".$rs.")",'url'=>"$ur"]];
			if($i % 6 === 5){
				$isi = urlencode("~ ");
				$rm = json_encode($ky);
				file_get_contents("https://api.telegram.org/BOT/sendMessage?chat_id=$cid&text=$isi&parse_mode=Markdown&reply_markup=$rm");
				$ky=[];$isi='';$rm="";
			}
			$i++;
		}
	}
		$isi = urlencode("~ ");
		$rm = json_encode($ky);
		file_get_contents("https://api.telegram.org/BOT/sendMessage?chat_id=$cid&text=$isi&parse_mode=Markdown&reply_markup=$rm");
		echo $res;
}else{$isi = "Salah format";}
?>
