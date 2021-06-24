<?php
session_start();
$id=$_POST["user_id"];
$name=$_POST["name"];
$pw1=$_POST["user_pw1"];
$pw2=$_POST["user_pw2"];
$age=$_POST["age"];
$nick=$_POST["nick"];
$email=$_POST["email"];
if ($nick) {
  // code...
$nick=$name;
}

if($id =="admin" || $id == "root" || $id == "adminstraotr" || $id == "master" ) {
  // code...
  echo "<script>alert('사용할수 없는 계정입니다 ')
  history.back();
  </script>";
}
if ($id==""|| strlen($id)<4 || strlen($id)>12) {
  // code...\
  echo "<script>alert('아이디를 다시 입력하십쇼 ')
  history.back();
  </script>";
}
if ($name == "" ){
  echo "<script>alert('이름을 다시 입력하세요');
  history.back();
  </script>";

}
if ($pw1 != $pw2 ){
  echo "<script>alert('비밀번호를 불일치합니다');
  history.back();
  </script>";
}

require("dbconn.php");
$strSQL="select u_id from member where u_id = '".id."';";
$rs=mysql_query($strSQL, $conn);
$rs_arr=mysql_fetch_array($rs);



if ($rs) {
  $strSQL="insert into member values ('', '$id', '$pw1', '$name', '$nick','$age', '$email', now())";
  $rs=mysql_query($strSQL,$conn);
  echo "<script>
    alert('회원 가입을 축하드립니다.');
   location.replace('index.php');
  </script>";
  // echo "<script>
  //   alert('중복된 아이디입니다');
  //  history.back();
  // </script>";
}else {
  $strSQL="insert into member values ('', '$id', '$pw1', '$name', '$nick','$age', '$email', now())";
  $rs=mysql_query($strSQL,$conn);
  echo "<script>
    alert('회원 가입을 축하드립니다.');
   location.replace('index.php');
  </script>";
}

?>
