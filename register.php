<!doctype html>
<html>
   <head>
      <title>회원 가입</title>
      <link rel="stylesheet" href="style_contents.css" type="text/css">
      <script type="text/javascript">
        var kor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
        var ex1 = /[~!@#$%^&*()_+|<>;:,{}]/;
        function ck() {
          if(document.mform.user_id.value == "" || document.mform.user_id.value.length < 4 || document.mform.user_id.value.length > 12){
            alert("아이디를 다시 입력하세요.");
            mform.user_id.focus();
            return false;
        }
        if(kor.test(document.mform.user_id.value) || ex1.test(document.mform.user_id.value)){
          alert("영문/숫자만 입력해주세요.");
          mform.user_id.focus();
          return false;
        }
        if(document.mform.user_id.value =="admin" || document.mform.user_id.vlaue == "root" || document.mform.user_id.vlaue == "adminstraotr" || document.mform.user_id.vlaue == "master" ){
        alert("사용 할 수 없는 아이디 입니다");
        mform.user_id.focus();
        return false;
      }
      if (document.mform.name.value == "" ){
        alert("이름을 다시 입력하세요");
        mform.name.focus();
        return false;
      }
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
      <div id="register_contents"  class="contents">
      <form  name="mform" method="post" action="register_ok.php">
         <table width="550" cellpadding="3" class="grayColor">
            <tr>
            <th colspan="2" style="background-color: #323232" >
               <font style="color: white; font-size: 150%;" >회 원 등 록</font>
            </th>
            </tr>
            <tr>
               <th width="120px"><font>*ID</font></th>
               <td>
                  <input type="text" name="user_id" size="15" maxlenght="12">
                  &nbsp;&nbsp;&nbsp;<font style="color:red;">4~12(영문/숫자)</font>
               </td>
            </tr>
            <tr>
               <th><font>*이   름</font></th>
               <td><input type="text" name="name" size="15" maxlength="20"></td>
            </tr>
            <tr>
               <th><font>*비밀번호</font></th>
               <td>
                  <input type="password" name="user_pw1" size="20" maxlenght="20">
                  &nbsp;<font style="color:red;">6~20(영문/숫자/특수문자)</font>
               </td>
            </tr>

            <tr>
               <th><font>*비밀번호 확인</font></th>
               <td><input type="password" name="user_pw2" size="20" maxlenght="20"></td>
            </tr>
            <tr>
               <th><font>나이</font></th>
               <td><input type="number" name="age" size="30" min="0" max="150"></td>
            </tr>
            <tr>
               <th><font>닉네임</font></th>
               <td><input type="text" name="nick" size="30" maxlength="30"></td>
            </tr>
            <tr>
               <th><font>EMAIL</font></th>
               <td><input type="text" name="email" size="30" maxlength="30"></td>
            </tr>
         </table>
         <p>
            <font size=2>* 는 필수 입력 항목입니다.</font><br/><br/>
            <input nmae="button" type="button" value="등록" onclick="ck();" class="btn_default btn_gray" >
            <input type="reset" value="삭제" class="btn_default btn_gray" >
         </p>
      </form>
      </div>

   </body>
</html>
