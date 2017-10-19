<?php
require 'sql.php';
$msg = htmlspecialchars($_POST["msg"],ENT_QUOTES) ;
if(!empty($msg))
{
    $sql = "INSERT INTO chat_log (`rec`,`sender`,`content`)VALUES(:param1,:param2,:param3)";
    $insert=$pdo->prepare($sql);
    $param1 = 'admin';
    $param2 = 'user';
    $insert->bindParam(':param1',$param1);
    $insert->bindParam(':param2',$param2);
    $insert->bindParam(':param3', $msg);
    $insert->execute();
    return json_encode($msg);


}