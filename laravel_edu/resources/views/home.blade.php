<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- GET 방식 -->
    <h1>HOME !!!!</h1>

    <br>
    <br>

    <!-- POST 방식 -->
    <form action="/home" method="post">
        @csrf <!-- form 안에 상단 위치 (공격 방어) -->
        <button type="submit">POST</button>
    </form>

    <!-- PUT 방식 -->
    <form action="/home" method="post">
        @csrf
        <!-- form method = "post", 내부 @method('put') 정의 -->
        @method('PUT') 
        <button type="submit">PUT</button>
    </form>

    <!-- DELETE 방식 -->
    <form action="/home" method="post">
        @csrf
        <!-- form method = "post", 내부 @method('put') 정의 -->
        @method('DELETE') 
        <button type="submit">DELETE</button>
    </form>
</body>
</html>