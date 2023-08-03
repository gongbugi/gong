<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>singup_page</title>
</head>
<body>
    <form action="signup_server.php" method="post">
    <h1>회원가입</h1>
    아이디 <input type = "text" name="id" required="required" placeholder="아이디 입력"><br>
    비밀번호 <input type = "password" name="pw" required="required" placeholder="비밀번호 입력"><br>
    닉네임 <input type = "text" name="nick" required="required" placeholder="닉네임 입력"><br><br>
    <button type="submit">가입</button>
    <a href="index.php"><input type="button" value="뒤로가기"></a>
    </form>
</body>
</body>
</html>
