<?php
session_start();
$pw1 = $_POST['user_pw1'];
$pw2 = $_POST['user_pw2'];
$age = $_POST['age'];
$nick =$_POST['nick'];
$email=$_POST['email'];

// if ($_SESSION[ip_addr] != $_SERVER[REMOTE_ADDR]) {
//   session_destroy();
//   echo "<script>
//     location.replace('index.php');
//   </script>";
//   exit();
// }

if (!$nick) {
  // code...
  $nick=$_SESSION[nickname];
  }
  require("dbconn.php");


  $strSQL="update member set nickname='$nick', u_pass='$pw1'";

  if($age) $strSQL.=", age=$age";
  if($email) $strSQL.=", email='$email'";
  $strSQL.=" where u_id='$_SESSION[user_id]'";

  $rs =mysql_query($strSQL, $conn);

  if($rs){
    $_SESSION[nickname]=$nick;
    echo "<script>
      alert('회원 정보 변경에 성공했습니다');
      location.replace('index.php');
      </script>";
}else{

  echo "<script>
    alert('회원 정보 변경에 실패했습니다');
    history.back();
  </script>";

}
 ?>
