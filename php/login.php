<!DOCTYPE html>
<html>

<?php

$db = new SQLite3("../sql/test.db");
$result = $db->query('SELECT * FROM Trusted_Staff');
$result->fetchArray()['Password'];
echo "You have reached the login step!";
echo "Username :".$_POST['username'];
echo "Password :".$_POST['password'];

$hash = $result->fetchArray()['Password'];
echo $hash;

if(password_verify($_POST['password'],$hash))
{
    echo "\nCorrect Password, ".$result->fetchArray()['user_name'];
}
else
{
    echo "\nIncorrect Password";
}

?>
</html>