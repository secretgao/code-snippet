<?php  
    /* 
    * PHP简单利用token防止表单重复提交 
    * 此处理方法纯粹是为了给初学者参考 
    */  
    session_start();  
  
	var_dump($_POST);
    function set_token() {  
         $_SESSION['token'] = md5(microtime(true));  
		 var_dump($_SESSION['token']);
    }  
      
    function valid_token() {  
        $return = $_REQUEST['token'] === $_SESSION['token'] ? true : false;  
        set_token();  
        return $return;  
    }  
      
    //如果token为空则生成一个token  
    if(!isset($_SESSION['token']) || $_SESSION['token']=='') {  
        set_token();  
    }  
      
    if(isset($_POST['test'])){  
        if(!valid_token()){  
            echo "token error";  
        }else{  
            echo '成功提交，Value:'.$_POST['test'];  
        }  
    }  
    ?>  
    <form method="post" action="">  
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']?>">  
        <input type="text" name="test" value="Default">  
        <input type="submit" value="提交" />  
    </form>  