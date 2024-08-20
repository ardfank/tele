<?php
$fname = 'ext/ext.xpi';
header('Content-type: application/x-xpinstall');
header("Content-Disposition: inline; filename='$fname'");
header("Content-Transfer-Encoding: binary");
readfile($fname);  
?>
<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VOW Preview</title>
</head>
<body>
<div id="example-option-1" class="install-ok">
  <a href="ext/ext.xpi">
    Install my add-on
  </a>
</div>
</body>
</html>