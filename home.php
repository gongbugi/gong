<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>home</title>
</head>
<body>
        <table width=800 border="1">
            <tr>
                <th width=100><a href="home.php">홈</a></th>
                <th width=100><a href="list.php">게시판</a></th>
            </tr>
        </table>
        <?php
            if(!isset($_SESSION['id'])) {
                ?>
                <form action="login_server.php" method="post">
                <h1>로그인</h1>
                아이디 <input type = "text" name="id" required="required" placeholder="아이디 입력"><br>
                비밀번호 <input type = "password" name="pw" required="required" placeholder="비밀번호 입력"><br><br>
                <button type="submit">로그인</button>
                <a href="signup.php"><input type="button" value="회원가입"></a>
                </form>
                <?php
            } else {
                $nick = $_SESSION['nick'];
                echo "$nick 님 환영합니다.<br>";
                echo "<a href=\"logout.php\">로그아웃</a>";
            }
        ?>
</body>
</body>
</html>

