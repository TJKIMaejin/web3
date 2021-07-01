<!doctype html>
<html>
   <head>
      <title>게시판</title>
      <link rel="stylesheet" href="../style_contents.css" type="text/css">
      <script>
      function ck() {
        if (document.dform.b_pass.value=="") {
          alert('패스워드를 입력하세요');
          dform.b_pass.focus();
          return false;
        }
        document.dform.submit();
      }

      </script>
   </head>
   <body>
      <iframe src="../head.php" id="bodyFrame" name="body" width="100%" frameborder="0"></iframe>
      <div id="board_contents" class="contents">
        <?php
        session_start();

        require("../dbconn.php");

        $a_num=trim($_GET["num"]);

        if (eregi("|/|\(|\)|\t|\|&|union|select|from|0x", $a_num)) {
          exit("no hack !!");
        }
        if (preg_match("/SELECT|insert|delete|update|drop/i",$a_num)) {
          // code...
          exit("no hack !!");
        }
        if (preg_match("/union|from|limit|information_schema|NULL/i",$a_num)) {
          // code...
          exit("no hack !!");
        }  // 문자열 필터링 함수 특정 문자열 검색 함수 사용하여 치환

        $strSQL="update board set viewCount=viewCOunt+1 where strNumber=".$a_num.";";
        mysql_query($strSQL,$conn);

        $strSQL="select * from board where strNumber=".$a_num.";";
        $rs=mysql_query($strSQL,$conn);
        $rs_arr=mysql_fetch_array($rs);

        $b_num=$rs_arr["strNumber"];
        $b_name=$rs_arr["strName"];
        $b_email=$rs_arr["strEmail"];
        $b_sub=$rs_arr["strSubject"];
        $b_cont=$rs_arr["strContent"];
        $b_no=$rs_arr["viewCount"];
        $b_date=$rs_arr["writeDate"];
        $b_fname=$rs_arr["filename"];
        $b_fsize=$rs_arr["filesize"];
        $b_date=$rs_arr["writeDate"];

        if ($a_num != $b_num) {
          // code...
          exit("hack hack");
        }

         ?>
      <table width="600" border="1" cellpadding="2" class="grayColor">
         <tr>
            <th colspan="5" style="background-color: #323232" >
               <font style="color: white; font-size: 150%;" >내용 보기</font>
            </th>
         </tr>
         <tr>
            <th width="15%"><font>이름</font></th>
            <td width="35%"><font><?=$b_name;?></font></td>
            <th width="15%"><font>등록일</font></th>
            <td width="35%"><font><?=$b_date;?></font></td>
         </tr>
         <tr>
            <th width="15%"><font>이메일</font></th>
            <td width="35%"><font><?=$b_email;?></font></td>
            <th width="15%"><font>조회</font></th>
            <td width="35%"><font><?=$b_no;?></font></td>
         </tr>
         <tr>
            <th width="15%"><font>제목</font></th>
            <td colspan="3"><font><?=$b_sub;?></font></td>
         </tr>
         <tr>
            <th width="15%"><font>내용</font></th>
            <td colspan="4" style="padding:15px 0;"><font><?=$b_cont;?></font></td>
         </tr>
         <tr>
            <th width="15%"><font><b>첨부 파일</b></font></th>
            <td colspan="3">
              <?php if ($b_fname != "") { ?>
                <a href="board_file_download.php?filename=<?=$b_fname;?>"><?=$b_fname;?>&nbsp;&nbsp;(<?=$b_fsize;?>byte)</a>
              <?php } ?>

          </font></td>
         </tr>
      </table>
      <br/>
      <p align="center">
         <form name="dform" method="post" action="board_delete_ok.php?num=<?=$a_num;?>">
            <font>비밀번호</font>
            <input type="password" name="b_pass" size="20">
            <input type="button" value="삭제" class="btn_default btn_gray" onclick="ck();" >
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="목록" class="btn_default btn_gray" onclick="history.back();">
      </p>
      </div>
   </body>
</html>
