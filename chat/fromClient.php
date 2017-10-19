<?php
/**
 * 反向ajax原理
 * ob缓存+http长链接
 */
//实时查询是否有用户向客服发送消息
require 'sql.php';
set_time_limit(0);
ob_start();
echo str_repeat('',4096);
ob_end_flush();
ob_flush();
while(true)
{
    $selectSql = "SELECT * FROM chat_log WHERE rec = 'admin' AND sender = 'user'  AND is_new =1 ORDER BY log_id DESC  limit 1 ";
    $row = $pdo->query($selectSql);
    $res = $row->fetch(PDO::FETCH_ASSOC);

    if($res){
        $updateSql = "update chat_log set is_new = 0 WHERE log_id = :log_id";
        $updateRes = $pdo->prepare($updateSql);
        $updateRes->bindParam(':log_id',$res['log_id']);
        $updateRes->execute();
        echo "<script>parent.showMsg(".json_encode($res).");</script>";
        ob_flush();   //到apache
        flush();      //到浏览器
        sleep(1);//延缓执行1秒
    }
}
