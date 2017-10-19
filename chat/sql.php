<?php
//链接数据库
define('DBHOST','localhost');
define('DBNAME','chat');
define('DBUSER','root');
define('DBPAS','');

try {
    $dsn="mysql:host=".DBHOST.";dbname=".DBNAME;
    $options=array(
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING,
        PDO::ATTR_CASE=>PDO::CASE_LOWER,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"
    );
    $pdo=new PDO($dsn, DBUSER, DBPAS, $options);  //new PDO($dsn, $username, $passwd, $options)
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}

