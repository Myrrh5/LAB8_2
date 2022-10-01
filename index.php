<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>
    <form action="" method="get">
        ชื่อที่ต้องการค้นหา: <input type="text" name="keyword"><br><br>
        <input type="submit" value='submit'><br><br>
    </form>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
        if(!empty($_GET)){
            $value = '%'.$_GET["keyword"].'%';
        }
        $stmt->bindParam(1,$value);
        $stmt->execute();
    ?>
    <?php 
        while ($row = $stmt->fetch()) {
    ?>
            ชื่อสมาชิก: <?=$row["name"]?><br>
            ที่อยู่: <?=$row["address"]?><br>
            อีเมล์: <?=$row["email"]?><br>
            <img src='img/<?=$row["username"]?>.jpg'width='100'><hr>
    <?php } ?>
</body>
</html>