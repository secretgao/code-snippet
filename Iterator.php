<?php 

/**
 *  一个对象的属性可以用foreach()循环进行迭代遍历
 * 
 */

class NumberSquared implements Iterator{
    
    public function __construct($start,$end)
    {
        $this->start = $start;
        $this->end = $end;
    }
    
    public function rewind()
    {
        $this->cur = $this->start;        
    }
    
    public function key()
    {
        return $this->cur;
    }
    
    public function current()
    {
        return pow($this->cur, 2);            
    }
    
    public function next()
    {
      $this->cur++;   
    }
    
    public function valid()
    {
        return $this->cur <= $this->end;
    }
    
    private $start, $end ,$cur;
}

$obj = new NumberSquared(3, 8);
var_dump($obj);
foreach ($obj as $key => $value){
    print "the square of $key is $value <br>";
}
?>