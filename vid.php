<?php
function hf($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}
$res = shell_exec("/usr/bin/yt-dlp -j -S '+size,+br' '$mtext'");
$re = json_decode($res);
if (isset($re->formats)){
	$is = $re->webpage_url;
	$isi = urlencode("$is\n");
	file_get_contents("https://api.telegram.org/bot643980945:AAHrLThQ0-TCWPbptE1dy2VEX9NlUXI3KTg/sendMessage?chat_id=$cid&text=$isi&parse_mode=Markdown");
	$i=0;
	foreach($re->formats as $fo){
		$ky['inline_keyboard']=[];
		$ext = $fo->ext;
		$rs=$fo->resolution;
		if($i<50 && (strpos($ext,'html')) === false && (strpos($rs,'audio')) === false){
			$nm=(isset($fo->format_note))?$fo->format_note:$fo->format;
			$fs=(isset($fo->filesize))?(int)$fo->filesize:0;
			$ur=urlencode($fo->url);
			$ky['inline_keyboard'][]=[['text'=>"Download",'url'=>"$ur"]];
			$rm = json_encode($ky);
			$isi = urlencode("$nm $ext (".hf($fs)." ; ".$rs.")");
			file_get_contents("https://api.telegram.org/bot643980945:AAHrLThQ0-TCWPbptE1dy2VEX9NlUXI3KTg/sendMessage?chat_id=$cid&text=$isi&parse_mode=Markdown&reply_markup=$rm");
			$i++;
		}
	}
}else{$isi = "Salah format";}
?>