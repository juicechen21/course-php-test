<?php

/*
//随机数组
function RandomArray($arr,$val){
	if(!is_array($arr))die('请确定数组');
	$random = array_rand($arr,$val);
	$b = array();
	foreach($random as $k=>&$v){
		$b[] = $arr[$v];
	}
	return $b;
}
$arr=array(
		array(
			"red1" => "red2",
			"green1" => "green2",
			"blue1" => "blue2",
			"yellow1" => "yellow2",
			"brown1" => "brown2"
		),
		array(
			"red1" => "red3",
			"green1" => "green3",
			"blue1" => "blue3",
			"yellow1" => "yellow3",
			"brown1" => "brown3"
		),
		array(
			"red1" => "red4",
			"green1" => "green4",
			"blue1" => "blue4",
			"yellow1" => "yellow4",
			"brown1" => "brown4"
		),
		array(
			"red1" => "red5",
			"green1" => "green5",
			"blue1" => "blue5",
			"yellow1" => "yellow5",
			"brown1" => "brown5"
		),
		array(
			"red1" => "red6",
			"green1" => "green6",
			"blue1" => "blue6",
			"yellow1" => "yellow6",
			"brown1" => "brown6"
		)
	);
$a = RandomArray($arr,3);
print_r($a);
*/

/*
//魔术方法 __set, __get, __isset, __unset, __call, __callStatic, __invoke, __toString(打印对象)
class Test{
	private $abc = 'abc';
	public function __isset($var){
		return isset($this->$var) ?true:false;
	}
}

$test = new Test();
var_dump(isset($test->aaa));
*/

/*
class Test{
	private $abc ='';
	private $dcf ='';
	public function __set($var,$val){
		$this->$var = $val;
	}
	public function __get($var){
		return $this->$var;
	}
}
$foo = new Test();
$foo->dcf='666';
var_dump($foo->dcf);
*/

/*
class Test{
	private $abc ='';
	public function setAbc($val){
		$this->abc = $val;
	}
	public function getAbc(){
		return $this->abc;
	}
}
$foo = new Test();
$foo->setAbc('234');
var_dump($foo->getAbc());
*/
/*
class A{
	public static $foo = "手机";
	public static function who(){
		echo "A类的who方法";
	}
	public static function test(){
		// self 代表类的本身
		// static 后期绑定的
		//self::who();
		static::who();
	}
}
// extends 继承父类
class B extends A{
	public static function who(){
		echo "B类的who方法";
	}
}
//echo(B::$foo);
A::test();
*/

/*
header("Content-type: text/html; charset=utf-8");
$mysql_conf = array(
    'host'    => '127.0.0.1:3306',
    'db'      => 'ordering',
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
$sql = "select id,name from hqj_business";
$res = mysql_query($sql);
if (!$res) {
    die("could get the res:\n" . mysql_error());
}

while ($row = mysql_fetch_assoc($res)) {
    print_r($row);
}

mysql_close($mysql_conn);

*/


/*
$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysqli->connect_errno) {
    die("could not connect to the database:\n" . $mysqli->connect_error);//诊断连接错误
}
$mysqli->query("set names 'utf8';");//编码转化
$select_db = $mysqli->select_db($mysql_conf['db']);
if (!$select_db)die("could not connect to the db:\n" .  $mysqli->error);
$sql = 'select id,name from hqj_business where is_type = "1"';
$res = $mysqli->query($sql);
if (!$res)die("sql error:\n" . $mysqli->error);
$arr = [];
while ($row = $res->fetch_assoc()) {
    //var_dump($row);
	$arr[] = $row;
}

$res->free();
$mysqli->close();
var_dump($arr);
*/



exit();
/*
*php四种基础算法
*/
$arr=array(1,43,54,62,21,66,32,78,36,76,39);
$arr2 = bubbleSort($arr);
print_r($arr2);
//冒泡排序
function bubbleSort ($arr){
	$len = count($arr);
	//该层循环控制 需要冒泡的轮数
	for ($i=1; $i<$len; $i++) {
		//var_dump($i."\n");//exit;
		//该层循环用来控制每轮 冒出一个数 需要比较的次数
		for ($k=0; $k<$len-$i; $k++) {
			//var_dump($k."\n");
			if($arr[$k] > $arr[$k+1]) {
				$tmp = $arr[$k+1]; // 声明一个临时变量
				//var_dump($tmp."\n");
				//var_dump($tmp);exit;
				$arr[$k+1] = $arr[$k];
				$arr[$k] = $tmp;
			}
		}
	}
	return $arr;
}

	
//选择排序
//实现思路 双重循环完成，外层控制轮数，当前的最小值。内层 控制的比较次数
function select_sort($arr) {
	//$i 当前最小值的位置， 需要参与比较的元素
	for($i=0, $len=count($arr); $i<$len-1; $i++) {
		//先假设最小的值的位置
		$p = $i;
		//$j 当前都需要和哪些元素比较，$i 后边的。
		for($j=$i+1; $j<$len; $j++) {
			//$arr[$p] 是 当前已知的最小值
			if($arr[$p] > $arr[$j]) {
				//比较，发现更小的,记录下最小值的位置；并且在下次比较时，应该采用已知的最小值进行比较。
				$p = $j;
			}
		}
		//已经确定了当前的最小值的位置，保存到$p中。
		//如果发现 最小值的位置与当前假设的位置$i不同，则位置互换即可
		if($p != $i) {
			$tmp = $arr[$p];
			$arr[$p] = $arr[$i];
			$arr[$i] = $tmp;
		}
	}
	return $arr;
}


//插入排序
function insert_sort($arr){
	$len=count($arr);
	for($i=1; $i<$len; $i++) {
		//获得当前需要比较的元素值。
		$tmp = $arr[$i];
		//内层循环控制 比较 并 插入
		for($j=$i-1; $j>=0; $j--) {
			//$arr[$i];//需要插入的元素; $arr[$j];//需要比较的元素
			if($tmp < $arr[$j]) {
				//发现插入的元素要小，交换位置
				//将后边的元素与前面的元素互换
				$arr[$j+1] = $arr[$j];
				//将前面的数设置为 当前需要交换的数
				$arr[$j] = $tmp;
			} else {
				//如果碰到不需要移动的元素
				//由于是已经排序好是数组，则前面的就不需要再次比较了。
				break;
			}
		}
	}
	//将这个元素 插入到已经排序好的序列内。
	//返回
	return $arr;
}


//快速排序
function quick_sort($arr){
	//判断参数是否是一个数组
	if(!is_array($arr))return false;
	//递归出口:数组长度为1，直接返回数组
	$length = count($arr);
	if($length<=1)return $arr;
	//数组元素有多个,则定义两个空数组
	$left = $right = array();
	//使用for循环进行遍历，把第一个元素当做比较的对象
	for($i=1; $i<$length; $i++){
		//判断当前元素的大小
		if($arr[$i]<$arr[0]){
			$left[]=$arr[$i];
		}else{
			$right[]=$arr[$i];
		}
	}
	//递归调用
	$left=quick_sort($left);
	$right=quick_sort($right);
	//将所有的结果合并
	return array_merge($left,array($arr[0]),$right);
}







