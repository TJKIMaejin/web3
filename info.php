<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원 정보</title>
    <link rel="stylesheet" href="style_contents.css" type="text/css">
    <script type="text/javascript">
    var kor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
    var ex1 = /[~!@#$%^&*()_+|<>;:,{}]/;
    function ck(){
      if (document.mform.user_pw1.value == "" || document.mform.user_pw1.value.length < 6 || document.mform.user_pw1.value.length > 20 || kor.test(document.mform.user_pw1.value)){
        alert("비밀번호를 다시 입력하세요");
        mform.user_pw1.focus();
        return false;
      }
      if (document.mform.user_pw1.value != document.mform.user_pw2.value ){
        alert("패스워드가 불일치");
        mform.user_pw2.focus();
        return false;
      }
      document.mform.submit();
    }

    </script>
  </head>
  <body>
	<iframe src="head.php" id="bodyFrame" name="body" width="100%" frameborder="0"></iframe>
  <div class="contents" id="info_contents">

    <?php
    session_start();
    require("dbconn.php");

    $strSQL="select * from member where u_id='$_SESSION[user_id]'";
    $rs=mysql_query($strSQL,$conn);
    $rs_arr=mysql_fetch_array($rs);

    // if($_GET[ch]==1){
    //   echo "<h4>성공적으로 변경</h4>";
    // }
    // elseif($_GET[ch]==2){
    //   echo "<h4>변경 실패</h4>";
    // }
    ?>
    <form name="mform" action="info_change.php" method="post">
      <table width="500" cellpadding="3" class="graycolor">
        <tr>
          <th colspan="2" style="background-color:#323232"><font style="color:white; font-size:150%;">
            회원 정보</th>
        </tr>
        <tr>
          <th width="125px">ID</th>
          <td><?=$rs_arr[u_id]?></td>
        </tr>
        <tr>
          <th>*이름</th>
          <td><?=$rs_arr[u_name]?></td>
        </tr>
        <tr>

            <th>*비밀번호</th>
            <td><input type="password" name="user_pw1" size="20" maxlength="20">
            <font style="color:red">6~20(영문/숫자/특수문자)</font>
            </td>

        </tr>
        <tr>
            <th>*비밀번호 확인</th>
            <td><input type="password" name="user_pw2" size="20" maxlength="20"></td>
        </tr>
        <tr>
            <th>나이</th>
            <td><input type="number" name="age" size="20" min="0" max="150" value=<?=$rs_arr[age]?>></td>
        </tr>
        <tr>
            <th>닉네임</th>
            <td><input type="text" name="nick" size="20"maxlength="30" value=<?=$rs_arr[nickname]?>></td>
        </tr>
        <tr>
            <th>이메일</th>
            <td><input type="text" name="email" size="20" maxlength="30" value=<?=$rs_arr[email]?>></td>
        </tr>
      </table>
      <p>
        <font size=2> * 는 필수 입력 항목입니다</font></br></br>
        <input type="button"  value="수정" onclick="ck()" class="btn_default btn_gray">
        <input type="reset"  value="삭제" class="btn_default btn_gray">
      </p>
    </form>
  </div>
  </body>
</html>
