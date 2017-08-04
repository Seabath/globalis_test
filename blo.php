<?php

$blo = "";
for ($i = 0; $i < 100000; $i++) {
  $blo = "$blo " . rand(0, 100000);
}

file_put_contents("test_files/test_large", "100000\n$blo");
?>
