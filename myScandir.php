<?php
  /*
   * 遍历指定文件夹下的所有文件
   * @param1 string $dir,需要遍历的路径
   */
  function myScandir($dir)
  {
          //取出$dir中的所有文件
         $files = scandir($dir);
         //遍历输出
         foreach ($files as $file) {
            //判断输出
             if (is_dir($dir . '/' . $file)) {    //../20150813
                 //路径:文件夹
                 echo '<font color="blue">',$file,'</font><br/>';
                 //文件夹下有子文件: . 和..除外
                 if ($file != '.' && $file != '..') {    
                    //20150813等待-->回来:20150813文件夹全部被遍历
                     //20150814等待-->回来:20150814文件夹全部被遍历
                     //...
                     //20150820等待-->等待过程中-->uploads等待
                     //递归点
                    myScandir($dir . '/' . $file);
                 }
             } else {
                 //文件
                 echo '<font color="red">',$file,'</font><br/>';
             }
         }
         //递归出口
   }
//调用

myScandir('D:\wnmp\nginx');

?>
