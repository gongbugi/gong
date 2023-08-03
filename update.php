<!DOCTYPE html>
<?php
  session_start();
  $nick = $_SESSION['nick'];
  $id = $_SESSION['id'];
  $con = mysqli_connect("localhost","gong","0731","board");
  $no = $_GET['no'];
  $query = "select * from data where no='$no'";
  $result = mysqli_query($con, $query);
  $data = mysqli_fetch_array($result);
?>
<?php
    if($id != $data['id']) {
        echo "<script>
        alert('작성자 본인만 수정 가능합니다.');
        location.replace('content.php?no=$no');
        </script>";
        }
?>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>게시판</title>
    </head>
    <body>
        <form action="s_update.php" method="post">
        <input type="hidden" name="no" value="<?=$no?>">
        <table width=800 border="1" cellpadding=5>
            <tr>
                <th>닉네임</th>
                <th><?=$nick?></th>
            </tr>
            <tr>
                <th>제목</th>
                <th><input type="text" name="title" style="width:98%;" value = <?=$data['title']?>></th>
            </tr>
            <tr>
                <th>내용</th>
                <th><textarea name="content" style="width:100%; height:300px;"><?=nl2br($data['content'])?></textarea></th>
            </tr>
            <tr>
                <td colspan="2"><input type="file" name="u_file"></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" value="작성"></th>
            </tr>
        </table>
        </form>
        <a href="list.php">뒤로가기</a>
    </body>
</html>
