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
        if($_COOKIE['login_access'] != "hahahahah"){
          echo "<script>
            alert('잘못된 접속 입니다');
            location.replace('index.php');
          </script>";

        }
        if (!$_SESSION[user_id]) {
          // code...
        }
       ?>
      <form action="nick_change.php">
        <table cellpadding="10" style="border:0px">
          <tr>
            <th>닉네임: </th>
            <td><input type="text" name="nick"></td>
            <td><input type="submit" value="변경" class="btn_default btn_gray"></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>
