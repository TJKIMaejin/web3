<?php
$file_name=$_GET["filename"];
$file_path="./upload/"$file_name;
$file_size= filesize($file_path);




   header("Content-Type: application/x-octetstream");
   header("Content-Disposition: attachment; filename=".$filename); //다운로드 되는 파일의 이름을 지정
   header("Content-Transfer-Encoding: binary");
   header("Content-Length: $filesize"); //파일 사이즈 명


   readfile($filepath); //파일 읽어서 출력하기

 ?>
