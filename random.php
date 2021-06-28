<?php
function GE_ST($length){

  $char="0123456789abcdefghiklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_";
  $st_ge="";
  $num=$length;
  while ($num--) {
  // code...
    $st_ge.=$char[mt_rand(0,strlen($char)-1)];
  }
    return $st_ge;
  }
 ?>
