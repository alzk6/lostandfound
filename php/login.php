<!DOCTYPE html>
<html>
<head>
<tile>Lost And Found</title>
<meta charset="UTF-8">
</head>
<body>
<form action="login.php" method="post">
Username:<input type="text" name="username"/><br />
Password:<input type="password" name="password"/><br />
</form>
<?php
    echo $_POST['username'];
    echo $_REQUEST['password'];
?>
</body>
</html>