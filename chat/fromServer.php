<?php
require 'sql.php';
set_time_limit(0);
//while (true) {
    $selectSql = "SELECT * FROM chat_log WHERE rec = 'user' AND sender = 'admin'  AND is_new =1 ORDER BY log_id DESC  limit 1 ";
    $row = $pdo->query($selectSql);
    $res = $row->fetch(PDO::FETCH_ASSOC);
    if($res){
        $updateSql = "update chat_log set is_new = 0 WHERE log_id = :log_id ";
        $updateRes = $pdo->prepare($updateSql);
        $updateRes->bindParam(':log_id',$res['log_id']);
        $updateRes->execute();
        //echo ("<script>parent.showMsg(".json_encode($res).");</script>");
        echo json_encode($res);
        ob_flush();   //到apache
        flush();      //到浏览器
        sleep(1);//延缓执行1秒
    }else{
		$res['content'] = '';
		echo json_encode($res);
	}
//}