<?php

    $stime = microtime(true); #获取程序开始执行的时间

    #你写的php代码

    $etime = microtime(true); #获取程序执行结束的时间
    $total = $etime - $stime;   #计算差值
   
    echo $total;




?>
