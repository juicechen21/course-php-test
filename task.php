<?php
$mysql_conf = array(
    'host'    => '127.0.0.1:3306',
    'db'      => 'yama',
    'db_user' => 'root',
    'db_pwd'  => 'root',
);
$mysql_conn = @mysql_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if (!$mysql_conn){
    die("could not connect to the database:\n" . mysql_error());//诊断连接错误
}
//mysql_query("set names 'utf8'");//编码转化
$select_db = mysql_select_db($mysql_conf['db']);
if (!$select_db) {
    die("could not connect to the db:\n" .  mysql_error());
}
//$sql = "select id,username from hqj_business";//查询sql
$val = rand(100000,900000);
$time = date('Y-m-d H:i:s');
$sql = "INSERT INTO hqj_task (val,time) VALUES('$val','$time')";//插入sql
$res = mysql_query($sql);
if (!$res) {
    //die("could get the res:\n" . mysql_error());
	echo "失败".mysql_error();
}else{
	echo "成功";
}
/*
while ($row = mysql_fetch_assoc($res)) {
    print_r($row);
}
*/
//关闭连接
mysql_close($mysql_conn);