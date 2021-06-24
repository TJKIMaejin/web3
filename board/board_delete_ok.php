<?php
session_start();

$num=$_GET["num"];
$pass=$_POST["b_pass"];

require("../dbconn.php");


$strSQL="select * from board where strNumber=$num and strPassword ='$pass'";
$rs=mysql_query($strSQL, $conn);
$rs_arr =mysql_fetch_array($rs);
if ($rs_arr) {
  $strSQL="delete from board where strNumber=$num";
  $rs=mysql_query($strSQL, $conn);
  if ($rs) {
    echo "<script>
      alert('게시물이 삭제되었습니다');
      location.replace('board_list.php');
    </script>";
  }
  else{
    echo "<script>
      alert('게시물을 삭제 할  수 없습니다 ');
      history.back();
    </script>";
  }

}else {
  echo "<script>
    alert('패스워드를 다시 입력하세요');
    history.back();
  </script>";
}
 ?>
