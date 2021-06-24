<?php
session_start();

$b_name=$_POST["name"];
$b_pw=$_POST["pw"];
$b_email=$_POST["email"];
$b_sub=$_POST["sub"];
$b_cont=$_POST["cont"];
$b_tag=$_POST["tag"];


if ($b_tag =="F") {
  // code...
  $b_cont = htmlspecialchars($b_cont);
}

$str2 = $b_cont;
$num =0;
while ($num == 0) {
  // code...
  $b_cont =preg_replace("/<script*>/i","",$b_cont);
  if ($b_cont != $str2) {
    // code...
    $str2 = $b_cont;

  }else {

    $num = 1;
  }
}

//데이터 처리 (파일)
$f_error=$_FILES["att_file"]["error"];

if ($f_error == 0) {
  // code...
  $f_name=$_FILES["att_file"]["name"];
  $f_size=$_FILES["att_file"]["size"];
  $f_tmp=$_FILES["att_file"]["tmp_name"];

  $f_path="upload/".$f_name;

  $f_name_only=substr($f_name,0,strrpos($f_name,'.'));
  $f_name_ext=substr($f_name,strrpos($f_name,'.'));
  $f_name_only1=$f_name_only;

  for ($i=1; is_file($f_path); $i++) {
    $f_name_only=$f_name_only1."(".$i.")";
    $f_path="./upload/".$f_name_only.$f_name_ext;
    // code...
  }
  $f_rename = $f_name_only.$f_name_ext;

}elseif ($f_error!=4) {
  // code...
  echo "<script>alert('파일 업로드 실패($f_error)')
  history.back();
    </script>";
    exit();
}
require("../dbconn.php");

$strSQL="insert into board set strName='$b_name', strPassword='$b_pw', strEmail ='$b_email'";
$strSQL.=", strSubject='$b_sub', strContent='$b_cont', htmlTag='$b_tag', writeDate=now()";

if ($f_error == 0) {
  // code...
  $strSQL.=", filename='$f_rename', filesize='$f_size'";
  $f_rs=move_uploaded_file($f_tmp, $f_path);
}

$rs=mysql_query($strSQL, $conn);
if($rs){
  echo "<script>
    alert('글이 성공적으로 등록 되었습니다');
    location.replace('../index.php');
  </script>";
}else{
  echo "<script>
    alert('글 등록이 실패하였습니다');
    history.back();
  </script>";

}

 ?>
