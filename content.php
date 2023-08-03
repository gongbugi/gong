<!DOCTYPE html>
<?php
  session_start();
  $nick = $_SESSION['nick'];
?>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>게시판</title>
    </head>
    <body>
        <form action="s_write.php" method="post" enctype="multipart/form-data">
        <table width=800 border="1" cellpadding=5>
            <tr>
                <th>닉네임</th>
                <th><?=$nick?></th>
            </tr>
            <tr>
                <th>제목</th>
                <th><input type="text" name="title" required="required" style="width:98%;"></th>
            </tr>
            <tr>
                <th>내용</th>
                <th><textarea name="content" required="required" style="width:99%; height:300px; resize: none;"></textarea></th>
            </tr>
            <tr>
                <td colspan="2" ><input type="file" name="u_file"></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" value="작성"></th>
            </tr>
        </table>
        </form>
        <a href="list.php">뒤로가기</a>
    </body>
</html>

