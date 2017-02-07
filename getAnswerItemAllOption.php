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
    function getAnswerItemAllOption($answers)
	{
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
    		if ($m) $letter[]=$m;
    		$m = null;	
    	}
    	sort($letter);	    
    	//重构二维数组 组合位数等于k的
    	for($k=1;$k<$num+1;$k++) {
    		foreach ($letter as $lkey=>$lval) {	
    			if ($k == strlen($lval)) {
    				$new[$k][$lkey]=$lval;
    			}
    		}
    	}
    	
    	//降维
    	foreach ($new as $val){
    		foreach($val as $vval){			
    			$result[] = $vval;						
    		}				
    	}
    	
        return $result;
    }

var_dump (getAnswerItemAllOption(array ('A','B','C')));

	
	
	/*
	*  跟上边的方法实现的效果相同
	*/
	
	$old_array = $new_array[] = $ab_array = ['A','B','C'];
	
	function makeAb($old_array,$new_array,&$ab_array,$num=1)
	{
		$flip = array_flip($old_array);
		$old_num = count($old_array);
		foreach ($old_array as $key => $value ) {
			foreach ($new_array[$num-1] as $value_n) {
				if ($key < $flip[$value_n[0]] ) {
					$ab_array[] = $new_array[$num][] = $value.$value_n;
				}
			}
		}
			$num++;
		if ($num < $old_num ) {
			makeAb($old_array,$new_array,$ab_array,$num);
		}

	}
	makeAb($old_array,$new_array,$ab_array,1);
var_dump($ab_array);




?>
