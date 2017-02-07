<?php

    /**
     * 拆分题目答案所有组合
	 * param $answers = array ('A','B','C');
	 * return
			 array (size=7)
				  0 => string 'A' (length=1)
				  1 => string 'B' (length=1)
				  2 => string 'C' (length=1)
				  3 => string 'AB' (length=2)
				  4 => string 'AC' (length=2)
				  5 => string 'BC' (length=2)
				  6 => string 'ABC' (length=3)
     */
     function getAnswerItemAllOption($answers){
        if (empty($answers) || !is_array($answers)){
            return $answers;
        }
        
        $num = count($answers); 
    	$total = pow(2, $num);
    	$m=null;
    	//循环出所有组合
    	for ($i = 0; $i < $total; $i++) {  
    		for ($j = 0; $j < $num; $j++) { 
    			if (pow(2, $j) & $i)$m.=$answers[$j];
    		} 
    		if($m)$letter[]=$m;
    		$m=null;	
    	}
    	sort($letter);	    
    	//重构二维数组 组合位数等于k的
    	for($k=1;$k<$num+1;$k++){
    		foreach ($letter as $lkey=>$lval){	
    			if($k == strlen($lval)){
    				$new[$k][$lkey]=$lval;
    			}
    		}
    	}
    	
    	//降维
    	foreach ($new as $val){
    		foreach($val as $vval){			
    			$result[]=$vval;						
    		}				
    	}
    	
        return $result;
    }

var_dump (getAnswerItemAllOption(array ('A','B','C')));





?>