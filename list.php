<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>게시판</title>
    </head>
    <body>
    <?php
            if(!isset($_SESSION['id'])) {
                echo "<script>
                alert('로그인이 필요한 페이지입니다.');
                location.replace('home.php');
                </script>";
            }
    ?>
        <table width=800 border="1">
            <tr>
                <th width=100>번호</th>
                <th>제목</th>
                <th width=150>작성자</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost","gong","0731","board");
            $query = "select * from data order by no desc";
            $result = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td align="center"><?=$data['no'];?></td>
                    <td><a href="content.php?no=<?=$data['no'];?>"><?=$data['title'];?></a></td>
                    <td align="center"><?=$data['nick'];?></td>
                </tr>
            <?php } ?>
        </table>
        <form action="search.php" method="get">
        <div>
            <select name="select">
                <option value="title">제목</option>
                <option value="content">내용</option>
                <option value="name">작성자</option>
            </select>
            <input type="text" name="search" required="required"> <button>검색</button>
        </div>
        </form>
        <a href="home.php">홈</a>
        <a href="write.php">글쓰기</a>
    </body>
</html>

