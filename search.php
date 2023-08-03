<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>게시판</title>
    </head>
    <body>
        <h1>검색결과</h1>
        <table width=800 border="1">
            <tr>
                <th width=100>번호</th>
                <th>제목</th>
                <th width=150>작성자</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost","gong","0731","board");
            $select = $_GET['select'];
            $search = $_GET['search'];
            $query = "select * from data where $select like '%$search%' order by no desc";
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
        <a href="list.php">목록</a>
    </body>
</html>

