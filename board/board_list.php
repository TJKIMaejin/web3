<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
    <link rel="stylesheet" href="../style_contents.css" type="text/css">

  </head>
  <body>
    <iframe src="../head.php" id="bodyFrame" name="body" width="100%" frameborder="0"></iframe>
    <div class="board_contents" class ="contents">
      <table width="700" border="1">
        <tr>
          <th colspan="5" style="background-color:#323232"><font style="color:white; font-size:150%">게시판</font></th>
        </tr>
        <tr bgcolor='#c8c8c8'>
          <th width="10%">번호</th>
          <th width="40%">제목</th>
          <th width="15%">작성자</th>
          <th width="25%">등록일</th>
          <th width="10%">조회수</th>
        </tr>

          <?php
          session_start();

          require("../dbconn.php");


          $strSQL="select * from board order by strNumber desc";
          $rs=mysql_query($strSQL, $conn);

          $strSQL="";
          if($_GET[keyword])
          {
            $keyword = $_GET["keyword"];
            $key = $_GET["key"];

            switch ($key) {

            case '1':
                $strSQL="select * from board where strSubject like '%$keyword%' order by strNumber desc";
                break;
            case '2':
                $strSQL="select * from board where strContent like '%$keyword%' order by strNumber desc";
                break;
            case '3':
                $strSQL="select * from board where strName like '%$keyword%' order by strNumber desc";
                break;
           default:
              $strSQL="select * from board order by strNumber desc";
            }
          }
          else{
              $strSQL="select * from board order by strNumber desc";
          }

          $rs = mysql_query($strSQL,$conn);
          $rs_num=mysql_num_rows($rs);
          if ($rs_num == 0 ) : ?> {

            <tr>
              <td colspan="5" class="center"> 등록된 글이 없습니다</td>
            </tr>
          } <?php else :
          while ($rs_arr = mysql_fetch_array($rs)){
            $b_num=$rs_arr["strNumber"];
            $b_sub=$rs_arr["strSubject"];
            $b_name=$rs_arr["strName"];
            $b_date=$rs_arr["writeDate"];
            $b_no=$rs_arr["viewCount"];
          ?>
         <tr>
         <td><a href="board_view.php?num=<?=$b_num;?>"><?=$b_num;?></td>
         <td><?=$b_sub;?></td>
         <td><?=$b_name;?></td>
         <td><a href="board_view.php?num=<?=$b_date;?>"><?=$b_date;?></td>
         <td><?=$b_no;?></td>
        </tr>
        <?php
        }
      endif;
         ?>
      </table>
      <br>
      <p  align ="center">
        <input type="button" value="글쓰기" class="btn_default btn_gray" onclick="location.replace('board_write.php');">
        <br>
        <br>
        <?php
          if ($keyword) {
            echo "<font size=2>[$keyword] 검색 결과입니다.</font>";
          }else {
            echo "<font size=2>전체 글 검색 결과입니다.</font>";
          }

         ?>

        <form action="board_list.php" align ="center" >
          <select name="key">
            <option value="1">글제목</option>
            <option value="2">글내용</option>
            <option value="3">작성자</option>
          </select>
          <input type="text" name="keyword" align ="center">
          <input type="submit" value="검색" class="btn_default btn_gray" align ="center">
        </form>

      </p>


    </div>

  </body>
</html>
