<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>닉네임</title>
    <link rel="stylesheet" href="style_contents.css" type="text/css">
  </head>
  <body>
    <iframe src="head.php" id="bobyFrame" width="100%" name="body" frameborder="0"></iframe>
    <div id="nick_contents" class="contents">
      <?php
      session_start();
      include_once("random.php");
      $_SESSION[token]=GE_ST(20);
        if($_COOKIE['login_access'] != "hahahahah"){
          echo "<script>
            alert('잘못된 접속 입니다');
            location.replace('index.php');
          </script>";
          exit();
        }
       ?>
      <form action="nick_change.php">
        <table cellpadding="10" style="border:0px">
          <tr>
            <th>닉네임: </th>
            <td><input type="text" name="nick" value=<?=$_SESSION[nickname]?>></td>
            <input type="hidden" name="token">
            <td><input type="submit" value="변경" class="btn_default btn_gray"></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>
