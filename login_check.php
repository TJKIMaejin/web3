<?php

    session_start();

    $id=$_POST["user_id"];
    $pw=$_POST["user_pw"];

    if($id=="" && $pw=="") {
      echo "<script>
        alert('아이디와 패스워드를 모두 입력해주세요.');
        history.back();
      </script>";
      exit();
    }
    if ($id == "admin") {
      if ($_SERVER[REMOTE_ADDR] != "192.168.50.1") {
        echo "<script>
          alert('해당 로그인이 실패했습니다.');
          history.back();
        </script>";
        exit();
      }
    }

    $id = addslashes($id);

    require("dbconn.php");

    $strSQL="select * from member where u_id='".$id."' and u_pass='".$pw."';";
    $rs=mysql_query($strSQL,$conn);
    $rs_arr=mysql_fetch_array($rs);
  # if (($rs_arr[u_id] == $id) && ($rs_arr[u_pass] ==$pw)) {
    if ($rs_arr) {
      // code...
      $_SESSION[user_id] = $rs_arr[u_id];
      $_SESSION[nickname] = $rs_arr[nickname];
      $_SESSION[ip_addr] = $rs_arr[REMOTE_ADDR];

      setcookie("login_access", "hahahah" ,time()+3600, "/",false ,true);
      echo "<script>
      alert('로그인 되었습니다');
      location.replace('index.php');
      </script>";
      // code...
    }else {
      echo "<script>
      alert('로그인 실패했습니다');
      history.back();
      </script>";
    }

?>
