<?php
    if(isset($_GET)){
        echo htmlentities($_GET['name']).'<br>';
        echo $_GET['email'];
    }
    if(isset($_POST)){
        echo htmlentities($_POST['name']).'<br>';
        echo $_POST['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
</head>
<body>
    <form method="POST" action="get_post.php">
        <div>
            <label for="">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <input type="submit" value="submit">
    </form>
</body>
</html>