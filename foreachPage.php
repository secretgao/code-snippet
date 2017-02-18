<?php

		/*   
		* 
		*   用foreach 进行分页
		*   
		*/
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 3;
		$arr = [0,1,2,3,4,5,6,7,8,9];
		$total = count ($arr);

		//如果每页显示的数据 大于总的数据条数 就不用在循环控制分页了,直接把所有数据全部显示，否则 用循环控制分页
        if ($pageNum < $total) {
            
            foreach ($arr as $key=>$val)
            {
                if ( (($page-1)*$pageNum) <= $key && $key <= ($pageNum*$page-1) ) {
                    $result[] = $val;
                }
            }
        }


			
		var_dump($result);









?>