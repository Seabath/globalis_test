<?php

function main($input) {
  $res = 0;
  $param = explode("\n", $input);
  $size = (int) $param[0];
  $mountains = explode(" ", trim($param[1]));

  if (check_param($size, $mountains)) {
    return -1;
  }


  $max_height = 0;

  for ($i = 0; $i < $size; $i++) {
    if ($max_height > $mountains[$i])
      $res++;
    else
      $max_height = $mountains[$i];
  }

  return $res;
}


function check_param($size, $mountains) {
  if ($size != count($mountains)) {
    return true;
  }

  for ($i = 0; $i < $size; $i++) {
    if ($mountains[$i] < 0)
      return true;
  }

  return false;
}
?>
