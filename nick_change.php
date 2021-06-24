<?php
  session_start();
  $nick=$_GET["nick"];

if (!$nick) {
  // code...
  echo "<script>
  alert('닉네입을 입력하세요.');
  history.back();
  </script>";
}

  if ($_SESSION[ip_addr] != $_SERVER[REMOTE_ADDR]) {
    session_destroy();
    echo "<script>
      location.replace('index.php');
    </script>";
    exit();
  }

  require("dbconn.php");

  $strSQL="update member set nickname='$nick' where u_id='$_SESSION[user_id]'";
  $rs=mysql_query($strSQL, $conn);
  if($rs) {
    $_SESSION[nickname]=$nick;
    echo "<script>
      alert('닉네임 변경이 성공하였습니다.');
      location.replace('index.php');
    </script>";
  } else {
    echo "<script>
      alert('닉네임 변경이 실패하였습니다.');
      history.back();
    </script>";

  }


 ?>
