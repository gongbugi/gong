<?php
$con = mysqli_connect("localhost","gong","0731","board");
$no = $_GET['no'];
$query = "select * from data where no='$no'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>게시판</title>
    </head>
    <body>
        <form action="s_write.php" method="post">
        <table width=800 border="1" cellpadding=5>
            <tr>
                <th width=100>작성자</th>
                <td><?=$data['nick']?></td>
            </tr>
            <tr>
                <th>제목</th>
                <td><?=$data['title']?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td><?=nl2br($data['content'])?></td>
            </tr>
            <tr>
                <td colspan="2"><a href="upload/<?php echo $data['file'];?>" download><?php echo $data['file']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="float:right;">
                        <a href="update.php?no=<?=$no?>">수정</a>
                        <a href="del.php?no=<?=$no?>" onclick="return confirm('삭제하시겠습니까?')">삭제</a>
                    </div>
                    <a href="list.php">목록</a>
                </td>
            </tr>
        </table>

        </form>
        <form action="reply.php" method="post">
        <input type="hidden" name="b_no" value="<?=$no?>">
        <div>
            <br><input type="text" name='comment' placeholder="내용을 입력하세요" style="width:695px; height:80px;" required="required">
            <button style="padding: 30px 30px 30px 30px;">등록</button>
        </div>
        </form>

        <br><table width=800 border="1">
            <tr>
                <th width=100>작성자</th>
                <th>내용</th>
            </tr>
            <?php
            $con = mysqli_connect('localhost','gong','0731','board');
            $query = "select * from reply where b_no=$no";
            $result = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td align="center"><?=$data['nick'];?></td>
                    <td><?=$data['comment'];?></td>
                    <td width=35 align="center"><a href="update_reply.php?reply_no=<?=$data['reply_no']?>&b_no=<?=$no?>">수정</a></td>
                    <td width=35 align="center"><a href="del_reply.php?reply_no=<?=$data['reply_no']?>&b_no=<?=$no?>">삭제</a></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>

