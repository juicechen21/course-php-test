<?php
function demo($a) {
	
	return $a<=1?$a:$a*demo($a-1);
	/*
  if ($a > 1) {
    $r = $a * demo($a - 1);
  } else {
    $r = $a;
  }
  return $r;
  */
}
$a = 10;
echo $a . "的阶乘的值" . demo($a);




















?>