<?php
$file_name=$_GET["filename"];
#$file_name=str_replace("../"," ",$file_name);
$file_name=str_replace("/"," ",$file_name);

require("../dbconn.php");
$strSQL="select filename from board where filename='$file_name'";
$rs=mysql_query($strSQL, $conn);
$rs_arr=mysql_fetch_array($rs);

if ($rs_arr[filename] != $file_name) {
  echo "<script>
    alert('요청하신 파일을 다운 받을 수 없습니다');
    history.back();
  </script>";
  exit();
}



$file_path="./upload/".$file_name;
$file_size= filesize($file_path);




   header("Content-Type: application/x-octetstream");
   header("Content-Disposition: attachment; filename=".$file_name); //다운로드 되는 파일의 이름을 지정
   header("Content-Transfer-Encoding: binary");
   header("Content-Length: $file_size"); //파일 사이즈 명
   readfile($file_path); //파일 읽어서 출력하기

 ?>
